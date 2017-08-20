<?php



namespace Mailbox\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Mailbox\Mapper\FolderMapper;
use Zend\Mail\Storage\Imap;

class FolderMapperFactory implements FactoryInterface {
    
    
    public function createService(ServiceLocatorInterface $serviceLocator) {
    
       $config=$serviceLocator->get('config');
        
        
        
        
        return new FolderMapper(new Imap($config['MailInfo']['Imap']));
    }

//put your code here
}
