<?php
namespace Mailbox\Mapper;
use Zend\Mail\Storage\Imap;


class FolderMapper {
  
  protected $imap;  
  protected $folders=array();
    
  public  function __construct(Imap $imap) {
       
      
  $this->imap=$imap;    
     
        
  
  }

  
  public function getFolders(){
     
      
  foreach($this->imap->getFolders() as $value){
     
  $this->folders[]=$value;   
        
      
  }  
  
  return $this->folders; 
  
  }
  
  
  
  
  public function select($id){
      
  $this->getFolders();   
     
  $folder=$this->folders[$id]; 

  $this->imap->selectFolder($folder);   
      
  return $this->imap;    
      
  }
  
  
  public function find($id){
      
  if($id===null){
    
  $id=1;    
      
  }
  
  $this->select($id);  
      
  return $this->imap;
  
  
  }
  
  
  
  
 public function copy($id,$folder){
     
     
 $this->imap->copyMessage($id, $folder);    
     
     
 } 
  
  
 
  
 public function delete($id,$folder){
     
 $this->imap->selectFolder($folder);  
  
 if($folder==='Trash'){
     
 $this->imap->removeMessage($id);
 }    
     
 
 $this->imap->copyMessage($id, 'Trash');  
     
        
 }
 
  
 
 public function read($id, $folder){
     
 $this->imap->selectFolder($folder);
     
 return $this->imap->getMessage($id);   
     
 
  
 }
 
 
 
  
}
