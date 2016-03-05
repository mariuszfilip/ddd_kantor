<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 05.03.16
 * Time: 12:36
 */

namespace Cantor\Domain\Repository;

use Cantor\Domain\Client;

/**
 * Interface ClientRepository
 * @package Cantor\Domain\Repository
 */
interface ClientRepository{

    /**
     * @param Client $client
     */
    public function register(Client $client);

    /**
     * @param $email
     * @return Client
     */
    public function byEmail($email);


    /**
     * @param $idClient
     * @return Client
     */
    public function byId($idClient);

}

