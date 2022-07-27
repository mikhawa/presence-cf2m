<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'crud_')]
class SpecialeventtypesCrudController extends AbstractController
{
    #[Route('/create/specialeventtypes', name: 'create_specialeventtypes')]
    public function createSpecialeventtypes() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/read/specialeventtypes', name: 'read_specialeventtypes')]
    public function readSpecialeventtypes() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/update/specialeventtypes', name: 'update_specialeventtypes')]
    public function updateSpecialeventtypes() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/delete/specialeventtypes', name: 'delete_specialeventtypes')]
    public function deleteSpecialeventtypes() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }
}
