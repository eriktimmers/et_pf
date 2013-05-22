<?php

class Application_Form_Project extends Zend_Form
{

    public function init()
    {
        
        $this->setMethod('post');
                
        $decoratorStack = array( 
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data'=>'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
        ); 
        
        $this->addElement('text', 'prj_title', 
            array(
                'order'      => 1,
                'label'      => 'Title:',
                'required'   => true,
                'filters'    => array('StringTrim', 'StripTags'),
                'validators' => array(
                    array('validator' => 'StringLength',
                          'options' => array(1, 64)),
                ),
                'decorators' => $decoratorStack
            )
        );   

        $this->addElement('text', 'prj_opdrachtgever', 
            array(
                'order'      => 2,
                'label'      => 'Klant:',
                'required'   => true,
                'filters'    => array('StringTrim', 'StripTags'),
                'validators' => array(
                    array('validator' => 'StringLength',
                          'options' => array(1, 64)),
                ),
                'decorators' => $decoratorStack
            )
        );   
                
        
        $this->addElement('text', 'prj_oplevering', 
            array(
                'order'      => 3,
                'label'      => 'Jaar:',
                'required'   => true,
                'filters'    => array('StringTrim', 'StripTags'),
                'validators' => array(
                    array('validator' => 'StringLength',
                          'options' => array(1, 32)),
                ),
                'decorators' => $decoratorStack
            )
        );         

        $this->addElement('text', 'prj_sortorder', 
            array(
                'order'      => 4,
                'label'      => 'Volgorde:',
                'required'   => true,
                'filters'    => array('StringTrim', 'StripTags'),
                'validators' => array(
                    array('validator' => 'int'),
                ),
                'decorators' => $decoratorStack
            )
        );            
        
        $this->addElement('textarea', 'prj_description', 
            array(
                'order'      => 10,                
                'label'      => 'Beschrijving:',
                'required'   => false,
                'filters'    => array('StringTrim'),
                'cols'       => '80',
                'rows'       => '4',
                'decorators' => $decoratorStack
            )
        );  
        
        $this->addElement('text', 'prj_img', 
            array(
                'order'      => 11,
                'label'      => 'Screenshot:',
                'required'   => false,
                'filters'    => array('StringTrim', 'StripTags'),
                'validators' => array(
                    array('validator' => 'StringLength',
                          'options' => array(1, 64)),
                ),
                'decorators' => $decoratorStack
            )
        );            

        $this->addElement('text', 'prj_backoffice_or_frontoffice', 
            array(
                'order'      => 12,
                'label'      => 'Frontoffice / Backoffice:',
                'required'   => true,
                'filters'    => array('StringTrim', 'StripTags'),
                'validators' => array(
                    array('validator' => 'StringLength',
                          'options' => array(1, 64)),
                ),
                'decorators' => $decoratorStack
            )
        );        
        
        $this->addElement('text', 'prj_keywords', 
            array(
                'order'      => 13,
                'label'      => 'Gebruikte technieken:',
                'required'   => true,
                'filters'    => array('StringTrim', 'StripTags'),
                'validators' => array(
                    array('validator' => 'StringLength',
                          'options' => array(1, 64)),
                ),
                'decorators' => $decoratorStack
            )
        ); 
        

        $this->addElement('text', 'prj_url', 
            array(
                'order'      => 14,
                'label'      => 'Url:',
                'required'   => true,
                'filters'    => array('StringTrim', 'StripTags'),
                'validators' => array(
                    array('validator' => 'StringLength',
                          'options' => array(1, 64)),
                ),
                'decorators' => $decoratorStack
            )
        );         
        
        // Add the submit button
        $this->addElement('submit', 'submit', 
            array(
                'order'      => 99,                
                'ignore'   => true,
                'label'    => 'Save',
                'decorators' =>  array( 
                    'ViewHelper',
                    'Description',
                    'Errors',
                    array(array('data'=>'HtmlTag'), array('tag' => 'td', 'colspan'=>'2')),
                    array(array('row'=>'HtmlTag'), array('tag'=>'tr'))
                )
        )); 
        
        $this->setDecorators(array(
               'FormElements',
               array(array('data'=>'HtmlTag'), array('tag'=>'table', 'class'=>'formtable formtablesource')),
               'Form'
        ));         

    }


}

