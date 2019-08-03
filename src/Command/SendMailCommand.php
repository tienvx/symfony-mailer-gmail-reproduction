<?php

namespace App\Command;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Mailer\MailerInterface;

class SendMailCommand extends Command
{
    /**
     * @var MailerInterface
     */
    protected $mailer;

    /**
     * @var ParameterBagInterface
     */
    protected $params;

    public function __construct(MailerInterface $mailer, ParameterBagInterface $params)
    {
        $this->mailer = $mailer;
        $this->params = $params;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:send-mail')
            ->setDescription('Send mail using gmail dns.')
            ->setHelp('Try to replicate this error: Expected response code "250" but got an empty response.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $email = (new TemplatedEmail())
            ->from($this->params->get('from'))
            ->to($this->params->get('to'))
            ->subject('Test email')
            ->htmlTemplate('test.html.twig');

        $this->mailer->send($email);
    }
}
