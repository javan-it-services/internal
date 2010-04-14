<?php 
/* SVN FILE: $Id$ */
/* AccountingTransactionsController Test cases generated on: 2010-02-02 13:08:12 : 1265090892*/
App::import('Controller', 'AccountingTransactions');

class TestAccountingTransactions extends AccountingTransactionsController {
	var $autoRender = false;
}

class AccountingTransactionsControllerTest extends CakeTestCase {
	var $AccountingTransactions = null;

	function startTest() {
		$this->AccountingTransactions = new TestAccountingTransactions();
		$this->AccountingTransactions->constructClasses();
	}

	function testAccountingTransactionsControllerInstance() {
		$this->assertTrue(is_a($this->AccountingTransactions, 'AccountingTransactionsController'));
	}

	function endTest() {
		unset($this->AccountingTransactions);
	}
}
?>