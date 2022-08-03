<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\UX\Chartjs\Model\Chart;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    public function internsProfil(UserRepository $repository, string $username = ""): Response
    {
        return $this->render('private/pages/personnel/profil_interns.html.twig', [
            'username'   => $username,
            'internInfo' => $repository->findOneByUsername($username),
        ]);
    }

    #Test ChartJs : vue d'ensemble pour tous les stagiaires
    #[Route(path:'/statGraph', name:'statGraph')]
    public function statGraph(UserRepository $user): Response
    {
        
        $users = $user->findAll();

        return $this->render('apps/charts/stats_interns.html.twig', [
            "users" => $users
        ]);
    }
}
