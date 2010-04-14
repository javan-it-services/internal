<?php 
/* SVN FILE: $Id$ */
/* Book Fixture generated on: 2009-04-07 10:04:00 : 1239073260*/

class BookFixture extends CakeTestFixture {
	var $name = 'Book';
	var $table = 'books';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'description' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'description'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2009-04-07 10:01:00',
		'updated'  => '2009-04-07 10:01:00'
	));
}
?>