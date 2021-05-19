<?php
// App/Service/CreateJson.php

namespace App\Service;

use App\Entity\QueueTable;
use App\Entity\Studies;
use App\Entity\StudiesJson;
// use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Elasticsearch\ClientBuilder;
use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class CreatejsonService
{
    /** 
     * @var EntityManager 
     */
    private $entityManager;
    private $params;

    public function __construct(EntityManagerInterface $entityManager, ParameterBagInterface $params)
    {
        $this->entityManager = $entityManager;
        $this->params = $params;
    }

    public function indexBuilder()
    {
        $pagination = $this->params->get('cronpagination');

        $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $manager = $this->entityManager;

        $elasticUrl = $this->params->get('elasticsearch_url');
        $params = ['body' => []];
        $hosts = [$elasticUrl];
        $client = ClientBuilder::create()->setHosts($hosts)->build();

        $queueR = $manager->getRepository(QueueTable::class);
        $queue = $queueR->findBy(array('isrun'=>false),array('id'=>'ASC'),$pagination);
        
        // dd($queue);

        $sr = $manager->getRepository(Studies::class);

        $runStudies = array();

        if(!empty($queue)){
            foreach($queue as $queueStdy){

                $queueId = $queueStdy->getId();
                $stdId = $queueStdy->getStudiesId();

                if (!in_array($stdId, $runStudies)){

                    $runStudies[] = $stdId;

                    $stdy = $sr->find($stdId);

                    // Serialize your object in Json
                    $jsonObject = $serializer->serialize($stdy, 'json', [
                        'circular_reference_handler' => function ($object) {
                            return $object->getId();
                        }
                    ]);

                    $arrayJson = json_decode($jsonObject);

                    $arrayJson = $this->removerkey($arrayJson,'__initializer__');
                    $arrayJson = $this->removerkey($arrayJson,'__cloner__');
                    $arrayJson = $this->removerkey($arrayJson,'__isInitialized__');
                    $arrayJson = $this->removerkey($arrayJson,'password');
                    $arrayJson = $this->removerkey($arrayJson,'children');
                    $arrayJson = $this->removerkey($arrayJson,'children');
                    $arrayJson = $this->removerkey($arrayJson,'parent'); 

                    $params["body"][]= [
                        "update" => [
                            "_index" => "studies",
                            "_id" => $stdId
                        ]
                    ];
                    $params["body"][]= [
                        "doc" => $arrayJson,
                        "doc_as_upsert"=> true
                    ];

                }

                $singleStdy = $queueR->find($queueId);
                $singleStdy->setIsrun(true);
                $manager->persist($singleStdy);
                $manager->flush();
            }
            // dd($params);

            $responses = false;
            $dbRevert = false;

            if (!empty($params['body'])) {
                // Bull import to elasticsearch
                try{
                    $responses = $client->bulk($params);
                }catch(Exception $e){
                    $responses = $e->getMessage();
                    $dbRevert = true;
                }
            }
            if($dbRevert == true){
                $this->dbRevert($queue);
            }

            return $responses;
        }
        
        return 'Nothing to Update';
    }

    protected function dbRevert($stdJsons){

        $manager = $this->entityManager;
        foreach($stdJsons as $stdyjson){
            $stdyjson->setIsrun(false);
            $manager->persist($stdyjson);
            $manager->flush();
        }
    }

    protected function removerkey($array,$rkey){
        
        if(is_object($array)){
            foreach($array as $key=>$value){
                if($key === $rkey){
                    unset($array->$key);
                }else{
                    if(is_object($value)){
                        $array->$key = $this->removerkey($value,$rkey);
                    }elseif(is_array($value)){
                        $array->$key = $this->removerkey($value,$rkey);
                    }
                }
            }
            return $array;
        }elseif(is_array($array)){
            foreach($array as $key=>$value){
                if($key === $rkey){
                    unset($array[$key]);
                }else{
                    if(is_array($value)){
                        $array[$key] = $this->removerkey($value,$rkey);
                    }elseif(is_object($value)){
                        $array[$key] = $this->removerkey($value,$rkey);
                    }
                }
            }
            return $array;
        }else{
            return array();
        }
    }

}