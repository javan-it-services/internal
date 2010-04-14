<?php
class DocumentsController extends AppController {

	var $name = 'Documents';
	var $helpers = array('Html', 'Form');

	function index($type=null) {
        $this->set("modul","document");
        $this->set("submodul","documents");

		$user = $this->Session->read("Auth");
		$this->set("modul","document");
		$this->set("title","Document");
		$this->Document->recursive = 0;

		if($type=="contract"){
			$this->set('documents', $this->paginate("Document","not isnull(Document.contract_id)"));
		}
		elseif($type=="task"){
			$this->set('documents', $this->paginate("Document","not isnull(Document.task_id)"));
		}
		else{
			$this->set('documents', $this->paginate());
			$type = "catalog";
		}
		$this->set("submodul",$type);
		$this->set("type",$type);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Document.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('document', $this->Document->read(null, $id));
	}

	function add() {
        $this->set("modul","page");
        $back['title']='Back to Document List';
        $back['url']='/documents/index';
        $this->set("back", $back);

		if (!empty($this->data)) {
			$this->Document->create();
			$file = $this->data['Document']["file"];
			$this->data['Document']['filename'] = $file['name'];
			$this->data['Document']['user_id']  = $users['User']['id'];
			if ($this->Document->save($this->data)) {
				move_uploaded_file($file['tmp_name'],"files/".$this->Document->getLastInsertID()."_".$file["name"]);
				$this->Session->setFlash(__('The Document has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Document could not be saved. Please, try again.', true));
			}
		}
		$catalogs = $this->Document->Catalog->find('list');
		$contracts = $this->Document->Contract->find('list');
		$users = $this->Document->User->find('list');
		$tasks = $this->Document->Task->find('list');
		$this->set(compact('catalogs', 'contracts', 'users', 'tasks'));
	}

	function edit($id = null) {
        $this->set("modul","page");
        $back['title']='Back to Document List';
        $back['url']='/documents/index';
        $this->set("back", $back);
		$users = $this->Auth->user();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Document', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			$this->data['Document']['user_id'] = $users['User']['id'];
			$file = $this->data['Document']["file"];
			$this->data['Document']['filename'] = $file;

			if ($this->Document->save($this->data)) {
				$this->Session->setFlash(__('The Document has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Document could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Document->read(null, $id);
		}
		$catalogs = $this->Document->Catalog->find('list');
		$contracts = $this->Document->Contract->find('list');
		//$users = $this->Document->User->find('list');
		$users = " User : <b>".$users['User']['id']."</b> ".$users['User']['fullname'];
		$tasks = $this->Document->Task->find('list');
		$this->set(compact('catalogs','contracts','users','tasks'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Document', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Document->del($id)) {
			$this->Session->setFlash(__('Document deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>
