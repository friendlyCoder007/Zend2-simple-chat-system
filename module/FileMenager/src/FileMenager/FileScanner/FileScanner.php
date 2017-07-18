<?php

namespace FileMenager\FileScanner;

use Zend\Code\Scanner\DirectoryScanner;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Zend\Code\Scanner\FileScanner as ZendScanner;


class FileScanner extends DirectoryScanner{
   
    
    
   public function __construct($config) {
    
           
     parent::__construct($config['dir']);  
       
           
        
   }

    
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
                        $this->fileScanners[] = new ZendScanner($item->getRealPath());
                        
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
 
 
}
