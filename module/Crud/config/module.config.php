<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Crud;

return array(
     
    'router' => array(
        
     'routes' => array(
  
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'crud' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/crud',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Crud\Controller',
                        'controller'    => 'Crud',
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
                            'defaults' => array(
                             'controller'=>'Crud\Controller\Crud' 
                                
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    
    
    
    'controllers' => array(
        'invokables' => array(
            'Crud\Controller\Crud' =>  Controller\CrudController::class
        ),
    ),
  


      'view_manager' => array(
      
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
   
 
);
