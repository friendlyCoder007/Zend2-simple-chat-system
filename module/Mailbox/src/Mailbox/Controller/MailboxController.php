<?php

namespace Mailbox\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Mailbox\Service\Mailbox;

class MailboxController extends AbstractActionController{
 
 protected $mailbox;   
    
    
     public function __construct(Mailbox $mailbox)
     {
        
         
      $this->mailbox=$mailbox;
          
          
     }
    
   

    public function showAction(){
        
    $id = $this->params()->fromRoute('id');
    
    $messages=$this->mailbox->findByFolderId($id);   
        
    return new ViewModel(array('messages'=>$messages)); 
    }
    
    
      
    
    public function readAction(){
    
           
    $request = $this->getRequest();
    
    if($request->isPost()){
    
    
    $data = $request->getPost();
    $messages=$this->mailbox->getContent($data['message'],$data['folder']);
    }
       
    

    
    return new \Zend\View\Model\JsonModel(array('result'=>$messages->getContent()));
    
    }  
    
    
    
    
    
}
