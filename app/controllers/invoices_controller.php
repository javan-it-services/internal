<?php
class InvoicesController extends AppController {

	var $name = 'Invoices';
	var $helpers = array (
		'Html',
		'Form',
		'Ajax'
	);

	function index() {
        $this->set("modul","finance");
        $this->set("submodul","invoices");

		$this->Invoice->recursive = 0;
		$this->set('invoices', $this->paginate());
	}

	function view($id = null) {
        $this->set("modul", "page");
        $back['title']='Back to invoice list';
        $back['url']='/invoices/index';
        $this->set("back", $back);

		if (!$id) {
			$this->Session->setFlash(__('Invalid Invoice.', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
		$this->set('invoice', $this->Invoice->read(null, $id));
	}

	function add() {
        $this->set("modul", "page");
        $back['title']='Back to invoice list';
        $back['url']='/invoices/index';
        $this->set("back", $back);


		if (!empty ($this->data)) {
			$this->Invoice->create();
			if ($this->Invoice->save($this->data)) {
				$this->Session->setFlash(__('The Invoice has been saved', true));
				$this->redirect(array (
					'action' => 'view',
					'id' => $this->Invoice->getLastInsertId()
				));
			} else {
				$this->Session->setFlash(__('The Invoice could not be saved. Please, try again.', true));
			}
		}
		$clients = $this->Invoice->Client->find('list');
		$this->set(compact('clients'));
	}

	function edit($id = null) {
        $this->set("modul", "page");
        $back['title']='Back to invoice list';
        $back['url']='/invoices/index';
        $this->set("back", $back);

		if (!$id && empty ($this->data)) {
			$this->Session->setFlash(__('Invalid Invoice', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
		if (!empty ($this->data)) {
			if ($this->Invoice->save($this->data)) {
				$this->Session->setFlash(__('The Invoice has been saved', true));
				$this->redirect(array (
					'action' => 'index'
				));
			} else {
				$this->Session->setFlash(__('The Invoice could not be saved. Please, try again.', true));
			}
		}
		if (empty ($this->data)) {
			$this->data = $this->Invoice->read(null, $id);
		}
		$clients = $this->Invoice->Client->find('list');
		$this->set(compact('clients'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Invoice', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
		if ($this->Invoice->del($id)) {
			$this->Session->setFlash(__('Invoice deleted', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
	}

	function beforeFilter() {
		parent :: beforeFilter();
		$this->Auth->allowedActions = array (
			'*'
		);
	}

}
?>
