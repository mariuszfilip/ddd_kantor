<?php

namespace Cantor\Domain\Aggregate;

use Cantor\Domain\BankAccount;
use Cantor\Domain\Client;
use Cantor\Domain\Repository\AccountRepository;

class Account
{
    private $_accountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->_accountRepository = $accountRepository;
    }

    public function add(Client $client, BankAccount $bankAccount)
    {
        //$bankAccount->setIdClient($client->getId());
        $this->_accountRepository->add($bankAccount);
    }
}
