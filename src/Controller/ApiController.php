<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'api_')]
class ApiController extends AbstractController
{
    #[Route('/interns/promotion/{formation}', name: 'interns', methods: ["GET"])]
    public function findAllIntern(UserRepository $repository, string $formation = null) : Response
    {
        return $this->json($repository->findInternsByPromotions($formation));
    }

    #[Route('/users/role/{role}', name: 'users', methods: ["GET"])]
    public function findAllUsersByRole(UserRepository $repository, string $role = "USER") : Response
    {
        return $this->json($repository->findAllUsersByRole($role));
    }

    #[Route('/interns/user/{username}', name: 'internsByName', methods: ["GET"])]
    public function findAllUser(UserRepository $repository, string $username) : Response
    {
        return $this->json($repository->findUserByUsername($username));
    }
}
