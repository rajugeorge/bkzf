<?php

namespace App\Controller;

use App\Entity\DiagnosesCodeIcd10;
use App\Entity\Mutations;
use App\Entity\QueueTable;
use App\Entity\Studies;
use App\Entity\StudiesJson;
use App\Entity\StudyCategories;
use App\Entity\StudyLocations;
use App\Entity\User;
use App\Repository\CategoryDiseasesRepository;
use App\Repository\StudiesJsonRepository;
use App\Repository\StudiesRepository;
use App\Repository\StudyPhaseRepository;
use App\Repository\UniversityHospitalsRepository;
use DateTime;
use Doctrine\DBAL\Connection;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\AsciiSlugger;

class SiteController extends AbstractController
{

    public function index(): Response
    {
        return $this->render('site/index.html.twig');
    }


    public function getstudies(Request $request,StudiesRepository $studiesRepository): Response
    {
        
        $start = $request->query->get('start');
        $length = 6;


        $studies = $studiesRepository->findBy(array(), array('id' => 'DESC'),$length,$start);
        return $this->render('site/getstudies.html.twig', [
            'studies' => $studies,
        ]);
    }

    public function viewstudies(StudiesRepository $studiesRepository,$id): Response
    {

        $studie = $studiesRepository->find($id);
        return $this->render('site/viewstudies.html.twig', [
            'study' => $studie,
        ]);
    }

    public function uploadcsv(): Response
    {
        return $this->render('site/uploadcsv.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    public function uploadcsvpocess(Request $request)
    {
        $csv = $request->files->get('file');

        if ($csv) {

            $uploadpath = $this->createFilename($csv,$this->getParameter('csv_directory'));

            $isuplad = $csv->move($uploadpath->dirpath,$uploadpath->filename);
            // dump($uploadpath);
            // dd($isuplad);
            // dd($uploadpath->webpath);
            if($isuplad){
                return $this->redirectToRoute('index',['msg'=>'success']);
            }else{
                return $this->redirectToRoute('index',['msg'=>'failed']);
            }
        }else{
            return $this->redirectToRoute('index',['msg'=>'failed']);
        }
    }

    private function createFilename($file,$file_directory = null){

        $filesystem = new Filesystem();
        $slugger = new AsciiSlugger();

        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        $project_dir = $this->getParameter('kernel.project_dir');

        $dir = ($file_directory)?$file_directory:'/';

        $fullpath = $project_dir . $dir . $newFilename;

        try{
            $siteaddress = $this->getParameter('site');
        }catch(Exception $e){
            $siteaddress = '';
        }
        
        
        if(!$filesystem->exists($fullpath)){

            $return = (object) array();
            $return->fullpath = $fullpath;
            $return->dirpath = $project_dir . $file_directory;
            $return->webpath = $siteaddress . $dir . $newFilename;
            $return->filename = $newFilename;

            return $return;
        }else{
            $this->createFilename($file,$file_directory);
        }

    }


    public function addstudies(StudiesRepository $studiesRepository, UniversityHospitalsRepository $universityHospitalsRepository, StudyPhaseRepository $studyPhaseRepository, CategoryDiseasesRepository $categoryDiseasesRepository)
    {
        $studies = $studiesRepository->findAll();
        $universityHospitals = $universityHospitalsRepository->findAll();
        $studyPhase = $studyPhaseRepository->findAll();
        $categoryDiseases = $categoryDiseasesRepository->findBy(array('categoryDiseasesId'=>null), array());

        return $this->render('site/addstudies.html.twig', [
            'studies' => $studies,
            'universityHospitals' => $universityHospitals,
            'studyPhases' => $studyPhase,
            'categoryDiseases' => $categoryDiseases,
        ]);
    }

    public function editstudies($id,StudiesRepository $studiesRepository, UniversityHospitalsRepository $universityHospitalsRepository, StudyPhaseRepository $studyPhaseRepository, CategoryDiseasesRepository $categoryDiseasesRepository)
    {
        $study = $studiesRepository->find($id);
        $studies = $studiesRepository->findAll();
        $universityHospitals = $universityHospitalsRepository->findAll();
        $studyPhase = $studyPhaseRepository->findAll();
        $categoryDiseases = $categoryDiseasesRepository->findBy(array('categoryDiseasesId'=>null), array());

        // dd($study->getCategoryDiseases()[0]->getParent());
        // dd($study->getHospitalLocations()[0]);
        // dd($study);
        // dd($categoryDiseases);

        return $this->render('site/editstudies.html.twig', [
            'activestudy' => $study,
            'studies' => $studies,
            'universityHospitals' => $universityHospitals,
            'studyPhases' => $studyPhase,
            'categoryDiseases' => $categoryDiseases,
        ]);
    }

    public function addstudiesprocess(Request $request, Connection $conn, StudiesRepository $studiesRepository, StudyPhaseRepository $StudyPhaseRepository)
    {
        $studies = new Studies();
        $userID = $this->getUser()->getId();

        $manager = $this->getDoctrine()->getManager();

        // dump($request->request);

        if($request->request->get('short_title')){
            $studies->setShortTitle($request->request->get('short_title'));
        }
        if($request->request->get('title')){
            $studies->setTitle($request->request->get('title'));
        }
        if($request->request->get('description')){
            $studies->setDescription($request->request->get('description'));
        }
        if($request->request->get('study_phase_id')){
            $studyPhase = $StudyPhaseRepository->find($request->request->get('study_phase_id'));
            $studies->setStudyPhase($studyPhase);
        }
        if($request->request->get('eudra_ct')){
            $studies->setEudraCt($request->request->get('eudra_ct'));
        }
        if($request->request->get('nct')){
            $studies->setNct($request->request->get('nct'));
        }
        if($request->request->get('drks')){
            $studies->setDrks($request->request->get('drks'));
        }
        $userR = $manager->getRepository(User::class);
        $user = $userR->find($userID);

        $studies->setUser($user);
        $studies->setIsactive(true);
        $now = new DateTime();
        $studies->setUpdatedTime($now);

        // dd($studies);

        
        $manager->persist($studies);
        $manager->flush();

        $studiesId = $studies->getId();

        $diagnoses_codes = $request->request->get('diagnoses_code');
        if(!empty($diagnoses_codes)){
            foreach($diagnoses_codes as $diagnoses_code){
                $dcode = new DiagnosesCodeIcd10();
                $dcode->setCode($diagnoses_code);
                $dcode->setStudies($studies);
                $manager->persist($dcode);
                $manager->flush();
            }
        }

        $mutations = $request->request->get('mutations');
        if(!empty($mutations)){
            foreach($mutations as $mutation){
                $mutationEntity = new Mutations();
                $mutationEntity->setMutation($mutation);
                $mutationEntity->setStudies($studies);
                $manager->persist($mutationEntity);
                $manager->flush();
            }
        }

        $hospitals_locations = $request->request->get('hospitals_locations');
        if(!empty($hospitals_locations)){
            foreach($hospitals_locations as $hospitals_location){
                $SlocationEntity = new StudyLocations();
                $SlocationEntity->setStudiesId($studiesId);
                $SlocationEntity->setHospitalLocationsId($hospitals_location);
                $SlocationEntity->setStatus('active');
                $manager->persist($SlocationEntity);
                $manager->flush();
            }
        }

        $category_diseases = $request->request->get('category_diseases');
        if(!empty($category_diseases)){
            foreach($category_diseases as $category_disease){
                $ScategorieEntity = new StudyCategories();
                $ScategorieEntity->setStudiesId($studiesId);
                $ScategorieEntity->setCategoryDiseasesId($category_disease);
                $manager->persist($ScategorieEntity);
                $manager->flush();
            }
        }

        $queueTable = new QueueTable();
        $queueTable->setStudiesId($studiesId);
        $manager->persist($queueTable);
        $manager->flush();


        return $this->redirectToRoute('index');
    }

    public function editstudiesprocess(Request $request, Connection $conn, StudyPhaseRepository $StudyPhaseRepository)
    {
        $stdid = $request->request->get('studyid');

        $manager = $this->getDoctrine()->getManager();

        $queryBuilder = $conn->createQueryBuilder();

        $manager = $this->getDoctrine()->getManager();
        $studiesR = $manager->getRepository(Studies::class);

        $studies = $studiesR->find($stdid);

        $userID = $this->getUser()->getId();

        // dd($request->request);

        if($request->request->get('short_title')){
            $studies->setShortTitle($request->request->get('short_title'));
        }
        if($request->request->get('title')){
            $studies->setTitle($request->request->get('title'));
        }
        if($request->request->get('description')){
            $studies->setDescription($request->request->get('description'));
        }
        if($request->request->get('study_phase_id')){
            $studyPhase = $StudyPhaseRepository->find($request->request->get('study_phase_id'));
            $studies->setStudyPhase($studyPhase);
        }
        if($request->request->get('EudraCT')){
            $studies->setEudraCt($request->request->get('EudraCT'));
        }
        if($request->request->get('NCT')){
            $studies->setNct($request->request->get('NCT'));
        }
        if($request->request->get('DRKS')){
            $studies->setDrks($request->request->get('DRKS'));
        }
        $userR = $manager->getRepository(User::class);
        $user = $userR->find($userID);
        $studies->setUser($user);

        $studies->setIsactive(true);

        $manager->persist($studies);
        $manager->flush();

        $diagnoses_codes = $request->request->get('diagnoses_code');
        if(!empty($diagnoses_codes)){

            $queryBuilder->delete('diagnoses_code_icd10')->where('studies_id=:sid')->setParameter(':sid',$stdid);
            $queryBuilder->execute();

            foreach($diagnoses_codes as $diagnoses_code){
                $dcode = new DiagnosesCodeIcd10();
                $dcode->setCode('test');
                $dcode->setStudies($studies);
                $manager->persist($dcode);
                $manager->flush();
            }
        }
        $mutations = $request->request->get('mutations');
        if(!empty($mutations)){

            $queryBuilder->delete('mutations')->where('studies_id=:sid')->setParameter(':sid',$stdid);
            $queryBuilder->execute();

            foreach($mutations as $mutation){
                $mutationEntity = new Mutations();
                $mutationEntity->setMutation($mutation);
                $mutationEntity->setStudies($studies);
                $manager->persist($mutationEntity);
                $manager->flush();
            }
        }

        $hospitals_locations = $request->request->get('hospitals_locations');
        if(!empty($hospitals_locations)){

            $queryBuilder->delete('study_locations')->where('studies_id=:sid')->setParameter(':sid',$stdid);
            $queryBuilder->execute();

            foreach($hospitals_locations as $hospitals_location){
                $SlocationEntity = new StudyLocations();
                $SlocationEntity->setStudiesId($stdid);
                $SlocationEntity->setHospitalLocationsId($hospitals_location);
                $SlocationEntity->setStatus('active');
                $manager->persist($SlocationEntity);
                $manager->flush();
            }
        }

        $category_diseases = $request->request->get('category_diseases');
        if(!empty($category_diseases)){

            $queryBuilder->delete('study_categories')->where('studies_id=:sid')->setParameter(':sid',$stdid);
            $queryBuilder->execute();

            foreach($category_diseases as $category_disease){
                $ScategorieEntity = new StudyCategories();
                $ScategorieEntity->setStudiesId($stdid);
                $ScategorieEntity->setCategoryDiseasesId($category_disease);
                $manager->persist($ScategorieEntity);
                $manager->flush();
            }
        }
    
        $queueTable = new QueueTable();
        $queueTable->setStudiesId($stdid);
        $manager->persist($queueTable);
        $manager->flush();

        return $this->redirectToRoute('index');
    }

    public function getlocation(Request $request, Connection $conn)
    {
        $hId = $request->query->get('hId');
        $stdid = $request->query->get('stdid');
        $manager = $this->getDoctrine()->getManager();
        $stdLocation = $manager->getRepository(StudyLocations::class);
        $selectedLocation = array();
        if($stdid){
            $stdLctn = $stdLocation->findBy(array('studiesId'=>$stdid));
            foreach($stdLctn as $singlestdLctn){
                $selectedLocation[] = $singlestdLctn->getHospitalLocationsId();
            }
        }

        $queryBuilder = $conn->createQueryBuilder();
        $Hlocations = $queryBuilder->select('*')->from('hospital_locations')
        ->where('university_hospitals_id='.$hId)->execute()->fetchAll();
        $options = '';
        foreach($Hlocations as $location){
            if(in_array($location['id'],$selectedLocation)){
                $select = 'selected';
            }else{
                $select = '';
            }
            $options .= '<option '.$select.' value="'.$location['id'].'">'.$location['name'].'</option>';
        }

        return new Response($options, Response::HTTP_OK);
    }

    public function getsubcategorydiseases(Request $request, Connection $conn)
    {
        $cId = $request->query->get('cId');
        $stdid = $request->query->get('stdid');

        $manager = $this->getDoctrine()->getManager();
        $stdCat = $manager->getRepository(StudyCategories::class);
        $selectedCats = array();
        if($stdid){
            $stdCat = $stdCat->findBy(array('studiesId'=>$stdid));
            foreach($stdCat as $singlestdcat){
                $selectedCats[] = $singlestdcat->getCategoryDiseasesId();
            }
        }
        $queryBuilder = $conn->createQueryBuilder();
        $CatDiseases = $queryBuilder->select('*')->from('category_diseases')
        ->where('category_diseases_id='.$cId)->execute()->fetchAll();
        $options = '';
        foreach($CatDiseases as $diseases){
            if(in_array($diseases['id'],$selectedCats)){
                $select = 'selected';
            }else{
                $select = '';
            }
            $options .= '<option '.$select.' value="'.$diseases['id'].'">'.$diseases['name'].'</option>';
        }

        return new Response($options, Response::HTTP_OK);
    }

    public function studyjson(StudiesJsonRepository $stdyJsonR){
        $stdyJson = $stdyJsonR->findBy(array(),array('id'=>'DESC'),10);

        foreach($stdyJson as $json){
            dump(json_decode($json->getJson()));
        }exit;
    }



}
