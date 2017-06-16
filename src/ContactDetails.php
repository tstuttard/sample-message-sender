<?php


namespace TomSample;


class ContactDetails
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $mobileNumber;

    /**
     * @var string
     */
    private $twitterHandle;

    public function __construct(string $email, string $mobileNumber, string $twitterHandle)
    {
        $this->email = $email;
        $this->mobileNumber = $mobileNumber;
        $this->twitterHandle = $twitterHandle;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getMobileNumber(): string
    {
        return $this->mobileNumber;
    }

    /**
     * @return string
     */
    public function getTwitterHandle(): string
    {
        return $this->twitterHandle;
    }
}