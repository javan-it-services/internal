<?php
class ArosController extends AclAdminAppController {
	var $name = 'Aros';
	
	function index() {
		$this->menuContext['options']['aro']['active']=true;// setting the menu manually
		$this->Aro->displayField = "alias";		
		$this->set('arolist', $this->Aro->generateList(null,'lft',null,'{n}.Aro.alias'));

		$aros = $this->Aro->findAll(null,null,'lft ASC',null,null,-1);
		$this->set('aros', $aros);
	}

	function page_view ($alias=null) {
		$this->menuContext['options']['arop']['active']=true;// setting the menu manually
		$constraint = array();
		if ($alias) {
			$aro = $this->Aro->findByAlias($alias);
			if ($aro) {
				$constraint["Aro.lft"]=">= {$aro['Aro']['lft']}";
				$constraint["Aro.rght"]="<= {$aro['Aro']['rght']}";
				$this->_addFlash("Results limited to $alias and children");
			}
		}		
		if (!$constraint) {$constraint=null;}
		list($order,$limit,$page) = $this->Pagination->init($constraint,null,array('modelClass'=>'Aro','sortBy'=>'lft'));
		$aros = $this->Aro->findAll($constraint, null, $order, $limit, $page,-1);	
		$this->set('aros', $aros);
	}

	function create() {
		if ((!empty($this->data))&&($this->data['Aro']['alias'])) {
			if (!$this->Aro->findCount(array("Aro.Alias"=>$this->data['Aro']['alias']))) {
				$this->Aro->create(null, ($this->data['Aro']['parent']?$this->data['Aro']['parent']:null), $this->data['Aro']['alias']);
				$this->Aro->saveField('foreign_key', $this->Aro->id);
				$this->_addFlash($this->data['Aro']['alias'].'</b> Has Been Added.');
			} else {
				$this->_addFlash('An aro needs an alias.');
			}
		} else {
			$this->_addFlash('An aro needs an alias.');
		}
		$this->redirect($this->referer('/'.$this->PluginName));
		die;
	}

	function delete($Alias) {
		$result = $this->Aro->findByAlias($Alias);
		$id = $result['Aro']['foreign_key'];
		$this->Aro->delete($id);
		$this->_addFlash('aro '.$Alias.' (and any child aros) deleted.');
		$this->redirect($this->referer('/'.$this->PluginName));
		die;
	}

	function setParent() {
		if (!empty($this->data)) {
			if ($this->Aro->findCount(array("Aro.Alias"=>$this->data['Aro']['alias']))) {
				$this->_setParent(null, $this->data['Aro']['alias']);
				$this->_setParent($this->data['Parent']['alias'], $this->data['Aro']['alias']);
			}
		}
		$this->redirect($this->referer('/'.$this->plugin));
		die;
	}

	function load() {
		if (!$this->userModel) {
			$this->_addFlash('The name for your user model isn\'t known, or doesn\'t exist - It is not possible to automatically load the aros from your user table.','flash_error');
			$this->viewPath = 'errors';
			$this->render('missing_user_table');
			die;
		} elseif (!$this->userModelAlias) {
			$this->_addFlash('Before using this function you need to define $userModelAlias in your plugin app controller with the name of a field in the user table to be used as the ACO alias.','flash_error');
		} elseif (!$this->{$this->userModel}->hasField($this->userModelAlias)) {
			$this->_addFlash('The '.$this->userModelAlias.' field for your user table doesn\'t exist - Define $userModelAlias in your plugin app controller with the name of a field in the user table to be used as the ACO alias.','flash_error');
		} else {
			$aros = $this->Aro->findByAlias("USERS");
			if(empty($aros['Aro']['alias'])) {
				$this->Aro->create(0, 'PUBLIC', "USERS");
				$this->Aro->saveField('foreign_key', $this->Aro->id);
			}
			$aros = $this->Aro->findByAlias("ADMIN");
			if(empty($aros['Aro']['alias'])) {
				$this->Aro->create(0, 'USERS', "ADMIN");
				$this->Aro->saveField('foreign_key', $this->Aro->id);
			}
			$aros = $this->Aro->findByAlias("OWNER");
			if(empty($aros['Aro']['alias'])) {
				$this->Aro->create(0, 'ADMIN', "OWNER");
				$this->Aro->saveField('foreign_key', $this->Aro->id);
			}
	
			$Users = $this->{$this->userModel}->findAll(null,null,null,null,-1);
			$number = 0;
			foreach($Users AS $user) {
				$uid = $user[$this->userModel]['id'];
				$ualias = $user[$this->userModel][$this->userModelAlias];	
				if (!$this->Aro->findCount(array("Aro.Alias"=>$ualias))) {
					$this->Aro->create($uid, "USERS", $ualias);
					$number++;
				}
			}
			$this->_addFlash ('Created '.$number.' Users');
		}
		$this->redirect($this->referer('/'.$this->plugin));
		die;
	}

	function _setParent($aclAroParent, $aclAroAlias) {
		if($this->Aro->setParent($aclAroParent, $aclAroAlias)) {
			return true;
		} else {
			return false;
		}
	}
}
?>