<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
                //------- FLOWERS ---------//

         $product = new Product();
         $product->setTitle("Jack Herror");
         $product->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elit sed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elit quis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elitquis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elitquis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing ");
         $product->setPrice(12.31);
         $product->setQuantity(2);
         $product->setStar(3);
         $product->setCategory($this->getReference('Fleurs'));
         $product->setBrand("Origineed");
         $product->setPicture('../pictures/kisspng-cannabis-cup-kush-medical-cannabis-joint-5b3b89d140d1e7.9886418815306285612655.png');
         $product->setCbdPourcent(12.32);

         $product2 = new Product();
         $product2->setTitle("Super Skunk");
         $product2->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elit sed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elit quis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elit quis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elit quis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing");
         $product2->setPrice(38.56);
         $product2->setQuantity(1);
         $product2->setStar(3);
         $product2->setCategory($this->getReference('Fleurs'));
         $product2->setBrand("Origineed");
         $product2->setPicture('../pictures/fleurs-detoure2.png');
         $product2->setCbdPourcent(8.7);

         $product3 = new Product();
         $product3->setTitle("Blue Berry");
         $product3->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elit sed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elit quis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elitquis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elitquis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing ");
         $product3->setPrice(28.56);
         $product3->setQuantity(5);
         $product3->setStar(5);
         $product3->setCategory($this->getReference('Fleurs'));
         $product3->setBrand("Origineed");
         $product3->setPicture('../pictures/lcc_detouree.png');
         $product3->setCbdPourcent(18.1);   

         $product6 = new Product();
         $product6->setTitle("Moon Rock");
         $product6->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elit sed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elit quis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elitquis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elitquis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscin");
         $product6->setPrice(48.22);
         $product6->setQuantity(3);
         $product6->setStar(5);
         $product6->setCategory($this->getReference('Fleurs'));
         $product6->setBrand("Origineed");
         $product6->setPicture('../pictures/moonrock-ice.jpeg');
         $product6->setCbdPourcent(18.1); 
         
         // ----------- RESINES ----------- //

         $product4 = new Product();
         $product4->setTitle("Double Zéro");
         $product4->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elit sed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elit quis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elitquis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elitquis nostrud adipiscing elitsed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing ");
         $product4->setPrice(65.64);
         $product4->setQuantity(10);
         $product4->setStar(3);
         $product4->setCategory($this->getReference('Résines'));
         $product4->setBrand("Origineed");
         $product4->setPicture('../pictures/lemon_hash.png');
         $product4->setCbdPourcent(38.1);   
  
        // ------------- COSMETIQUE -------------//

        $product5= new Product();
         $product5->setTitle("Stone Cream");
         $product5->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod idunt ut  minim veniam, quis nostrud adipiscing elit");
         $product5->setPrice(115.64);
         $product5->setQuantity(50);
         $product5->setStar(5);
         $product5->setCategory($this->getReference('Cosmetiques'));
         $product5->setBrand("Origineed");
         $product5->setPicture('../pictures/esperance-creme-nuit-3.png');
         $product5->setCbdPourcent(0);   



         


          $manager->persist($product);
          $manager->persist($product2);
          $manager->persist($product3);
          $manager->persist($product4);
          $manager->persist($product5);
          $manager->persist($product6);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            CategoryFixtures::class
        ];
    }
}
