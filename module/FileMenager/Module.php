<?php

namespace FileMenager;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use FileMenager\FileScanner\FileScanner;
use FileMenager\Service\StorageService;


class Module implements AutoloaderProviderInterface, ConfigProviderInterface{
   

 public function onBootstrap(MvcEvent $e)
    {
      
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
    }

    
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }


    
    
     public function getServiceConfig(){
    
       return array( 
         
       'factories'=>array(
            
       'StorageFolder'=> function($sm){
      
       $config=$sm->get('config');   
     
       $folder=new FileScanner($config);   
  
   
       return new StorageService($folder);
      
   }     
      
            
            )
         
         );
          
          
     }

     
     
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

  
    
}
