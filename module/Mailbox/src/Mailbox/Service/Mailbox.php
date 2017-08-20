<?php

namespace Mailbox\Service;
use Mailbox\Mapper\FolderMapper;


class Mailbox {
   
protected $mapper;
   

   public function __construct(FolderMapper $mapper) {
        
   $this->mapper=$mapper; 
          
   }


   
   
   
  public function findByFolderId($id){
     
 
      
  return $this->mapper->find($id);
       
  }
      
  
  
  
  public function deleteMessage($id, $folder){
      
      
   $this->mapper->delete($id, $folder);
   
      
  }
  
  
  
  
  public function copyMessage($id, $folder){
      
      
  $this->mapper->copy($id, $folder);
  
      
  }
  
  
  
  public function getContent($id, $folder){
      
      
  return $this->mapper->read($id, $folder);    
      
      
  }
  
  
      
  } 

    
    

