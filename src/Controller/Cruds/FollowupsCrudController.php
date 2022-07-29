<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'crud_')]
class FollowupsCrudController extends AbstractController
{
    #[Route('/create/followups', name: 'create_followups')]
    public function createFollowUps() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('/read/followups', name: 'read_followups')]
    public function readFollowUps() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('/update/followups', name: 'update_followups')]
    public function updateFollowUps() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('/delete/followups', name: 'delete_followups')]
    public function deleteFollowUps() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }
}
