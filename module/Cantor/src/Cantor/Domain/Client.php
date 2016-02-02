<?php

namespace Cantor\Domain;

class Client
{
    /**
     * @var Name
     */
    private $_name;

    /**
     * @var Email
     */
    private $_email;


    /**
     * @var bool
     */
    private $_isRegistered = false;

    public function __construct(Name $name, Email $email, $isRegistered)
    {
        $this->_name = $name;
        $this->_email = $email;
        $this->_isRegistered = $isRegistered;
    }

    /**
     * @return bool
     */
    public function isRegistered()
    {
        return $this->_isRegistered;
    }

    public function register()
    {
        $this->_isRegistered = true;
    }
}
