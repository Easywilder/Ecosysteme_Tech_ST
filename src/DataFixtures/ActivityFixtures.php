<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ActivityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 10; $i++) {
            $activity = new Activity();
            $activity->setName($faker->name());
            //$enterprise->setActivity()
            $this->addReference('activite' . $i, $activity);
            $manager->persist($activity);
        }

        $manager->flush();
    }
}
