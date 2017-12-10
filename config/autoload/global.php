
<?php
return array(
 
  'navigation' => array(
      
   'default' => array(
       
      array(
       'label' => 'Home',
       'route' => 'home',
    
          
             ),
        
   array(
   'label'=>'Chat' 
   'route'=>'chat'
   )
        
  
       ),
     ),  
    
 'db' => array(
 'driver' => 'Pdo',
 'dsn' => 'mysql:dbname=dbchat;host=localhost',
 'driver_options' => array(
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
  ),
  ),
    
    
   'service_manager' => array(
       
   'factories' => array(

  'Zend\Db\Adapter\Adapter'=> 'Zend\Db\Adapter\AdapterServiceFactory',
  'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory'
   ),
       
          
    ),
);
