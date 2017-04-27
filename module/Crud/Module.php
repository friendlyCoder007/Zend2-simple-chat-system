<?php

namespace Crud;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Crud\model\album;
use Crud\model\AlbumTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;



class Module {
    
    
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    
    
  public function getServiceConfig()
 {
 return array(
 'factories' => array(
     
 'Album' => function($sm) {
 $tableGateway = $sm->get('AlbumTableGateway');
 $table = new AlbumTable($tableGateway);
 return $table;
 },
         
 'AlbumTableGateway' => function ($sm) {
     
 $config = $sm->get('config');
 $dbAdapter = new \Zend\Db\Adapter\Adapter($config['db1']);
 $resultSetPrototype = new ResultSet();
 $resultSetPrototype->setArrayObjectPrototype(new album());
 return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
 },
 ),
 );
 }
      
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    
}

