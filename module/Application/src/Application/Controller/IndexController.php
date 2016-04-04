<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Cantor\Application\Cqrs\Bus\DomainBus;
use Cantor\Application\Cqrs\Command\AddBankAccountCommand;
use Cantor\Application\Cqrs\Payload\AccountNumberRequest;
use Cantor\Application\Cqrs\Payload\ClientRequest;
use Cantor\Application\Cqrs\Command\SignUpCommand;
use Malocher\Cqrs\Gate;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    /**
     * @var Gate
     */
    private $_commandBus;

    public function indexAction()
    {
        try{

            $oClient = new ClientRequest();
            $oClient->setEmail('mariusz24245@gmail.com');
            $oClient->setName('Mariusz');
            $oClient->setSurname('Filipkowski');

            $client = new SignUpCommand($oClient);
            $this->_commandBus->getBus(DomainBus::NAME)->invokeCommand($client);



        }catch(\Exception $e){
            
            var_dump($e->getMessage());
        }
        return new ViewModel();

    }

    public function setGate(Gate $get)
    {
        $this->_commandBus = $get;

    }


    public function addbankaccountAction(){
        try{
            $oAccountRequest = new AccountNumberRequest();
            $oAccountRequest->setCountryCode('PLN');
            $oAccountRequest->setNumberAccount('89 8762 1022 0035 8000 3000 0010');
            $oAccountRequest->setIdClient('009b253a-8669-4d9e-b667-7d02075c5ab8');

            $bankAccountCommand = new AddBankAccountCommand($oAccountRequest);
            $this->_commandBus->getBus(DomainBus::NAME)->invokeCommand($bankAccountCommand);

        }catch (\Exception $e){
            var_dump($e->getMessage());
        }
        return new ViewModel();
    }
}
