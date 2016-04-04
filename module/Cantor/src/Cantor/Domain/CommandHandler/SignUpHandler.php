<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 04.04.16
 * Time: 21:56
 */
namespace Cantor\Domain\CommandHandler;


use Cantor\Application\Cqrs\Command\SignUpCommand;
use Cantor\Domain\Client;
use Cantor\Domain\Email;
use Cantor\Domain\Exception\ClientAlreadyExistException;
use Cantor\Domain\Name;
use Cantor\Domain\Repository\ClientRepository;

/**
 * Class SignUpHandler
 * @package Cantor\Domain\CommandHandler
 */
class SignUpHandler{

    use \Malocher\Cqrs\Adapter\AdapterTrait;
    /**
     * @var ClientRepository
     */
    private $_clientRepository;

    /**
     * SignUpHandler constructor.
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository)
    {
        $this->_clientRepository = $clientRepository;
    }


    /**
     * @param SignUpCommand $command
     * @throws ClientAlreadyExistException
     */
    public function create(SignUpCommand $command)
    {
        $clientInfo = $command->getPayload();
        $clientCheck = $this->_clientRepository->byEmail($clientInfo['email']);

        if($clientCheck !== null){
            throw new ClientAlreadyExistException();
        }

        $client = new Client(
            new Name($clientInfo['name'],$clientInfo['surname']),
            new Email($clientInfo['email']),
            false
        );

        $this->_clientRepository->register($client);

        //ToDo event jezeli jest taka potrzeba , command nie moze nic zwracac

    }
}