<?php

namespace Rest;

return array(
    
        
     'controllers' => array(
         
        'invokables' => array(
            
            'Rest\Controller\Rest' =>  'Rest\Controller\RestController'
        
        ),
    ),
    
    
   'router' => array(
        
    'routes' => array(
          
   'rest'=>array(
       
   'type'    => 'Segment',
       
   'options' => array(      
       
   'route'=>'/rest[/:id]',   
       
   'defaults' => array(
       
   'controller'=>'Rest\Controller\Rest', 
  
        
        
   ),      
   ),   

   
  )       
          
        
        
  )  
  ),  
    
    'view_manager' => array(
        'strategies'=>array(
            
          'ViewJsonStrategy',  
            
        ),
      
    ),
);

