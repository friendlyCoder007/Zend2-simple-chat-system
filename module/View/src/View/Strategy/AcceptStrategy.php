<?php
namespace View\Strategy;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\View\Renderer\JsonRenderer;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\ViewEvent;



class AcceptStrategy implements ListenerAggregateInterface{
  
   protected $jsonRenderer; 
   protected $listeners = array();
   protected $phprenderer;
    
    
    
   public function __construct(PhpRenderer $phprenderer, JsonRenderer $jsonRenderer) {
     
    $this->jsonRenderer=$jsonRenderer; 
    $this->phprenderer=$phprenderer;   
        
        
    }

    
    
    public function attach(EventManagerInterface $events,$priority = 1) {
        
     
        $this->listeners[] = $events->attach(ViewEvent::EVENT_RENDERER, array($this, 'selectRenderer'), $priority);
        $this->listeners[] = $events->attach(ViewEvent::EVENT_RESPONSE, array($this, 'injectResponse'), $priority);    
        
        
    }
        
    
    
    
    public function detach(EventManagerInterface $events) {
        
        
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        } 
        
        
    }

    
    public function selectRenderer(ViewEvent $e)
    {
         
    $uri=$e->getRequest()->getRequestUri();
     
    $uriName=substr($uri, 0,5);
     
    if($uriName==='/rest'){
        
    return $this->jsonRenderer;  
        
        
    }
    
    
    
    return $this->phprenderer;    
    
    
    
}



public function injectResponse(ViewEvent $e){
       
       
        $renderer = $e->getRenderer();
         
         
        if ($renderer !== $this->jsonRenderer) {
           
            // Discovered renderer is not ours; do nothing
            return;
        }

        $result   = $e->getResult();
        if (!is_string($result)) {
            // We don't have a string, and thus, no JSON
            return;
        }

        // Populate response
        $response = $e->getResponse();
        $response->setContent($result);
        $headers = $response->getHeaders();

        if ($this->jsonRenderer->hasJsonpCallback()){
            $contentType = 'application/javascript';
        } else {
            $contentType = 'application/json';
        }

       
        $headers->addHeaderLine('content-type', $contentType);

      
    }



}
