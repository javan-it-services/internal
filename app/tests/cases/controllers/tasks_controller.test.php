<?php 
/* SVN FILE: $Id$ */
/* TasksController Test cases generated on: 2009-04-07 10:04:25 : 1239076225*/
App::import('Controller', 'Tasks');

class TestTasks extends TasksController {
	var $autoRender = false;
}

class TasksControllerTest extends CakeTestCase {
	var $Tasks = null;

	function setUp() {
		$this->Tasks = new TestTasks();
		$this->Tasks->constructClasses();
	}

	function testTasksControllerInstance() {
		$this->assertTrue(is_a($this->Tasks, 'TasksController'));
	}

	function tearDown() {
		unset($this->Tasks);
	}
}
?>