<?php 
/* SVN FILE: $Id$ */
/* Contract Test cases generated on: 2009-04-07 10:04:16 : 1239075976*/
App::import('Model', 'Contract');

class ContractTestCase extends CakeTestCase {
	var $Contract = null;
	var $fixtures = array('app.contract', 'app.user', 'app.document');

	function startTest() {
		$this->Contract =& ClassRegistry::init('Contract');
	}

	function testContractInstance() {
		$this->assertTrue(is_a($this->Contract, 'Contract'));
	}

	function testContractFind() {
		$this->Contract->recursive = -1;
		$results = $this->Contract->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Contract' => array(
			'id'  => 1,
			'user_id'  => 1,
			'duration'  => 1,
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'salary'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2009-04-07 10:46:16',
			'updated'  => '2009-04-07 10:46:16'
		));
		$this->assertEqual($results, $expected);
	}
}
?>