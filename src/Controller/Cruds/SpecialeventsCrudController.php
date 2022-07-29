<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'crud_')]
class SpecialeventsCrudController extends AbstractController
{
    #[Route('create/specialevents', name: 'create_specialevents')]
    public function createSpecialevents() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('read/specialevents', name: 'read_specialevents')]
    public function readSpecialevents() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('update/specialevents', name: 'update_specialevents')]
    public function updateSpecialevents() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('delete/specialevents', name: 'delete_specialevents')]
    public function deleteSpecialevents() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }
}
