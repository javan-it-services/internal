<?php
class TasknotesController extends AppController {

	var $name = 'Tasknotes';
	var $helpers = array('Html', 'Form', 'Ajax');

	function index() {
		$this->Tasknote->recursive = 0;
		$this->set('tasknotes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Tasknote.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('tasknote', $this->Tasknote->read(null, $id));
	}

	function add($task_id=null) {
		if (!empty($this->data)) {
			$this->Tasknote->create();
			if ($this->Tasknote->save($this->data)) {
				$this->Session->setFlash(__('The Tasknote has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tasknote could not be saved. Please, try again.', true));
			}
		}
		if($task_id){
			$this->Tasknote->Task->recursive = 0;
			$task = $this->Tasknote->Task->read(null,$task_id);
			$this->set("task",$task);
			$this->set("task_id",$task_id);
		}
		$tasks = $this->Tasknote->Task->find('list');
		$this->set(compact('tasks'));
	}
    function ajax_add(){
        $this->layout = "ajax";
        $this->autoRender = false;

        if (!empty($this->data) && ($this->data['Tasknote']['note'])) {
            $this->autoRender = true;
			$this->Tasknote->create();
            $this->data['Tasknote']['user_id'] = $this->currentUser['id'];
			if ($this->Tasknote->save($this->data)) {
                $note = $this->Tasknote->findById($this->Tasknote->id);
                $this->set("note", $note);

			} else {
                $ajaxResponse = "<div class='note'><span class='error'>Ooops, there is an unexpected error. Try again later.</span></div>";
                echo $ajaxResponse;
			}
		}
    }
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Tasknote', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tasknote->save($this->data)) {
				$this->Session->setFlash(__('The Tasknote has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tasknote could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tasknote->read(null, $id);
		}
		$tasks = $this->Tasknote->Task->find('list');
		$this->set(compact('tasks'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Tasknote', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Tasknote->del($id)) {
			$this->autoRender = false;
            echo $id;
            //$this->redirect(array('action'=>'index'));
		}
	}


}
?>
