<?php 
/* SVN FILE: $Id$ */
/* NeracasController Test cases generated on: 2010-02-01 14:03:12 : 1265007792*/
App::import('Controller', 'Neracas');

class TestNeracas extends NeracasController {
	var $autoRender = false;
}

class NeracasControllerTest extends CakeTestCase {
	var $Neracas = null;

	function startTest() {
		$this->Neracas = new TestNeracas();
		$this->Neracas->constructClasses();
	}

	function testNeracasControllerInstance() {
		$this->assertTrue(is_a($this->Neracas, 'NeracasController'));
	}

	function endTest() {
		unset($this->Neracas);
	}
}
?>