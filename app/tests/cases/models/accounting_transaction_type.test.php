<?php 
/* SVN FILE: $Id$ */
/* AccountingTransactionType Test cases generated on: 2010-02-02 12:48:43 : 1265089723*/
App::import('Model', 'AccountingTransactionType');

class AccountingTransactionTypeTestCase extends CakeTestCase {
	var $AccountingTransactionType = null;
	var $fixtures = array('app.accounting_transaction_type', 'app.accounting_account', 'app.accounting_account');

	function startTest() {
		$this->AccountingTransactionType =& ClassRegistry::init('AccountingTransactionType');
	}

	function testAccountingTransactionTypeInstance() {
		$this->assertTrue(is_a($this->AccountingTransactionType, 'AccountingTransactionType'));
	}

	function testAccountingTransactionTypeFind() {
		$this->AccountingTransactionType->recursive = -1;
		$results = $this->AccountingTransactionType->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('AccountingTransactionType' => array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_debit_id' => 1,
			'account_credit_id' => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>