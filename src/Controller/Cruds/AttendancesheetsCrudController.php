<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttendancesheetsCrudController extends AbstractController
{
    #[Route('/admin/create/attendancesheets', name: 'app_admin_create_attendancesheets')]
    public function createAttendancesheets() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/read/attendancesheets', name: 'app_admin_read_attendancesheets')]
    public function readAttendancesheets() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/update/attendancesheets', name: 'app_admin_update_attendancesheets')]
    public function updateAttendancesheets() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/delete/attendancesheets', name: 'app_admin_delete_attendancesheets')]
    public function deleteAttendancesheets() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }
}
