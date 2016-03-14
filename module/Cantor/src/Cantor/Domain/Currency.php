<?php

namespace Cantor\Domain;

use Cantor\Domain\Exception\CurrencyNotCorrectException;

/**
 * Class Currency
 * @package Cantor\Domain
 */
class Currency
{
    /**
     * @var
     */
    private $_currencyCode;

    /**
     * Currency constructor.
     * @param $currencyCode
     * @throws CurrencyNotCorrectException
     */
    public function __construct($currencyCode)
    {
        if(strlen($currencyCode) != 3 ){
            throw new CurrencyNotCorrectException();
        }
        if(!is_string($currencyCode)){
            throw new CurrencyNotCorrectException();
        }
        $this->_currencyCode = $currencyCode;
    }

    public function getCode()
    {
        return $this->_currencyCode;
    }
}
