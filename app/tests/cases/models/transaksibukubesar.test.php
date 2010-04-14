<?php 
/* SVN FILE: $Id$ */
/* Transaksibukubesar Test cases generated on: 2010-02-01 14:02:46 : 1265007766*/
App::import('Model', 'Transaksibukubesar');

class TransaksibukubesarTestCase extends CakeTestCase {
	var $Transaksibukubesar = null;
	var $fixtures = array('app.transaksibukubesar', 'app.bukubesar');

	function startTest() {
		$this->Transaksibukubesar =& ClassRegistry::init('Transaksibukubesar');
	}

	function testTransaksibukubesarInstance() {
		$this->assertTrue(is_a($this->Transaksibukubesar, 'Transaksibukubesar'));
	}

	function testTransaksibukubesarFind() {
		$this->Transaksibukubesar->recursive = -1;
		$results = $this->Transaksibukubesar->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Transaksibukubesar' => array(
			'id'  => 1,
			'bukubesar_id'  => 1,
			'tanggal'  => '2010-02-01',
			'keterangan'  => 'Lorem ipsum dolor sit amet',
			'debet'  => 'Lorem ipsum dolor sit amet',
			'kredit'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-02-01 14:02:46',
			'updated'  => '2010-02-01 14:02:46'
		));
		$this->assertEqual($results, $expected);
	}
}
?>