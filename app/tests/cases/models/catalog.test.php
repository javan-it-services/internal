<?php 
/* SVN FILE: $Id$ */
/* Catalog Test cases generated on: 2009-04-07 10:04:25 : 1239076345*/
App::import('Model', 'Catalog');

class CatalogTestCase extends CakeTestCase {
	var $Catalog = null;
	var $fixtures = array('app.catalog', 'app.document');

	function startTest() {
		$this->Catalog =& ClassRegistry::init('Catalog');
	}

	function testCatalogInstance() {
		$this->assertTrue(is_a($this->Catalog, 'Catalog'));
	}

	function testCatalogFind() {
		$this->Catalog->recursive = -1;
		$results = $this->Catalog->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Catalog' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2009-04-07 10:52:25',
			'updated'  => '2009-04-07 10:52:25'
		));
		$this->assertEqual($results, $expected);
	}
}
?>