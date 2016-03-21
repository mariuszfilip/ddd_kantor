<?php

namespace Cantor\Domain;

use Cantor\Domain\Exception\QuantityException;

class ExchangeSummary
{
    private $_exchangeRate;
    private $_quantity;

    public function __construct(ExchangeRate $exchangeRate, $quantity)
    {
        if($quantity <= 0){
            throw new QuantityException();
        }
        $this->_exchangeRate = $exchangeRate;
        $this->_quantity = $quantity;
    }

    public function getAmountSummary()
    {
        return $this->_quantity*$this->_exchangeRate->getCourse();
    }
}
