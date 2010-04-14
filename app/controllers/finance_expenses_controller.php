<?php
class FinanceExpensesController extends AppController {

	var $name = 'FinanceExpenses';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->FinanceExpense->recursive = 0;
		$this->set('financeExpenses', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid FinanceExpense.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('financeExpense', $this->FinanceExpense->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->FinanceExpense->create();
			if ($this->FinanceExpense->save($this->data)) {
				$this->Session->setFlash(__('The FinanceExpense has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FinanceExpense could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid FinanceExpense', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->FinanceExpense->save($this->data)) {
				$this->Session->setFlash(__('The FinanceExpense has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FinanceExpense could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FinanceExpense->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for FinanceExpense', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FinanceExpense->del($id)) {
			$this->Session->setFlash(__('FinanceExpense deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>