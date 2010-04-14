<?php
class FinanceYearsController extends AppController {

	var $name = 'FinanceYears';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->FinanceYear->recursive = 0;
		$this->set('financeYears', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid FinanceYear.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('financeYear', $this->FinanceYear->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->FinanceYear->create();
			if ($this->FinanceYear->save($this->data)) {
				$this->Session->setFlash(__('The FinanceYear has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FinanceYear could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid FinanceYear', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->FinanceYear->save($this->data)) {
				$this->Session->setFlash(__('The FinanceYear has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FinanceYear could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FinanceYear->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for FinanceYear', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FinanceYear->del($id)) {
			$this->Session->setFlash(__('FinanceYear deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>