<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile_homepage')]
    public function index(): Response
    {
        return $this->render('profile/profile.homepage.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
}
