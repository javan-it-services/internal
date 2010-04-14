<?php 
/* SVN FILE: $Id$ */
/* AccountingBukuBesar Test cases generated on: 2010-02-03 14:25:32 : 1265181932*/
App::import('Model', 'AccountingBukuBesar');

class AccountingBukuBesarTestCase extends CakeTestCase {
	var $AccountingBukuBesar = null;
	var $fixtures = array('app.accounting_buku_besar', 'app.accounting_transaction', 'app.accounting_account');

	function startTest() {
		$this->AccountingBukuBesar =& ClassRegistry::init('AccountingBukuBesar');
	}

	function testAccountingBukuBesarInstance() {
		$this->assertTrue(is_a($this->AccountingBukuBesar, 'AccountingBukuBesar'));
	}

	function testAccountingBukuBesarFind() {
		$this->AccountingBukuBesar->recursive = -1;
		$results = $this->AccountingBukuBesar->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('AccountingBukuBesar' => array(
			'id' => 1,
			'accounting_transaction_id' => 1,
			'accounting_account_id' => 1,
			'amount' => 1,
			'created' => '2010-02-03 14:25:32',
			'modified' => '2010-02-03 14:25:32'
		));
		$this->assertEqual($results, $expected);
	}
}
?>