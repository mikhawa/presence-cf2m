<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpecialeventtypesCrudController extends AbstractController
{
    #[Route('/admin/create/specialeventtypes', name: 'app_admin_create_specialeventtypes')]
    public function createSpecialeventtypes() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/read/specialeventtypes', name: 'app_admin_read_specialeventtypes')]
    public function readSpecialeventtypes() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/update/specialeventtypes', name: 'app_admin_update_specialeventtypes')]
    public function updateSpecialeventtypes() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/delete/specialeventtypes', name: 'app_admin_delete_specialeventtypes')]
    public function deleteSpecialeventtypes() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }
}
