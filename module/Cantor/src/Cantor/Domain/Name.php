<?php

namespace Cantor\Domain;

class Name
{
    private $_name;

    private $_surname;

    public function __construct($name, $surname)
    {
        $this->_name = $name;
        $this->_surname = $surname;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getSurname()
    {
        return $this->_surname;
    }
}
