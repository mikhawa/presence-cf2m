<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'crud_')]
class AttendancesheetsCrudController extends AbstractController
{
    #[Route('/create/attendancesheets', name: 'create_attendancesheets')]
    public function createAttendancesheets() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('/read/attendancesheets', name: 'read_attendancesheets')]
    public function readAttendancesheets() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('/update/attendancesheets', name: 'update_attendancesheets')]
    public function updateAttendancesheets() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('/delete/attendancesheets', name: 'delete_attendancesheets')]
    public function deleteAttendancesheets() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }
}
