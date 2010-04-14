<?php
class TasksController extends AppController {

	var $name = 'Tasks';
	var $helpers = array('Html', 'Form', 'Ajax', 'Time');
	var $components = array("Session","Email", "RequestHandler");

	function index() {
        $this->set("modul","activity");
        $this->set("submodul","tasks");

		$user = $this->Session->read("Auth");
        $this->set("current", "list");
		$this->Task->recursive = 2;

		if($user['User']['group_id']==ROLE_ADMIN){
			$this->set('tasks', $this->paginate());
		}
		else{
			$this->set('tasks', $this->paginate(array("OR"=>array("Creator.id"=>$user['User']['id'], "User.id"=>$user['User']['id']))));
		}
	}
	function pending() {
        $this->set("modul","activity");
        $this->set("submodul","tasks");
		$user = $this->Session->read("Auth");
        $this->set("current", "pending");
		$this->Task->recursive = 2;
		if($user['User']['group_id']==1){
			$this->set('tasks', $this->paginate(array('Taskstatus.name'=>"pending")));
		}
		else{
			$this->set('tasks', $this->paginate(array("User.id"=>$user['User']['id'],'Taskstatus.name'=>"pending")));
		}
        $this->render(null,null,"index");

	}
	function active() {
        $this->set("modul","activity");
        $this->set("submodul","tasks");
		$user = $this->Session->read("Auth");
        $this->set("current", "active");
		$this->Task->recursive = 2;
		if($user['User']['group_id']==1){
			$this->set('tasks', $this->paginate(array('Taskstatus.name'=>"active")));
		}
		else{
			$this->set('tasks', $this->paginate(array("User.id"=>$user['User']['id'],'Taskstatus.name'=>"active")));
		}
        $this->render(null,null,"index");

	}
	function finished() {
        $this->set("modul","activity");
        $this->set("submodul","tasks");
		$user = $this->Session->read("Auth");
        $this->set("current", "finished");
		$this->Task->recursive = 1;
		if($user['User']['group_id']==1){
			$this->set('tasks', $this->paginate(array('Taskstatus.name'=>"finish")));
		}
		else{
			$this->set('tasks', $this->paginate(array("User.id"=>$user['User']['id'],'Taskstatus.name'=>"finish")));
		}
        $this->render(null,null,"index");

	}
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Task.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('task', $this->Task->read(null, $id));
	}

	function add($project_id=null) {
        $this->set("modul", "page");
        $back['title']='Back to Tasklist';
        $back['url']='/tasks/index';
        $this->set("back", $back);

		$this->Email->from = "contact@javan.web.id";

		if (!empty($this->data)) {
			$this->Task->create();
            $this->data['Task']['creator_id'] = $this->currentUser['id'];
			if ($this->Task->save($this->data)) {
				$user = new User();
				$user->recursive = 0;
				$assigned = $user->findById($this->data['Task']['user_id']);
				$this->Email->from = "contact@javan.web.id";
				$this->Email->to = $assigned['User']['email'];
				$this->Email->subject = "JAVAN : You are Assigned a Task";
				$this->Email->send("You are assigned task {$this->data['Task']['name']} : {$this->data['Task']['description']}. Please login to for more information http://internal.javan.web.id/");
				$this->Session->setFlash(__('The Task has been saved', true));

				if(isset($this->data['files'])){
                    $file_dir = WWW_ROOT .'files'.DS.'tasks'.DS.$this->Task->id;
                    if(!is_dir($file_dir))
					mkdir($file_dir);
					$doc = new Document();
					foreach($this->data['files'] as $file){
						$doc->create();
						$path = WWW_ROOT .'files'.DS.'tasks'.DS.$this->Task->id .'/'.$file;
						rename(WWW_ROOT .'files'.DS.'tmp'.DS.$file, $path);
						$d['Document']['task_id'] = $this->Task->id;
						$d['Document']['filename'] = $file;
						$d['Document']['fullpath'] = $path;
						$doc->save($d);
					}
				}
                $this->redirect("/tasks/index");exit();
			} else {
				$this->Session->setFlash(__('The Task could not be saved. Please, try again.', true));
			}
		}else{
            $this->clearDir(WWW_ROOT .'files'.DS.'tmp');
        }

		if($project_id){
			$this->Task->Project->recursive = 0;
			$project = $this->Task->Project->read(null,$project_id);
			$this->set("project",$project);
			$this->set("project_id",$project_id);
		}
		$users = $this->Task->User->find('list');
        foreach($users as $key=>$user){
            if($key==$this->currentUser['id'])
                $users[$key] = "(Myself)";
        }
		$projects = $this->Task->Project->find('list');
		$this->set(compact('users', 'projects'));
	}
	function edit($id = null) {
        $this->set("modul", "page");
        $back['title']='Back to Tasklist';
        $back['url']='/tasks/index';
        $this->set("back", $back);

		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Task', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Task->save($this->data)) {
				$this->Session->setFlash(__('The Task has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Task could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Task->read(null, $id);
		}
		$projects = $this->Task->Project->find('list');
		$users = $this->Task->User->find('list');
        foreach($users as $key=>$user){
            if($key==$this->currentUser['id'])
                $users[$key] = "(Myself)";
        }
		$this->set(compact('users', 'projects'));
	}
	function ajax_add($project_id=null) {
		$this->Email->from = "contact@javan.web.id";
        $this->set("current", "assign");
		$this->set('closeModalbox', false);

		if (!empty($this->data)) {
			$this->Task->create();
            $this->data['Task']['creator_id'] = $this->currentUser['id'];
			if ($this->Task->save($this->data)) {
				$user = new User();
				$user->recursive = 0;
				$assigned = $user->findById($this->data['Task']['user_id']);
				$this->Email->from = "contact@javan.web.id";
				$this->Email->to = $assigned['User']['email'];
				$this->Email->subject = "JAVAN : You are Assigned a Task";
				$this->Email->send("You are assigned task {$this->data['Task']['name']} : {$this->data['Task']['description']}. Please login to for more information http://internal.javan.web.id/");
				$this->Session->setFlash(__('The Task has been saved', true));
				if (! $this->RequestHandler->isAjax()) {
					// redirect back to index page
					$this->redirect($this->referer());
				}
				if(isset($this->data['files'])){
					mkdir(WWW_ROOT .'files/tasks/'.$this->Task->id);
					$doc = new Document();
					foreach($this->data['files'] as $file){
						$doc->create();
						$path = WWW_ROOT .'files/tasks/'.$this->Task->id .'/'.$file;
						rename(WWW_ROOT .'files/tmp/'.$file, $path);
						$d['Document']['task_id'] = $this->Task->id;
						$d['Document']['filename'] = $file;
						$d['Document']['fullpath'] = $path;
						$doc->save($d);
					}
				}
				// else
				$this->set('closeModalbox', true);
			} else {
				$this->Session->setFlash(__('The Task could not be saved. Please, try again.', true));
			}
		}

		if($project_id){
			$this->Task->Project->recursive = 0;
			$project = $this->Task->Project->read(null,$project_id);
			$this->set("project",$project);
			$this->set("project_id",$project_id);
		}
		$users = $this->Task->User->find('list',array(
			'conditions' => array('User.id !='=>$this->currentUser['id'] )
		));
		$projects = $this->Task->Project->find('list');
		$this->set(compact('users', 'projects'));
	}

	function ajax_edit($id = null) {
		$this->set('closeModalbox', false);
		if (!empty($this->data)) {
			$this->Task->create();
			if ($this->Task->save($this->data)) {
				$this->Session->setFlash(__('The Task has been saved', true));
				if (! $this->RequestHandler->isAjax()) {
					// redirect back to index page
					$this->redirect(array('action' => 'index'));
				}
				// else
				$this->set('closeModalbox', true);
			} else {
				$this->Session->setFlash(__('The Task could not be saved. Please, try again.', true));
			}
		}else{
            $users = $this->Task->User->find('list',array(
				'conditions' => array('User.id !='=>$this->currentUser['id'] )
			));
            $projects = $this->Task->Project->find('list');
            $taskstatuses = $this->Task->Taskstatus->find('list');
            $this->set(compact('users', 'projects', 'taskstatuses'));
			$this->data = $this->Task->read(null, $id);
        }


	}

	function ajax_upload(){
		$this->layout = 'ajax';
		Configure::write('debug', 0);
		$filename = $_FILES['file']['name'];
		if (move_uploaded_file($_FILES['file']['tmp_name'], WWW_ROOT .'files/tmp/'.$filename)) {
			echo $filename;
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Task', true));
			$this->redirect($this->referer());
		}

		if ($this->Task->del($id)) {
			$dir = WWW_ROOT . 'files/tasks/'.$id;
            $this->clearDir($dir);
			rmdir($dir);
			$this->Session->setFlash(__('Task deleted', true));
			$this->redirect($this->referer());
		}
	}


	function start($id){
		$task = $this->Task->read(null, $id);
		$task['Task']['started'] = date("Y-m-d h:i:s");
		$this->Task->save($task);
		$this->redirect(array('action'=>'index'));
	}

    function ajax_getActive($user_id=null){

        $this->autoRender = false;
        $this->layout = "ajax";

        $this->set("tasks", $this->Task->getActive($user_id));
        $this->render(null, null, "tasklist");
    }
    function ajax_getPending($user_id=null){

        $this->autoRender = false;
        $this->layout = "ajax";

        $this->set("tasks", $this->Task->getPending($user_id));
        $this->render(null, null, "tasklist");
    }
    function ajax_getFinished($user_id=null){

        $this->autoRender = false;
        $this->layout = "ajax";

        $this->set("tasks", $this->Task->getFinished($user_id));
        $this->render(null, null, "tasklist");
    }

    function ajax_start($id){

        $this->autoRender = false;
        $this->layout = "ajax";

        if($id){

            // get task data
            $task = $this->Task->read(null,$id);
            // check if this task is assigned to current user
            if($task['Task']['user_id'] == $this->auth["User"]["id"]){

                // if not started yet
                if(!$task['Task']['started']){
                    // then set started time to now
                    $task['Task']['started'] = date("Y-m-d h:i:s");
                }

                // set status to 1=active
                $task['Task']['taskstatus_id'] = TASK_ACTIVE;

                // if successfully save
                if($this->Task->save($task)){
                    //echo "<span class='ajax_response notice'>".__("You have started this task.",true)."<span>";
                    echo $task['Task']['started'];
                }
            }

        }
    }

    function ajax_finish($id){

        $this->autoRender = false;
        $this->layout = "ajax";

        if($id){

            // get task data
            $task = $this->Task->read(null,$id);
            // check if this task is assigned to current user
            if($task['Task']['user_id'] == $this->auth["User"]["id"]){
                // then set started time to now
                $task['Task']['finished'] = date("Y-m-d h:i:s");

                // set status to 1=active
                $task['Task']['status'] = TASK_FINISH;

                // if successfully save
                if($this->Task->save($task)){
                    //echo $task['Task']['end'];
                }
            }

        }
    }
	function finish($id){
		$task = $this->Task->read(null, $id);
		$task['Task']['finished'] = date("Y-m-d h:i:s");
		$this->Task->save($task);
		$this->redirect(array('action'=>'index'));
	}

}
?>
