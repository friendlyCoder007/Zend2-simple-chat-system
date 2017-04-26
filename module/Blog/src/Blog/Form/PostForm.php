<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 namespace Blog\Form;

 use Zend\Form\Form;

 class PostForm extends Form
 {
     public function __construct($name = null, $options = array())
     {
         parent::__construct($name, $options);

         $this->add(array(
             'name' => 'post-fieldset',
             'type' => 'Blog\Form\PostFieldset',
             'options' => array(
                 'use_as_base_fieldset' => true
             )
         ));

         $this->add(array(
             'type' => 'submit',
             'name' => 'submit',
             'attributes' => array(
                 'value' => 'Insert new Post'
             )
         ));
     }
 }
