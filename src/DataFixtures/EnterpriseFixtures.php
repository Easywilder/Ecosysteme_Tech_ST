<?php

namespace App\DataFixtures;

use App\Entity\Enterprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class EnterpriseFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 10; $i++) {
            $enterprise = new Enterprise();
            $enterprise->setName($faker->name());
            $enterprise->setAdress($faker->address);
            $enterprise->setCity('Saint-Etienne');
            $enterprise->setActivity($this->getReference('activite1'));
            //$enterprise->setActivity()
            $manager->persist($enterprise);
        }
        $manager->flush();
    }
}