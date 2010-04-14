<?php 
/* SVN FILE: $Id$ */
/* Task Test cases generated on: 2009-04-07 10:04:14 : 1239076214*/
App::import('Model', 'Task');

class TaskTestCase extends CakeTestCase {
	var $Task = null;
	var $fixtures = array('app.task', 'app.user', 'app.project', 'app.document', 'app.tasknote');

	function startTest() {
		$this->Task =& ClassRegistry::init('Task');
	}

	function testTaskInstance() {
		$this->assertTrue(is_a($this->Task, 'Task'));
	}

	function testTaskFind() {
		$this->Task->recursive = -1;
		$results = $this->Task->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Task' => array(
			'id'  => 1,
			'user_id'  => 1,
			'project_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'started'  => '2009-04-07 10:50:14',
			'finished'  => '2009-04-07 10:50:14',
			'deadline'  => '2009-04-07',
			'created'  => '2009-04-07 10:50:14',
			'updated'  => '2009-04-07 10:50:14'
		));
		$this->assertEqual($results, $expected);
	}
}
?>