<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array (
		'Html',
		'Form'
	);

	function index() {
        $this->set("modul","human_resource");
        $this->set("submodul","employees");

		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid User.', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function profile() {
		$user = $this->Session->read("Auth");
		$this->view($user['User']['id']);
	}

	function changepassword() {
		$this->Session->setFlash(__('Password Changed.', true));
		$this->redirect(array (
			'action' => 'profile'
		));
	}

	function add() {
        $this->set("modul", "page");
        $back['title']='Back to Employee List';
        $back['url']='/users/index';
        $this->set("back", $back);
		if (!empty ($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array (
					'action' => 'index'
				));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function edit($id = null) {
        $this->set("modul", "page");
        $back['title']='Back to Employee List';
        $back['url']='/users/index';
        $this->set("back", $back);

		if (!$id && empty ($this->data)) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}

		if (!empty ($this->data)) {
			// Check if their permission group is changing
			$oldgroupid = $this->User->field('group_id');
			if ($oldgroupid !== $this->data['User']['group_id']) {
				$aro = & $this->Acl->Aro;
				$user = $aro->findByForeignKeyAndModel($this->data['User']['id'], 'User');
				$group = $aro->findByForeignKeyAndModel($this->data['User']['group_id'], 'Group');

				// Save to ARO table
				$aro->id = $user['Aro']['id'];
				$aro->save(array (
					'parent_id' => $group['Aro']['id']
				));
			}

			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array (
					'action' => 'index'
				));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		if (empty ($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for User', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
	}

	function login() {

		$this->layout = "login";
	}

	function logout() {
		$this->Session->setFlash('Good Bye');
		$this->redirect($this->Auth->logout());
	}

	function beforeFilter() {
		parent :: beforeFilter();
		$this->Auth->allowedActions = array (
			'login',
			'logout',
			'buildAcl'
		);
		//$this->Auth->allowedActions = array('*');
	}

	/**
	* Rebuild the Acl based on the current controllers in the application
	*
	* @return void
	*/
	function buildAcl() {
		$log = array ();

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
		$baseMethods = get_class_methods('Controller');
		$baseMethods[] = 'buildAcl';

		// look at each controller in app/controllers
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
			if (!empty ($methods)) {
				//clean the methods. to remove those in Controller and private actions.
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
				}
			}
		}
		$this->redirect(array (
			'controller' => 'configurations',
			'action' => 'index'
		));
	}

    function getJsonList(){
        $this->layout = "ajax";
        $this->autoRender=false;
        echo '[{"caption":"Dina","value":4},{"caption":"Eka","value":3},{"caption":"Feni","value":3}]';
    }
}
?>
