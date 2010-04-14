<?php
class ClientsController extends AppController {

	var $name = 'Clients';
	var $helpers = array('Html', 'Form');

	function index() {
        $this->set("modul","human_resource");
        $this->set("submodul","clients");
		$this->Client->recursive = 0;
		$this->set('clients', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Client.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('client', $this->Client->read(null, $id));
	}

	function add() {
        $this->set("modul","page");
        $back['title']='Back to Client List';
        $back['url']='/clients/index';
        $this->set("back", $back);

		if (!empty($this->data)) {
			$this->Client->create();
			if ($this->Client->save($this->data)) {
				$this->Session->setFlash(__('The Client has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Client could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Client', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Client->save($this->data)) {
				$this->Session->setFlash(__('The Client has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Client could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Client->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Client', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Client->del($id)) {
			$this->Session->setFlash(__('Client deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
