<?php

namespace Cantor\Domain;
use Cantor\Domain\Exception\EmailNotCorrectException;

class Email
{
    private $_email;

    public function __construct($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new EmailNotCorrectException();
        }
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
