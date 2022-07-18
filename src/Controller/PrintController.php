<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// Rôle minimal pour accès aux feuilles de présences
#[IsGranted('ROLE_PERSO')]
class PrintController extends AbstractController
{
    #[Route('/print', name: 'app_print')]
    public function index(Request $request): Response
    {
      $user = new User();
      $form = $this->createForm(UserType::class, $user);

      if($request->isMethod('POST'))
      {
        $form->submit($request->request->get($form->getName()));
        if ($form->isSubmitted() && $form->isValid()) {

          return $this->redirectToRoute('profile_homepage');
        }
      }

      return $this->render('print/index.html.twig', [
          'controller_name' => 'PrintController',
          'form' => $form->createView(),
      ]);
    }

    /*
    #[Route('/print/{user}', name: 'app_print')]
    public function selectUserWithRolePerso(Request $request): Response
    {
      $user = new User();
      $form = $this->createForm(UserType::class, $user);

      if($request->isMethod('POST'))
      {
        $form->submit($request->request->get($form->getName()));
        if ($form->isSubmitted() && $form->isValid()) {

          return $this->redirectToRoute('profile_homepage');
        }
      }

      return $this->render('print/index.html.twig', [
        'form' => $form->createView()
      ]);
    }
    */
}
