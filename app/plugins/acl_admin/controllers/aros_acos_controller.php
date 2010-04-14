<?php
class ArosAcosController extends AclAdminAppController {
	var $name = 'ArosAcos';
	var $uses = array('ArosAco');

	function index () {
		$this->menuContext['options']['aros_aco']['active']=true; // setting the menu manually
		$constraint = null;
		list($order,$limit,$page) = $this->Pagination->init($constraint);
		$this->data = $this->ArosAco->findAll($constraint, null, $order, $limit, $page);
	}

	function delete ($id) {
		$this->ArosAco->del($id);
		$this->redirect($this->referer('/'.$this->PluginName));
	}
}
?>