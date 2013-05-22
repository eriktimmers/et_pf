<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        
        $request = $this->getRequest();
        $form = new Application_Form_Login();
        
        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
        
                $authAdapter = new App_Auth_Adapter($request->getParam('usr_name'), 
                                                    $request->getParam('usr_password'));

                // Attempt authentication, saving the result
                $result = Zend_Auth::getInstance()->authenticate($authAdapter);

                if (!$result->isValid()) {
                    // Authentication failed; print the reasons why
                    foreach ($result->getMessages() as $message) {
                        $this->view->message .= $message . '<br/>';
                    }
                } else {
                    
                    $user = $result->getIdentity();
                    
                    if ($user['usr_role'] == App_Roles::ADMIN) {
                        $this->_redirect('/index/editlist/');
                    }
                    
                    $this->_redirect('/');            
                }
                
            }
        }        
        
        $this->view->form = $form;
    }

    public function logoffAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/auth/login/');
    }


}





