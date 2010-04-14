<?php 
/* SVN FILE: $Id$ */
/* AccountingTransaction Test cases generated on: 2010-02-02 13:07:48 : 1265090868*/
App::import('Model', 'AccountingTransaction');

class AccountingTransactionTestCase extends CakeTestCase {
	var $AccountingTransaction = null;
	var $fixtures = array('app.accounting_transaction', 'app.accounting_transaction_type');

	function startTest() {
		$this->AccountingTransaction =& ClassRegistry::init('AccountingTransaction');
	}

	function testAccountingTransactionInstance() {
		$this->assertTrue(is_a($this->AccountingTransaction, 'AccountingTransaction'));
	}

	function testAccountingTransactionFind() {
		$this->AccountingTransaction->recursive = -1;
		$results = $this->AccountingTransaction->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('AccountingTransaction' => array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'accounting_transaction_type_id' => 1,
			'amount' => 1,
			'timetransaction' => 1,
			'description' => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>