<?php

namespace App\DataFixtures;

use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    protected UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {

        $users = [
            [
                'email' => 'toto@gmail.com',
                'roles' => 'ROLE_ADMIN',
                'password' => 'azerty',
                'nom' => 'tata',
                'prenom' => 'Josy',
                'date_naissance' => '1983-11-26',
                'proprietaire_nft' => '1',
            ],
            [
                'email' =>'momo@hotmail.com',
                'roles' => 'ROLE_ACHETEUR',
                'password' => '123456',
                'nom' => 'titi',
                'prenom' => 'momo',
                'date_naissance' => '07/03/1983',
                'proprietaire_nft' => '0',
            ],
        ];

        foreach ($users as $utilisateur) {
            $user = new User();
            $user->setEmail($utilisateur['email']);
            $password = $this->hasher->hashPassword($user, $utilisateur['password']);
            $user->setPassword($password);
            $user->setRoles([$utilisateur['roles']]);
            $user->setNom($utilisateur['nom']);
            $user->setPrenom($utilisateur['prenom']);
            $user->setDateNaissance(new \DateTime($utilisateur['date_naissance']));
            $user->setProprietaireNFT($utilisateur[true]);

            $manager->persist($user);

            

        }
        
        $manager->flush();
    }
}