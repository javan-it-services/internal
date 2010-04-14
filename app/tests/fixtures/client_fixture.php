<?php 
/* SVN FILE: $Id$ */
/* Client Fixture generated on: 2009-04-07 10:04:19 : 1239076039*/

class ClientFixture extends CakeTestFixture {
	var $name = 'Client';
	var $table = 'clients';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'address' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'contact_person' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'email' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'phone' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'address'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'contact_person'  => 'Lorem ipsum dolor sit amet',
		'email'  => 'Lorem ipsum dolor sit amet',
		'phone'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2009-04-07 10:47:19',
		'updated'  => '2009-04-07 10:47:19'
	));
}
?>