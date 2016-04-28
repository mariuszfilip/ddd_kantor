<?php

namespace Cantor\Domain;


use Rhumsaa\Uuid\Uuid;

class BankAccount
{
    private $_number;
    private $_currency_code;
    private $_id_client;
    private $_id_account_number;

    public function __construct(NumberAccount $numberAccount, Currency $currency)
    {
        $this->_id_account_number = Uuid::uuid4()->toString();
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


    public function getIdAccount()
    {
        return $this->_id_account_number;
    }

    public function setIdAccount($idAccount)
    {
        $this->_id_account_number = $idAccount;
    }
}
