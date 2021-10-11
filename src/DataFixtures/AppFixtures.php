<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        // creation compte admin

        $admin = new User();

            // hydratation du compte
        $admin
            ->setEmail('admin@a.a')
            ->setRegistrationDate($faker->dateTimeBetween('-1 year', 'now') )
            ->setPseudonym('Batman')
            ->setRoles(["ROLE_ADMIN"])
            ->setPassword(
                $this->encoder->hashPassword($admin, '123456Az*')
            );

        //persistance de l'admin
        $manager->persist($admin);

        for($i = 0; $i > 50; $i++){

            $user = new User();

            $user
                ->setEmail( $faker->email )
                ->setRegistrationDate(( $faker->dateTimeBetween('-1 year', 'now'))
                ->setPseudonym( $faker->userName)
                ->setPassword( $this->encoder->hashPassword($user, 'aaaaaaaaA7/'));

                $manager->persist($user);

        }

        // svg des nouvelles entitées dans la bdd
        $manager->flush();

    }
}
