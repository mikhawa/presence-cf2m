<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'crud_')]
class PromotionsCrudController extends AbstractController
{
    #[Route('/create/promotions', name: 'create_promotions')]
    public function createPromotions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/read/promotions', name: 'read_promotions')]
    public function readPromotions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/update/promotions', name: 'update_promotions')]
    public function updatePromotions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/delete/promotions', name: 'delete_promotions')]
    public function deletePromotions() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }
}
