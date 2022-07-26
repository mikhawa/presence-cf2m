<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationsCrudController extends AbstractController
{
    #[Route('/admin/create/registrations', name: 'app_admin_create_registrations')]
    public function createRegistrations() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/read/registrations', name: 'app_admin_read_registrations')]
    public function raedRegistrations() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/update/registrations', name: 'app_admin_update_registrations')]
    public function updateRegistrations() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/delete/registrations', name: 'app_admin_delete_registrations')]
    public function deleteRegistrations() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }
}
