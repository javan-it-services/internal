<?php 
/* SVN FILE: $Id$ */
/* Bukubesar Test cases generated on: 2010-02-01 14:02:06 : 1265007726*/
App::import('Model', 'Bukubesar');

class BukubesarTestCase extends CakeTestCase {
	var $Bukubesar = null;
	var $fixtures = array('app.bukubesar', 'app.neraca', 'app.transaksibukubesar');

	function startTest() {
		$this->Bukubesar =& ClassRegistry::init('Bukubesar');
	}

	function testBukubesarInstance() {
		$this->assertTrue(is_a($this->Bukubesar, 'Bukubesar'));
	}

	function testBukubesarFind() {
		$this->Bukubesar->recursive = -1;
		$results = $this->Bukubesar->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Bukubesar' => array(
			'id'  => 1,
			'neraca_id'  => 1,
			'nama'  => 'Lorem ipsum dolor sit amet',
			'keterangan'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2010-02-01 14:02:06',
			'updated'  => '2010-02-01 14:02:06'
		));
		$this->assertEqual($results, $expected);
	}
}
?>