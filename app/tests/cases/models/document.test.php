<?php 
/* SVN FILE: $Id$ */
/* Document Test cases generated on: 2009-04-07 10:04:08 : 1239076388*/
App::import('Model', 'Document');

class DocumentTestCase extends CakeTestCase {
	var $Document = null;
	var $fixtures = array('app.document', 'app.catalog', 'app.contract', 'app.user', 'app.task');

	function startTest() {
		$this->Document =& ClassRegistry::init('Document');
	}

	function testDocumentInstance() {
		$this->assertTrue(is_a($this->Document, 'Document'));
	}

	function testDocumentFind() {
		$this->Document->recursive = -1;
		$results = $this->Document->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Document' => array(
			'id'  => 1,
			'catalog_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'description'  => 1,
			'filename'  => 'Lorem ipsum dolor sit amet',
			'contract_id'  => 1,
			'user_id'  => 1,
			'task_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>