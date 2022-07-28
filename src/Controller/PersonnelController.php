<?php

namespace App\Controller;

use PhpParser\Node\Stmt\Return_;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/perso', name: 'app_perso_')]
class PersonnelController extends AbstractController
{
    protected UserRepository $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    #test Vue.js
    #[Route(path: '/vueApp', name: 'vueApp')]
    public function testVue()
    {
        return $this->render('apps/Vue/Exemple/index.html.twig');
    }

   #[Route(path:'/interns/user/{username}', name:'user_username')]
   public function internsProfil(string $username=""): Response
   {
    return $this->render('private/pages/personnel/profil_interns.html.twig',[
        'username'=>$username,
        'internInfo'=> $this->UserRepository->findOneByUsername($username)
    ]);
   }
}
