<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 04.04.16
 * Time: 21:56
 */
namespace Cantor\Domain\CommandHandler;


use Cantor\Application\Cqrs\Command\AddBankAccountCommand;
use Cantor\Domain\BankAccount;
use Cantor\Domain\Currency;
use Cantor\Domain\Exception\ClientNotFoundException;
use Cantor\Domain\NumberAccount;
use Cantor\Domain\Repository\AccountRepository;
use Cantor\Domain\Repository\ClientRepository;

class AddBankAccountHandler{

    use \Malocher\Cqrs\Adapter\AdapterTrait;

    private $_accountRepo;
    private $_clientRepo;

    public function __construct(AccountRepository $accountRepository, ClientRepository $clientRepository)
    {
        $this->_accountRepo = $accountRepository;
        $this->_clientRepo = $clientRepository;
    }

    public function add(AddBankAccountCommand $accountCommand){
        $aData = $accountCommand->getPayload();

        $client = $this->_clientRepo->byId($aData['id_client']);
        if(is_null($client) || empty($client)){
            throw new ClientNotFoundException();
        }
        $bankAccount = new BankAccount(new NumberAccount($aData['number']),new Currency($aData['country_code']));
        $bankAccount->setIdClient($client->getId());
        $this->_accountRepo->add($bankAccount);
    }
}