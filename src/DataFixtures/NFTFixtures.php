<?php

namespace App\DataFixtures;


use App\Entity\Image;
use App\Entity\NFT;

use Doctrine\Bundle\FixturesBundle\Fixture;

use Doctrine\Persistence\ObjectManager;

class NFTFixtures extends Fixture 
{


    public function load(ObjectManager $manager): void
    {

        $nFTs = [
            [
                'valeur' => '1',
                'prix' => '2',
                'is_vente' => '1',
            ],
            [
                'valeur' => '3',
                'prix' => '4',
                'is_vente' => '0',
            ],
            [
                'valeur' => '5',
                'prix' => '6',
                'is_vente' => '0',
            ],
            [
                'valeur' => '7',
                'prix' => '8',
                'is_vente' => '1',
            ],
        ];

        $images = [
            'chasseauxsorcières.png',
            'dansedenuit.png',
            'ff7n2.png',
            'futuristcity.png',
            'heaven.png',
            'manofnature.png',
            'mohamed_2004_sword.png',
            'montagnefoudre.png',
            'nftff7.png',
            'pecheenforet.png',
            'perenoeldufuture.png',
            'perenoelsinge.png',
            'swordnft.png',
        ];

        

        foreach ($nFTs as $nft){

        $n = new NFT();
        $n ->setValeur($nft['valeur']);
        $n ->setPrix($nft['prix']);
        $n ->setIsVente($nft['is_vente']);


        $nbImages = mt_rand(1, 1);

        for ($i = 1; $i <= $nbImages; ++$i) {

        $index = mt_rand(0, count($images) -1); 
        $picture = new Image();
        $picture->setLiens($images[$index]);
        $picture->setNomImg('Lorem');
        $picture->setDescription('Lorem');

        
        $n->setImages($picture);
    }


        $manager->persist($n);
        }

        

        $manager->flush();
    }


}