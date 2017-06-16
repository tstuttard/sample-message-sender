<?php


namespace TomSample;


interface MessageSenderInterface
{
    public function send(Message $message);
}