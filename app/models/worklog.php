<?php
class Worklog extends AppModel {

	var $name = 'Worklog';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Log' => array(
			'className' => 'Log',
			'foreignKey' => 'worklog_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'Log.created DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>
