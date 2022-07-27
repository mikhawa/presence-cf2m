<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class UserCrudController extends AbstractController
{
    #[Route('/admin/create/users', name: 'app_admin_create_users')]
    public function createUsers(): Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/read/users', name: 'app_admin_read_users')]
    public function readUsers(UserRepository $repository): Response
    {
        return $this->render('admin/cruds/Read/users.twig', [
            "users" => $repository->findAllUsersByRole(),
        ]);

    }

    #[Route('/admin/update/users', name: 'app_admin_update_users')]
    public function updateUsers(): Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/delete/users', name: 'app_admin_delete_users')]
    public function deleteUsers(): Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/read/user/{username}', name: 'app_admin_read_user')]
    public function readUsername(UserRepository $repository, string $username = ""): Response
    {
        return $this->render('admin/cruds/Read/user.twig', [
            "user" => $repository->findOneByUsername($username),
        ]);
    }
}
