<?php 
/* SVN FILE: $Id$ */
/* Book Test cases generated on: 2009-04-07 10:04:00 : 1239073260*/
App::import('Model', 'Book');

class BookTestCase extends CakeTestCase {
	var $Book = null;
	var $fixtures = array('app.book', 'app.transaction');

	function startTest() {
		$this->Book =& ClassRegistry::init('Book');
	}

	function testBookInstance() {
		$this->assertTrue(is_a($this->Book, 'Book'));
	}

	function testBookFind() {
		$this->Book->recursive = -1;
		$results = $this->Book->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Book' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2009-04-07 10:01:00',
			'updated'  => '2009-04-07 10:01:00'
		));
		$this->assertEqual($results, $expected);
	}
}
?>