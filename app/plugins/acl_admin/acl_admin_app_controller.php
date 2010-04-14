<?php
include('generic_controller.php');

class AclAdminAppController extends GenericController {
	var $components = array('AC','Acl');
	var $helpers = array();
	var $argSeparator = '|'; // The default is : which is used as an axo name seperator.
	var $uses = array('Aro','Aco');
	var $userModel = null;
	var $userModelAlias = null;
	var $AclMode = null;

	var $menuItems = array (
						'Main Site'=>array('url'=>'/'),
						'Home'=>array('url'=>'/AclAdmin'),
						'Aco Management'=>array('url'=>'/AclAdmin/acos'),
						'Aro Management'=>array('url'=>'/AclAdmin/aros'),
						'Acl Permissions'=>array('url'=>'/AclAdmin/permissions'),
						'Aco (Flat)'=>array('url'=>'/AclAdmin/acos/page_view'),
						'Aro (Flat)'=>array('url'=>'/AclAdmin/aros/page_view'),
						'Permissions (Flat)'=>array('url'=>'/AclAdmin/aros_acos')
							);

	function __construct () {
		if ($this->userModel) {
			$this->uses[] = $this->userModel;
		}

		parent::__construct();
	}

	function beforeFilter () {
		$mode = $this->Session->read("Acl.Mode");
		if (!$mode) {
			$mode = 'full';
			$this->Session->write('Acl.Mode',$mode);
		}
		$this->AclMode = $mode;

		if(!$this->_isRequestAction()) {
			// Create the root nodes if they don't exist
			$acos = $this->Aco->findByAlias("ROOT");
			if(empty($acos['Aco']['alias'])) {
				$this->Aco->create(0, NULL, "ROOT");
			}
			$aros = $this->Aro->findByAlias("PUBLIC");
			if(empty($aros['Aro']['alias'])) {
				$this->Aro->create(0, NULL, "PUBLIC");
			}
		}
		parent::beforeFilter ();
	}

	function _checkAccess($aro, $aco) {
        $access = $this->Acl->check($aro, low($aco), $action = "*");
        if ($access === false) {
            return false;
        } else {
            return true;
        }
	}


}
?>