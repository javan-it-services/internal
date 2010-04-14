<?php 
/* SVN FILE: $Id$ */
/* BooksController Test cases generated on: 2009-04-07 10:04:21 : 1239073281*/
App::import('Controller', 'Books');

class TestBooks extends BooksController {
	var $autoRender = false;
}

class BooksControllerTest extends CakeTestCase {
	var $Books = null;

	function setUp() {
		$this->Books = new TestBooks();
		$this->Books->constructClasses();
	}

	function testBooksControllerInstance() {
		$this->assertTrue(is_a($this->Books, 'BooksController'));
	}

	function tearDown() {
		unset($this->Books);
	}
}
?>