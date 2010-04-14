<?php 
/* SVN FILE: $Id$ */
/* AccountingTransactionType Fixture generated on: 2010-02-02 12:48:43 : 1265089723*/

class AccountingTransactionTypeFixture extends CakeTestFixture {
	var $name = 'AccountingTransactionType';
	var $table = 'accounting_transaction_types';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'account_debit_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20),
		'account_credit_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'name' => 'Lorem ipsum dolor sit amet',
		'account_debit_id' => 1,
		'account_credit_id' => 1
	));
}
?>