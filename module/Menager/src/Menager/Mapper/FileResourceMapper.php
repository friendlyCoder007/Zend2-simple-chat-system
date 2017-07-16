<?php
namespace Menager\Mapper;
 
class FileResourceMapper {
   
 
 protected $resul=array();  
    
    
 public   function __construct($config) {
         
    if (!empty($config['dir'])) {
         
    $this->addFiles($config['dir']); 
        
    }
                 
}


// add files to the array//


    public function addFiles($dir) {
    
        
   $files = scandir($dir);
   
    
   foreach($files as $key=>$value){
       

       
    if (!in_array($value,array(".",".."))) 
      { 
           
        
      $this->result[] = $value;
        
  
       
      }   
  
     }
      
  
     
   return $this->result;
        
        
    }

    
    
    
   public function getFiles(){
       
       
       
       
    return $this->result;
    
       
   }
    
   
   
   
  public function getFile($id){
      
      
      
      
  return $this->result[$id];    
      
  } 
   
   
   
   
    
}
