<?php
class FinanceIncomesController extends AppController {

	var $name = 'FinanceIncomes';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->FinanceIncome->recursive = 0;
		$this->set('financeIncomes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid FinanceIncome.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('financeIncome', $this->FinanceIncome->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->FinanceIncome->create();
			if ($this->FinanceIncome->save($this->data)) {
				$this->Session->setFlash(__('The FinanceIncome has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FinanceIncome could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid FinanceIncome', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->FinanceIncome->save($this->data)) {
				$this->Session->setFlash(__('The FinanceIncome has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FinanceIncome could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FinanceIncome->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for FinanceIncome', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FinanceIncome->del($id)) {
			$this->Session->setFlash(__('FinanceIncome deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>