<?php
class ProjectsController extends AppController {

	var $name = 'Projects';
	var $helpers = array('Html', 'Form', "Time");
	var $uses = array('Project','UsersProject');

	function index() {
        $this->set("modul","activity");
        $this->set("submodul","projects");
		$user = $this->Session->read("Auth");
		//$this->Project->recursive = 0;
		if($user['User']['group_id']==1){
			$this->set('projects', $this->paginate('Project'));
		}
		else{
			$this->set('projects', $this->paginate('Project',array("User.id"=>$user['User']['id'])));
		}
	}

	function view($id = null) {
        $this->set("modul", "page");
        $back['title']='Back to Project List';
        $back['url']='/projects/index';
        $this->set("back", $back);

		if (!$id) {
			$this->Session->setFlash(__('Invalid Project.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('project', $this->Project->read(null, $id));
	}

	function add() {
        $this->set("modul", "page");
        $back['title']='Back to Project List';
        $back['url']='/projects/index';
        $this->set("back", $back);

		if (!empty($this->data)) {
			$this->Project->create();
			if ($this->Project->save($this->data)) {
				$this->Session->setFlash(__('The Project has been saved', true));
				//foreach($this->data['UsersProject']['user_id'] as $up){
				//	$this->UsersProject->create();
				//	$this->UsersProject->save(array('user_id' =>$up,'project_id'=>$this->Project->id));
				//}
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Project could not be saved. Please, try again.', true));
			}
		}
		$clients = $this->Project->Client->find('list');
		$users = $this->Project->User->find('list',array('fields'=>array('User.fullname')));
		$this->set(compact('clients', 'users'));
	}

	function edit($id = null) {
        $this->set("modul", "page");
        $back['title']='Back to Project List';
        $back['url']='/projects/index';
        $this->set("back", $back);
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Project', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Project->save($this->data)) {
				$this->Session->setFlash(__('The Project has been saved', true));
				//foreach($this->data['UsersProject']['user_id'] as $up){
				//	$this->UsersProject->create();
				//	$this->UsersProject->save(array('user_id' =>$up,'project_id'=>$this->Project->id));
				//}
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Project could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Project->read(null, $id);
		}
		$clients = $this->Project->Client->find('list');
		$users = $this->Project->User->find('list');
		$this->set(compact('clients','users'));
	}
    function team($id){
        $this->set("modul", "page");
        $next['title']="Skip";
        $next['url']='/projects/index';

        $this->data = $this->Project->read(null, $id);
		$users = $this->Project->User->find('list',array('fields'=>array('User.fullname')));

		$this->set(compact('next', 'users'));
    }
    function edit_team($id){
        $this->set("modul", "page");
        $back['title']="Back to project list";
        $back['url']='/projects/index';

        $this->data = $this->Project->read(null, $id);
		$users = $this->Project->User->find('list',array('fields'=>array('User.fullname'),'conditions'=>array("User.id !="=>$this->data['Project']['user_id'])));

		$this->set(compact('back', 'users'));
    }
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Project', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Project->del($id)) {
			$this->Session->setFlash(__('Project deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
