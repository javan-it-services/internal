<?php 
/* SVN FILE: $Id$ */
/* AccountingAccountsController Test cases generated on: 2010-02-02 13:20:40 : 1265091640*/
App::import('Controller', 'AccountingAccounts');

class TestAccountingAccounts extends AccountingAccountsController {
	var $autoRender = false;
}

class AccountingAccountsControllerTest extends CakeTestCase {
	var $AccountingAccounts = null;

	function startTest() {
		$this->AccountingAccounts = new TestAccountingAccounts();
		$this->AccountingAccounts->constructClasses();
	}

	function testAccountingAccountsControllerInstance() {
		$this->assertTrue(is_a($this->AccountingAccounts, 'AccountingAccountsController'));
	}

	function endTest() {
		unset($this->AccountingAccounts);
	}
}
?>