<?php

namespace TomSample;


use Exception;

class TwitterAPIMessageSender implements MessageSenderInterface
{

    /**
     * @var \TwitterAPIExchange
     */
    private $twitterApi;

    public function __construct(\TwitterAPIExchange $twitterApi)
    {
        $this->twitterApi = $twitterApi;
    }


    public function send(Message $message)
    {
        foreach ($message->getRecipients() as $recipient) {
            $params = [
                'status' => $recipient->getContactDetails()->getTwitterHandle() . ' ' . $message->getContent(),
                'possibly_sensitive' => false,
            ];

            $jsonResponse = $this->twitterApi->request('https://api.twitter.com/1.1/statuses/update.json', 'POST', $params);

            $jsonResponse = json_decode($jsonResponse, true);

            if (isset($jsonResponse['errors'])) {
                throw new Exception($jsonResponse['errors'][0]['message']);
            }
        }
    }
}