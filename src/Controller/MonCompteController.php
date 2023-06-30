<?php

namespace App\Controller;

use App\Form\ModifPasswordType;
use App\Form\MonCompteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class MonCompteController extends AbstractController
{
    #[Route('/mon/compte', name: 'app_mon_compte')]
    public function modif(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(MonCompteType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_mon_compte');
        }

        $formPassword = $this->createForm(ModifPasswordType::class, $user);
        $formPassword->handleRequest($request);
        if ($formPassword->isSubmitted() && $formPassword->isValid()) {
            $userPassword = $user->getPlainPassword();

            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $userPassword
                )
            );

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Password Changed');

            return $this->redirectToRoute('app_mon_compte');
        }

        return $this->render('mon_compte/index.html.twig', [
            'form' => $form->createView(),
            'formPassword' => $formPassword->createView(),
        ]);
    }
}
