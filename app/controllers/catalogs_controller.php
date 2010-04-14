<?php
class CatalogsController extends AppController {

	var $name = 'Catalogs';
	var $helpers = array('Html', 'Form');

	function index() {
        $this->set("modul","document");
        $this->set("submodul","catalogs");

		$this->Catalog->recursive = 0;
		$this->set('catalogs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Catalog.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Catalog->recursive = 1
		;
		$this->set('catalog', $this->Catalog->read(null, $id));
	}

	function add() {
        $this->set("modul","page");
        $back['title']='Back to Catalog List';
        $back['url']='/catalogs/index';
        $this->set("back", $back);

		if (!empty($this->data)) {
			$this->Catalog->create();
			if ($this->Catalog->save($this->data)) {
				$this->Session->setFlash(__('The Catalog has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Catalog could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
        $this->set("modul","page");
        $back['title']='Back to Catalog List';
        $back['url']='/catalogs/index';
        $this->set("back", $back);

		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Catalog', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Catalog->save($this->data)) {
				$this->Session->setFlash(__('The Catalog has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Catalog could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Catalog->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Catalog', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Catalog->del($id)) {
			$this->Session->setFlash(__('Catalog deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
