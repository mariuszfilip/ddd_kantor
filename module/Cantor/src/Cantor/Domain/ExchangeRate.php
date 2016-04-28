<?php

namespace Cantor\Domain;

class ExchangeRate
{
    private $_currency;
    private $_amount;

    public function __construct(Currency $currency, Amount $amount)
    {
        $this->_currency = $currency;
        $this->_amount = $amount;
    }

    public function getCourse()
    {
        return $this->_amount->getValue();
    }

    public function getCurrencyCode()
    {
        return $this->_currency->getCode();
    }
}
