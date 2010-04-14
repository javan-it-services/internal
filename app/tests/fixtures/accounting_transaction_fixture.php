<?php 
/* SVN FILE: $Id$ */
/* AccountingTransaction Fixture generated on: 2010-02-02 13:07:45 : 1265090865*/

class AccountingTransactionFixture extends CakeTestFixture {
	var $name = 'AccountingTransaction';
	var $table = 'accounting_transactions';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'accounting_transaction_type_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'index'),
		'amount' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20),
		'timetransaction' => array('type'=>'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'description' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 500),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'accounting_transactions_type_id' => array('column' => 'accounting_transaction_type_id', 'unique' => 0))
	);
	var $records = array(array(
		'id' => 1,
		'name' => 'Lorem ipsum dolor sit amet',
		'accounting_transaction_type_id' => 1,
		'amount' => 1,
		'timetransaction' => 1,
		'description' => 'Lorem ipsum dolor sit amet'
	));
}
?>