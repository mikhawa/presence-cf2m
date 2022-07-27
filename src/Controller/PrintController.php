<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// Rôle minimal pour accès aux feuilles de présences
#[IsGranted('ROLE_PERSO')]
class PrintController extends AbstractController
{
    #[Route('/print', name: 'app_print')]
    public function index(): Response
    {

      return $this->render('print/index.html.twig', [
          'controller_name' => 'PrintController',
      ]);
    }

    #[Route('/print', name: 'app_print')]
    public function selectUserWithoutRolePerso(Request $request): Response
    {
      $user = new User();
      $form = $this->createForm(UserType::class, $user);
      $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

          //$user = $form->getData();

          return $this->redirectToRoute('app_profile');
        }
  
      return $this->render('print/index.html.twig', [
        'form' => $form->createView(),
      ]);
    }
}
