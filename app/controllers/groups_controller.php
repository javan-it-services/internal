<?php
class GroupsController extends AppController {

	var $name = 'Groups';
	var $helpers = array('Html', 'Form');

	function index() {
        $this->set("modul","setting");
        $this->set("submodul","groups");

		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
		
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Group.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('group', $this->Group->read(null, $id));
	}

	function add() {
        $this->set("modul","page");
        $back['title']='Back to Group List';
        $back['url']='/groups/index';
        $this->set("back", $back);
		if (!empty($this->data)) {
			$this->Group->create();
			if ($this->Group->save($this->data)) {
				$aro = new Aro();
				$group = $aro->find(array("model"=>"Group","foreign_key"=>$this->Group->getInsertID()));
				$group['Aro']['alias'] = $this->data['Group']['name'];
				$aro->save($group);
				$this->Session->setFlash(__('The Group has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Group could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
        $this->set("modul","page");
        $back['title']='Back to Group List';
        $back['url']='/groups/index';
        $this->set("back", $back);
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Group', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Group->save($this->data)) {
				$aro = new Aro();
				$group = $aro->find(array("model"=>"Group","foreign_key"=>$this->data['Group']['id']));
				$group['Aro']['alias'] = $this->data['Group']['name'];
				$aro->save($group);
				$this->Session->setFlash(__('The Group has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Group->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Group->del($id)) {
			$this->Session->setFlash(__('Group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
