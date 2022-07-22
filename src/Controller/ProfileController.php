<?php

namespace App\Controller;

use App\Repository\PromotionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(PromotionsRepository $repository) : Response
    {
        return $this->render('profile/profile.homepage.html.twig', [
            'env'        => $_ENV["APP_ENV"],
            "promotions" => $repository->findAll(),
        ]);
    }
}
