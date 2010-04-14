<?php
class Bukubesar extends AppModel {

	var $name = 'Bukubesar';
	var $validate = array(
		'neraca_id' => array('numeric'),
		'nama' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Neraca' => array(
			'className' => 'Neraca',
			'foreignKey' => 'neraca_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Transaksibukubesar' => array(
			'className' => 'Transaksibukubesar',
			'foreignKey' => 'bukubesar_id',
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