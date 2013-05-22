<?php
/**
* Overwite Zend_Acl to set the custom access rights
*
* @package    Portfoliosite
* @subpackage Wand
* @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
* @license    http://framework.zend.com/license   BSD License
* @version    Release: @package_version@
* @link       http://framework.zend.com/package/PackageName
* @since      Class available since Release 1.5.0
* @deprecated Class deprecated in Release 2.0.0
*/

/**
 * Overwite Zend_Acl to set the custom access rights
 *
 * @author Erik
 */
class App_Acl extends Zend_Acl {
   
    public function __construct() {
        $this->add(new Zend_Acl_Resource(App_Resources::OUTERPAGES));
        $this->add(new Zend_Acl_Resource(App_Resources::PRIVATEPAGES));
        $this->add(new Zend_Acl_Resource(App_Resources::ADMINPAGES));
        

        $this->addRole(new Zend_Acl_Role(App_Roles::GUEST));
        $this->addRole(new Zend_Acl_Role(App_Roles::FREE), App_Roles::GUEST);        
        $this->addRole(new Zend_Acl_Role(App_Roles::ADMIN), App_Roles::FREE);     
        
        $this->allow(App_Roles::GUEST, App_Resources::OUTERPAGES);
        $this->allow(App_Roles::FREE, App_Resources::PRIVATEPAGES);
        $this->allow(App_Roles::ADMIN, App_Resources::ADMINPAGES);
        
    }
    
}

?>
