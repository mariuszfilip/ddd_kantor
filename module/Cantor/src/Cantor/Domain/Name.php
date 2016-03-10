<?php

namespace Cantor\Domain;
use Cantor\Domain\Exception\NameNotCorrectException;
class Name
{
    private $_name;

    private $_surname;

    public function __construct($name, $surname)
    {
        if(strlen($name) < 2){
            throw new NameNotCorrectException();
        }
        if(strlen($surname) < 2){
            throw new NameNotCorrectException();
        }
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
