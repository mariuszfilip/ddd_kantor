<?php

namespace Cantor\Domain;

use Cantor\Domain\Exception\FloatException;

class Amount
{
    private $_value;

    public function __construct($value)
    {
        if(!is_float($value)){
            throw new FloatException();
        }
        $this->_value = $value;
    }

    public function getValue()
    {
        return $this->_value;
    }
}
