<?php

namespace App\Controller;

use App\Entity\NFT;
use App\Form\NFTCreationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NFTCreationController extends AbstractController
{
    #[Route('/n/f/t/creation', name: 'app_n_f_t_creation')]
    public function modif(Request $request, EntityManagerInterface $em) : Response 
    {
        $user = $this->getUser();
        $nft = new NFT();
        $form = $this->createForm(NFTCreationFormType::class, $nft);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($nft);
            $em->flush();

            return $this->redirectToRoute('app_n_f_t_creation');
        }
        return $this->render('nft_creation/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
