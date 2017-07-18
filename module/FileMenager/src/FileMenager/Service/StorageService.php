<?php

namespace FileMenager\Service;

use FileMenager\FileScanner\FileScanner;


class StorageService {
  
 protected $folder;   
    
    
  public   function __construct(FileScanner $folder){
        
        
  $this->folder=$folder;    
      
        
  }

  
    public function listAll(){
        
     
                
     $result=$this->folder->getFiles();   
        
     return  $result;   
        
          
    }
    
    
    
    public function findFile($id){
        
    $result=$this->folder->getFile($id);    
        
    return $result;      
    
    }

  
    
}
