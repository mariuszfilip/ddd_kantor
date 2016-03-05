<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 01.03.16
 * Time: 18:30
 */

namespace Cantor\Application\Service\Client;


use Cantor\Domain\Client;
use Cantor\Domain\Email;
use Cantor\Domain\Exception\ClientAlreadyExistException;
use Cantor\Domain\Name;
use Cantor\Domain\Repository\ClientRepository;
use Ddd\Application\Service\ApplicationService;

class SignUpService implements ApplicationService{


    /**
     * @var ClientRepository
     */
    private $_clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->_clientRepository = $clientRepository;
    }

    /**
     * @param ClientRequest $request
     * @return mixed
     * @throws ClientAlreadyExistException
     */
    public function execute($request = null)
    {

        $clientCheck = $this->_clientRepository->byEmail($request->getEmail());
        
        if($clientCheck !== null){
            throw new ClientAlreadyExistException();
        }
        
        $client = new Client(
            new Name($request->getName(),$request->getSurname()),
            new Email($request->getEmail()),
            false
        );

        $this->_clientRepository->register($client);

    }
}