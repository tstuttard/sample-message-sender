<?php


namespace Tests;


use TomSample\ContactDetails;
use TomSample\Recipient;

trait RecipientFixtureTrait
{
    private function recipientOne()
    {
        return new Recipient('Tom', new ContactDetails('tom.e.stuttard@gmail.com', '07850893665', 'gettroll'));
    }

    private function recipientTwo()
    {
        return new Recipient('Tom', new ContactDetails('tom.e.stuttard+two@gmail.com', '07850893665', 'thomasstuttard'));
    }
}