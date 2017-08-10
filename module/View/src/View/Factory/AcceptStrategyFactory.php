<?php

namespace View\Factory;

 use Zend\ServiceManager\FactoryInterface;
 use Zend\ServiceManager\ServiceLocatorInterface;
 use View\Strategy\AcceptStrategy;

class AcceptStrategyFactory implements FactoryInterface{
   
    
    
    public function createService(ServiceLocatorInterface $serviceLocator) {
        
   $jsonRenderer=$serviceLocator->get('ViewJsonRenderer');    
   
   $viewRenderer=$serviceLocator->get('ViewRenderer');     
    
    
    return new AcceptStrategy($viewRenderer,$jsonRenderer); 
        
    }

   

}
