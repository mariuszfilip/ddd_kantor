<?php
namespace Cantor\Features\Context;



use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;

use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Cantor\Domain\Aggregate\Account;
use Cantor\Domain\Amount;
use Cantor\Domain\BankAccount;
use Cantor\Domain\Client;
use Cantor\Domain\Currency;
use Cantor\Domain\Email;
use Cantor\Domain\ExchangeRate;
use Cantor\Domain\ExchangeSummary;
use Cantor\Domain\Name;
use Cantor\Domain\NumberAccount;
use Cantor\Domain\Repository\AccountRepository;
use MvLabs\Zf2Extension\Context\Zf2AwareContextInterface;
use Zend\Mvc\Application;


//
// Require 3rd-party libraries here:
//
// require_once 'PHPUnit/Autoload.php';
// require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
* Feature context.
*/
class FeatureContext extends BehatContext //MinkContext if you want to test web page
implements Zf2AwareContextInterface
{
    private $zf2MvcApplication;
    private $parameters;


    /**
     * @var Client
     */
    private $_client;
    /**
     * @var Client
     */
    private $_clientRegistered;
    /**
     * @var BankAccount
     */
    private $_bankAccount;
    /**
     * @var Currency
     */
    private $_currencyTrasaction;

    /**
     * @var int
     */
    private $_quantity;

    /**
     * @var BankAccount
     */
    private $_bankAccountTransactionSource;

    /**
     * @var BankAccount
     */
    private $_bankAccountTransactionTarget;
    /**
     * @var ExchangeRate
     */
    private $exchangeRate;
    /**
     * @var ExchangeSummary
     */
    private $exchangeRateSummary;

    /**
    * Initializes context with parameters from behat.yml.
    *
    * @param array $parameters
    */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
    * Sets Zend\Mvc\Application instance.
    * This method will be automatically called by Zf2Extension ContextInitializer.
    *
    * @param Zend\Mvc\Application $zf2MvcApplication
    */
    public function setZf2App(Application $zf2MvcApplication)
    {
        $this->zf2MvcApplication = $zf2MvcApplication;
    }

    /**
     * @Given /^nie posiadam konta w systemie$/
     */
    public function niePosiadamKontaWSystemie()
    {
        $this->_client = new Client(new Name('Mariusz','Filipkowski'),new Email('mariusz24245@gmail.com'),$isRegistered = false);
        if($this->_client->isRegistered()){
            throw new \Exception('Klient jest juz zarejestrowany');
        }
    }

    /**
     * @Then /^zostaje zarejestowany w systemie i posiadam swoj idenytfikator$/
     */
    public function zostajeZarejestowanyWSystemieIPosiadamSwojIdenytfikator()
    {
        if(!$this->_client->isRegistered()){
            throw new \Exception('Klient nie został zarejestrowany');
        }
    }

    /**
     * @When /^system dodaje klienta$/
     */
    public function systemDodajeKlienta()
    {
        $this->_client->register();
    }

    /**
     * @Given /^jestem klientem$/
     */
    public function jestemKlientem()
    {
        $this->_clientRegistered = new Client(new Name('Mariusz','Filipkowski'),new Email('mariusz24245@gmail.com'),$isRegistered = true);
    }

    /**
     * @When /^uzpelniam numer konta bankowego ,walute konta$/
     */
    public function uzpelniamNumerKontaBankowegoWaluteKonta()
    {
        $this->_bankAccount = new BankAccount(new NumberAccount('89 8762 1022 0035 8000 3000 0010'),new Currency('PLN'));
    }

    /**
     * @Then /^system przypisuje numer konta bankowego do klienta$/
     */
    public function systemPrzypisujeNumerKontaBankowegoDoKlienta()
    {
        $this->_clientRegistered->addBankAccount($this->_bankAccount);
    }

    /**
     * @When /^wybieram walute ktora chce kupic$/
     */
    public function wybieramWaluteKtoraChceKupic()
    {
        $this->_currencyTrasaction = new Currency('EUR');
    }

    /**
     * @Given /^wybieram wolumen waluty$/
     */
    public function wybieramWolumenWaluty()
    {
        $this->_quantity = 10;
    }

    /**
     * @Given /^wybieram konto z ktorego przelewam pln$/
     */
    public function wybieramKontoZKtoregoPrzelewamPln()
    {
        $this->_bankAccountTransactionSource = new BankAccount(new NumberAccount('89 8762 1022 0035 8000 3000 0010'),new Currency('PLN'));
    }

    /**
     * @Given /^wybieram numer konta na ktory ma byc przelew zwrotny$/
     */
    public function wybieramNumerKontaNaKtoryMaBycPrzelewZwrotny()
    {
        $this->_bankAccountTransactionTarget = new BankAccount(new NumberAccount('89 8762 1022 0035 8000 3000 0010'),new Currency('EUR'));
    }

    /**
     * @Given /^wyswietla mi sie podsumowanie zlecenia$/
     */
    public function wyswietlaMiSiePodsumowanieZlecenia()
    {
        $this->exchangeRateSummary = new ExchangeSummary($this->exchangeRate,$this->_quantity);

        assert(3.50*$this->_quantity == $this->exchangeRateSummary->getAmountSummary(),'podsumowanie nie jest zgodne z oczekiwanym');
    }

    /**
     * @Then /^wyswietla mi sie kurs$/
     */
    public function wyswietlaMiSieKurs(){

        $this->exchangeRate = new ExchangeRate(new Currency('EUR'),new Amount(3.50));

        assert(3.50==$this->exchangeRate->getCourse(),'kurs nie jest zgodny z oczekiwanym');

    }

    /**
     * @Then /^potwierdzam zlecenie$/
     */
    public function potwierdzamZlecenie()
    {
        $this->exchangeRateSummary->confirm($this->_bankAccountTransactionSource,$this->_bankAccountTransactionTarget);
    }

    /**
     * @Given /^wybieram numer konta "([^"]*)" oraz date od "([^"]*)"$/
     */
    public function wybieramNumerKontaOrazDateOd($arg1, $arg2)
    {

    }

    /**
     * @When /^klikam wyszukaj$/
     */
    public function klikamWyszukaj()
    {

    }

    /**
     * @Then /^widze liste wszystkich operacji na koncie$/
     */
    public function widzeListeWszystkichOperacjiNaKoncie(TableNode $table)
    {

    }

}
