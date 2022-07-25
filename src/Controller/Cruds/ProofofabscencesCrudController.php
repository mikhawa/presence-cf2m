<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProofofabscencesCrudController extends AbstractController
{
    #[Route('/admin/create/proofofabsences', name: 'app_admin_create_proofofabsences')]
    public function createProofofabsences() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/read/proofofabsences', name: 'app_admin_read_proofofabsences')]
    public function readProofofabsences() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/update/proofofabsences', name: 'app_admin_update_proofofabsences')]
    public function updateProofofabsences() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }

    #[Route('/admin/delete/proofofabsences', name: 'app_admin_delete_proofofabsences')]
    public function deleteProofofabsences() : Response
    {
        return $this->render('admin/admin.homepage.html.twig');
    }
}
