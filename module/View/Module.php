<?php
namespace View;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;



class Module {
    
       public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        $eventManager->attach('render', array($this, 'registerAcceptStrategy'), 100); 
        
        
    }
    
    
    
    
     public function registerAcceptStrategy($e){
            
        $app= $e->getTarget();
        $locator      = $app->getServiceManager();
        $view         = $locator->get('Zend\View\View');
        $acceptStrategy = $locator->get('AcceptStrategy');

        // Attach strategy, which is a listener aggregate, at high priority
        $view->getEventManager()->attach($acceptStrategy, 100);     
         
        
        
      }
    
    
    public function getServiceConfig(){
     
        
     return array(
     'factories'=>array(
         
         'AcceptStrategy' => 'View\Factory\AcceptStrategyFactory',
         
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
