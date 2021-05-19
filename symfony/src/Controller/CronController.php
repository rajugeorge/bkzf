<?php

namespace App\Controller;

use App\Service\CreatejsonService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CronController extends AbstractController
{

    /**
     * @Route("/cron", name="cron")
     */
    public function createjson(CreatejsonService $createJson)
    {
        $jsonresult = $createJson->createjson();
        if($jsonresult){
            $result = $createJson->indexBuilder();
            dd($result);
        }else{
            dd('Empty');
        }
        
    }

    /**
     * @Route("/indexbuilder", name="indexbuilder")
     */
    public function indexbuilder(CreatejsonService $createJson)
    {
        $result = $createJson->indexBuilder();
        dd($result);
    }
}
