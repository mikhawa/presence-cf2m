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
        return $this->render('print/index.html.twig', [
            'controller_name' => 'PrintController',

        ]);
    }

    #[Route('/search', name: 'app_user_search', methods: ['POST'])]
    public function search(EntityManagerInterface $entityManager, Request $request): Response
    {

        $user = new User();

        $form = $this->createForm(
            UserSearchType::class,
            $user,
            [
                'method' => 'POST',
            ]
        );

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();

            return new Response($task);
            exit();
        }

        return $this->renderForm('search.form.html.twig', [
            'form' => $form,
        ]);
    }

}
