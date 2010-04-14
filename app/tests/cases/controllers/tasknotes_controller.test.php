<?php 
/* SVN FILE: $Id$ */
/* TasknotesController Test cases generated on: 2009-04-07 10:04:15 : 1239076275*/
App::import('Controller', 'Tasknotes');

class TestTasknotes extends TasknotesController {
	var $autoRender = false;
}

class TasknotesControllerTest extends CakeTestCase {
	var $Tasknotes = null;

	function setUp() {
		$this->Tasknotes = new TestTasknotes();
		$this->Tasknotes->constructClasses();
	}

	function testTasknotesControllerInstance() {
		$this->assertTrue(is_a($this->Tasknotes, 'TasknotesController'));
	}

	function tearDown() {
		unset($this->Tasknotes);
	}
}
?>