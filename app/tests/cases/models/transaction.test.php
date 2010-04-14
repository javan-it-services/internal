<?php 
/* SVN FILE: $Id$ */
/* Transaction Test cases generated on: 2009-04-07 10:04:10 : 1239073270*/
App::import('Model', 'Transaction');

class TransactionTestCase extends CakeTestCase {
	var $Transaction = null;
	var $fixtures = array('app.transaction', 'app.book');

	function startTest() {
		$this->Transaction =& ClassRegistry::init('Transaction');
	}

	function testTransactionInstance() {
		$this->assertTrue(is_a($this->Transaction, 'Transaction'));
	}

	function testTransactionFind() {
		$this->Transaction->recursive = -1;
		$results = $this->Transaction->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Transaction' => array(
			'id'  => 1,
			'book_id'  => 1,
			'credit'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'date'  => '2009-04-07',
			'created'  => '2009-04-07 10:01:10',
			'updated'  => '2009-04-07'
		));
		$this->assertEqual($results, $expected);
	}
}
?>