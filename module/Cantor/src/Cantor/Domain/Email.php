<?php

namespace Cantor\Domain;

class Email
{
    private $_email;

    public function __construct($email)
    {
        $this->_email = $email;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function __toString()
    {
        return $this->_email;
    }
}
