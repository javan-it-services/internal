<?php 
/* SVN FILE: $Id$ */
/* User Fixture generated on: 2009-04-07 11:04:29 : 1239078209*/

class UserFixture extends CakeTestFixture {
	var $name = 'User';
	var $table = 'users';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'group_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'username' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'password' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'fullname' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'email' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'group_id'  => 1,
		'username'  => 'Lorem ipsum dolor sit amet',
		'password'  => 'Lorem ipsum dolor sit amet',
		'fullname'  => 'Lorem ipsum dolor sit amet',
		'email'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2009-04-07 11:23:29',
		'updated'  => '2009-04-07 11:23:29'
	));
}
?>