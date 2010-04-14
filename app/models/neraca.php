<?php
class Neraca extends AppModel {

	var $name = 'Neraca';
	var $displayField = 'nama';
	var $validate = array(
		'nama' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Bukubesar' => array(
			'className' => 'Bukubesar',
			'foreignKey' => 'neraca_id',
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