<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use App\Entity\Categorie;
use App\Entity\Peinture;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder) {

        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        // utilisation de Faker
        $faker = Factory::create('fr_FR');

        //creation d'un utilisateur
        $user = new User();

        $user->setEmail('user@test.fr')
             ->setNom($faker->lastName())
             ->setPrenom($faker->firstName())
             ->setTelephone($faker->phoneNumber())
             ->setAPropos($faker->text())
             ->setInstagram('instagram');

        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);

        //creation de 10 article
        for ($r=0; $r < 8; $r++) {
        $blog = new BlogPost();

        $blog->setTitre($faker->word(3, true))
            ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
            ->setContenu($faker->text(360))
            ->setSlug($faker->slug(3))
            ->setUser($user);


        $manager->persist($blog);
    }

    //creation de 5 categorie
        for ($k=0; $k < 5; $k++) {
            $categorie = new Categorie();

            $categorie->setNom($faker->word())
                       ->setDescription($faker->text(300))
                       ->setSlug($faker->slug(3));

            $manager->persist($categorie);

        //creation de 2 peinture
        for ($j=0; $j < 2; $j++) {
            $peinture = new Peinture();

            $peinture->setNom($faker->word(3, true))
                ->setLargeur($faker->randomFloat(2, 20, 60))
                ->setHauteur($faker->randomFloat(2, 20, 60))
                ->setEnVente($faker->randomElement([true, false]))
                ->setDateRealisation($faker->dateTimeBetween('-6 month', 'now'))
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setDescription($faker->text())
                ->setPortfolio($faker->randomElement([true, false]))
                ->setSlug($faker->slug())
                ->setFile($faker->imageUrl())
                ->addCategorie($categorie)
                ->setPrix($faker->randomFloat(2, 100, 9999))
                ->setUser($user);

            $manager->persist($peinture);
            }
        }

        $manager->flush();
    }
}
