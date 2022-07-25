<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HolidaysCrudController extends AbstractController
{
    #[Route('/admin/create/holidays', name: 'app_admin_create_holidays')]
    public function createHolidays() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/read/holidays', name: 'app_admin_read_holidays')]
    public function readHolidays() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/update/holidays', name: 'app_admin_update_holidays')]
    public function updateHolidays() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/delete/holidays', name: 'app_admin_delete_holidays')]
    public function deleteHolidays() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }
}
