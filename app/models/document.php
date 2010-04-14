<?php
class Document extends AppModel {

	var $name = 'Document';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Catalog' => array(
			'className' => 'Catalog',
			'foreignKey' => 'catalog_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Contract' => array(
			'className' => 'Contract',
			'foreignKey' => 'contract_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Task' => array(
			'className' => 'Task',
			'foreignKey' => 'task_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>