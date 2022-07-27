<?php

namespace App\Controller\Cruds;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'crud_')]
class UserCrudController extends AbstractController
{
    #[Route('/create/users', name: 'create_users')]
    public function createUsers() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/read/users', name: 'read_users')]
    public function readUsers(UserRepository $repository) : Response
    {
        return $this->render('admin/CRUDs/Read/entities/Users/users.twig', [
            "users" => $repository->findAllUsersByRole(),
        ]);
    }

    #[Route('/update/user/{username}', name: 'update_user')]
    public function updateUsers(UserRepository $repository, string $username = "") : Response
    {
        return $this->render('admin.homepage.html.twig');
    }

    #[Route('/delete/users', name: 'delete_users')]
    public function deleteUsers() : Response
    {
        return $this->render('admin.homepage.html.twig');
    }

    #[Route('/read/user/{username}', name: 'read_user')]
    public function readUser(UserRepository $repository, string $username = "") : Response
    {
        return $this->render('admin/CRUDs/Read/entities/Users/user.twig', [
            "user" => $repository->findOneByUsername($username),
        ]);
    }

    #[Route('/ban/user/{username}', name: 'ban_user')]
    public function banUser(UserRepository $repository, string $username = "") : Response
    {
        return $this->render('admin.homepage.html.twig');
    }

    #[Route('/update/statut/user/{username}', name: 'update_user_statut')]
    public function updateUserStatut(UserRepository $repository, string $username = "")
    {
        return $this->render('admin.homepage.html.twig');
    }
}
