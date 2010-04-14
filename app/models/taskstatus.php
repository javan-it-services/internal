<?php
class Taskstatus extends AppModel {

	var $name = 'Taskstatus';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Task' => array(
			'className' => 'Task',
			'foreignKey' => 'taskstatus_id',
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

}
?>
