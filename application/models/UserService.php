<?php

class Application_Model_UserService
{

    protected $table;    
    
    public function __construct() 
    {         
        $this->table = new Application_Model_DbTable_User();
        
    }     
    
    public function authenticate($username, $password) 
    {
        $query = $this->table->select();
        $query->where('usr_name = ?', $username);
        $query->where('usr_password = ?', $password);
        $row = $this->table->fetchRow($query);
               
        if ($row) {
            return $row->toArray();
        } else {
            return false;
        }
                        
    }

}

