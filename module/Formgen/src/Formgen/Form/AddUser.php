<?php

namespace Formgen\Form; 

use Zend\Captcha; 
use Zend\Form\Element; 
use Zend\Form\Form; 

class AddUser extends Form{
    
    public function __construct($name = null) 
    { 
        parent::__construct(''); 
        
        $this->setAttribute('method', 'post'); 
        
        $this->add(array( 
            'name' => 'text', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Type something...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Text', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'paragraph', 
            'type' => 'Zend\Form\Element\Textarea', 
            'attributes' => array( 
                'required' => 'required', 
            ), 
            'options' => array( 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'password', 
            'type' => 'Zend\Form\Element\Password', 
            'attributes' => array( 
                'placeholder' => 'Password Here...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Password', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'date', 
            'type' => 'Zend\Form\Element\Date', 
            'attributes' => array( 
                'placeholder' => 'Type something...', 
                'required' => 'required', 
                'min' => '1970-01-01', 
                'max' => 2015-6-5, 
                'step' => '1', 
            ), 
            'options' => array( 
                'label' => 'Date', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'csrf', 
            'type' => 'Zend\Form\Element\Csrf', 
        ));    
         $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array('value' => 'Create', 'class'=>'btn btn-primary'),
            'options' => array(),
        ));
    } 
} 