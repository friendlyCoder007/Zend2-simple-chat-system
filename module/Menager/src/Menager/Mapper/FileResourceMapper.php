<?php
namespace Menager\Mapper;
 
use Zend\Code\Scanner\DirectoryScanner;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Zend\Code\Scanner\FileScanner;


class FileResourceMapper extends DirectoryScanner{
   
 
 protected $result=array();  
    
    
 public   function __construct($config){
         
     
   // parent::__construct($config['dir']);
        
    
    if (!empty($config['dir'])){
         
    $this->addFiles($config['dir']); 
        
    }
                 
 }
    
/* 
 

 
   protected function scan(){
     
          if ($this->isScanned) {
            return;
        }
       
        // iterate directories creating file scanners
        foreach ($this->directories as $directory) {
            if ($directory instanceof DirectoryScanner) {
                $directory->scan();
                if ($directory->fileScanners) {
                    $this->fileScanners = array_merge($this->fileScanners, $directory->fileScanners);
                }
            } else {
                $rdi = new RecursiveDirectoryIterator($directory);
              
                foreach (new RecursiveIteratorIterator($rdi) as $item) {
                  
                    if ($item->isFile() && pathinfo($item->getRealPath(), PATHINFO_EXTENSION) == 'png') {
                        $this->fileScanners[] = new FileScanner($item->getRealPath());
                        
                    }
                }
            }
        }
     
     
$this->isScanned = true;   
 }  
 

 
 
 
   public function getFiles($returnFileScanners = false){
       
       
        $this->scan();
         
        $return = array();
       
        foreach ($this->fileScanners as $fileScanner){
          
            $return[] = ($returnFileScanners) ? $fileScanner : basename($fileScanner->getFile());
            
        }
        
        return $return;
         
   }
 
   
   
  
   
   public function getFile($id){
       
   $this->scan(); 
       
   $file= basename($this->fileScanners[$id]->getFile());
   
       
   return $file;  
         
         
   }
 
 
 */
// add files to the array//


    public function addFiles($dir) {
    
    
        
   $files = scandir($dir);
   //var_dump($dir);
    
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
