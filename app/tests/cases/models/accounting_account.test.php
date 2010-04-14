<?php 
/* SVN FILE: $Id$ */
/* AccountingAccount Test cases generated on: 2010-02-02 13:19:31 : 1265091571*/
App::import('Model', 'AccountingAccount');

class AccountingAccountTestCase extends CakeTestCase {
	var $AccountingAccount = null;
	var $fixtures = array('app.accounting_account', 'app.parent');

	function startTest() {
		$this->AccountingAccount =& ClassRegistry::init('AccountingAccount');
	}

	function testAccountingAccountInstance() {
		$this->assertTrue(is_a($this->AccountingAccount, 'AccountingAccount'));
	}

	function testAccountingAccountFind() {
		$this->AccountingAccount->recursive = -1;
		$results = $this->AccountingAccount->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('AccountingAccount' => array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>