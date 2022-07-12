<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;
use Twig\error\LoaderError;
use Twig\error\RuntimeError;
use Twig\error\SyntaxError;

class MailerService
{
    /**
     * @var MailerInterface
     */
    private MailerInterface $mailer;

    /**
     * @var Environment
     */
    private Environment $twig;

    /**
     * MailerService constructor.
     *
     * @param MailerInterface $mailer
     * @param Environment     $twig
     */
    public function __construct(MailerInterface $mailer, Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig   = $twig;
    }

    /**
     * @param string $subject
     * @param string $from
     * @param string $to
     * @param string $template
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws TransportExceptionInterface
     */
    public function toSend(string $subject, string $from, string $to, array $datas, string $template, Request $request) : void
    {
        $email = (new Email())
            ->subject($subject)
            ->from($from)
            ->to($to)
            ->html(
                $this->twig->render($template, [
                    "user" => $datas["username"],
                    "uid"  => $datas["theuid"],
                    "host" => $request->getHost(),
                    "port" => $request->getPort(),
                ]),
                charset: 'text/html'
            );
        $this->mailer->send($email);
    }
}