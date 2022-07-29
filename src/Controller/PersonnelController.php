<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/perso', name: 'app_perso_')]
class PersonnelController extends AbstractController
{

    #test Vue.js
    #[Route(path: '/vueApp', name: 'vueApp')]
    public function testVue() : Response
    {
        return $this->render('apps/Vue/Exemple/index.html.twig');
    }

    #[Route(path: '/appPierre', name: 'appPierre')]
    public function appPierre() : Response
    {
        return $this->render('apps/Vue/appPierre/index.html.twig');
    }

    #[Route(path: '/interns/user/{username}', name: 'user_username')]
    public function internsProfil(UserRepository $repository, string $username = "") : Response
    {
        return $this->render('private/pages/personnel/profil_interns.html.twig', [
            'username'   => $username,
            'internInfo' => $repository->findOneByUsername($username),
        ]);
    }
}
