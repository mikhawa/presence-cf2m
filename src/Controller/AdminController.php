<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'app_admin')]
class AdminController extends AbstractController
{
    #[Route('', name: 'app_admin_index')]
    public function index() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }
}
