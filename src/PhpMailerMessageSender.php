<?php


namespace TomSample;


use PHPMailer;

class PhpMailerMessageSender implements MessageSenderInterface
{
    /**
     * @var PHPMailer
     */
    private $mailer;

    public function __construct(PHPMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(Message $message)
    {
        $this->mailer->Subject = 'Message from application!';
        $this->mailer->Body = $message->getContent();
        foreach ($message->getRecipients() as $recipient) {
            $this->mailer->addAddress($recipient->getContactDetails()->getEmail(), $recipient->getName());
            if (!$this->mailer->send()) {
                throw new \Exception($this->mailer->ErrorInfo);
            }

        }
    }
}