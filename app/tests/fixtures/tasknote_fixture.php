<?php 
/* SVN FILE: $Id$ */
/* Tasknote Fixture generated on: 2009-04-07 10:04:03 : 1239076263*/

class TasknoteFixture extends CakeTestFixture {
	var $name = 'Tasknote';
	var $table = 'tasknotes';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'task_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'note' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'task_id'  => 1,
		'note'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'created'  => '2009-04-07 10:51:03',
		'updated'  => '2009-04-07 10:51:03'
	));
}
?>