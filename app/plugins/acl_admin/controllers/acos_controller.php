<?php
class AcosController extends AclAdminAppController {
	var $name = 'Acos';

	function index() {
		$this->menuContext['options']['aco']['active']=true; // setting the menu manually
		$this->set('sections', $this->_getSections($this->AclMode));
	}

	function data_view () {
		$this->menuContext['options']['aco']['active']=true; // setting the menu manually
		$this->Aco->displayField = "alias";		
		$this->set('acolist', $this->Aco->generateList(null,'lft',null,'{n}.Aco.alias'));

		$acos = $this->Aco->findAll(null,null,'lft ASC');
		$this->set('acos', $acos);
	}

	function page_view ($alias=null) {
		$this->menuContext['options']['acop']['active']=true; // setting the menu manually
		$constraint = array();
		if ($alias) {
			$aco = $this->Aco->findByAlias($alias);
			if ($aco) {
				$constraint["Aco.lft"]=">= {$aco['Aco']['lft']}";
				$constraint["Aco.rght"]="<= {$aco['Aco']['rght']}";
				$this->_addFlash("Results limited to $alias and children");
			}
		}
		if (!$constraint) {$constraint=null;}
		list($order,$limit,$page) = $this->Pagination->init($constraint,null,array('modelClass'=>'Aco','sortBy'=>'lft'));
		$acos = $this->Aco->findAll($constraint, null, $order, $limit, $page,-1);
		$this->set('acos', $acos);
	}

	function create($Alias=null,$level='granular') {
		if ($Alias) {
			if (strpos($Alias,':')) { // It's got a parent
				$array = explode(":",$Alias);
				array_pop($array);
				$ParentAlias = implode(":",$array);
			} else { // No parent
				$ParentAlias = "ROOT";
			}
			if (!$this->Aco->findCount(array("Aco.Alias"=>$Alias))) {
				$this->Aco->create(null, $ParentAlias, $Alias);
				$this->Aco->saveField('object_id', $this->Aco->id);
			}
			if ($level=='granular') {
				if ($this->AclMode=='full') {
					if (strpos($Alias,':')) {
						$this->_loadControllerClassesToAco($Alias);
					} else {
						$this->_loadSectionToAco($Alias);
					}
				} else {
					if ($Alias==APP_DIR) {
						$this->_loadSectionToAco($Alias,$this->AclMode);
					} else {
						$this->_loadControllerClassesToAco($Alias,$this->AclMode);
					}
				}
			}
		} elseif ((!empty($this->data))&&($this->data['Aco']['alias'])) {
			if (!$this->Aco->findCount(array("Aco.Alias"=>$this->data['Aco']['alias']))) {
				$this->Aco->create(null, $this->data['Aco']['parent'], $this->data['Aco']['alias']);
				$this->Aco->saveField('object_id', $this->Aco->id);
				$this->_addFlash($this->data['Aco']['alias'].'</b> Has Been Added.');
			} else {
				$this->_addFlash($this->data['Aco']['alias'].'</b> already exists.');
			}
		} else {
			$this->_addFlash('An Aco needs an alias.');
		}
		$this->redirect($this->referer('/'.$this->PluginName));
		die;
	}

	function delete($Alias,$childrenOnly=false) {
		$result = $this->Aco->findByAlias($Alias);
		if ($childrenOnly) {
			$Children = $this->Aco->findAll(array("Aco.lft"=>"> {$result['Aco']['lft']}","Aco.rght"=>"< {$result['Aco']['rght']}"),null,null,-1);
			foreach ($Children as $child) {
				$this->Aco->delete($child['Aco']['object_id']);		
			}
			$this->_addFlash('Children for aco '.$Alias.' deleted.');
		} else {
			$id = $result['Aco']['object_id'];
			$this->Aco->delete($id);
			$this->_addFlash('aco '.$Alias.' (and any child acos) deleted.');
		}
		$this->redirect($this->referer('/'.$this->PluginName));
		die;
	}

	function setParent() {
		if (!empty($this->data)) {
			if ($this->Aco->findCount(array("Aco.Alias"=>$this->data['Aco']['alias']))) {
				$this->Aco->setParent($this->data['Parent']['alias'], $this->data['Aco']['alias']);
			}
		}
		$this->redirect($this->referer('/'.$this->PluginName));
		die;
	}

	function _getSections($AclMode='full',$getChildren=true) {
		if ($AclMode=='full') {
			$acos = $this->Aco->findByAlias(low(APP_DIR));
		} else {
			$acos = $this->Aco->findByAlias(low('ROOT'));
		}
		if (empty($acos['Aco']['alias'])) {
			$status = 'off';			
			$type = 'off';
		} else {
			$status = 'on';			
			$noChildren = ($acos['Aco']['rght']-$acos['Aco']['lft'])/2;
			if ($noChildren>1) {
				$type = 'granular';
			} else {
				$type = 'global';
			}
		}		
		if (($getChildren)&&(!empty($acos['Aco']['alias']))) {
			$controllers = $this->_getControllers(APP_DIR,$status,$AclMode);
		} else {
			$controllers = array();
		}
		$sections[low(APP_DIR)] = array("status"=>$status,"type"=>$type,"children"=>$controllers);			
		
		if ($AclMode=='full') {
			uses('Folder');
			$Folder = new Folder(APP.DS."plugins");
			list($Plugins) = $Folder->ls();
			foreach($Plugins as $Plugin) {
				$Plugin = low($Plugin);
				$acos = $this->Aco->findByAlias($Plugin);
				if (empty($acos['Aco']['alias'])) {
					$status = 'off';			
					$type = 'off';
				} else {
					$status = 'on';			
					$noChildren = ($acos['Aco']['rght']-$acos['Aco']['lft'])/2;
					if ($noChildren>1) {
						$type = 'granular';
					} else {
						$type = 'global';
					}
				}
	
				if (($getChildren)&&(!empty($acos['Aco']['alias']))) {
					$controllers = $this->_getControllers($Plugin,$status,$AclMode);
				} else {
					$controllers = array();
				}
				$sections[low($Plugin)] = array("status"=>$status,"type"=>$type,"children"=>$controllers);			
			}
		}
		return $sections;
	}

	function _getControllers($section=APP_DIR,$sectionStatus='error',$AclMode='full') {
		$controllers = array();
		if ($section==APP_DIR){
			$controllerList = listClasses(APP."/controllers/");
			if ($AclMode=='full') {
				$acos = $this->Aco->findByAlias(low(APP_DIR));
				$sectionPrefix = APP_DIR.':';
			} else {
				$acos = $this->Aco->findByAlias(low('ROOT'));
				$sectionPrefix = '';
			}
		} else {
			$Plugin = low($section);
			$acos = $this->Aco->findByAlias($Plugin);
			$sectionPrefix = $Plugin.':';
			$controllerList = listClasses(APP."/plugins/$Plugin/controllers");
		}
		if (empty($acos['Aco']['alias'])) {
			if ($sectionStatus=='on') {
				$status = 'on';			
				$type = 'inherited';
			} else {
				$status = 'off';			
				$type = 'off';
			}
		} else {
			$status = 'on';			
			$noChildren = ($acos['Aco']['rght']-$acos['Aco']['lft'])/2;
			if ($noChildren>1) {
				$type = 'granular';
			} else {
				$type = 'global';
			}
		}
		foreach($controllerList AS $controller => $file) {
			list($name) = explode('.',$file);
			$controllerName = r('_controller','',$name);
			$acos = $this->Aco->findByAlias(low($sectionPrefix.$controllerName));
			if (empty($acos['Aco']['alias'])) {
				if ($sectionStatus=='on') {
					$status = 'on';			
					$type = 'inherited';
				} else {
					$status = 'off';			
					$type = 'off';
				}
			} else {
				$status = 'on';			
				$noChildren = ($acos['Aco']['rght']-$acos['Aco']['lft'])/2;
				if ($noChildren>1) {
					$type = 'granular';
				} else {
					$type = 'global';
				}
			}
			$controllers[$controllerName] = array("name"=>low($sectionPrefix.$controllerName), "status"=>$status,"type"=>$type);
		}
		return $controllers;
	}

	function _getControllerMethods($Alias,$AclMode='full') {
		$classMethodsCleaned = array();
		if ($AclMode=='full') {
			list ($Plugin,$controllerName) = explode(":",$Alias);
		} else {
			$Plugin = APP_DIR;
			$controllerName = $Alias;
		}
		if (!isset($controllerName)) {return array();}
		if ($Plugin==APP_DIR) {
			if (($controllerName=="about")||($controllerName=="pages")) {
				uses ("Folder");
				$Folder = new Folder(VIEWS."about");
				$list = $Folder->findRecursive();

				foreach($list as $File) {
					list($File) = explode (".",$File);
					$relativePath = substr($File, strlen(VIEWS."about".DS));
					if ($relativePath) {
						$componentParts = explode (DS,$relativePath);
						if ($componentParts) {
							$classMethodsCleaned[] = implode(":",$componentParts);
						}
					}
				}
				return $classMethodsCleaned;
			}
			$file = APP."controllers".DS.Inflector::underscore($controllerName)."_controller.php";
		} else {
			$Plugin = Inflector::underscore($Plugin);
			require_once(APP."plugins".DS.$Plugin.DS.$Plugin."_app_controller.php");
			$file = APP."plugins".DS.$Plugin.DS."controllers".DS.Inflector::underscore($controllerName)."_controller.php";
		}
		require_once($file);

		$parentClassMethods = get_class_methods('Controller');
		$subClassMethods = get_class_methods(Inflector::camelize($controllerName).'Controller');
		$classMethods = array_diff($subClassMethods, $parentClassMethods);
		
		$excludeList = array("apperror","map","action_map");
		foreach ($classMethods as $method) {
			if (!in_array($method,$excludeList)&&($method{0}<>"_")) {
				$admin = strpos($method, CAKE_ADMIN);
				if ($admin === false) {
					if (!stristr($method,"controller")) {
						$pluginText = "";
						if ($this->plugin) {
							$pluginText = $this->plugin."/";
						}
						$classMethodsCleaned[] = $method;
					}
				}
			}
		}
		return $classMethodsCleaned;
	}

	function _loadSectionToAco($section,$AclMode='full') {
		if (($AclMode=='full')&&(!$this->Aco->findCount(array("Aco.Alias"=>$section)))) {
			$this->Aco->create(null, "ROOT", $section);
			$this->Aco->saveField('object_id', $this->Aco->id);
		}
		$controllers = $this->_getControllers($section,null,$AclMode);
		$i=1;
		foreach($controllers As $controller) {
			$this->_loadControllerClassesToAco($controller['name'],$AclMode);
			$i++;
		}
	}
	
	function _loadControllerClassesToAco($controllerName,$AclMode='full') {
		$controllerMethods = $this->_getControllerMethods($controllerName,$AclMode);
		if ($AclMode=='full') {
			$array = explode(":",$controllerName);
			array_pop($array);
			$section = implode(":",$array);
		} else {
			$section = 'ROOT';
		}
		if (!$this->Aco->findCount(array("Aco.Alias"=>$controllerName))) {
			$this->Aco->create(null, $section, $controllerName);
			$this->Aco->saveField('object_id', $this->Aco->id);
		}
		foreach($controllerMethods As $method) {
			if($method == "__construct" || $method == $controllerName.'Controller' || $method == low($controllerName.'Controller')) {
				break;
			} else {
				if($method{0} != "_" || strstr($method,'__scaffold')) {
					$acoAlias = $controllerName . ":" . $method;
					if (!$this->Aco->findCount(array("Aco.Alias"=>$acoAlias))) {
						$this->Aco->create(null, $controllerName, $acoAlias);
						$this->Aco->saveField('object_id', $this->Aco->id);
					}
				}
			}
		}
	}
}
?>