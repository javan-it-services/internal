<?php 
/* SVN FILE: $Id$ */
/* AccountingBukuBesar Fixture generated on: 2010-02-03 14:25:32 : 1265181932*/

class AccountingBukuBesarFixture extends CakeTestFixture {
	var $name = 'AccountingBukuBesar';
	var $table = 'accounting_buku_besars';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'accounting_transaction_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'index'),
		'accounting_account_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20),
		'amount' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'accounting_transaction_id' => array('column' => array('accounting_transaction_id', 'accounting_account_id'), 'unique' => 0))
	);
	var $records = array(array(
		'id' => 1,
		'accounting_transaction_id' => 1,
		'accounting_account_id' => 1,
		'amount' => 1,
		'created' => '2010-02-03 14:25:32',
		'modified' => '2010-02-03 14:25:32'
	));
}
?>