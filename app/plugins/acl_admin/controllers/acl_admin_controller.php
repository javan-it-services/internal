<?php
if (!class_exists("AclAdminController")) {
class AclAdminController extends AclAdminAppController {
	var $name = 'AclAdmin';
	
	function index() {
		$this->Aco->displayField = $this->Aro->displayField = "alias";		
		$acos = $this->Aco->generateList(null,'lft',null,'{n}.Aco.alias');		
		$aros = $this->Aro->generateList(null,'lft',null,'{n}.Aro.alias');		
		$this->set('acos', $acos);
		$this->set('aros', $aros);
	}

	function test () {
		$this->autoRender = false;
		echo 'Result testing if '.$this->data['Test']['aro'].' can access '.$this->data['Test']['aco'].':<br />';
		if ($this->_checkAccess($this->data['Test']['aro'],$this->data['Test']['aco'])) {
			echo "allowed";
		} else {
			echo "denied";
		}
	}

	function permissions($aro='PUBLIC',$aco='ROOT') {
	 	$aroData = $this->_getAxoData('Aro', $aro);
	 	$acoData = $this->_getAxoData('Aco', $aco);
		if (($acoData)&&($aroData)) {
			$this->data = $this->_getAclData($aroData,$acoData);		
		} else {
			$this->data = array();
		}
		$this->set('aro', $aro);
		$this->set('aco', $aco);
		$this->render('permissions');
	}
	
	function allow($aro=NULL,$aco=NULL) {
		$this->Acl->allow($aro, low($aco));
		$this->_addFlash ("You <span style='color:green;'>granted</span> <b>$aro</b> access to <b><i>$aco</i></b>");
		$this->redirect($this->referer('/'.$this->PluginName.'/permissions/'.$aro.'/'.$aco));
		die;
	}
	
	function deny($aro=NULL,$aco=NULL) {
		$this->Acl->deny($aro, low($aco));
		$this->_addFlash ("You <span style='color:red;'>denied</span> <b>$aro</b> access to <b><i>$aco</i></b>");
		$this->redirect($this->referer('/'.$this->PluginName.'/permissions/'.$aro.'/'.$aco));
		die;
	}
	
	function mode ($mode='full') {
		if (in_array($mode,array('full','lite'))) {
			$this->Session->write("Acl.Mode",low($mode));		
		}
		$this->redirect($this->referer('/'.$this->PluginName.'/acos'));
	}
	
	function _getAxoData($x,$xalias=null) {
		$axo = $this->$x->findByAlias($xalias);
		if ($axo) {
			$axos[] = $axo;
			$DirectChildren = $this->_getAxoChildren($x,$axo[$x]['lft']+1,$axo[$x]['rght']-1);
			return am($axos,$DirectChildren);
		} else {
			return array();
		}
	}
	
	function _getAxoChildren($x,$start,$finish) {
		$i = $start;
		$axos = array();
		while ($i < $finish) {
			$axo = $this->$x->findByLft($i);
			$axos[] = $axo;
			$i= $axo[$x]['rght']+1;
		}
		return $axos;
	}

	function _getAxoFlat($x,$xalias=null) {
		$axo = $this->$x->findByAlias($xalias);
		if ($axo) {
			if ($axo[$x]['rght']==$axo[$x]['lft']+1) {
				$axos[0] = $axo;
			} else {
				$criteria = array("$x.lft"=>">={$axo[$x]['lft']}","$x.rght"=>"<={$axo[$x]['rght']}");
				list($order,$limit,$page) = $this->Pagination->init($criteria);
				$axos = $this->$x->findAll($criteria, null, 'lft ASC', $limit, $page,-1);
			}
			return ($axos);
		} else {
			return array();
		}
	}

	function _getAclData($aros,$acos) {
		foreach ($aros as $aroArray) {
			$aro = $aroArray['Aro']['alias'];
			$ItemData = $this->_getAclItem($aro,$acos);
			$data[$aro] = $ItemData;
		}
		return $data;
	}

	function _getAclItem($aro,$acos) {
		foreach($acos AS $aco) {
		    if($this->_checkAccess($aro, $aco['Aco']['alias'])) {
		    	$data[$aco['Aco']['alias']] = "allow";
		    } else {
		    	$data[$aco['Aco']['alias']] = "deny";
		    }			
		}
		return $data;
	}
	
	function beforeRender () {
		parent::beforeRender();
		if ($this->action=="permissions") {
			$this->viewVars['MenuContext']['options']['aclp']['active']=true;
		}
	}
}
}
?>