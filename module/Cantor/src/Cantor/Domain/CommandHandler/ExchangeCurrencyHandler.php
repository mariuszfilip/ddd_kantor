<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 04.04.16
 * Time: 21:56
 */
namespace Cantor\Domain\CommandHandler;

use Cantor\Application\Cqrs\Command\ExchangeCurrencyCommand;
use Cantor\Domain\Amount;
use Cantor\Domain\BankAccount;
use Cantor\Domain\Currency;
use Cantor\Domain\Exception\BankAccountNotFoundException;
use Cantor\Domain\ExchangeRate;
use Cantor\Domain\ExchangeSummary;
use Cantor\Domain\NumberAccount;
use Cantor\Domain\Repository\AccountRepository;
use Cantor\Domain\Repository\ExchangeSummaryRepository;
use Cantor\Infrastructure\Persistence\Repository\ExchangeSummaryRepositoryDoctrine;

/**
 * Class SignUpHandler
 * @package Cantor\Domain\CommandHandler
 */
class ExchangeCurrencyHandler
{

    use \Malocher\Cqrs\Adapter\AdapterTrait;
    /**
     * @var AccountRepository
     */
    private $_accountRepo;
    /**
     * @var ExchangeSummaryRepository
     */
    private $_exchangeSummaryRepo;

    /**
     * ExchangeCurrencyHandler constructor.
     * @param AccountRepository $accountRepository
     * @param ExchangeSummaryRepository $exchangeSummary
     */
    public function __construct(AccountRepository $accountRepository, ExchangeSummaryRepository $exchangeSummary){
        $this->_accountRepo = $accountRepository;
        $this->_exchangeSummaryRepo = $exchangeSummary;
    }

    /**
     * @param ExchangeCurrencyCommand $command
     * @throws BankAccountNotFoundException
     */
    public function exchange(ExchangeCurrencyCommand $command){
        $data = $command->getPayload();

        //ToDo 3.50 zamienic na mechaznim ktory wyciaga wartosc waluty
        $exchangeRate = new ExchangeRate(new Currency($data['currency_code']),new Amount(3.50));

        $bankAccountTransactionSource = $this->_accountRepo->byId($data['id_account_in']);
        if(is_null($bankAccountTransactionSource)){
            throw new BankAccountNotFoundException('Nie znaleziono numeru konto o id '.$data['id_account_in']);
        }
        $bankAccountTransactionTarget = $this->_accountRepo->byId($data['id_account_return']);
        if(is_null($bankAccountTransactionTarget)){
            throw new BankAccountNotFoundException('Nie znaleziono numeru konto o id '.$data['id_account_return']);
        }


        $exchangeRateSummary = new ExchangeSummary($exchangeRate,$data['quantity']);
        $exchangeRateSummary->confirm($bankAccountTransactionSource,$bankAccountTransactionTarget);
        $this->_exchangeSummaryRepo->confirm($exchangeRateSummary);
    }
}