<?php


return array(
 
  'navigation' => array(
      
   'default' => array(
       
      array(
       'label' => 'Home',
       'route' => 'home',
    
          
             ),
      array(           
        'label'=>'Crud',   
        'route' =>'crud',
       
             
       ),  
      array(
      'label'=>'Blog',   
      'route' =>'post'   
           
      ),  
   
        
     
    array(
        
      'label'=>'BasicFileMenager',   
      'route' =>'filemenager', 
       
      ), 
       
       
       array(
        
      'label'=>'ExtraFileMenager',   
      'route' =>'extra-filemenager', 
       
      ),
        
       
       
       ),
     ),  
    
 'db1' => array(
 'driver' => 'Pdo',
 'dsn' => 'mysql:dbname=zf2tutorial;host=localhost',
 'driver_options' => array(
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
  ),
  ),
    
    
   'service_manager' => array(
       
         'factories' => array(
             'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',          
    ),
       
       
       
       
    ),
);
