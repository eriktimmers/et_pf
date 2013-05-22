<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $this->table = new Application_Model_ProjectService();
        $this->acl = new App_Acl();
    }

    public function indexAction()
    {
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect('/auth/login/');
        }
        
        $this->view->list = $this->table->all();        
        
    }

    public function editAction()
    {
        if (!Zend_Auth::getInstance()->hasIdentity()) {            
            $this->_redirect('/auth/login/');
        } else {
            $user = Zend_Auth::getInstance()->getIdentity();
            if (!$this->acl->isAllowed($user['usr_role'], App_Resources::ADMINPAGES)) {
                $this->_redirect('/auth/login/');
            }
        }  
        
        $request = $this->getRequest();
        $id = (int)$request->getParam('id');
        
        $form = new Application_Form_Project($formConfig);
        
        if ($request->isPost()) {
            $post = $request->getPost();
            
            $post = (get_magic_quotes_gpc() ? $this->slashStripArray($post) : $post);            
            
            if ($form->isValid($post)) {
                $this->table->save($id, $form);
                $this->_helper->getHelper('Redirector')->gotoUrl('/index/editlist/');                
            }
            
            
        } elseif ($id) {
            $data = $this->table->find($id);
            
            $form->populate($data);
            
        }         
        
        $this->view->form = $form; 
        
        
    }

    public function editlistAction()
    {
        if (!Zend_Auth::getInstance()->hasIdentity()) {            
            $this->_redirect('/auth/login/');
        } else {
            $user = Zend_Auth::getInstance()->getIdentity();
            if (!$this->acl->isAllowed($user['usr_role'], App_Resources::ADMINPAGES)) {
                $this->_redirect('/auth/login/');
            }
        }        
                
        $this->view->list = $this->table->all();
    }

    protected function slashStripArray($array) {
        $returnarray = array();
        
        foreach((array)$array as $key=>$value) {
            $returnarray[$key] = stripslashes($value);
        }
        
        return $returnarray;
    }
    

}





