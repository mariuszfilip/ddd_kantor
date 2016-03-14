<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 05.03.16
 * Time: 12:36
 */

namespace Cantor\Domain\Repository;



use Cantor\Domain\BankAccount;

interface AccountRepository{


    public function add(BankAccount $bankAccount);
}

