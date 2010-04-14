<?php 
/* SVN FILE: $Id$ */
/* ClientsController Test cases generated on: 2009-04-07 10:04:32 : 1239076052*/
App::import('Controller', 'Clients');

class TestClients extends ClientsController {
	var $autoRender = false;
}

class ClientsControllerTest extends CakeTestCase {
	var $Clients = null;

	function setUp() {
		$this->Clients = new TestClients();
		$this->Clients->constructClasses();
	}

	function testClientsControllerInstance() {
		$this->assertTrue(is_a($this->Clients, 'ClientsController'));
	}

	function tearDown() {
		unset($this->Clients);
	}
}
?>