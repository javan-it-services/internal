<?php
class ConfigurationsController extends AppController {

	var $name = 'Configurations';
	var $helpers = array('Html', 'Form', 'Javascript','Ajax');
	var $components = array('RequestHandler');
	var $uses = array (
		'Aco',
		'Aro',
		'Group'
	);

	function index($group_id = null) {
        $this->set("modul","setting");
        $this->set("submodul","configurations");

		$group = $this->Group->findById($group_id);
		$roles = $this->Group->find("list");
		$this->set('role', $group_id);
		$this->set('roles', $roles);

		if ($group_id) {
			//Start Checking
			$groupname = $group['Group']['name'];
			$this->set('groupname', $groupname);
			$log = array ();

			$acos['permission'] = $this->Acl->check($groupname, "controllers");
			$aco = & $this->Acl->Aco;
			$root = $aco->node('controllers');
			if (!$root) {
				$aco->create(array (
					'parent_id' => null,
					'model' => null,
					'alias' => 'controllers'
				));
				$root = $aco->save();
				$root['Aco']['id'] = $aco->id;
				$log[] = 'Created Aco node for controllers';
			} else {
				$root = $root[0];
			}

			App :: import('Core', 'File');
			$Controllers = Configure :: listObjects('controller');
			$appIndex = array_search('App', $Controllers);
			if ($appIndex !== false) {
				unset ($Controllers[$appIndex]);
			}
			$baseMethods = get_class_methods('AppController');
			$baseMethods[] = 'buildAcl';

			// look at each controller in app/controllers
			$i = 0;
			foreach ($Controllers as $ctrlName) {
				App :: import('Controller', $ctrlName);
				$ctrlclass = $ctrlName . 'Controller';
				$methods = get_class_methods($ctrlclass);

				// find / make controller node
				$controllerNode = $aco->node('controllers/' . $ctrlName);
				if (!$controllerNode) {
					$aco->create(array (
						'parent_id' => $root['Aco']['id'],
						'model' => null,
						'alias' => $ctrlName
					));
					$controllerNode = $aco->save();
					$controllerNode['Aco']['id'] = $aco->id;
					$log[] = 'Created Aco node for ' . $ctrlName;
				} else {
					$controllerNode = $controllerNode[0];
				}
				$acos['controller'][$i]['node'] = $controllerNode;
				$acos['controller'][$i]['permission'] = $acos['permission'] = $this->Acl->check($groupname, "controllers/" . $ctrlName);

				if (!empty ($methods)) {
					//clean the methods. to remove those in Controller and private actions.
					$j = 0;
					foreach ($methods as $k => $method) {
						if (strpos($method, '_', 0) === 0) {
							unset ($methods[$k]);
							continue;
						}
						if (in_array($method, $baseMethods)) {
							unset ($methods[$k]);
							continue;
						}
						$methodNode = $aco->node('controllers/' . $ctrlName . '/' . $method);
						if (!$methodNode) {
							$aco->create(array (
								'parent_id' => $controllerNode['Aco']['id'],
								'model' => null,
								'alias' => $method
							));
							$methodNode = $aco->save();
							$log[] = 'Created Aco node for ' . $method;
						}
						$acos['controller'][$i]['method'][$j]['permission'] = $acos['permission'] = $this->Acl->check($groupname, 'controllers/' . $ctrlName . '/' . $method);
						$acos['controller'][$i]['method'][$j]['node'] = $methodNode[0];
						$j++;
					}
				}
				$i++;
			}
			//pr($acos);
			$this->set('acos', $acos);
		}
	}

	function selectrole() {
		if (!empty ($this->data)) {
			$role = "/" . $this->data['Aco']['role'];
		}
		$this->redirect("index" . $role);
	}

	function allow($id, $groupname, $controller = null, $method = null) {
		if ($controller) {
			$controller = "/" . $controller;
		}
		if ($method) {
			$method = "/" . $method;
		}
		$this->Acl->allow($groupname, 'controllers' . $controller . $method);
		$group = $this->Group->findByName($groupname);
		if($this->RequestHandler->isAjax()){
			$this->layout = 'ajax';
			$this->set("id",$id);
			$this->set("groupname",$groupname);
			$this->set("controller",$controller);
			$this->set("method",$method);
			$this->set("allow",true);
        }else{
    		$this->redirect("index/" . $group['Group']['id']);
        }

	}

	function deny($id,$groupname, $controller = null, $method = null) {
		if ($controller) {
			$controller = "/" . $controller;
		}
		if ($method) {
			$method = "/" . $method;
		}
		$this->Acl->deny($groupname, 'controllers' . $controller . $method);
		$group = $this->Group->findByName($groupname);
		if($this->RequestHandler->isAjax()){
			$this->set("allow",false);
			$this->layout = 'ajax';
			$this->set("id",$id);
			$this->set("groupname",$groupname);
			$this->set("controller",$controller);
			$this->set("method",$method);
			$this->render('allow');
        }else{
    		$this->redirect("index/" . $group['Group']['id']);
        }
	}
}
?>
