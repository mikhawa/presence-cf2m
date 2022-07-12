<?php

namespace App\Controller;

use App\Repository\UserRepository;
use LogicException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Services\MailerService;
use Twig\error\LoaderError;
use Twig\error\RuntimeError;
use Twig\error\SyntaxError;

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
        if ($this->getUser()) {
            $path = $this->redirectToRoute("profile_homepage");
        } else {
            $path = $this->render('public/homepage.html.twig', [
                'error' => $error,
            ]);
        }
        return $path;
    }

    # Mot de passe oublié

    /**
     * @throws SyntaxError
     * @throws TransportExceptionInterface
     * @throws RuntimeError
     * @throws LoaderError
     */
    #[Route('/pwdForgotten', name: 'app_check')]
    public function pwdForgotten(UserRepository $repository, Request $request, MailerService $mailerService): Response
    {
        if ($request->isMethod("POST")) {
            $userFound = $repository->findUserByEmail($request->request->get("email"));
            if ($userFound) {
                $mailerService->toSend(subject: "thanks",
                    from: "manuel.mouzelard@hotmail.com", to: $request->request->get("email"), template: 'pwdForgotten/checked.html.twig',
                );
                $path = $this->redirectToRoute('profile_homepage');
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
