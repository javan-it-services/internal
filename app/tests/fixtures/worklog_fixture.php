<?php 
/* SVN FILE: $Id$ */
/* Worklog Fixture generated on: 2009-04-07 10:04:37 : 1239075937*/

class WorklogFixture extends CakeTestFixture {
	var $name = 'Worklog';
	var $table = 'worklogs';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'start' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'end' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'log' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'user_id'  => 1,
		'start'  => '2009-04-07 10:45:37',
		'end'  => '2009-04-07 10:45:37',
		'log'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'created'  => '2009-04-07 10:45:37',
		'updated'  => '2009-04-07 10:45:37'
	));
}
?>