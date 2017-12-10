<?php
namespace Chat\model;

class User{
  
public $Id;


public $name;


public $email; 


public $password;

    
 public function exchangeArray($data)

 { 
   
 $this->id = (!empty($data['Id'])) ? $data['Id'] : null;
 $this->name = (!empty($data['name'])) ? $data['name'] : null;
 $this->email = (!empty($data['email'])) ? $data['email'] : null;
 $this->password = (!empty($data['password'])) ? $data['password'] : null;
  
 }


 public function getArrayCopy()
 {
 return get_object_vars($this);
 }
    
    
}

