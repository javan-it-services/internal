<?php
class AccountingAccountsController extends AppController {

	var $name = 'AccountingAccounts';
	var $helpers = array('Html', 'Form');
	
	function __construct()
	{
		parent::__construct();
		$this->set("modul","accounting");
		$this->set("submodul","admin");
		$this->set("current","account");
		
	}
	
	
	function index() {
		
		$this->set('accounts', $this->AccountingAccount->getAccountTree());
	}

	function add() {
		if (!empty($this->data)) {
			
			if ($this->data['AccountingAccount']['parent_id']  != 0) {
				$parent = $this->AccountingAccount->read(null,$this->data['AccountingAccount']['parent_id']);
				$this->data['AccountingAccount']['account_type']  = $parent['AccountingAccount']['account_type'];
				$this->data['AccountingAccount']['display']  = $parent['AccountingAccount']['display'];
			}
			
			if ($this->data['AccountingAccount']['account_type']  == 'AKTIVA') {
				$this->data['AccountingAccount']['estimates'] = 'DEBIT';
			} else {
				$this->data['AccountingAccount']['estimates'] = 'CREDIT';
			}
			
			
			
			$this->AccountingAccount->create();
			if ($this->AccountingAccount->save($this->data)) {
				
				$this->flash(__('AccountingAccount saved.', true), array('action' => 'index'));
				
			} else {
			}
		}
		$parents = $this->AccountingAccount->ParentAccount->find('list',array(
			'order' => 'ParentAccount.id'
		));
		$this->set(compact('parents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid AccountingAccount', true), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			
			
			if ($this->data['AccountingAccount']['parent_id']  != 0) {
				$parent = $this->AccountingAccount->read(null,$this->data['AccountingAccount']['parent_id']);
				$this->data['AccountingAccount']['account_type']  = $parent['AccountingAccount']['account_type'];
				$this->data['AccountingAccount']['display']  = $parent['AccountingAccount']['display'];
			}
			
			if ($this->data['AccountingAccount']['account_type']  == 'AKTIVA') {
				$this->data['AccountingAccount']['estimates'] = 'DEBIT';
			} else {
				$this->data['AccountingAccount']['estimates'] = 'CREDIT';
			}
			
			if ($this->AccountingAccount->save($this->data)) {
				$this->flash(__('The AccountingAccount has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AccountingAccount->read(null, $id);
		}
		$parents = $this->AccountingAccount->ParentAccount->find('list');
		$this->set(compact('parents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(__('Invalid AccountingAccount', true), array('action' => 'index'));
		}
		if ($this->AccountingAccount->del($id)) {
			$this->flash(__('AccountingAccount deleted', true), array('action' => 'index'));
			$this->AccountingAccount->query("DELETE FROM accounting_accounts WHERE parent_id = $id");
		}
		$this->flash(__('The AccountingAccount could not be deleted. Please, try again.', true), array('action' => 'index'));
	}

}
?>
