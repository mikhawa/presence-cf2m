<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpecialeventsCrudController extends AbstractController
{
    #[Route('/admin/create/specialevents', name: 'app_admin_create_specialevents')]
    public function createSpecialevents() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/read/specialevents', name: 'app_admin_read_specialevents')]
    public function readSpecialevents() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/update/specialevents', name: 'app_admin_update_specialevents')]
    public function updateSpecialevents() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/delete/specialevents', name: 'app_admin_delete_specialevents')]
    public function deleteSpecialevents() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }
}
