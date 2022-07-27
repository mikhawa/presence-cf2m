<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'crud_')]
class OptionsCrudController extends AbstractController
{
    #[Route('/create/options', name: 'create_options')]
    public function createOptions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/read/options', name: 'read_options')]
    public function readOptions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/update/options', name: 'update_options')]
    public function updateOptions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/delete/options', name: 'delete_options')]
    public function deleteOptions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }
}
