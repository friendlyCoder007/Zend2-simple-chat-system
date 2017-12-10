<?php

namespace Chat;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Chat\model\User;
use Chat\model\UserTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Chat\model\messageTable;
use Chat\model\message;


class Module{
   
    
    
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

    
    
    
    public function getServiceConfig(){
   
     return array(
    
    'factories' => array(
         
    'User'=> function ($sm){
     
        
     $UserTableGateway = $sm->get('UserTableGateway');
     $UserTable = new UserTable($UserTableGateway);
     
     return $UserTable;
      
     },
     
             
     'UserTableGateway'=>function($sm){
   
     
     $dbAdapter=$sm->get('Zend\Db\Adapter\Adapter')    
     $resultSetPrototype = new ResultSet();
     $resultSetPrototype->setArrayObjectPrototype(new User());
     return new TableGateway('User', $dbAdapter, null, $resultSetPrototype);
     
     },
             
             
             
 
     'message'=>function($sm){
     
     $messageTableGateway = $sm->get('messageTableGateway');  
     $messageTable = new messageTable($messageTableGateway);   
         
     return $messageTable;
     
     },
             
    'messageTableGateway'=>function($sm){
    
   
    $dbAdapter=$sm->get('Zend\Db\Adapter\Adapter')    
    $resultSetPrototype = new ResultSet();
    $resultSetPrototype->setArrayObjectPrototype(new message());   
         
    
    return new TableGateway('chat_messages', $dbAdapter, null, $resultSetPrototype);
    
    }         
        
     )      
        
    );
       
        
    }
    
    
    
}
