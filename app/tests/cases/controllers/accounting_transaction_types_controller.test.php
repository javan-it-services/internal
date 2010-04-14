<?php 
/* SVN FILE: $Id$ */
/* AccountingTransactionTypesController Test cases generated on: 2010-02-02 12:50:32 : 1265089832*/
App::import('Controller', 'AccountingTransactionTypes');

class TestAccountingTransactionTypes extends AccountingTransactionTypesController {
	var $autoRender = false;
}

class AccountingTransactionTypesControllerTest extends CakeTestCase {
	var $AccountingTransactionTypes = null;

	function startTest() {
		$this->AccountingTransactionTypes = new TestAccountingTransactionTypes();
		$this->AccountingTransactionTypes->constructClasses();
	}

	function testAccountingTransactionTypesControllerInstance() {
		$this->assertTrue(is_a($this->AccountingTransactionTypes, 'AccountingTransactionTypesController'));
	}

	function endTest() {
		unset($this->AccountingTransactionTypes);
	}
}
?>