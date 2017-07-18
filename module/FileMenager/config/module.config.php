<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace FileMenager;

return array(
    
 
 'router' => array(
           
        'routes' => array(
  
           
            'extra-filemenager' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/extra-filemenager',
                    'defaults' => array(
                        '__NAMESPACE__' => 'FileMenager\Controller',
                        'controller'    => 'Data',
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
                             'controller'=>'FileMenager\Controller\Data' 
                                
                            ),
                        ),
                    ),
                 
                
            ),    
                
            ),
        ),
    ),
    
       'controllers' => array(
        
       'invokables'=>array(
           
           
            'FileMenager\Controller\Data' =>Controller\DataController::class
            
             
        ),
    ),
    
    
    
   'view_manager' => array(
      
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
    // Placeholder for console routes

);