<?php


namespace TomSample;


class Recipient
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var ContactDetails
     */
    private $contactDetails;

    public function __construct(string $name, ContactDetails $contactDetails)
    {
        $this->name = $name;
        $this->contactDetails = $contactDetails;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return ContactDetails
     */
    public function getContactDetails(): ContactDetails
    {
        return $this->contactDetails;
    }


}