<?php


namespace Mailbox\Factory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Mailbox\Service\Mailbox;

class MailboxFactory implements FactoryInterface {
   
   
    public function createService(ServiceLocatorInterface $serviceLocator) {
        
       // $realServiceLocator = $serviceLocator->getServiceLocator();
        $mailbox = $serviceLocator->get('Mailbox\Mapper\FolderMapper');
        
        
        return new Mailbox($mailbox);
    }

}
