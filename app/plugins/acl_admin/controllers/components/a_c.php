<?php
class ACComponent extends Object {
	var $name = 'AC';
    var $components = array('Acl','Session');
    var $siteAdmin = null;
	var $aro = 'PUBLIC';
	var $aco = 'ROOT';

/**
 * Startup - Link the component to the controller.
 *
 * @param controller
 */
    function startup(&$controller) {
		$this->controller =& $controller;
		if (!isset ($this->Acl->Aro)) {
			loadModel('Aro');
			loadModel('Aco');
			$this->Acl->Aro = new Aro; // Temporary
			$this->Acl->Aco = new Aco; // Temporary
		}
		$this->aro = $this->getAro();
		$this->aco = $this->getAco(null,'ROOT');
		if ((isset($this->controller->publicAccess)&&($this->controller->publicAccess))||$this->controller->_isRequestAction()) {
			return true;
		}

		if ((low($this->name) == 'app')) { 
			// It's an error don't do anything
		} elseif ($this->controller->here=='/') {
			// don't do anything for the root url to avoid loops
		}else {
			if (isset($this->params[CAKE_ADMIN])) {
				if ($this->aro!=$this->siteAdmin) {
					$this->accessDenied($this->aro,'ADMIN');				
				}
			}
			if (!$this->checkACL ($this->aro,$this->aco)) {
				$this->accessDenied($this->aro,$this->aco);
			}
		}
    }

	function checkURL ($url,$aro=null) {

		$pagesController = 'pages';		

		$aro = $aro?$aro:$this->aro;
		if (is_array($url)) {
			$section = isset($url['plugin'])?Inflector::underscore($url['plugin']):APP_DIR;
			$controller = isset($url['controller'])?Inflector::underscore($url['controller']):$section;
			if (low($controller) == $pagesController) {
				$action = isset($this->params['pass'])?implode(':',$this->params['pass']):NULL;
			} else {
				$action = isset($url['action'])?Inflector::underscore($url['action']):'index';			
			}
		} else {
			$result = Router::parse($url);
			$controller = Inflector::underscore($result['controller']);
			if (file_exists(APP . 'plugins' . DS .$controller)) {
				$section = $controller;
				$controller = $result['action']?Inflector::underscore($result['action']):$section;
				$action = isset($result['pass'][0])?Inflector::underscore($result['pass'][0]):'index';
			} else {
				$section = APP_DIR;
				if ($controller == $pagesController) {
					$action = isset($result['pass'])?implode(':',$result['pass']):'home';
				} else {
					$action = $result['action']?Inflector::underscore($result['action']):'index';
				}
			}
		}
		$aco = $action?"$section:$controller:$action":"$section:$controller";
		$url = is_array($url)?serialize($url):$url;
		$this->aclLog ("url ".$url." mapped to aco $aco",2);
		$aco = $this->getAco($aco);
		if ($this->checkACL($aro,$aco)) {
			return true;		
		}
		return false;
	}

	function checkACL($aro,$aco,$action = '*') {

        $access = $this->Acl->check($aro, $aco, $action);
        if ($access == true) {
			$this->aclLog ("PASSED $aro for $aco");

			return true;
        } else {
			if ($aro==$this->siteAdmin) {
				$this->aclLog ("DENIED $aro for $aco, **overriden by site Admin setting**",0);
				return true;
			} else {
				$this->aclLog ("DENIED $aro for $aco");

				return false;
			}
        }
    }

	function getAro () {
		$aro = $this->Session->read('User.username');
		if ($aro) {
			if ($this->Acl->Aro->findByAlias($aro)) {
				$this->aro = $aro;			
			} else {
				$this->aclLog ("NO ARO for $aro",0);
			}
		}
		return $this->aro;		
	}

 	// Get the name of the ACO or the Parent if it doesn´t exist.
	function getAco($acoAlias=null,$root='ROOT') {
		if (!$acoAlias) {
			$acoAlias = $this->_getAcoAlias();
			$this->aclLog ("CHECKING ACL for ".$acoAlias); // Only applies to the current controller a means of finding data in the log
		}
		$constraint['Aco.alias'] = $this->_getAliasList($acoAlias,$root);
		$results = $this->Acl->Aco->find($constraint,null,'Aco.lft DESC',-1);
		if ($results) {
			if ($results['Aco']['alias']<>$acoAlias) {
				$this->aclLog ('Aco for '.$acoAlias.' is '.$results['Aco']['alias'],2);
			}
			return $results['Aco']['alias'];
		} else {
	    	$this->aclLog("No Aco or equivalent parent found for $acoAlias",0);
	    	return false;
		}
	}

	// Return the name for the ACO - the equivalent name for the current page.
	function _getAcoAlias() {
		if (method_exists($this->controller,'_getAcoAlias')) {
			return $this->controller->_getAcoAlias();	
		} else {
			if ($this->controller->plugin) {
				$acoAlias = $this->controller->plugin;
			} else {
				$acoAlias = APP_DIR;
			}
			$acoAlias .= ":".Inflector::underscore($this->controller->name).":".$this->controller->action;
			return low($acoAlias);		
		}
	}
	
	// Return the list of Aco names that represent the aco requested and all parents.
	function _getAliasList ($acoAlias,$root='ROOT') {
		$results[] = $acoAlias;
		$array = explode(":",$acoAlias);
		for ($i = 1; $i <= count($array); $i++) {
			array_pop($array);
			$results[] = implode(":",$array);
		}
		$results[] = $root;
		return $results;
	}
    
    function accessDenied($aro,$acoAlias,$type="denied",$url=FULL_BASE_URL) {
		if (DEBUG==0) {
			$this->controller->_addFlash("Ooops no access to that page","flash_error");
	    	$this->controller->redirect ($url,null,true);
	    	die;
		} else {
	    	$this->controller->_addFlash("access denied to $acoAlias for $aro","flash_error");
		}
    }

	function aclLog ($Message,$level = 1) {
		if (DEBUG >= $level) {			
			$this->log($level.'	'.$Message,LOG_DEBUG);
		}
	}
}
?>