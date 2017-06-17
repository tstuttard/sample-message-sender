<?php

namespace Tests\Integration;

use PHPUnit\Framework\TestCase;
use Tests\RecipientFixtureTrait;
use TomSample\Message;
use TomSample\Recipients;
use TomSample\TwitterAPIMessageSender;

class TwitterAPIMessageSenderTest extends TestCase
{
    use RecipientFixtureTrait;

    /**
     * @var \TwitterAPIExchange
     */
    private $twitterApi;

    public function setUp()
    {
        $this->twitterApi = $this->createTwitterApi();
    }

    public function testSend()
    {
        $recipients = new Recipients($this->recipientTwo());
        $message = new Message('Tweet from a test.' . rand(), $recipients);
        $tweetSender = new TwitterAPIMessageSender($this->twitterApi);

        $tweetSender->send($message);
    }

    private function createTwitterApi()
    {
        $settings = [
            'oauth_access_token' => getenv("TWITTER_OAUTH_ACCESS_TOKEN"),
            'oauth_access_token_secret' => getenv("TWITTER_OAUTH_ACCESS_TOKEN_SECRET"),
            'consumer_key' => getenv("TWITTER_CONSUMER_KEY"),
            'consumer_secret' => getenv("TWITTER_CONSUMER_SECRET"),
        ];

        return new \TwitterAPIExchange($settings);
    }
}
