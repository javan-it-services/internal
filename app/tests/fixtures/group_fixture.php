<?php 
/* SVN FILE: $Id$ */
/* Group Fixture generated on: 2009-04-07 11:04:56 : 1239077576*/

class GroupFixture extends CakeTestFixture {
	var $name = 'Group';
	var $table = 'groups';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2009-04-07 11:12:56',
		'modified'  => '2009-04-07 11:12:56'
	));
}
?>