<?php
class NeracasController extends AppController {

	var $name = 'Neracas';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Neraca->recursive = 0;
		$this->set('neracas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Neraca.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('neraca', $this->Neraca->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Neraca->create();
			if ($this->Neraca->save($this->data)) {
				$this->Session->setFlash(__('The Neraca has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Neraca could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Neraca', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Neraca->save($this->data)) {
				$this->Session->setFlash(__('The Neraca has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Neraca could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Neraca->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Neraca', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Neraca->del($id)) {
			$this->Session->setFlash(__('Neraca deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>