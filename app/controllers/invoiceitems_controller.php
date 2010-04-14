<?php
class InvoiceitemsController extends AppController {

	var $name = 'Invoiceitems';
	var $helpers = array (
		'Html',
		'Form',
		'Ajax'
	);
	var $components = array (
		'RequestHandler'
	);

	function index($invoice_id = null) {
		if ($this->RequestHandler->isAjax()) {
			$this->Invoiceitem->recursive = 0;
			$this->set('invoiceitems', $this->Invoiceitem->find('all', array (
				'Invoiceitem.invoice_id' => $invoice_id
			)));
			$this->render("ajax_index");
			$this->layout = 'ajax';
		} else {
			$this->Invoiceitem->recursive = 0;
			$this->set('invoiceitems', $this->paginate());
		}

	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Invoiceitem.', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
		$this->set('invoiceitem', $this->Invoiceitem->read(null, $id));
	}

	function add() {
		if (!empty ($this->data)) {
			$this->Invoiceitem->create();
			if ($this->Invoiceitem->save($this->data)) {
				$this->Session->setFlash(__('The Invoiceitem has been saved', true));
				if ($this->RequestHandler->isAjax()) {
					$this->Invoiceitem->recursive = 0;
					$this->set('invoiceitems', $this->Invoiceitem->find('all', array (
						'Invoiceitem.invoice_id' => $this->data['Invoiceitem']['invoice_id']
					)));
					$this->render("ajax_index");
					$this->layout = 'ajax';
				} else {
					$this->redirect(array (
						'action' => 'index'
					));
				}

			} else {
				$this->Session->setFlash(__('The Invoiceitem could not be saved. Please, try again.', true));
			}
		}
		$invoices = $this->Invoiceitem->Invoice->find('list');
		$this->set(compact('invoices'));
	}

	function edit($id = null) {
		if (!$id && empty ($this->data)) {
			$this->Session->setFlash(__('Invalid Invoiceitem', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
		if (!empty ($this->data)) {
			if ($this->Invoiceitem->save($this->data)) {
				$this->Session->setFlash(__('The Invoiceitem has been saved', true));
				$this->redirect(array (
					'action' => 'index'
				));
			} else {
				$this->Session->setFlash(__('The Invoiceitem could not be saved. Please, try again.', true));
			}
		}
		if (empty ($this->data)) {
			$this->data = $this->Invoiceitem->read(null, $id);
		}
		$invoices = $this->Invoiceitem->Invoice->find('list');
		$this->set(compact('invoices'));
	}

	function delete($id = null) {
		if ($this->RequestHandler->isAjax()) {
			$this->Invoiceitem->recursive = 0;
			$old = $this->Invoiceitem->findById($id);
			$this->Invoiceitem->del($id);
			$this->set('invoiceitems', $this->Invoiceitem->find('all', array (
				'Invoiceitem.invoice_id' => $old['Invoiceitem']['invoice_id']
			)));
			$this->render("ajax_index");
			$this->layout = 'ajax';
		} else {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for Invoiceitem', true));
				$this->redirect(array (
					'action' => 'index'
				));
			}
			if ($this->Invoiceitem->del($id)) {
				$this->Session->setFlash(__('Invoiceitem deleted', true));
				$this->redirect(array (
					'action' => 'index'
				));
			}
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