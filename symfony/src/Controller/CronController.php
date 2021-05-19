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
        $jsonresult = $createJson->indexBuilder();
        dd($jsonresult);
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
