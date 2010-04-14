<?php
class Client extends AppModel {

	var $name = 'Client';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'client_id',
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