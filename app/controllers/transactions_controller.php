<?php
class TransactionsController extends AppController {

	var $name = 'Transactions';
	var $helpers = array('Html', 'Form');

	function index() {
        $this->set("modul","finance");
        $this->set("submodul","transactions");

		$this->Transaction->recursive = 0;
		$this->set('transactions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Transaction.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('transaction', $this->Transaction->read(null, $id));
	}

	function add() {
        $this->set("modul", "page");
        $back['title']='Back to transaction list';
        $back['url']='/invoices/index';
        $this->set("back", $back);

		if (!empty($this->data)) {
			$this->Transaction->create();
			if($this->data['Transaction']['credit']){
				if($this->data['Transaction']['amount'] <0){
					$this->data['Transaction']['amount'] = $this->data['Transaction']['amount']*(-1);
				}
			}
			else{
				if($this->data['Transaction']['amount'] >=0){
					$this->data['Transaction']['amount'] = $this->data['Transaction']['amount']*(-1);
				}
			}
			if ($this->Transaction->save($this->data)) {
				$this->Session->setFlash(__('The Transaction has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Transaction could not be saved. Please, try again.', true));
			}
		}
		$books = $this->Transaction->Book->find('list');
		$this->set(compact('books'));
	}

	function edit($id = null) {
        $this->set("modul", "page");
        $back['title']='Back to transaction list';
        $back['url']='/invoices/index';
        $this->set("back", $back);

		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Transaction', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if($this->data['Transaction']['credit']){
				if($this->data['Transaction']['amount'] <0){
					$this->data['Transaction']['amount'] = $this->data['Transaction']['amount']*(-1);
				}
			}
			else{
				if($this->data['Transaction']['amount'] >=0){
					$this->data['Transaction']['amount'] = $this->data['Transaction']['amount']*(-1);
				}
			}

			if ($this->Transaction->save($this->data)) {
				$this->Session->setFlash(__('The Transaction has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Transaction could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Transaction->read(null, $id);
		}
		$books = $this->Transaction->Book->find('list');
		$this->set(compact('books'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Transaction', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Transaction->del($id)) {
			$this->Session->setFlash(__('Transaction deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
