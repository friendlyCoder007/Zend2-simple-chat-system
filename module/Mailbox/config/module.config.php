<?php 
namespace Mailbox;


return array(
    
    
  'service_manager'=>array(
      
  'factories'=>array(
   
      
  'Mailbox\Service\Mailbox'=>'Mailbox\Factory\MailboxFactory',    
  'Mailbox\Mapper\FolderMapper'=>'Mailbox\Factory\FolderMapperFactory'     
         
  )    
      
      
      
  ),  
    
 'MailInfo'=>array(
 'Imap'=>array(   
 'host'=>'********',
 'user'=>'***********',
 'password' => '*******'
  ),
    
   ), 
    
    
    
   'router' => array(
       
     'routes' => array(
         
         
       'mail' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/mail[/:action[/:id]]',
                      'constraints' => array(
                     'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    'id' => '[a-zA-Z0-9_-]*',
                   ), 
                    'defaults' => array(
                        '__NAMESPACE__' => 'Mailbox\Controller',
                        'controller'    => 'Mailbox',
                        'action'        => 'show',
                    ),
                ),  
           
           
       
           
       ),
         
  )     
    
 ),
    
     'controllers' => array(
        
       'factories'=>array(
           
           
            'Mailbox\Controller\Mailbox' =>'Mailbox\Factory\MailboxControllerFactory'
            
             
        ),
    ),
    
   'view_manager' => array(
      
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
       'strategies'=>array(
       'ViewJsonStrategy'    
           
       )
    ),  
    
    
    
);
