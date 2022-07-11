<?php

namespace App\Services;

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
     * @param Environment $twig
     */
    public function __construct(MailerInterface $mailer, Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    /**
     * @param string $subject
     * @param string $from
     * @param string $to
     * @param string $template
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws TransportExceptionInterface
     */
    public function toSend(string $subject, string $from, string $to, string $template): void
    {
        $email = (new Email())
            ->subject($subject)
            ->from($from)
            ->to($to)
            ->html(
                $this->twig->render($template),
                charset: 'text/html'
            );

        $this->mailer->send($email);

    }
}