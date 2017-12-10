
<?php
namespace Chat\Form;
use Zend\Form\Form;
  
class SendForm extends Form{

    public function __construct($name = null, $options = array()) {
        
      parent::__construct($name, $options); 
        
      $this->add(array(      
        
      'name' => 'message',
      'attributes' => array(
      'type' => 'text',
      'id' => 'messageText',
      'required' => 'required'    
       ),   
      'options' => array(
      'label' => 'Message',
       ), 
          
      ));  
    
      
      $this->add(array(
           
      'name' => 'submit',
      'attributes' => array(
      'type' => 'submit',
      'value' => 'Send'),     
           
           
       ));   
      
      
    $this->add(array(
    'name' => 'refresh',
    'attributes' => array(
    'type' => 'button',
    'id' => 'btnRefresh',   
    'value' => 'Refresh')    
        
        
    ));  
      
      
        
    }


    
    
    
}
