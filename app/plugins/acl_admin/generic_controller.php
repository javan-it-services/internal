<?php
if(!defined('CAKE_ADMIN')) {
	define('CAKE_ADMIN','!not used');
}
include('app_error.php');
class GenericController extends AppController {
    var $components = array('Pagination','RequestHandler');
	var $helpers = array('Form','Ajax','Javascript','Time','Pagination');
	var $javascripts = array();
	var $layout = 'noswad_demo';
	var $menuItems = array();

	function __construct(){
		// Inherit Parent controller vars if not direct child of App controller
		$this->__inheritVars(get_class($this));
		parent::__construct();
	}

	// Recursively inherit vars
	function __inheritVars($className){
		if (low($className)<>('appcontroller')) {
			$ParentClass = get_parent_class($className);
		    $ParentVars = get_class_vars($ParentClass);
		    foreach(array('components', 'helpers','uses') as $var) {
		        if (isset($ParentVars[$var]) && !empty($ParentVars[$var]) && is_array($this->{$var})) {
		            $diff = array_diff($ParentVars[$var], $this->{$var});
		            $this->{$var} = array_merge($this->{$var}, $diff);
		        }
		    }
		    $this->__inheritVars($ParentClass);
		}
	}

	function beforeFilter () {
		if ($this->plugin) {
			$this->PluginName = Inflector::Camelize($this->plugin);
			$this->set('Plugin',$this->PluginName);
		}
	}

	// Just manages the menu. Delete unless using the layout that comes with the download
	function beforeRender() {
		if (!isset($this->viewVars['data'])) {
			$this->set('data',$this->data);
		}
		if (!$this->_isRequestAction()) {
			if (!$this->menuItems) {
				$this->menuItems['Home'] = array ('url'=>'/');
				if ($this->plugin) {
					$Human = Inflector::humanize($this->plugin);
					$this->menuItems[$Human]['url']='/'.$this->PluginName;
					$this->menuItems[$Human]['active']=true;

					$FileList = listClasses (APP."plugins".DS.$this->plugin.DS."controllers");
					foreach ($FileList as $file) {
						$list = explode ("_",$file);
						unset($list[count($list)-1]);
						$controller = implode ($list,"_");
						if (up($controller)<>up($this->plugin)) {
								$array = array("url"=>'/'.$this->PluginName.'/'.Inflector::camelize($controller));
								if (Inflector::underscore($this->name)==$controller) {
									$array['active']=true;
								}
								$this->menuItems[Inflector::humanize($controller)] = $array;
							}
						}
				} else {
					$this->menuItems['Home']['active']=true;
					uses ('Folder');
					$Folder = new Folder(APP.DS."plugins");
					list($Plugins) = $Folder->ls();
					foreach($Plugins as $Plugin) {
						$Camel = Inflector::Camelize($Plugin);
						$Human = Inflector::humanize($Plugin);
						$this->menuItems[$Human] = array('url'=>'/'.$Camel);
					}
				}
			}
			$this->set('Menu',$this->menuItems);
			$this->set('javascripts',$this->javascripts);
		}
	}

	function _isRequestAction() {
		return (isset($this->params['bare']) && isset($this->params['return']));
	}

	// Allows the possibility to have more than one flash message.
	function _addFlash ($flashMessage, $layout = 'flash_info', $params = array(), $key = 'flash') {
		$out = $this->Session->read('Message.' . $key);
		$view = new View($this);
		$view->base			= $this->base;
		$view->webroot		= $this->webroot;
		$view->here			= $this->here;
		$view->params		= $this->params;
		$view->action		= $this->action;
		$view->data			= $this->data;
		$view->plugin		= $this->plugin;
		$view->helpers		= array('Html');
		$view->layout		= $layout;
		$view->pageTitle	= '';
		$view->viewVars = $view->_viewVars = $params;
		$out .= $view->renderLayout($flashMessage);
		//$this->Session->write('Message.' . $key, $out);
	}

	// Ultimate redirect function.
	function redirect($url, $status = null,$die=true) {
		if ($this->RequestHandler->isAjax()) {
			$data = $this->requestAction($url,array("return"));
			$this->set("data",$data);
			$this->viewPath = '_generic';
			$this->render('ajax_redirect');
		} else {
			parent::redirect ($url,$status);
		}
		if ($die) {
			die;
		} else {
			return false;
		}
	}
}
?>