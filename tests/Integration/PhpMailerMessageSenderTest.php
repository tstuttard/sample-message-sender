<?php

namespace Tests\Integration;

use PHPUnit\Framework\TestCase;
use Tests\RecipientFixtureTrait;
use TomSample\Message;
use TomSample\PhpMailerMessageSender;
use TomSample\Recipients;

class PhpMailerMessageSenderTest extends TestCase
{
    private $phpMailer;

    use RecipientFixtureTrait;

    public function setUp()
    {
        $this->phpMailer = new \PHPMailer();
        $this->phpMailer->isSMTP();
        $this->phpMailer->SMTPDebug = 1;
        $this->phpMailer->SMTPAuth = true;
        $this->phpMailer->SMTPSecure = 'ssl';
        $this->phpMailer->Mailer = 'gmail';
        $this->phpMailer->Host = 'smpt.gmail.com';
        $this->phpMailer->Port = 465;
        $this->phpMailer->IsHTML(true);
        $this->phpMailer->Username = getenv('GMAIL_USERNAME');
        $this->phpMailer->Password = getenv('GMAIL_PASSWORD');
        $this->phpMailer->setFrom(getenv('GMAIL_EMAIL_ADDRESS'), 'Tom Stuttard');
    }

    public function testSend()
    {
        $recipients = new Recipients($this->recipientOne());
        $message = new Message('Hello from a test', $recipients);
        $emailSender = new PhpMailerMessageSender($this->phpMailer);

        $emailSender->send($message);
    }
}