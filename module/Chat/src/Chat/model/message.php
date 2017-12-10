<?php

namespace Chat\model;


class message {
  
public $id;


public $user_id;


public $message; 


public $stamp;

    
 public function exchangeArray($data)

 { 
   
 $this->id = (!empty($data['id'])) ? $data['id'] : null;
 $this->user_id = (!empty($data['user_id'])) ? $data['user_id'] : null;
 $this->message = (!empty($data['message'])) ? $data['message'] : null;
 $this->stamp = (!empty($data['stamp'])) ? $data['stamp'] : null;
  
 }


 
 
 public function getArrayCopy()
 {
 return get_object_vars($this);
 }   
    
    
 
 
 
}

