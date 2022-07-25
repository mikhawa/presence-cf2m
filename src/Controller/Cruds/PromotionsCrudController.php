<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PromotionsCrudController extends AbstractController
{
    #[Route('/admin/create/promotions', name: 'app_admin_create_promotions')]
    public function createPromotions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/read/promotions', name: 'app_admin_read_promotions')]
    public function readPromotions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/update/promotions', name: 'app_admin_update_promotions')]
    public function updatePromotions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/delete/promotions', name: 'app_admin_delete_promotions')]
    public function deletePromotions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }
}
