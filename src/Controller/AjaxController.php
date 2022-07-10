<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_FORMAT')]
class AjaxController extends AbstractController
{
    #[Route(
        '/stagiaire/',
        name: 'app_ajax',
        methods: 'POST'
    )]
    public function index(Request $user,EntityManagerInterface $entityManager): Response
    {
        $idUser = $user->get("request['parameters']");
        var_dump($idUser);
        // $thestagiaire = $entityManager->getRepository(User::class)->find();
        return $this->render('ajax/index.html.twig', [
            'controller_name' => $user,
            'user'=>$idUser
        ]);
    }
}
