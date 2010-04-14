<?php 
/* SVN FILE: $Id$ */
/* Document Fixture generated on: 2009-04-07 10:04:08 : 1239076388*/

class DocumentFixture extends CakeTestFixture {
	var $name = 'Document';
	var $table = 'documents';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'catalog_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'name' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'description' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'filename' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'contract_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'user_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'task_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'catalog_id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'description'  => 1,
		'filename'  => 'Lorem ipsum dolor sit amet',
		'contract_id'  => 1,
		'user_id'  => 1,
		'task_id'  => 1
	));
}
?>