<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Cantor\Application\Cqrs\Payload\ClientRequest;
use Cantor\Application\Cqrs\Command\SignUpCommand;
use Cantor\Infrastructure\Persistence\Repository\ClientRepositoryDoctrine;
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

            $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
            $oRepo = new ClientRepositoryDoctrine($em);

            $client = new SignUpCommand($oRepo);
            $client->execute($oClient);

        }catch(\Exception $e){
            
            var_dump($e->getMessage());
        }
        return new ViewModel();

    }

    public function setGate(Gate $get)
    {
        $this->_commandBus = $get;

    }
}
