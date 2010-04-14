<?php
class Transaction extends AppModel {

	var $name = 'Transaction';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Book' => array(
			'className' => 'Book',
			'foreignKey' => 'book_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>