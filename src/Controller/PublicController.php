<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Services\MailerService;
use LogicException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\error\LoaderError;
use Twig\error\RuntimeError;
use Twig\error\SyntaxError;

class PublicController extends AbstractController
{
    # Homepage et Connexion
    #[Route('/', name: 'app_homepage')]
    public function index(AuthenticationUtils $authenticationUtils) : Response
    {
        // En cas d'erreur d'authentification
        $error = $authenticationUtils->getLastAuthenticationError();
        // Pour afficher le dernier utilisateur connecté sur cette machine
        $lastUsername = $authenticationUtils->getLastUsername();
        if ($this->getUser()) {
            $path = $this->redirectToRoute("profile_homepage");
        }
        else {
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
    public function pwdForgotten(UserRepository $repository, Request $request, MailerService $mailerService) : Response
    {
        $userFound = $request->isMethod("POST") ? $repository->findUserByEmail($request->request->get("email")) : null;
        if ($request->isMethod("POST")) {
            if ($userFound) {
                $mailerService->toSend(
                    subject: "Réinitialisation de votre mot de passe",
                    from: $this->getParameter("app.admin_mail"),
                    to: $request->request->get("email"),
                    datas: $userFound,
                    template: 'pwd_reset/mail.html.twig',
                    request: $request);
                $this->addFlash('success', "Un mail de récupération de mot de passe vous a été envoyé sur l'adresse: " . $request->request->get("email"));
                $repository->password_Url_Lifetime($userFound["theuid"], $userFound["username"], $this->getParameter("app.url_password_lifetime"));
                $path = $this->redirectToRoute("app_homepage");
            }
            else {
                $path = $this->render('pwd_reset/form.html.twig', [
                    "alert" => "No user were found with this email",
                ]);
            }
        }
        else {
            $path = $this->getUser() ? $this->redirectToRoute("profile_homepage") : $this->render('pwd_reset/form.html.twig');
        }
        return $path;
    }

    #[Route(path: "/resetPassword/U{user}&I{id}", name: "app_reset_password")]
    public function resetPassword(string $user, string $id, Request $request, UserRepository $repository) : Response
    {
        if ($repository->getUserByUidAndName($id, $user)) {
            if ($request->isMethod("POST") &&
                $request->request->get("password") === $request->request->get("passwordVerify") &&
                preg_match($this->getParameter("app.verification_password_regex"), $request->request->get("password"))) {
                $repository->changePassword($request->request->get("password"), $id, $user);
                $path = $this->redirectToRoute("app_homepage");
            }
            else {
                $path = $this->render("pwd_reset/reset.html.twig", [
                    "user"  => "admin1",
                    "regex" => $this->getParameter("app.verification_password_regex"),
                ]);
            }
        }
        else {
            $path = $this->redirectToRoute("app_homepage");
        }
        return $path;
    }

    # Déconnexion
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout() : void
    {
        throw new LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
