<?php 
/* SVN FILE: $Id$ */
/* BukubesarsController Test cases generated on: 2010-02-01 14:03:25 : 1265007805*/
App::import('Controller', 'Bukubesars');

class TestBukubesars extends BukubesarsController {
	var $autoRender = false;
}

class BukubesarsControllerTest extends CakeTestCase {
	var $Bukubesars = null;

	function startTest() {
		$this->Bukubesars = new TestBukubesars();
		$this->Bukubesars->constructClasses();
	}

	function testBukubesarsControllerInstance() {
		$this->assertTrue(is_a($this->Bukubesars, 'BukubesarsController'));
	}

	function endTest() {
		unset($this->Bukubesars);
	}
}
?>