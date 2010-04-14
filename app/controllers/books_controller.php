<?php
class BooksController extends AppController {

	var $name = 'Books';
	var $helpers = array('Html', 'Form');

	function index() {
        $this->set("modul","finance");
        $this->set("submodul","books");

		$this->Book->recursive = 0;
		$param = array('fields'=>array('Book.id','Book.name','Book.description','SUM(Transaction.amount) as saldo'), 'group' => 'Book.id');
		$this->Book->recursive = 1;
		$this->set('books', $this->Book->getAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Book.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('book', $this->Book->read(null, $id));
	}

	function add() {
        $this->set("modul", "page");
        $back['title']='Back to book list';
        $back['url']='/books/index';
        $this->set("back", $back);

		if (!empty($this->data)) {
			$this->Book->create();
			if ($this->Book->save($this->data)) {
				$this->Session->setFlash(__('The Book has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Book could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
        $this->set("modul", "page");
        $back['title']='Back to book list';
        $back['url']='/books/index';
        $this->set("back", $back);

		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Book', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Book->save($this->data)) {
				$this->Session->setFlash(__('The Book has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Book could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Book->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Book', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Book->del($id)) {
			$this->Session->setFlash(__('Book deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
