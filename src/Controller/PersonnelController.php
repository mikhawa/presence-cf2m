<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/perso', name: 'app_perso_')]
class PersonnelController extends AbstractController
{
    #test Vue.js
    #[Route(path: '/vueApp', name: 'vueApp')]
    public function testVue()
    {
        return $this->render('apps/Vue/Exemple/index.html.twig');
    }
}
