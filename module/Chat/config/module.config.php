
<?php
namespace Chat;

return array(

 'router' => array(
     
   'routes' => array(
   
       
       
              'chat' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/chat',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Chat\Controller',
                        'controller'    => 'Chat',
                        'action'        => 'index',
                    ),
                ),
                  
                  
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '[/:action][/:id]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'=>'[0-9]+'
                            ),
                            
                        ),
                    ),
                    
     
                    
                ),
    
                
            ),
           
    
    )
    ),
     
    
    'controllers' => array(
        'invokables' => array(
            'Chat\Controller\Chat'=>'Chat\Controller\ChatController',
          
        ),
    ),
  

    
    

      'view_manager' => array(
      
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),


)
;?>
