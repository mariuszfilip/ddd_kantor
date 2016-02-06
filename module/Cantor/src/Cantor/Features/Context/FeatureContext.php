<?php
namespace Cantor\Features\Context;



use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;

use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Cantor\Domain\BankAccount;
use Cantor\Domain\Client;
use Cantor\Domain\Country;
use Cantor\Domain\Email;
use Cantor\Domain\Name;
use Cantor\Domain\NumberAccount;
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
     * @var
     */
    private $_client;
    /**
     * @var
     */
    private $_clientRegistered;
    /**
     * @var
     */
    private $_bankAccount;

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
     * @When /^uzpelniam numer konta bankowego ,kraj w systemie$/
     */
    public function uzpelniamNumerKontaBankowegoKrajWSystemie()
    {
        $this->_bankAccount = new BankAccount(new NumberAccount('89 8762 1022 0035 8000 3000 0010'),new Country('PL'));
    }

    /**
     * @Then /^posiadam aktywny numer konta bankowego do wymiany walut$/
     */
    public function posiadamAktywnyNumerKontaBankowegoDoWymianyWalut()
    {
        $oBankAccount = $this->_clientRegistered->getBankAccount();

        if(!$oBankAccount->isActive()){
            throw new \Exception('Klient nie posiada aktywnego konta');
        }
    }

    /**
     * @Given /^system przypisuje numer konta bankowego do klienta$/
     */
    public function systemPrzypisujeNumerKontaBankowegoDoKlienta()
    {
        $this->_clientRegistered->addBankAccount($this->_bankAccount);
    }

    /**
     *  kim jest klientem ?
     *  co moze zrobic kantor? zarejestrowac klienta
     *
     */
}
