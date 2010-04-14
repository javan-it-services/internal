<?php 
/* SVN FILE: $Id$ */
/* WorklogsController Test cases generated on: 2009-04-07 10:04:47 : 1239075947*/
App::import('Controller', 'Worklogs');

class TestWorklogs extends WorklogsController {
	var $autoRender = false;
}

class WorklogsControllerTest extends CakeTestCase {
	var $Worklogs = null;

	function setUp() {
		$this->Worklogs = new TestWorklogs();
		$this->Worklogs->constructClasses();
	}

	function testWorklogsControllerInstance() {
		$this->assertTrue(is_a($this->Worklogs, 'WorklogsController'));
	}

	function tearDown() {
		unset($this->Worklogs);
	}
}
?>