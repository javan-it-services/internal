<?php 
/* SVN FILE: $Id$ */
/* AccountingAccount Fixture generated on: 2010-02-03 15:31:26 : 1265185886*/

class AccountingAccountFixture extends CakeTestFixture {
	var $name = 'AccountingAccount';
	var $table = 'accounting_accounts';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'nomor' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'key' => 'unique'),
		'parent_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'nama' => array('column' => 'name', 'unique' => 1), 'parent_id' => array('column' => 'parent_id', 'unique' => 0))
	);
	var $records = array(array(
		'id' => 1,
		'nomor' => 'Lorem ipsum dolor sit amet',
		'name' => 'Lorem ipsum dolor sit amet',
		'parent_id' => 1
	));
}
?>