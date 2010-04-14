<?php
class WorklogsController extends AppController {

	var $name = 'Worklogs';
	var $helpers = array('Html', 'Form', 'Ajax', 'Time');
    var $components = array('RequestHandler');
	var $uses = array('Worklog','User');

	function index() {
        $this->set("modul","activity");
        $this->set("submodul","worklogs");
		if(isset($this->data['Filter']['user_id']) && $this->data['Filter']['user_id']){
			$conditions["Worklog.user_id"] = $this->data['Filter']['user_id'];
			$this->paginate = array_merge($this->paginate, array('conditions' => $conditions));
		}
        $this->paginate = array_merge($this->paginate, array('order' => "Worklog.created DESC"));

		$user = $this->Session->read("Auth");
		$this->Worklog->recursive = 0;
		if($user['User']['group_id']==1 || $user['User']['group_id']==3){
			$worklogs = $this->paginate('Worklog',array("User.id <>"=>" 1"));
			foreach($worklogs as $key=>$worklog){
				$worklogs[$key]['Log'] = $this->Worklog->Log->find('all',array('conditions'=>array('worklog_id'=>$worklog['Worklog']['id'])));
			}
			$this->set('worklogs', $worklogs);
		}
		else{
			$worklogs = $this->paginate('Worklog',array("User.id"=>$user['User']['id']));
			foreach($worklogs as $key=>$worklog){
				$worklogs[$key]['Log'] = $this->Worklog->Log->find('all',array('conditions'=>array('worklog_id'=>$worklog['Worklog']['id'])));
			}
			$this->set('worklogs', $worklogs);
		}

		$this->set('employees',$this->User->find('list',
			array(
				'conditions' => array('User.group_id' => 2),
				'fields' => array('User.fullname'),
				'recursive' => '0'
			)
		));

	}

	function view($id = null) {
		$worklog =  $this->Worklog->read(null, $id);
		if($this->currentUser["group_id"] != 1 && $this->currentUser["group_id"] != 3){
			if($worklog['User']['group_id'] != $this->currentUser["group_id"]){
				$this->redirect(array('action'=>'index'));
			}
		}

		if (!$id) {
			$this->Session->setFlash(__('Invalid Worklog.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('worklog', $this->Worklog->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Worklog->create();
			if ($this->Worklog->save($this->data)) {
				$this->Session->setFlash(__('The Worklog has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Worklog could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Worklog->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		$worklog =  $this->Worklog->read(null, $id);
		if($this->currentUser["group_id"] != 1){
			if($worklog['User']['group_id'] != $this->currentUser["group_id"]){
				$this->redirect(array('action'=>'index'));
			}
		}
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Worklog', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Worklog->save($this->data)) {
				$this->Session->setFlash(__('The Worklog has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Worklog could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Worklog->read(null, $id);
		}
		$users = $this->Worklog->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		$worklog =  $this->Worklog->read(null, $id);
		if($this->currentUser["group_id"] != 1){
			if($worklog['User']['group_id'] != $this->currentUser["group_id"]){
				$this->redirect(array('action'=>'index'));
			}
		}
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Worklog', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Worklog->del($id)) {
			$this->Session->setFlash(__('Worklog deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function work() {
        $this->set("modul", "dashboard");
		$user = $this->Session->read("Auth");
		$this->data = $today = $this->Worklog->find(array("date(Worklog.start)"=>date("Y-m-d"),"User.id" => $user['User']['id']));
		$this->set("worklog",$today);

        App::import('Model', 'Task');
        $task = new Task();

        $this->set("overdueTasks", $task->getOverdue($user['User']['id']));
        $this->set("pendingTasks", $task->getPending($user['User']['id']));
        $this->set("activeTasks", $task->getActive($user['User']['id']));
        $this->set("finishedTasks", $task->getFinished($user['User']['id']));
	}


	function endwork(){
        $ajaxResponse = "";
		$user = $this->Session->read("Auth");
		$today = $this->Worklog->find(array("date(Worklog.start)"=>date("Y-m-d"),"User.id" => $user['User']['id']));
		//$this->set("today",$today);

		if(isset($this->data['Worklog']['end'])){
			$today['Worklog']['end'] = date("Y-m-d h:i:s");
            $ajaxResponse = substr($today['Worklog']['end'],11,5);
			$save  = $this->Worklog->save($today);
            $this->autoRender = false;
			echo $ajaxResponse;
		}else{
    		$today['Worklog']['log'] = $this->data['Worklog']['log'];
			$log['Log']['content'] = $this->data['Worklog']['log'];
			$log['Log']['worklog_id'] = $today['Worklog']['id'];
			$this->Worklog->Log->save($log);

			$log = $this->Worklog->Log->findById($this->Worklog->Log->getLastInsertId());
			$this->set('log', $log['Log']);
			$this->layout = 'ajax';
			$this->render('log_row');
        }
    //    if($this->RequestHandler->isAjax()){
    //        if(!$save){
    //            $ajaxResponse = '<span id="response" class="error ac">Error when trying to save. Try again later.</span';
    //        }else{
    //            if(!$ajaxResponse)$ajaxResponse = '<tr><td>'.$this->data['Worklog']['log'].'</td><td>???</td></tr>';
    //        }
    //
    //
    //        echo $ajaxResponse;
    //    }else{
    //		$this->redirect(array("action"=>"work"));
    //    }


	}

	function startwork(){
		$user = $this->Session->read("Auth");
		$today = $this->Worklog->find(array("date(Worklog.start)"=>date("Y-m-d"),"User.id" => $user['User']['id']));
		$this->set("today",$today);
		$today['Worklog']['user_id'] = $user['User']['id'];
		$today['Worklog']['start'] = date("Y-m=d h:i:s");
		$this->Worklog->save($today);
		$this->redirect(array("action"=>"work"));
	}

	function log_delete($id){
		$this->Worklog->Log->del($id);
		$this->redirect(array("action"=>"work"));
	}
}
?>
