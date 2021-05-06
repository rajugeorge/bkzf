<?php

namespace App\Controller;

use App\Repository\HospitalLocationsRepository;
use App\Repository\StudiesRepository;
use App\Repository\StudyPhaseRepository;
use App\Repository\UniversityHospitalsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/bzkf/test", name="test")
     */
    public function index(StudiesRepository $sr): Response
    {

        $s = $sr->find(1);
        // dd($s->getHospitalLocations());

        foreach($s->getHospitalLocations() as $hl){
            dump($hl);
        }
        exit();
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    public function cron(){
        return 'success';
    }
}
