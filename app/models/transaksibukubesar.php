<?php
class Transaksibukubesar extends AppModel {

	var $name = 'Transaksibukubesar';
	var $validate = array(
		'bukubesar_id' => array('numeric'),
		'keterangan' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Bukubesar' => array(
			'className' => 'Bukubesar',
			'foreignKey' => 'bukubesar_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>