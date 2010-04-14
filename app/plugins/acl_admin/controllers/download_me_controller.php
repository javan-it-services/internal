<?php
class DownloadMeController extends AclAdminAppController {
    var $name = 'DownloadMe'; // required for PHP4 installs
    var $uses = array();
	var $components = array ("DownloadPlugin");

    function index($confirmed=false) {
		$extras = array(
					APP.'controllers'.DS.'components'.DS.'a_c.php'
						); 
		$this->DownloadPlugin->go($this->plugin,$confirmed,$extras);
    }
}
?>