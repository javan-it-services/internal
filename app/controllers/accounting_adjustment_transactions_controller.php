<?php
class AccountingAdjustmentTransactionsController extends AppController {

	var $name = 'AccountingAdjustmentTransactions';
	var $uses = array('AccountingTransaction');
	var $helpers = array('Html', 'Form');
	
	function __construct() {
		parent::__construct();
		$this->set("modul","accounting");
		$this->set("submodul","adjustment_transaction");
		
	}
	
	
	function _filter()
	{
		$from = null;
		$to = null;
		$jurnal_selected_from = null;
		$jurnal_selected_to = null;
		
		if(isset($this->data['FilterTransaction'])){
			
			$jurnal_selected_from = $this->data['FilterTransaction']['created_from'];
			$jurnal_selected_to = $this->data['FilterTransaction']['created_to'];
			
			$from = trim(implode('-',array_values($this->data['FilterTransaction']['created_from'])),'-') . ' 00:00:00';
			$to = trim(implode('-',array_values($this->data['FilterTransaction']['created_to'])),'-') .' 23:59:59';
			

			
			
			$this->Session->write('FilterTransaction.created_from',$from);
			$this->Session->write('FilterTransaction.selected_from',$jurnal_selected_from);
			
			$this->Session->write('FilterTransaction.created_to',$to);
			$this->Session->write('FilterTransaction.selected_to',$jurnal_selected_to);
			
		} else {
			if($this->Session->check('FilterTransaction')){
				$from = $this->Session->read('FilterTransaction.created_from');
				$to = $this->Session->read('FilterTransaction.created_to');
				
				$jurnal_selected_from = $this->Session->read('FilterTransaction.selected_from');
				$jurnal_selected_to = $this->Session->read('FilterTransaction.selected_to');
			}
		}
		if($from !== null) {
			$this->paginate['conditions'] = array(
				'AccountingTransaction.created >= ' => $from,
				'AccountingTransaction.created <= ' => $to
			);
		}
		$this->paginate['conditions']['AccountingTransaction.adjustment'] = true;
		$this->set('jurnal_selected_from',$jurnal_selected_from);
		$this->set('jurnal_selected_to',$jurnal_selected_to);
	}
	
	function index() {
		$this->_filter();
		$this->AccountingTransaction->recursive = 1;
		$this->set('accountingTransactions', $this->paginate());
	}

	function add() {
		if (!empty($this->data)) {
			
			$this->AccountingTransaction->create();
			$this->data['AccountingTransaction']['adjustment'] = true;
			if ($this->AccountingTransaction->save($this->data)) {
				
				$this->flash(__('AccountingTransaction saved.', true), array('action' => 'index'));
			} else {
			}
		}
		
		$account_debits = $this->AccountingTransaction->AccountDebit->find('list');
		$account_credits = $this->AccountingTransaction->AccountCredit->find('list');
		
		$this->set(compact('account_debits','account_credits'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid AccountingTransaction', true), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['AccountingTransaction']['adjustment'] = true;
			if ($this->AccountingTransaction->save($this->data)) {
				$this->flash(__('The AccountingTransaction has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AccountingTransaction->read(null, $id);
		}
		$account_debits = $this->AccountingTransaction->AccountDebit->find('list');
		$account_credits = $this->AccountingTransaction->AccountCredit->find('list');
		
		$this->set(compact('account_debits','account_credits'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(__('Invalid AccountingTransaction', true), array('action' => 'index'));
		}
		if ($this->AccountingTransaction->del($id)) {
			$this->flash(__('AccountingTransaction deleted', true), array('action' => 'index'));
		}
		$this->flash(__('The AccountingTransaction could not be deleted. Please, try again.', true), array('action' => 'index'));
	}

}

