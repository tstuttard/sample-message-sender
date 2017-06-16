<?php

namespace Tests\Unit;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Tests\RecipientFixtureTrait;
use TomSample\Recipients;

class RecipientsTest extends TestCase
{
    use RecipientFixtureTrait;

    public function testRecipientsContainsACollectionOfRecipientObjects()
    {
        $expectedRecipients = [
            $this->recipientOne(),
            $this->recipientTwo(),
        ];

        $recipients = new Recipients(...$expectedRecipients);

        Assert::assertEquals($expectedRecipients, $recipients->toArray());
    }
}
