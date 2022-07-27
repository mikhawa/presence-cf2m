<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/perso', name: 'app_perso_')]
class PersonnelController extends AbstractController
{
    #[Route('/print', name: 'print')]
    public function selectUserWithoutRolePerso(Request $request) : Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //$user = $form->getData();

            return $this->redirectToRoute('app_profile');
        }

        return $this->render('private/pages/print/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #test Vue.js
    #[Route(path: '/vueApp', name: 'vueApp')]
    public function testVue()
    {
        return $this->render('apps/Vue/Exemple/index.html.twig');
    }
}
