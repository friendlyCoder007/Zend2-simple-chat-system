<?php
namespace Mailbox\Factory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Mailbox\Controller\MailboxController;

class MailboxControllerFactory implements FactoryInterface{
   
    
    public function createService(ServiceLocatorInterface $serviceLocator){
        
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $mailbox = $realServiceLocator->get('Mailbox\Service\Mailbox');
     
        
       
         
        return new MailboxController($mailbox);
        
    }

}
