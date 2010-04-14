<?php 
/* SVN FILE: $Id$ */
/* Transaksibukubesar Fixture generated on: 2010-02-01 14:02:46 : 1265007766*/

class TransaksibukubesarFixture extends CakeTestFixture {
	var $name = 'Transaksibukubesar';
	var $table = 'transaksibukubesars';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'bukubesar_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20),
		'tanggal' => array('type'=>'date', 'null' => false, 'default' => NULL),
		'keterangan' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 512),
		'debet' => array('type'=>'float', 'null' => false, 'default' => NULL),
		'kredit' => array('type'=>'float', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'bukubesar_id'  => 1,
		'tanggal'  => '2010-02-01',
		'keterangan'  => 'Lorem ipsum dolor sit amet',
		'debet'  => 'Lorem ipsum dolor sit amet',
		'kredit'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-02-01 14:02:46',
		'updated'  => '2010-02-01 14:02:46'
	));
}
?>