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
        
        
        return new ViewModel();
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
        
        
            
            
        return new ViewModel();
    }
    
    
    
}
