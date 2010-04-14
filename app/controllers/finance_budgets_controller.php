<?php
class FinanceBudgetsController extends AppController {

	var $name = 'FinanceBudgets';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->FinanceBudget->recursive = 0;
		$this->set('financeBudgets', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid FinanceBudget.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('financeBudget', $this->FinanceBudget->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->FinanceBudget->create();
			if ($this->FinanceBudget->save($this->data)) {
				$this->Session->setFlash(__('The FinanceBudget has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FinanceBudget could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid FinanceBudget', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->FinanceBudget->save($this->data)) {
				$this->Session->setFlash(__('The FinanceBudget has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FinanceBudget could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FinanceBudget->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for FinanceBudget', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FinanceBudget->del($id)) {
			$this->Session->setFlash(__('FinanceBudget deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>