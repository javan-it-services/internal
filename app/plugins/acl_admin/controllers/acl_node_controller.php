<?php
class AclNodeController extends AclAdminAppController {
	var $name = 'AclNode';

	function index($style='pretty') {
		$data = file_get_contents (CAKE_CORE_INCLUDE_PATH.DS.'cake'.DS.'libs'.DS.'controller'.DS.'components'.DS.'dbacl'.DS.'models'.DS.'aclnode.php');
		if (strpos( env("SERVER_NAME"), 'noswad')!==false) {
			if ($style=='pretty') {
				vendor('geshi');
				$geshi = new GeSHi($data, "php",ROOT.'/vendors/geshi');
				$this->set('geshi', $geshi );
				$this->render();
			} else {
				$this->autoLayout = false;
				$this->render('plain');
			}
		} else {
			$this->render('notswad');
		}
	}

	function beforeRender () {
		parent::beforeRender();
		$this->viewVars['MenuContext']['options']['acl_node']['active']=true;
	}
}
?>