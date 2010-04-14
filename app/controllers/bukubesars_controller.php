<?php
class BukubesarsController extends AppController {

	var $name = 'Bukubesars';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Bukubesar->recursive = 0;
		$this->set('bukubesars', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Bukubesar.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('bukubesar', $this->Bukubesar->read(null, $id));
		$this->set('transaksi',$this->Bukubesar->Transaksibukubesar->findAll(array('bukubesar_id'=>$id)));
	}

	function add($neraca_id=null) {
		if (!empty($this->data)) {
			$this->Bukubesar->create();
			if ($this->Bukubesar->save($this->data)) {
				$this->Session->setFlash(__('The Bukubesar has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Bukubesar could not be saved. Please, try again.', true));
			}
		}
		$this->data['Bukubesar']['neraca_id'] = $neraca_id;
		$neracas = $this->Bukubesar->Neraca->find('list');		
		$this->set(compact('neracas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Bukubesar', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Bukubesar->save($this->data)) {
				$this->Session->setFlash(__('The Bukubesar has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Bukubesar could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Bukubesar->read(null, $id);
		}
		$neracas = $this->Bukubesar->Neraca->find('list');
		$this->set(compact('neracas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Bukubesar', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Bukubesar->del($id)) {
			$this->Session->setFlash(__('Bukubesar deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	function tambahtransaksi() {
		$this->redirect(array('action'=>'view',$this->data['Transaksibukubesar']['bukubesar_id']));
	}

}
?>