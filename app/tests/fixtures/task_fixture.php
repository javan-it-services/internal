<?php 
/* SVN FILE: $Id$ */
/* Task Fixture generated on: 2009-04-07 10:04:14 : 1239076214*/

class TaskFixture extends CakeTestFixture {
	var $name = 'Task';
	var $table = 'tasks';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'project_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'description' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'started' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'finished' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'deadline' => array('type'=>'date', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'user_id'  => 1,
		'project_id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'started'  => '2009-04-07 10:50:14',
		'finished'  => '2009-04-07 10:50:14',
		'deadline'  => '2009-04-07',
		'created'  => '2009-04-07 10:50:14',
		'updated'  => '2009-04-07 10:50:14'
	));
}
?>