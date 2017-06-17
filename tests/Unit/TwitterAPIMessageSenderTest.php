<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\RecipientFixtureTrait;
use TomSample\Message;
use TomSample\Recipients;
use TomSample\TwitterAPIMessageSender;

class TwitterAPIMessageSenderTest extends TestCase
{
    use RecipientFixtureTrait;

    public function testMessageIsSentToAllRecipients()
    {
            $recipients = new Recipients($this->recipientOne(), $this->recipientTwo());

        $message = new Message('Tweet from test.', $recipients);
        $twitterApiMock = $this->getMockBuilder(\TwitterAPIExchange::class)
            ->disableOriginalConstructor()
            ->setMethods(['request'])
            ->getMock();


        $twitterApiMock->expects($this->exactly(count($recipients)))
            ->method('request');

        $tweetSender = new TwitterAPIMessageSender($twitterApiMock);

        $tweetSender->send($message);
    }
}
