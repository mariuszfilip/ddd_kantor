<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 01.03.16
 * Time: 18:44
 */

namespace Cantor\Infrastructure\Persistence\Repository;


use Cantor\Domain\Client;
use Cantor\Domain\Repository\ClientRepository;
use Doctrine\ORM\EntityManager;

class ClientRepositoryDoctrine implements ClientRepository{


    /**
     * @var EntityManager
     */
    private $_entityManager;

    public function __construct(EntityManager $entitymanager)
    {
        $this->_entityManager = $entitymanager;
    }

    /**
     * @param Client $client
     */
    public function register(Client $client)
    {
        $this->_entityManager->persist($client);
        $this->_entityManager->flush();
    }

    /**
     * @param $email
     * @return Client
     */
    public function byEmail($email)
    {

        $dql =  $this->_entityManager->createQuery('
          SELECT u FROM Cantor\Domain\Client u WHERE u._email = :email
        ');
        $dql->setParameter('email',$email);
        return $dql->getOneOrNullResult();
    }

    /**
     * @param $idClient
     * @return Client
     */
    public function byId($idClient)
    {
        $dql = $this->_entityManager->createQuery("
          SELECT u FROM Cantor\Domain\Client u WHERE u._id = :id
      ");
        $dql->setParameter('id',$idClient);
        return $dql->getOneOrNullResult();
    }
}