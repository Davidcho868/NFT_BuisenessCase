<?php

namespace App\DataFixtures;

use App\Entity\Adresse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdresseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $adresses = [
            [
                'numero'=> '8b',
                'rue'=>'Rue de la République',
                'code_postal' =>'75012',
                'ville' => 'Paris',
                'departement' => 'ile de france'
            ],
            [
                'numero'=> '34',
                'rue'=>'Boulevard Saint-Germain',
                'code_postal' =>'92600',
                'ville' => 'Nanterre',
                'departement' => 'Hauts de seine'
            
            ],
        ];

        foreach ($adresses as $adresse) {
            $a = new Adresse();
            $a -> setNumero($adresse['numero']);
            $a ->setRue($adresse['rue']);
            $a -> setCodePostal($adresse['code_postal']);
            $a -> setVille($adresse['ville']);
            $a -> setDepartement($adresse['departement']);

            
            $manager->persist($a);
        }
        

        $manager->flush();
    }
}
