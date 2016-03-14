<?php

namespace Cantor\Domain;


class BankAccount
{
    private $_number;
    private $_currency_code;
    private $_id_client;

    public function __construct(NumberAccount $numberAccount, Currency $currency)
    {
        $this->_number = $numberAccount->getNumber();
        $this->_currency_code = $currency->getCode();
    }

    public function setIdClient($idClient)
    {
        $this->_id_client = $idClient;
    }

    public function getIdClient()
    {
        return $this->_id_client;
    }
}
