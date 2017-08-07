<?php

namespace Rest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Crud\model\Album;
use Crud\Form\AlbumForm;
use Zend\View\Model\JsonModel;


class RestController extends AbstractRestfulController{
 
 protected $albumTable;   
    
    
    
 public function getAlbumTable()
{
    if (!$this->albumTable) {
        $sm = $this->getServiceLocator();
        $this->albumTable = $sm->get('Album');
    }
    
 return $this->albumTable;
}



   public function getList()
    {
        
    $results = $this->getAlbumTable()->fetchAll();
    $data = array();
    
    foreach($results as $result){
        
        $data[] = $result;
        
    }
    
    return new JsonModel(array('data'=>$data));
    
    }

    
    
    public function get($id)
    {
     
        
    $album = $this->getAlbumTable()->getAlbum($id);
        
        
        
    return new JsonModel(array('album'=>$album)); 
    }
 
    
    
    
    
    public function create($data)
    {
     
    $form = new AlbumForm();
    $album = new Album();
    $form->setInputFilter($album->getInputFilter());
    $form->setData($data);
    if ($form->isValid()) {
        $album->exchangeArray($form->getData());
        $id = $this->getAlbumTable()->saveAlbum($album);
    }
 
    return new JsonModel(array(
        'data' => $this->get($id),
    ));
        
    }
    
    
    
    public function update($id, $data)
    {
        
    $data['id'] = $id;
    $album = $this->getAlbumTable()->getAlbum($id);
    $form  = new AlbumForm();
    $form->bind($album);
    $form->setInputFilter($album->getInputFilter());
    $form->setData($data);
    if ($form->isValid()) {
        $id = $this->getAlbumTable()->saveAlbum($form->getData());
    }
 
    return new JsonModel(array(
        'data' => $this->get($id),
    ));

        
    }
 
    
    
    public function delete($id)
    {
       
    $this->getAlbumTable()->deleteAlbum($id);
 
    return new JsonModel(array(
       'data' => 'deleted',
    ));
        
    } 
    
    
    
}
