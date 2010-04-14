<?php 
/* SVN FILE: $Id$ */
/* TransactionsController Test cases generated on: 2009-04-07 10:04:45 : 1239073305*/
App::import('Controller', 'Transactions');

class TestTransactions extends TransactionsController {
	var $autoRender = false;
}

class TransactionsControllerTest extends CakeTestCase {
	var $Transactions = null;

	function setUp() {
		$this->Transactions = new TestTransactions();
		$this->Transactions->constructClasses();
	}

	function testTransactionsControllerInstance() {
		$this->assertTrue(is_a($this->Transactions, 'TransactionsController'));
	}

	function tearDown() {
		unset($this->Transactions);
	}
}
?>