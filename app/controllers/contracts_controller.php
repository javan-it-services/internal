<?php
class ContractsController extends AppController {

	var $name = 'Contracts';
	var $helpers = array('Html', 'Form');

	function index() {
        $this->set("modul","human_resource");
        $this->set("submodul","contracts");
		$this->Contract->recursive = 0;
		$this->set('contracts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Contract.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('contract', $this->Contract->read(null, $id));
	}

	function add() {
        $this->set("modul","page");
        $back['title']='Back to Contract List';
        $back['url']='/contracts/index';
        $this->set("back", $back);

		if (!empty($this->data)) {
			$this->Contract->create();
			if ($this->Contract->save($this->data)) {
				$this->Session->setFlash(__('The Contract has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Contract could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Contract->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
        $this->set("modul","page");
        $back['title']='Back to Contract List';
        $back['url']='/contracts/index';
        $this->set("back", $back);
        
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Contract', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Contract->save($this->data)) {
				$this->Session->setFlash(__('The Contract has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Contract could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Contract->read(null, $id);
		}
		$users = $this->Contract->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Contract', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Contract->del($id)) {
			$this->Session->setFlash(__('Contract deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
