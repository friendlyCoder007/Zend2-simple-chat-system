<php

namespace Menager;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Menager\Mapper\FileResourceMapper;
use Menager\Service\FileMenagerService;

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
      
  'FileManager'=> function($sm){
      
   $config=$sm->get('config');   
     
   $mapper= new FileResourceMapper($config);   
  
   
   return new FileMenagerService($mapper);
      
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
