<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OptionsCrudController extends AbstractController
{
    #[Route('/admin/create/options', name: 'app_admin_create_options')]
    public function createOptions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/read/options', name: 'app_admin_read_options')]
    public function readOptions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/update/options', name: 'app_admin_update_options')]
    public function updateOptions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/delete/options', name: 'app_admin_delete_options')]
    public function deleteOptions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }
}
