<?php
class DownloadPluginComponent extends Object {
    var $name = 'DownloadPlugin'; // required for PHP4 installs
	var $components = array ("Zip");
	var $PluginName = null; // Placeholder for the camelCase name of the plugin
	var $genericPath = null;


    function startup(&$controller) {
        $this->controller = $controller;
    }

	function getLastUpdated ($Plugin,$stuffList = array()) {
		uses("Folder");
		$Folder = new Folder(APP."plugins".DS.$Plugin.DS);
		$FileList = am($Folder->findRecursive (),$stuffList);
		if ($this->genericPath) {
			$Folder = new Folder($this->genericPath);
			$Generic = $Folder->findRecursive();
		} else {
			$Generic = array();
		}
		$FileList = am($Generic,$FileList);
		$date = 0;
		foreach($FileList as $File) {
			$FileDate = filemtime($File);
			if ($FileDate > $date) {
				$date = $FileDate;
			}
		}
		return $date;
	}

	function go ($Plugin, $confirmed=false,$stuffList = array(),$excludeList = array()) {
		$this->plugin = $Plugin;
		$this->PluginName = Inflector::Camelize($Plugin);

		// Plugin App controller handled seperately
		array_push ($excludeList, 'plugins'.DS.$this->plugin.DS.$this->plugin.'_app_controller.php'); 

		// Include the components used to download the plugin, in the hope that other's might do the same :)
		array_push ($stuffList, APP.'controllers'.DS.'components'.DS.'download_plugin.php'); 
		array_push ($stuffList, APP.'controllers'.DS.'components'.DS.'zip.php'); 
		uses("Folder");

		if ($confirmed == false) {
			$this->controller->viewPath = '_generic';
			$this->controller->layout = 'flash';
			$this->controller->set('pause',5);
			$this->controller->set('url','/'.$this->PluginName.'/'.$this->controller->name.'/'.$this->controller->action.'/confirmed');
			$this->controller->set('message','Your download will begin in 5 seconds.');
			$this->controller->set('pluginUnderscore',$Plugin);
			$this->controller->set('pluginCamel',$this->PluginName);
			$this->controller->set('plugin',Inflector::Humanize($Plugin));

			$date = $this->getLastUpdated($Plugin,$stuffList);
			$this->controller->set('last_updated',$date);
			$this->controller->render('download');
			die;						
		}
		$Folder = new Folder(APP."plugins".DS.$this->plugin.DS);
		$FileList = $Folder->findRecursive ();
		
		$pattern = "@//--Private[^\@]*//--Private End@U";
		// include adapated app controller
		$pluginApp = file_get_contents (APP.'plugins'.DS.$this->plugin.DS.$this->plugin.'_app_controller.php');
		$pluginApp = r("<?php", "<?php\r\ninclude('noswad_controller.php');", $pluginApp);
		$pluginApp = r("extends AppController", "extends NoswadController", $pluginApp);
		$pluginApp = preg_replace($pattern, '', $pluginApp);
		$this->Zip->addData($pluginApp, 'plugins'.DS.$this->plugin.DS.$this->plugin.'_app_controller.php');
				
		// include every file from the stuff list, but put it in the plugin unless it's from the webroot
		foreach ($stuffList as $file) {
			if (strstr($file,APP_DIR)) {
				$relativePath = substr($file, strlen(APP));
				$relativePath = 'plugins'.DS.$this->plugin.DS.$relativePath;
			} else {
				$relativePath = "webroot".DS.substr($file, strlen(WWW_ROOT));
			}
			if (!in_array($relativePath,$excludeList) && (file_exists($file))) {
				$addedFiles[] = $relativePath;
				$FileContents = file_get_contents ($file);
				$FileContents = preg_replace($pattern, '', $FileContents);
				$this->Zip->addData($FileContents, $relativePath);
				/*
		        $this->Zip->addFile(
	        		$file,
					$relativePath
	        	);
	        	*/
			}
		}

		// include every file from the plugin
		foreach ($FileList as $file) {
			$relativePath = substr($file, strlen(APP));
			if (!in_array($relativePath,$excludeList) && (file_exists($file))) {
				$addedFiles[] = $relativePath;
				$FileContents = file_get_contents ($file);
				$FileContents = preg_replace($pattern, '', $FileContents);
				$this->Zip->addData($FileContents, $relativePath);
				/*
		        $this->Zip->addFile(
	        		$file,
					$relativePath
	        	);
	        	*/
			}
		}

		// include every file from the generic include folder
		if ($this->genericPath) {
			$Folder = new Folder($this->genericPath);
			$FileList = $Folder->findRecursive ();
			foreach ($FileList as $file) {
				$relativePath = substr($file, strlen($this->genericPath));				
				if ($relativePath <>'read_me.txt') {
					$relativePath = 'plugins'.DS.$this->plugin.DS.$relativePath;
				}
				if (!in_array($relativePath,$addedFiles)) { // Allow for overriding of included content
			        $this->Zip->addFile(
		        		$file,
						$relativePath
		        	);
				}
			}
		}
		$this->Zip->forceDownload($this->PluginName.'.zip'); 
    }
}
?>