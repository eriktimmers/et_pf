<?php

/**
 * Implementatie van de Auth_Adapter
 *
 * @author Erik
 */
class App_Auth_Adapter implements Zend_Auth_Adapter_Interface 
{
    
    protected $username;
    protected $password;

    public function __construct($username, $password) 
    {
        $this->username = $username;
        $this->password = $password;
    }
    
    /**
     * Performs an authentication attempt
     * function needed to implememt interface
     *
     * @throws Zend_Auth_Adapter_Exception If authentication cannot be performed
     * @return Zend_Auth_Result
     */    
    public function authenticate() 
    {
        $userService = new Application_Model_UserService();
        $user = $userService->authenticate($this->username, $this->password);
        
        if (is_array($user)) {        
            return new Zend_Auth_Result(Zend_Auth_Result::SUCCESS, $user);
        } else {
            return new Zend_Auth_Result(Zend_Auth_Result::FAILURE, NULL, array('Username-password combinatie is onbekend.'));            
        }
        
    }
    
}

?>
