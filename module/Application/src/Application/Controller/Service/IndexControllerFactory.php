<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 30.03.16
 * Time: 19:38
 */


namespace Application\Controller\Service;

use Application\Controller\IndexController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface{


    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        try{
            $c = new IndexController();
            /**
             * @param ServiceLocatorInterface $parentLocator
             */
            $parentLocator = $serviceLocator->getServiceLocator();
            if($parentLocator->has('malocher.cqrs.gate')){
                $parentLocator->get('malocher.cqrs.gate');
                echo 'test';
            }
            $c->setGate($parentLocator->get('malocher.cqrs.gate'));
            return $c;
        }catch (\Exception $e){
            var_dump($e->getMessage());

        }
    }
}