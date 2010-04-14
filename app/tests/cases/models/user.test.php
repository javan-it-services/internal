<?php 
/* SVN FILE: $Id$ */
/* User Test cases generated on: 2009-04-07 11:04:32 : 1239078212*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $User = null;
	var $fixtures = array('app.user', 'app.group', 'app.contract', 'app.document', 'app.project', 'app.task', 'app.worklog');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function testUserInstance() {
		$this->assertTrue(is_a($this->User, 'User'));
	}

	function testUserFind() {
		$this->User->recursive = -1;
		$results = $this->User->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('User' => array(
			'id'  => 1,
			'group_id'  => 1,
			'username'  => 'Lorem ipsum dolor sit amet',
			'password'  => 'Lorem ipsum dolor sit amet',
			'fullname'  => 'Lorem ipsum dolor sit amet',
			'email'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2009-04-07 11:23:29',
			'updated'  => '2009-04-07 11:23:29'
		));
		$this->assertEqual($results, $expected);
	}
}
?>