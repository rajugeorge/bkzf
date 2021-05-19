<?php

namespace App\DataFixtures;

use App\Entity\HospitalLocations;
use App\Entity\UniversityHospitals;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UniversityHospitalsFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $uhospitals[] = [
            'id'=> 1,
            'name'=>'University1',
            'description'=> 'University1',
            'email'=>'university1@bkzf.com',
            'phone'=> '9876543210',
            'address'=> 'Rechts der Isar Munich',
            'pin'=> 123456,
            'user_id'=> 1,
            'location' => [
                [
                    'name'=>'U1 Hospital Location 1',
                    'description'=>'U1 Hospital Location 1',
                    'email'=>'u1l1@bkzf.com',
                    'phone'=>'9876543210',
                    'address'=>'Rechts der Isar Munich',
                    'pin'=>123456,
                ],
                [
                    'name'=>'U1 Hospital Location 2',
                    'description'=>'U1 Hospital Location 2',
                    'email'=>'u1l1@bkzf.com',
                    'phone'=>'9876543210',
                    'address'=>'Rechts der Isar Munich',
                    'pin'=>123456,
                ],

            ]
        ];
        $uhospitals[] = [
            'id'=> 2,
            'name'=>'University2',
            'description'=> 'University2',
            'email'=>'university2@bkzf.com',
            'phone'=> '9876543210',
            'address'=> 'Rechts der Isar Munich',
            'pin'=> 123456,
            'user_id'=> 1,
            'location' => [
                [
                    'name'=>'U2 Hospital Location 1',
                    'description'=>'U2 Hospital Location 1',
                    'email'=>'u2l1@bkzf.com',
                    'phone'=>'9876543210',
                    'address'=>'Rechts der Isar Munich',
                    'pin'=>123456,
                ],
            ]
        ];

        foreach($uhospitals as $hospital){
            $newhospital = new UniversityHospitals();
            $newhospital->setName($hospital['name']);
            $newhospital->setDescription($hospital['description']);
            $newhospital->setEmail($hospital['email']);
            $newhospital->setPhone($hospital['phone']);
            $newhospital->setAddress($hospital['address']);
            $newhospital->setPin($hospital['pin']);
            $newhospital->setUserId($hospital['user_id']);
            $newhospital->setUpdatedDate();

            $manager->persist($newhospital);
            $manager->flush();

            if(!empty($hospital['location'])){foreach($hospital['location'] as $location){
                $hospitalLocation = new HospitalLocations();
                $hospitalLocation->setName($location['name']);
                $hospitalLocation->setDescription($location['description']);
                $hospitalLocation->setEmail($location['email']);
                $hospitalLocation->setPhone($location['phone']);
                $hospitalLocation->setAddress($location['address']);
                $hospitalLocation->setPin($location['pin']);
                $hospitalLocation->setUserId($hospital['user_id']);
                $hospitalLocation->setUpdatedDate();
                $hospitalLocation->setUniversityHospitals($newhospital);
                $manager->persist($hospitalLocation);
                $manager->flush();
            }}
        }
    }
}
