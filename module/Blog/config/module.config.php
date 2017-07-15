<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Blog;

  return array(
          
      
 'db' => array(
     
 'driver' => 'Pdo',
     
  'username' => 'root',
     
  'password' => 'pass', 
     
  'dsn' => 'mysql:dbname=blog;host=localhost',
     
  'driver_options' => array(
      
   \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
          
   )
  ),
      
      
      
'service_manager' => array(
          
'factories' => array(
    
 'Blog\Mapper\PostMapperInterface' => 'Blog\Factory\ZendDbSqlMapperFactory',
    
 'Blog\Service\PostServiceInterface' => 'Blog\Factory\PostServiceFactory',
    
 'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory'
      
    
   )
  ),
      
   'controllers' => array(
            
   'factories' => array(
           
    'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory',
    'Blog\Controller\Write' => 'Blog\Factory\WriteControllerFactory',
    'Blog\Controller\Delete' => 'Blog\Factory\DeleteControllerFactory'
        
        )
      ),
    
      
  'router' => array(
        
        'routes' => array(
  
     
            'post' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/blog',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Blog\Controller',
                        'controller'    => 'List',
                        'action'        => 'index',
                    ),
                ),
                
                
               'may_terminate' => true,
                 'child_routes'  => array(
                     'detail' => array(
                         'type' => 'segment',
                         'options' => array(
                             'route'    => '/:id',
                             'defaults' => array(
                                 
                                 'action' => 'detail'
                                 
                             ),
                             'constraints' => array(
                                 'id' => '[1-9]\d*'
                             )
                         )
                     ),
                      'add' => array(
                       'type' => 'literal',
                          'options' => array(
                             'route'    => '/add',
                             'defaults' => array(
                                 'controller' => 'Blog\Controller\Write',
                                 'action'     => 'add'
                             )
                         )
                      ),
                     
                     'edit' => array(
                         'type' => 'segment',
                         'options' => array(
                             'route'    => '/edit/:id',
                             'defaults' => array(
                                 'controller' => 'Blog\Controller\Write',
                                 'action'     => 'edit'
                             ),
                             'constraints' => array(
                                 'id' => '\d+'
                             )
                         )
                     ),
                'delete' => array(
                         'type' => 'segment',
                         'options' => array(
                             'route'    => '/delete/:id',
                             'defaults' => array(
                                 'controller' => 'Blog\Controller\Delete',
                                 'action'     => 'delete'
                             ),
                             'constraints' => array(
                                 'id' => '\d+'
                             )
                         )
                     )      
                 )
                                      
            ),
        ),
    ),
   

    'view_manager' => array(
      
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    
);
