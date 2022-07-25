<?php

namespace App\Controller\Cruds;

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
    public function readUsers() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/update/users', name: 'app_admin_update_users')]
    public function updateUsers() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/delete/users', name: 'app_admin_delete_users')]
    public function deleteUsers() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }
}
