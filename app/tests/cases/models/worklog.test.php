<?php 
/* SVN FILE: $Id$ */
/* Worklog Test cases generated on: 2009-04-07 10:04:37 : 1239075937*/
App::import('Model', 'Worklog');

class WorklogTestCase extends CakeTestCase {
	var $Worklog = null;
	var $fixtures = array('app.worklog', 'app.user');

	function startTest() {
		$this->Worklog =& ClassRegistry::init('Worklog');
	}

	function testWorklogInstance() {
		$this->assertTrue(is_a($this->Worklog, 'Worklog'));
	}

	function testWorklogFind() {
		$this->Worklog->recursive = -1;
		$results = $this->Worklog->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Worklog' => array(
			'id'  => 1,
			'user_id'  => 1,
			'start'  => '2009-04-07 10:45:37',
			'end'  => '2009-04-07 10:45:37',
			'log'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2009-04-07 10:45:37',
			'updated'  => '2009-04-07 10:45:37'
		));
		$this->assertEqual($results, $expected);
	}
}
?>