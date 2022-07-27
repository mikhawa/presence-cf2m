<?php

namespace App\Controller\Cruds;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserCrudController extends AbstractController
{
    #[Route('/admin/create/users', name: 'app_admin_create_users')]
    public function createUsers() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/read/users', name: 'app_admin_read_users')]
    public function readUsers(UserRepository $repository) : Response
    {
        return $this->render('admin/CRUDs/Read/entities/Users/users.twig', [
            "users" => $repository->findAllUsersByRole(),
        ]);
    }

    #[Route('/admin/update/user/{username}', name: 'app_admin_update_user')]
    public function updateUsers(UserRepository $repository, string $username = "") : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/delete/users', name: 'app_admin_delete_users')]
    public function deleteUsers() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/read/user/{username}', name: 'app_admin_read_user')]
    public function readUser(UserRepository $repository, string $username = "") : Response
    {
        return $this->render('admin/CRUDs/Read/entities/Users/user.twig', [
            "user" => $repository->findOneByUsername($username),
        ]);
    }

    #[Route('/admin/ban/user/{username}', name: 'app_admin_ban_user')]
    public function banUser(UserRepository $repository, string $username = "") : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/update/statut/user/{username}', name: 'app_admin_update_user_statut')]
    public function updateUserStatut(UserRepository $repository, string $username = "")
    {
        return $this->render('admin/admin.homepage.html.twig');
    }
}
