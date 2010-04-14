<?php 
/* SVN FILE: $Id$ */
/* Neraca Test cases generated on: 2010-02-01 14:02:29 : 1265007749*/
App::import('Model', 'Neraca');

class NeracaTestCase extends CakeTestCase {
	var $Neraca = null;
	var $fixtures = array('app.neraca', 'app.bukubesar');

	function startTest() {
		$this->Neraca =& ClassRegistry::init('Neraca');
	}

	function testNeracaInstance() {
		$this->assertTrue(is_a($this->Neraca, 'Neraca'));
	}

	function testNeracaFind() {
		$this->Neraca->recursive = -1;
		$results = $this->Neraca->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Neraca' => array(
			'id'  => 1,
			'nama'  => 'Lorem ipsum dolor sit amet',
			'keterangan'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2010-02-01 14:02:29',
			'updated'  => '2010-02-01 14:02:29'
		));
		$this->assertEqual($results, $expected);
	}
}
?>