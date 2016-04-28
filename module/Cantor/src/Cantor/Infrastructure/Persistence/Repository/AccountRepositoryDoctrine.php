<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 01.03.16
 * Time: 18:44
 */

namespace Cantor\Infrastructure\Persistence\Repository;


use Cantor\Domain\BankAccount;
use Cantor\Domain\Repository\AccountRepository;
use Doctrine\ORM\EntityManager;

class AccountRepositoryDoctrine implements AccountRepository{


    /**
     * @var EntityManager
     */
    private $_entityManager;

    public function __construct(EntityManager $entitymanager)
    {
        $this->_entityManager = $entitymanager;
    }

    public function add(BankAccount $bankAccount)
    {
        $this->_entityManager->persist($bankAccount);
        $this->_entityManager->flush();
    }

    /**
     * @param $idAccount
     * @return BankAccount
     */
    public function byId($idAccount)
    {
        $dql = $this->_entityManager->createQuery("
          SELECT u FROM Cantor\Domain\BankAccount u WHERE u._id_account_number = :id
      ");
        $dql->setParameter('id',$idAccount);
        return $dql->getOneOrNullResult();
    }
}