<?php
namespace Menager\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter;


class UploadForm extends Form{

    
    
    
    public function __construct($name = null, $options = array()){
        
      parent::__construct($name, $options);
        
      $this->addElements();
      $this->addInputFilter();
    }

    
    
    public function addElements(){
    
    $file = new Element\File('image-file');
    $file->setLabel('Avatar Image Upload')
         ->setAttribute('id', 'image-file');
    
    $this->add($file);
        
    
    }
    
    
    public function addInputFilter(){
        
     $inputFilter = new InputFilter\InputFilter();
     $fileInput = new InputFilter\FileInput('image-file');
     $fileInput->setRequired(true);
      
     $fileInput->getFilterChain()->attachByName(
       'filerenameupload',
         array(
          'target' => './data/uploads/avatar.png',
           'randomize' => true,  
             
         )    
              
     );   
       $inputFilter->add($fileInput);
       $this->setInputFilter($inputFilter);
        
    }

}
