<?php

class Application_Model_ProjectService
{

    protected $table;    
    
    public function __construct() {         
        $this->table = new Application_Model_DbTable_Project();
        
    }    
    
    public function find($id)
    {
        $oSet = $this->table->find($id)->current();
        if (is_object($oSet)) {
            $aSet = $oSet->toArray();
            return $aSet;
            
        } else {
            return array();
            
        }
        
        
    }
    
    public function all($aFilter=null)
    {
        $query = $this->table->select();
        $query->order('prj_sortorder DESC');
        return $this->table->fetchAll($query)->toArray();
        
    }    
    

    public function save($id, $form)
    {    
        $options = $form->getValues();
        
        if ($id) {
            $where = $this->table->getAdapter()->quoteInto("prj_id = ?", $id);
            $this->table->update($options, $where);
            
        } else {
            $this->table->insert($options);
            $id = $this->table->getAdapter()->lastInsertId();
        }    
        
        return $id;
    }

}

