<?php
namespace SocketServer;


return array(
    
          
    'controllers' => array(
        
       'factories'=>array(
           
                      
            'SocketServer\Controller\SocketCli' =>'SocketServer\Factory\SocketCliControllerFactory',
           
                       
             
        ),
        
   
        
    ),
    
    
'service_manager'=>array(
    
         
'invokables'=>array(
    
 'messageService'=>'SocketServer\Service\MessageService',
        
),     
            
    
  ),  
    
        
       
    
 //simple console mode to run the server//    
'console' => array(
    
 'router' => array(
     
 'routes' => array(
     
 'open-socket' => array(
     
 'options' => array(
     
 'route' => 'open socket',
     
 'defaults' => array(
     
 'controller' => 'SocketServer\Controller\SocketCli',
     
 'action' => 'open'
     
 )
 )
 )
 )
 )
 ),
    
    
   
    
);
    

