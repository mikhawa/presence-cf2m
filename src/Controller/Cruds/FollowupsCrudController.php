<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FollowupsCrudController extends AbstractController
{
    #[Route('/admin/create/followups', name: 'app_admin_create_followups')]
    public function createFollowUps() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/read/followups', name: 'app_admin_read_followups')]
    public function readFollowUps() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/update/followups', name: 'app_admin_update_followups')]
    public function updateFollowUps() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/delete/followups', name: 'app_admin_delete_followups')]
    public function deleteFollowUps() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }
}
