<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{   
    private $hasher;

public function __construct(UserPasswordHasherInterface $hasher)

{
    $this->hasher = $hasher;
}

    public function load(ObjectManager $manager): void
    

    {
        $user1 = new User();

        $user1->setDateNaissance(\DateTime::createFromFormat("d/m/Y H:i","25/04/1962 15:00"));        
        $user1->setEmail("Roche63@icloud.com");
        $user1->setPassword($this->hasher->hashPassword($user1, "user"));

        $manager->persist($user1);
        $manager->flush();

        $user2  = new User();

        $user2->setDateNaissance(\DateTime::createFromFormat("d/m/Y H:i","08/02/1990 15:00"));
        $user2->setEmail('admin@admin.admin');
        $user2->setPassword($this->hasher->hashPassword($user2, 'admin'));
        $user2->setRoles(["ROLE_ADMIN"]);
        


        $manager->persist($user2);
        $manager->flush();


     

    }
}
