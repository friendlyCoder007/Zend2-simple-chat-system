<?php

namespace BasicFileMenager\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use BasicFileMenager\Form\UploadForm;


class MenagerController extends AbstractActionController {
   
    
   
   public function getFileMenager(){
       
       $sm = $this->getServiceLocator();
       
       $folder=$sm->get('FileManager');
       
       return $folder;
       
   }
   
   
    
    public function indexAction()
    {
            
           
        
     $data=$this->getFileMenager()->listAll();    
      
     
     return new ViewModel(array('result'=>$data));
        
    } 
    
    
    
    
    
   public function uploadAction(){
       
    $form = new UploadForm('upload-form');
    $request = $this->getRequest();
    if ($request->isPost()){
          
   
       $post = array_merge_recursive(
       $request->getPost()->toArray(),
       $request->getFiles()->toArray()   
               
      );    
          
  
     
     $form->setData($post);
     if ($form->isValid()){
      
         
      // save info to db//   
      $data = $form->getData();
     
      
     }
    }
     
    return array('form'=>$form);
      
   }  
    
   
  
   
  public function downloadAction(){
    
      
  $id = (int) $this->params()->fromRoute('id', 0); 
  
   $fileName=$this->getFileMenager()->findFile($id);
  
  
    $response = new \Zend\Http\Response\Stream();
    $response->setStream(fopen($fileName, 'r'));
    $response->setStatusCode(200);

    $headers = new \Zend\Http\Headers();
    $headers->addHeaderLine('Content-Type', 'whatever your content type is')
            ->addHeaderLine('Content-Disposition', 'attachment; filename="' . $fileName . '"')
            ->addHeaderLine('Content-Length', filesize($fileName));

    $response->setHeaders($headers);


    return $response;

     
  }
    
    
  
}
