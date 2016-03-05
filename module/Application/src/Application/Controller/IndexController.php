<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Cantor\Application\Service\Client\ClientRequest;
use Cantor\Application\Service\Client\SignUpService;
use Cantor\Infrastructure\Persistence\Repository\ClientRepositoryDoctrine;
use Doctrine\ORM\EntityManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        try{
            $oClient = new ClientRequest();
            $oClient->setEmail('mariusz24245@gmail.com');
            $oClient->setName('Mariusz');
            $oClient->setSurname('Filipkowski');

            $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
            $oRepo = new ClientRepositoryDoctrine($em);

            $client = new SignUpService($oRepo);
            $client->execute($oClient);

        }catch(\Exception $e){
            
            var_dump($e->getMessage());
        }
        return new ViewModel();

    }
}
