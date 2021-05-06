<?php

namespace App\Controller;

use App\Entity\QueueTable;
use App\Entity\Studies;
use App\Entity\StudiesJson;
use App\Service\CreatejsonService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Routing\Annotation\Route;

class CronController extends AbstractController
{

    /**
     * @Route("/cron", name="cron")
     */
    public function createjson(CreatejsonService $createJson)
    {
        $createJson->createjson();

        dd('success');
    }
}
