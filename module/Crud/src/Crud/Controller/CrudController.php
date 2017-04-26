<?php
namespace Crud\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Crud\Form\AlbumForm;
use Crud\model\album;


class CrudController extends AbstractActionController{

 protected $albumTable;
    
    
 public function getAlbumTable()
 {
   if (!$this->albumTable) {
   $sm = $this->getServiceLocator();
   $this->albumTable = $sm->get('Album');
    }
   return $this->albumTable;
  }
    
    
    
    
    public function indexAction()
    {
       
        
        
        return new ViewModel(array(
            
        'albums' => $this->getAlbumTable()->fetchAll()));
    }
    
    
    
    
    public function editAction(){
      
      $id = (int) $this->params()->fromRoute('id', 0);
     if (!$id) {
      return $this->redirect()->toRoute('crud', array(
    'action' => 'add'
     ));
  }  
        
      try {
   $album = $this->getAlbumTable()->getAlbum($id);
    }
   catch (\Exception $ex) {
   return $this->redirect()->toRoute('crud', array(
  'action' => 'index'
   ));
   }
  
   $form = new AlbumForm();
   $form->bind($album);
   $form->get('submit')->setAttribute('value', 'Edit');

  $request = $this->getRequest();
  if ($request->isPost()) {
   $form->setInputFilter($album->getInputFilter());
   $form->setData($request->getPost());

   if ($form->isValid()) {
   $this->getAlbumTable()->saveAlbum($album);

  // Redirect to list of albums
   return $this->redirect()->toRoute('crud');
   }
   }
  
   return array(
  'id' => $id,
  'form' => $form,
   );
 }  
        
      
 
    
   
    
    
   public function addAction(){
        
   $form = new AlbumForm();
   $form->get('submit')->setValue('Add');

   $request = $this->getRequest();
   if ($request->isPost()) {
   $album = new album();
   $form->setInputFilter($album->getInputFilter());
   $form->setData($request->getPost());
 
   if ($form->isValid()) {
       
   $album->exchangeArray($form->getData());
   $this->getAlbumTable()->saveAlbum($album);
 
   // Redirect to list of albums
   return $this->redirect()->toRoute('crud');
   }
   }
   
    return array('form' => $form);
   }
    
    
    
    public function deleteAction(){
        
     $id = (int) $this->params()->fromRoute('id', 0);
      if (!$id) {
      return $this->redirect()->toRoute('crud');
     }

   $request = $this->getRequest();
   if ($request->isPost()) {
   $del = $request->getPost('del', 'No');

   if ($del == 'Yes') {
  $id = (int) $request->getPost('id');
  $this->getAlbumTable()->deleteAlbum($id);
   }

   // Redirect to list of albums
   return $this->redirect()->toRoute('crud');
   }
 
   return array(
   'id' => $id,
   'album' => $this->getAlbumTable()->getAlbum($id)
 );
            
            
       
    }
    
    
    
}
