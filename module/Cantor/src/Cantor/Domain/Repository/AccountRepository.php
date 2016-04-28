<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 05.03.16
 * Time: 12:36
 */

namespace Cantor\Domain\Repository;



use Cantor\Domain\BankAccount;

/**
 * Interface AccountRepository
 * @package Cantor\Domain\Repository
 */
interface AccountRepository{


    /**
     * @param BankAccount $bankAccount
     * @return mixed
     */
    public function add(BankAccount $bankAccount);

    /**
     * @param $idAccount
     * @return BankAccount
     */
    public function byId($idAccount);
}

