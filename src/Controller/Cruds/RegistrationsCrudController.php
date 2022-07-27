<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'crud_')]
class RegistrationsCrudController extends AbstractController
{
    #[Route('/create/registrations', name: 'create_registrations')]
    public function createRegistrations() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('/read/registrations', name: 'read_registrations')]
    public function raedRegistrations() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('/update/registrations', name: 'update_registrations')]
    public function updateRegistrations() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('/delete/registrations', name: 'delete_registrations')]
    public function deleteRegistrations() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }
}
