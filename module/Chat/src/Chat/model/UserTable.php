<?php


namespace Chat\model;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;


class UserTable {

  protected $tableGateway;

  
  public  function __construct(TableGateway $tableGateway) {
  
   $this->tableGateway = $tableGateway;    
      
 }
   
 
 public function fetchAll()
{

 $resultSet = $this->tableGateway->select();

 return $resultSet;
 }
 

 
 
public function getUser($id)
{
$id = (int) $id;
$rowset = $this->tableGateway->select(array('id' => $id));
$row = $rowset->current();
if (!$row) {
throw new \Exception("Could not find row $id");
}
return $row;
}



public function getUserByEmail($userEmail)
{
$rowset = $this->tableGateway->select(array('email' =>
$userEmail));
$row = $rowset->current();
if (!$row) {
throw new \Exception("Could not find row $ userEmail");
}
}



public function deleteUser($id)
{
$this->tableGateway->delete(array('id' => $id));
}



}

