<?php 
/* SVN FILE: $Id$ */
/* Tasknote Test cases generated on: 2009-04-07 10:04:03 : 1239076263*/
App::import('Model', 'Tasknote');

class TasknoteTestCase extends CakeTestCase {
	var $Tasknote = null;
	var $fixtures = array('app.tasknote', 'app.task');

	function startTest() {
		$this->Tasknote =& ClassRegistry::init('Tasknote');
	}

	function testTasknoteInstance() {
		$this->assertTrue(is_a($this->Tasknote, 'Tasknote'));
	}

	function testTasknoteFind() {
		$this->Tasknote->recursive = -1;
		$results = $this->Tasknote->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Tasknote' => array(
			'id'  => 1,
			'task_id'  => 1,
			'note'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2009-04-07 10:51:03',
			'updated'  => '2009-04-07 10:51:03'
		));
		$this->assertEqual($results, $expected);
	}
}
?>