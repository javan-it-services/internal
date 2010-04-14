<?php
class Invoice extends AppModel {

	var $name = 'Invoice';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Client' => array(
			'className' => 'Client',
			'foreignKey' => 'client_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Invoiceitem' => array(
			'className' => 'Invoiceitem',
			'foreignKey' => 'invoice_id',
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