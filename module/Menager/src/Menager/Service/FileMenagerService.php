<?php

namespace Menager\Service;
use Menager\Mapper\FileResourceMapper;


class FileMenagerService {
   
 protected $FileResourceMapper;   
    
    
    public function __construct(FileResourceMapper $mapper){
        
                
        
       $this->FileResourceMapper=$mapper;  
        
        
    
    }

    
    
    public function listAll(){
        
     
                
     $result=$this->FileResourceMapper->getFiles();   
        
     return  $result;   
        
          
    }
    
    
    
    public function findFile($id){
        
    $result=$this->FileResourceMapper->getFile($id);    
        
    return $result;      
    
    }
    
    
    
    
}
