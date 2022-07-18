<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'api_')]
class ApiController extends AbstractController
{
    #[Route('/users', name: 'users', methods: ["GET"])]
    public function index(UserRepository $repository) : Response
    {
        $users = $repository->findAll();

        return $this->json($users);
    }
}
