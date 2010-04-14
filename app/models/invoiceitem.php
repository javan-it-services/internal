<?php
class Invoiceitem extends AppModel {

	var $name = 'Invoiceitem';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Invoice' => array(
			'className' => 'Invoice',
			'foreignKey' => 'invoice_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>