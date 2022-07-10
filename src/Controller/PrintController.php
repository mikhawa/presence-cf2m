<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\UserSearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


// Rôle minimal pour accès aux feuilles de présences
#[IsGranted('ROLE_PERSO')]
class PrintController extends AbstractController
{
    #[Route('/print', name: 'app_print')]
    public function index(): Response
    {
        return $this->render('print/index.print.html.twig', [
            'controller_name' => 'PrintController',

        ]);
    }

    #[Route('/search', name: 'app_user_search', methods: ['POST','GET'])]
    public function search(EntityManagerInterface $entityManager): Response
    {

        $user = new User();

        $form = $this->createForm(
            UserSearchType::class,
            $user,
        );


        return $this->renderForm('search.form.html.twig', [
            'form' => $form,
        ]);
    }

}
