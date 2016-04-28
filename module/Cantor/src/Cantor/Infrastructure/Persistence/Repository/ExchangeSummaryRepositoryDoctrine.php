<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 01.03.16
 * Time: 18:44
 */

namespace Cantor\Infrastructure\Persistence\Repository;



use Cantor\Domain\ExchangeSummary;
use Cantor\Domain\Repository\ExchangeSummaryRepository;
use Doctrine\ORM\EntityManager;

class ExchangeSummaryRepositoryDoctrine implements ExchangeSummaryRepository{


    /**
     * @var EntityManager
     */
    private $_entityManager;

    public function __construct(EntityManager $entitymanager)
    {
        $this->_entityManager = $entitymanager;
    }

    public function confirm(ExchangeSummary $exchangeSummary)
    {
        $this->_entityManager->persist($exchangeSummary);
        $this->_entityManager->flush();
    }
}