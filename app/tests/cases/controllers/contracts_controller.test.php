<?php 
/* SVN FILE: $Id$ */
/* ContractsController Test cases generated on: 2009-04-07 10:04:29 : 1239075989*/
App::import('Controller', 'Contracts');

class TestContracts extends ContractsController {
	var $autoRender = false;
}

class ContractsControllerTest extends CakeTestCase {
	var $Contracts = null;

	function setUp() {
		$this->Contracts = new TestContracts();
		$this->Contracts->constructClasses();
	}

	function testContractsControllerInstance() {
		$this->assertTrue(is_a($this->Contracts, 'ContractsController'));
	}

	function tearDown() {
		unset($this->Contracts);
	}
}
?>