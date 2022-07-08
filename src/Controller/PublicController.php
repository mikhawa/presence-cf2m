<?php

namespace App\Controller;

use App\Repository\UserRepository;
use LogicException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Services\MailerService;

class PublicController extends AbstractController
{
    # Homepage et Connexion
    #[Route('/', name: 'app_homepage')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // En cas d'erreur d'authentification
        $error = $authenticationUtils->getLastAuthenticationError();
        // Pour afficher le dernier utilisateur connecté sur cette machine
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('public/homepage.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    # Mot de passe oublié
    #[Route('/pwdForgotten', name: 'app_check')]
    public function pwdForgotten(UserRepository $repository, Request $request, MailerService $mailerService): Response
    {
        if ($request->isMethod("POST")) {
            $userFound = $repository->findUserByEmail($request->request->get("email"));
            if ($userFound) {
                /*$path = $this->render("pwdForgotten/checked.html.twig",
                    [
                        "userFound" => $userFound[0],
                    ]
                );*/
                

            } else {
                $path = $this->render('pwdForgotten/check.html.twig');
            }
        } elseif ($this->getUser()) {
            $path = $this->redirectToRoute('profile_homepage');
        } else {
            $path = $this->render('pwdForgotten/check.html.twig');
        }

        return $path;
    }

    # Déconnexion
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
