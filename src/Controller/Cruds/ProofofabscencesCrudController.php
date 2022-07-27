<?php

namespace App\Controller\Cruds;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'crud_')]
class ProofofabscencesCrudController extends AbstractController
{
    #[Route('create/proofofabsences', name: 'create_proofofabsences')]
    public function createProofofabsences() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('read/proofofabsences', name: 'read_proofofabsences')]
    public function readProofofabsences() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('update/proofofabsences', name: 'update_proofofabsences')]
    public function updateProofofabsences() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }

    #[Route('delete/proofofabsences', name: 'delete_proofofabsences')]
    public function deleteProofofabsences() : Response
    {
        return $this->render('private/pages/admin/admin.homepage.html.twig');
    }
}
