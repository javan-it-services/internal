<?php 
/* SVN FILE: $Id$ */
/* Project Test cases generated on: 2009-04-07 10:04:24 : 1239076164*/
App::import('Model', 'Project');

class ProjectTestCase extends CakeTestCase {
	var $Project = null;
	var $fixtures = array('app.project', 'app.client', 'app.user', 'app.task');

	function startTest() {
		$this->Project =& ClassRegistry::init('Project');
	}

	function testProjectInstance() {
		$this->assertTrue(is_a($this->Project, 'Project'));
	}

	function testProjectFind() {
		$this->Project->recursive = -1;
		$results = $this->Project->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Project' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'client_id'  => 1,
			'start'  => '2009-04-07',
			'end'  => '2009-04-07',
			'value'  => '2009-04-07',
			'user_id'  => 1,
			'created'  => '2009-04-07 10:49:24',
			'updated'  => '2009-04-07 10:49:24'
		));
		$this->assertEqual($results, $expected);
	}
}
?>