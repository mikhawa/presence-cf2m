<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'api_')]
class ApiController extends AbstractController
{
    #[Route('/interns/{formation}', name: 'intern', methods: ["GET"])]
    public function findAllIntern(UserRepository $repository, string $formation = null) : Response
    {
        $users = $repository->findInternsByPromotions($formation);
        return $this->json($users);
    }

    #[Route('/users/{role}', name: 'users', methods: ["GET"])]
    public function findAllUsersByRole(UserRepository $repository, string $role = "USER") : Response
    {
        $users = $repository->findAllUsersByRole($role);
        return $this->json($users);
    }
}
