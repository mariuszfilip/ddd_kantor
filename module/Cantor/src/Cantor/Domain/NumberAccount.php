<?php

namespace Cantor\Domain;

use Cantor\Domain\Exception\NumberAccountNotCorrectException;
class NumberAccount
{
    private $_sNumber = null;

    public function __construct($sNumber)
    {
        $sNumber = str_replace(' ','',$sNumber);
        if(strlen($sNumber) != 26){
            throw new NumberAccountNotCorrectException();
        }
        $this->_sNumber = $sNumber;
    }

    public function getNumber()
    {
        return $this->_sNumber;
    }
}
