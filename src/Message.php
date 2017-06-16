<?php


namespace TomSample;


class Message
{
    /**
     * @var string
     */
    private $content;

    /**
     * @var Recipients
     */
    private $recipients;

    public function __construct(string $content, Recipients $recipients)
    {

        $this->content = $content;
        $this->recipients = $recipients;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getRecipients(): Recipients
    {
        return $this->recipients;
    }
}