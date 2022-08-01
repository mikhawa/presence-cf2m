<?php

namespace App\Controller;

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

    #[Route(path:'/statGraph', name:'statGraph')]
    public function statGraph(ChartBuilderInterface $chartBuilder, UserRepository $user)
    {
        $resultUsers = $user->findAll();

        $labels = [];
        $data = [];

        foreach($resultUsers as $resultUser){
            $labels[] = $resultUser->getUsername();
            $data[] = $resultUser->getThestatus();
        }

        $chart = $chartBuilder->createChart(Chart::TYPE_BAR);

        $chart->setData([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Status',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $data,
                ],
            ],
        ]);

        $chart->setOptions([
            
        ]);

        return $this->render('apps/charts/testChart.html.twig',[
            'chart' => $chart,
        ]);
    }
}
