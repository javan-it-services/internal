<?php 
/* SVN FILE: $Id$ */
/* Neraca Fixture generated on: 2010-02-01 14:02:29 : 1265007749*/

class NeracaFixture extends CakeTestFixture {
	var $name = 'Neraca';
	var $table = 'neracas';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'nama' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'keterangan' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'nama'  => 'Lorem ipsum dolor sit amet',
		'keterangan'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'created'  => '2010-02-01 14:02:29',
		'updated'  => '2010-02-01 14:02:29'
	));
}
?>