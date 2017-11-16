<?php

namespace SocketServer;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\Console\Adapter\AdapterInterface as Console;



class Module implements
 AutoloaderProviderInterface,
 ConfigProviderInterface,
 ConsoleUsageProviderInterface
        
 {
    
   public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
           
    }
    
    
    public function getAutoloaderConfig(){
      
           return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );

        
        
    }

    
    
    public function getConfig(){
    
        
     return include __DIR__.'/config/module.config.php';
        
        
    }
    
    
    
    public function getServiceConfig()
    {
        
      return array(
          
       'factories' => array(
           
        'SocketServer'=>function($sm){
          
         $config=$sm->get('serverConfig');  
          
         return IoServer::factory($config,8080);
        
            
        },
        
              
        'ServerConfig'=>function($sm){
            
         $messageService=$sm->get('messageService');
             
            
         return new HttpServer(new WsServer($messageService));
         
              
        }
        
        
        
        )       
                
        );    
           
     
    }

 

}
