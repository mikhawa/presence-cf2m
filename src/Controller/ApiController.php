<?php

namespace App\Controller;

use App\Repository\PromotionsRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'api_')]
class ApiController extends AbstractController
{
    #[Route('/interns', name: 'interns', methods: ["GET"])]
    public function findAllIntern(UserRepository $repository) : Response
    {
        return $this->json($repository->findInternsByPromotions());
    }

    #[Route('/interns/promotion/{formation}', name: 'internsByPromotions', methods: ["GET"])]
    public function findAllInternByPromotion(UserRepository $repository, ?string $formation = null) : Response
    {
        return $this->json($repository->findInternsByPromotions($formation));
    }

    #[Route('/interns/user/{formation}/{username}', name: 'internsByName', methods: ["GET"])]
    public function findAllUser(UserRepository $repository, ?string $formation = null, ?string $username = null) : Response
    {
        return $this->json($repository->findInternByUsername($formation, $username));
    }

    #[Route('/users', name: 'users', methods: ["GET"])]
    public function findAllUsers(UserRepository $repository) : Response
    {
        return $this->json($repository->findAllUsersByRole());
    }

    #[Route('/users/role/{role}', name: 'usersByRole', methods: ["GET"])]
    public function findAllUsersByRole(UserRepository $repository, string $role = "USER") : Response
    {
        return $this->json($repository->findAllUsersByRole($role));
    }

    #[Route('/promotions', name: 'promotions', methods: ["GET"])]
    public function findPromotions(PromotionsRepository $repository) : Response
    {
        return $this->json($repository->getAllPromotions());
    }
}
