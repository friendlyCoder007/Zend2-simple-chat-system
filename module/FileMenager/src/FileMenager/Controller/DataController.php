<?php

namespace FileMenager\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use FileMenager\Form\UploadForm;

class DataController extends AbstractActionController {
    
    
    
  public function getStorageFolder(){
      
  $sm=$this->getServiceLocator();    
  
  $folder=$sm->get('StorageFolder');    
      
   return $folder; 
   
  }  
    
    
    
    
    public function indexAction()
    {
        
                
     $result=$this->getStorageFolder()->listAll();
           
        
     return new ViewModel(array('result'=>$result));
        
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
        
        
        return new ViewModel(array('form'=>$form));
    }
    
    
    
    
    
  public function downloadAction(){
    
      
  $id = (int) $this->params()->fromRoute('id', 0); 
  
   $fileName=$this->getStorageFolder()->findFile($id);
  
  
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
