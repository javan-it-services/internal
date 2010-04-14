<?php
class FinanceAccountsController extends AppController {

	var $name = 'FinanceAccounts';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->FinanceAccount->recursive = 0;
		$this->set('financeAccounts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid FinanceAccount.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('financeAccount', $this->FinanceAccount->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->FinanceAccount->create();
			if ($this->FinanceAccount->save($this->data)) {
				$this->Session->setFlash(__('The FinanceAccount has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FinanceAccount could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid FinanceAccount', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->FinanceAccount->save($this->data)) {
				$this->Session->setFlash(__('The FinanceAccount has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FinanceAccount could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FinanceAccount->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for FinanceAccount', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FinanceAccount->del($id)) {
			$this->Session->setFlash(__('FinanceAccount deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>