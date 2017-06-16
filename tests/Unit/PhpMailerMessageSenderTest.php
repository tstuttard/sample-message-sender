<?php

namespace Tests\Unit;


use PHPUnit\Framework\TestCase;
use Tests\RecipientFixtureTrait;
use TomSample\Message;
use TomSample\PhpMailerMessageSender;
use TomSample\Recipients;

class PhpMailerMessageSenderTest extends TestCase
{
    use RecipientFixtureTrait;

    public function testMessageIsSentToAllRecipients()
    {
        $recipients = new Recipients($this->recipientOne(), $this->recipientTwo());

        $message = new Message('Hello from test.', $recipients);
        $phpMailerMock = $this->getMockBuilder(\PHPMailer::class)
                              ->disableOriginalConstructor()
                              ->setMethods(['send'])
                              ->getMock();


        $phpMailerMock->expects($this->exactly(count($recipients)))
                      ->method('send');

        $emailSender = new PhpMailerMessageSender($phpMailerMock);

        $emailSender->send($message);
    }
}
