<?php
class Task extends AppModel {

	var $name = 'Task';
    var $order = "Task.created DESC";

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Creator' => array(
			'className' => 'User',
			'foreignKey' => 'creator_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Taskstatus' => array(
			'className' => 'Taskstatus',
			'foreignKey' => 'taskstatus_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Document' => array(
			'className' => 'Document',
			'foreignKey' => 'task_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Tasknote' => array(
			'className' => 'Tasknote',
			'foreignKey' => 'task_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

    function getOverdue($userId){
        $param = array( 'conditions' => array('Task.user_id' => $userId,'deadline'=>"> ".date("Y-m-d"),'Taskstatus.name'=>"finish"), //array of conditions
                       'recursive' => 1, //int
                       'order' => 'Task.deadline', //string or array defining order
                       );
        return $this->find("all",$param);
    }
    function getPending($userId){
        $param = array( 'conditions' => array('Task.user_id' => $userId,'Taskstatus.name'=>"pending"), //array of conditions
                       'recursive' => 1, //int
                       'order' => 'Task.deadline', //string or array defining order
                       );
        return $this->find("all",$param);
    }
    function getActive($userId){
        $param = array( 'conditions' => array('Task.user_id' => $userId, 'Taskstatus.name'=>"active"), //array of conditions
                       'recursive' => 1, //int
                       'order' => 'Task.deadline', //string or array defining order
                       );
        return $this->find("all",$param);
    }
    function getFinished($userId){
        $param = array( 'conditions' => array('Task.user_id' => $userId, 'Taskstatus.name'=>"finish"), //array of conditions
                       'recursive' => 1, //int
                       'order' => 'Task.deadline', //string or array defining order
                       );
        return $this->find("all",$param);
    }
}
?>
