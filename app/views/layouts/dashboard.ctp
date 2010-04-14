<?php
/* SVN FILE: $Id: default.ctp 7945 2008-12-19 02:16:01Z gwoo $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision: 7945 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2008-12-18 18:16:01 -0800 (Thu, 18 Dec 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('Javan IT Services : Internal Use Only'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');
		echo $html->css('reset');
		echo $html->css('text');
		echo $html->css('960');
		echo $html->css('table');
		echo $html->css('menu');
		echo $html->css('cake.generic');

		echo $scripts_for_layout;
	?>
</head>
<body id="<?php echo $controller ?>">
		<div id="menubar">
        	<ul id="navmenu">
                <!-- menu is here -->
                <li><?php echo $html->link("<span>Dashboard</span>","/", null,false, false);?></li>
                <li><?php echo $html->link("<span>Activity</span>","/tasks", null,false, false);?></li>
                <li><?php echo $html->link("<span>Client</span>","/clients", null,false, false);?></li>
                <li><?php echo $html->link("<span>C</span>","/catalogs", null,false, false);?></li>
                <li><?php echo $html->link("<span>D</span>","/documents", null,false, false);?></li>
                <li><?php echo $html->link("<span>B</span>","/books", null,false, false);?></li>
                <li><?php echo $html->link("<span>Transaction</span>","/transactions", null,false, false);?></li>
                <li><?php echo $html->link("<span>Group</span>","/groups", null,false, false);?></li>
                <li><?php echo $html->link("<span>Employee</span>","/users", null,false, false);?></li>
                <li><?php echo $html->link("<span>Contract</span>","/contracts", null,false, false);?></li>
                <li><?php echo $html->link("<span>Configuration</span>","/configurations", null,false, false);?></li>
                <!--
                &nbsp;&nbsp;
                <?php echo $html->link("My Project","/projects/my");?>&nbsp;|
                <?php echo $html->link("My Task","/tasks/my");?>&nbsp;|
                <?php echo $html->link("My Worklog","/worklogs/my");?>&nbsp;|
                <?php echo $html->link("My Document","/documents/my");?>&nbsp;|
                -->
                <li>
                    <?php
                        if(!isset($auth['User']))
                            echo $html->link("<span>Login</span>","/users/login", null, false, false);
                        else
                            echo $html->link("<span>Logout</span>","/users/logout", null, false, false);
                    ?>
                </li>
            </ul>
		</div>

	<div id="container" class="container_16">
        <div id="content" class="grid_16">
            <div class="spacer">
                <?php echo $content_for_layout; ?>
            </div>
		</div>
		<div id="footer" class="grid_16">
			<?php echo $html->link(
					$html->image('cake.power.gif', array('alt'=> __("CakePHP: the rapid development php framework", true), 'border'=>"0")),
					'http://www.cakephp.org/',
					array('target'=>'_blank'), null, false
				);
			?>
		</div>
        <div class="clear"></div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>
