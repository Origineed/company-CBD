<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category1 = new Category();
        $category1->setLabel("Fleurs");
        $category1->setOrderCateg(1);
        $this->addReference('Fleurs', $category1);

        $category2 = new Category();
        $category2->setLabel("Résines");
        $category2->setOrderCateg(2);
        $this->addReference('Résines', $category2);

        $category3 = new Category();
        $category3->setLabel("Huiles");
        $category3->setOrderCateg(3);
        $this->addReference('Huiles', $category3);

        $category4 = new Category();
        $category4->setLabel("Cosmetiques");
        $category4->setOrderCateg(4);
        $this->addReference('Cosmetiques', $category4);

      


        $manager->persist($category1);
        $manager->persist($category2);
        $manager->persist($category3);
        $manager->persist($category4);

        $manager->flush();
    }
}
