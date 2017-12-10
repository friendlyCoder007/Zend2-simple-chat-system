<?php

namespace Chat\controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use Chat\Form\SendForm;

 
class ChatController extends AbstractActionController{
    
  
 public function indexAction(){
     
  //refresh//
 $request = $this->getRequest();
 $userId=$this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
 
 if ($request->isPost()){
 $message = $request->getPost()->get('message');
 
 $this->sendMessage($message, $userId);
     
 return $this->redirect()->toRoute('chat');   
 } 
 

 $form= new SendForm();
 
 
 return new ViewModel(array('form'=>$form,
  'userName'=>$userName)); 
            
 }   
    
   
 
 
 
 public function messageAction(){
     
  
 $userTable=$this->getServiceLocator()->get('User');
 $messageTable=$this->getServiceLocator()->get('message');
  
 $message=$messageTable->fetchAll();
  
 $messageList = array();
  
foreach($message as $chatMessage){

$fromUser = $userTable->getUser($chatMessage->user_id);
$messageData = array();
$messageData['user'] = $fromUser->name;
$messageData['time'] = $chatMessage->stamp;
$messageData['data'] = $chatMessage->message;

$messageList[] = $messageData;
}
  
  
 $view = new ViewModel();
 
 $view->setTerminal(true);
 $view->setVariables(array('messageList'=>$messageList));
  
 return $view;
      
 }
 
 
 
 
 
 protected function sendMessage($text,$id){
     
 $messageTable=$this->getServiceLocator()->get('message');
     
     
$data = array(
'user_id' => $id,
'message' => $text,
'stamp' => NULL
);
     

$messageTable->saveMessage($data);

         
 }
 
 
 
}
