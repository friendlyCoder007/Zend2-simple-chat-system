<?php

namespace Chat\model;
use Zend\Db\TableGateway\TableGateway;


class messageTable {
   
  protected  $tableGateway; 
    
   public function __construct(TableGateway $tableGateway) {
        
    
     $this->tableGateway = $tableGateway;   
       
     
   }


public function fetchAll()
{

 $resultSet = $this->tableGateway->select();

 return $resultSet;
 }  
    

    
 
 public function saveMessage($data){
     
     
     
 $this->tableGateway->insert($data);    
     
     
 }
 
    
    
}

