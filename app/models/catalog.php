<?php
class Catalog extends AppModel {

	var $name = 'Catalog';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Document' => array(
			'className' => 'Document',
			'foreignKey' => 'catalog_id',
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