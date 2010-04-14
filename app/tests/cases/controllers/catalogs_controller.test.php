<?php 
/* SVN FILE: $Id$ */
/* CatalogsController Test cases generated on: 2009-04-07 10:04:38 : 1239076358*/
App::import('Controller', 'Catalogs');

class TestCatalogs extends CatalogsController {
	var $autoRender = false;
}

class CatalogsControllerTest extends CakeTestCase {
	var $Catalogs = null;

	function setUp() {
		$this->Catalogs = new TestCatalogs();
		$this->Catalogs->constructClasses();
	}

	function testCatalogsControllerInstance() {
		$this->assertTrue(is_a($this->Catalogs, 'CatalogsController'));
	}

	function tearDown() {
		unset($this->Catalogs);
	}
}
?>