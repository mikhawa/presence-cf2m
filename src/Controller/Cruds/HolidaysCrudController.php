<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'crud_')]
class HolidaysCrudController extends AbstractController
{
    #[Route('/create/holidays', name: 'create_holidays')]
    public function createHolidays() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('/read/holidays', name: 'read_holidays')]
    public function readHolidays() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('/update/holidays', name: 'update_holidays')]
    public function updateHolidays() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('/delete/holidays', name: 'delete_holidays')]
    public function deleteHolidays() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }
}
