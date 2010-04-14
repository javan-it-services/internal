<?php 
/* SVN FILE: $Id$ */
/* Client Test cases generated on: 2009-04-07 10:04:19 : 1239076039*/
App::import('Model', 'Client');

class ClientTestCase extends CakeTestCase {
	var $Client = null;
	var $fixtures = array('app.client', 'app.project');

	function startTest() {
		$this->Client =& ClassRegistry::init('Client');
	}

	function testClientInstance() {
		$this->assertTrue(is_a($this->Client, 'Client'));
	}

	function testClientFind() {
		$this->Client->recursive = -1;
		$results = $this->Client->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Client' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'address'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'contact_person'  => 'Lorem ipsum dolor sit amet',
			'email'  => 'Lorem ipsum dolor sit amet',
			'phone'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2009-04-07 10:47:19',
			'updated'  => '2009-04-07 10:47:19'
		));
		$this->assertEqual($results, $expected);
	}
}
?>