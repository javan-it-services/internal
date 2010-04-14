<?php 
/* SVN FILE: $Id$ */
/* Project Fixture generated on: 2009-04-07 10:04:24 : 1239076164*/

class ProjectFixture extends CakeTestFixture {
	var $name = 'Project';
	var $table = 'projects';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'description' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'client_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'start' => array('type'=>'date', 'null' => false, 'default' => NULL),
		'end' => array('type'=>'date', 'null' => false, 'default' => NULL),
		'value' => array('type'=>'float', 'null' => false, 'default' => NULL),
		'user_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'client_id'  => 1,
		'start'  => '2009-04-07',
		'end'  => '2009-04-07',
		'value'  => '2009-04-07',
		'user_id'  => 1,
		'created'  => '2009-04-07 10:49:24',
		'updated'  => '2009-04-07 10:49:24'
	));
}
?>