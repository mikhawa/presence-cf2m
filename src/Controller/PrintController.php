<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
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
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        
        return $this->render('print/index.html.twig', [
            'controller_name' => 'PrintController',
            'form' => $form->createView()
        ]);
    }
}
