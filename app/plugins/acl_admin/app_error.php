<?php
if (!class_exists('AppError')) {
uses('error');
class AppError extends ErrorHandler {
	
	function error($params) {
		$this->controller->plugin = basename(dirname(__FILE__));
		$this->controller->layout = 'noswad_error';
		parent::error($params);
	}

	function error404($params) {
		$this->controller->plugin = basename(dirname(__FILE__));
		$this->controller->layout = 'noswad_error';
		parent::error404($params);
	}

	function missingConnection($params) {
		$this->controller->plugin = basename(dirname(__FILE__));
		$this->controller->layout = 'noswad_error';
		parent::missingConnection($params);
	}

	function missingTable($params) {
		extract($params);

		$this->controller->plugin = basename(dirname(__FILE__));
		$this->controller->layout = 'noswad_error';

		$this->controller->viewPath = 'errors';
		$this->controller->webroot = $this->_webroot();

		$this->controller->set(array('model' => $className,
										'table' => $table,
										'title' => 'Missing Database Table'));
		if (in_array($className,array('Aro','Aco','ArosAco'))) {
			if ($className=='ArosAco') {
				$this->controller->Session->setFlash('The ArosAcos table may be misnamed acos_aros.');
			}
			$this->controller->render('missing_acl_tables');		
		} else {
			parent::missingTable($params);
		}
		exit();
	}

	function missingHelperFile($params) {
		$this->controller->plugin = basename(dirname(__FILE__));
		$this->controller->layout = 'noswad_error';
		parent::missingHelperFile($params);
	}

	function missingComponentFile($params) {
		$this->controller->plugin = basename(dirname(__FILE__));
		$this->controller->layout = 'noswad_error';
		parent::missingComponentFile($params);
	}
}
}
?>