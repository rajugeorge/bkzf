<?php

namespace App\DataFixtures;

use App\Entity\CategoryDiseases;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryDiseasesFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories[] = [
            'id'=> 1,
            'name'=>'lung cancer',
            'description'=> null,
            'category_diseases_id'=>null,
            'user_id'=> 1
        ];
        $categories[] = [
            'id'=> 2,
            'name'=>'Non-small cell lung cancer',
            'description'=> null,
            'category_diseases_id'=>1,
            'user_id'=> 1
        ];
        $categories[] = [
            'id'=> 3,
            'name'=>'Small cell lung cancer',
            'description'=> null,
            'category_diseases_id'=>1,
            'user_id'=> 1
        ];
        $categories[] = [
            'id'=> 4,
            'name'=>'breast cancer',
            'description'=> null,
            'category_diseases_id'=>null,
            'user_id'=> 1
        ];

        foreach($categories as $category){
            $categoryDiseases = new CategoryDiseases();
            $categoryDiseases->setName($category['name']);
            $categoryDiseases->setDescription($category['description']);
            if($category['category_diseases_id'] != null){
                $categoryDiseasesR = $manager->getRepository(CategoryDiseases::class)->find($category['category_diseases_id']);
                $categoryDiseases->setParent($categoryDiseasesR);
            }
            $categoryDiseases->setUserId($category['user_id']);

            $manager->persist($categoryDiseases);
            $manager->flush();
        }
    }
}
