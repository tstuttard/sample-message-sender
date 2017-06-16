<?php


namespace TomSample;


class Recipients implements \IteratorAggregate, \Countable
{

    /**
     * @var Recipient[]
     */
    private $recipients;

    public function __construct(Recipient ...$recipients)
    {
        $this->recipients = $recipients;
    }

    /**
     * @return Recipient[]
     */
    public function toArray(): array
    {
        return $this->recipients;
    }

    public function getIterator() : \ArrayIterator
    {
        return new \ArrayIterator($this->recipients);
    }

    public function count(): int
    {
        return count($this->recipients);
    }
}