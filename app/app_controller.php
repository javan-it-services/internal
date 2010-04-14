<?php
class AppController extends Controller {
    var $components = array('Acl', 'Auth');
	var $helpers = array('Html', 'Form', 'Javascript');
    var $currentUser = null;

    function beforeFilter() {
        //Configure AuthComponent
        $this->Auth->authorize = 'actions';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'worklogs', 'action' => 'work');

        //$this->Auth->allowedActions = array("*");
        $auth = $this->Session->read("Auth");
        if(isset($auth['User'])){
            $this->currentUser = $auth['User'];
            $this->set("isAdmin", $this->currentUser['group_id']==ROLE_ADMIN);
            $this->set("isManager", $this->currentUser['group_id']==ROLE_MANAGER);
        }
		$this->set("currentUser", $this->currentUser);
    }

    function clearDir($dir){

        if(!is_dir($dir))return;

        $files = scandir($dir);
        foreach($files as $file){
            if($file != '.' && $file != '..' && $file[0] !== "."){
                try{
                    unlink($dir .DS.$file);
                }catch(Exception $e){
                    //unable to delete file
                }
            }
        }
    }
}
?>
