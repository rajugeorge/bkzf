<?php
// App/Service/CreateJson.php

namespace App\Service;

use App\Entity\QueueTable;
use App\Entity\Studies;
use App\Entity\StudiesJson;
// use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class CreatejsonService
{
    /** 
     * @var EntityManager 
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createjson()
    {
        $pagination = 20;

        $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $manager = $this->entityManager;

        $queueR = $manager->getRepository(QueueTable::class);
        $queue = $queueR->findBy(array('isrun'=>false),array('id'=>'ASC'),$pagination);
        
        // dd($queue);

        $sr = $manager->getRepository(Studies::class);
        $stdJsonR = $manager->getRepository(StudiesJson::class);

        $runStudies = array();

        if(!empty($queue)){
            foreach($queue as $stdId){

                $queueId = $stdId->getId();
                $stdId = $stdId->getStudiesId();

                if (!in_array($stdId, $runStudies)){

                    $runStudies[] = $stdId;

                    $stdy = $sr->find($stdId);

                    // Serialize your object in Json
                    $jsonObject = $serializer->serialize($stdy, 'json', [
                        'circular_reference_handler' => function ($object) {
                            return $object->getId();
                        }
                    ]);

                    $stdJson = $stdJsonR->findOneBy(array('studiesId'=>$stdId));
                    if($stdJson === null){
                        $stdJson = new StudiesJson();
                    }
                    $array = json_decode($jsonObject);

                    $array = $this->removerkey($array,'__initializer__');
                    $array = $this->removerkey($array,'__cloner__');
                    $array = $this->removerkey($array,'__isInitialized__');
                    $array = $this->removerkey($array,'password');
                    $array = $this->removerkey($array,'children');
                    $array = $this->removerkey($array,'children');
                    $array = $this->removerkey($array,'parent');

                    $stdJson->setStudiesId($stdId);
                    $stdJson->setJson(json_encode($array));

                    $manager->persist($stdJson);
                    $manager->flush(); 
                }

                $singleStdy = $queueR->find($queueId);
                $singleStdy->setIsrun(true);
                $manager->persist($singleStdy);
                $manager->flush();
            }
        }
        
        return true;
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