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
		//echo $html->css('form');
		echo $scripts_for_layout;
	?>
    <script type="text/javascript">
        Event.observe(window, 'load', function() {
        //$$('table.evenodd tbody > tr:nth-child(odd)').each(function(s) {
        //    s.addClassName('altrow');
        //});
        $$('table.evenodd tbody > tr:nth-child(even)').each(function(s) {
            s.addClassName('altrow');
        });
    });
    </script>

</head>
<body>
    <div id="menubar">
        <ul id="navmenu">
            <!-- menu is here -->
            <li><?php if(isset($modul))echo $html->link("<span>Dashboard</span>","/worklogs/work", array("class"=>($modul=="dashboard")?"current":""),false, false);?></li>
			<?php if($currentUser['group_id'] == 1 && isset($modul)) :?>
            <li><?php echo $html->link("<span>Activity</span>","/tasks", array("class"=>($modul=="activity")?"current":""),false, false);?></li>
            <li><?php echo $html->link("<span>Client &amp; HR</span>","/clients", array("class"=>($modul=="human_resource")?"current":""),false, false);?></li>
            <li><?php echo $html->link("<span>Document</span>","/documents", array("class"=>($modul=="document")?"current":""),false, false);?></li>
            <li><?php echo $html->link("<span>Finance</span>","/transactions", array("class"=>($modul=="finance")?"current":""),false, false);?></li>
			<li><?php echo $html->link("<span>Accounting</span>","/accounting_transactions", array("class"=>($modul=="accounting")?"current":""),false, false);?></li>
            <li><?php echo $html->link("<span>Role Management</span>","/groups", array("class"=>($modul=="setting")?"current":""),false, false);?></li>
			<?php endif; ?>
            <li>
                <?php
                    if(!isset($currentUser))
                        echo $html->link("<span>Login</span>","/users/login", null, false, false);
                    else
                        echo $html->link("<span>Logout</span>","/users/logout", null, false, false);
                ?>
            </li>
        </ul>
    </div>

    <?php echo (isset($modul))?$this->renderElement("tab/$modul"):"" ?>

	<div id="container" class="container_16">
        <div id="content" class="grid_16">
			<br />
			<div id="flash" class="grid_12 prefix_2">
				<?php $session->flash() ?>
			</div>
            <div class="spacer">
                <?php echo $content_for_layout; ?>
            </div>
		</div>
        <div class="clear"></div>
	</div>
    <div id="footer">
        <div id="copy"><span>Copyleft 2009</span> <a href="http://javan.web.id" target="_blank">Javan IT Services</a></div>
        <div id="cake">
        <?php echo $html->link(
                $html->image('cake.power.gif', array('alt'=> __("CakePHP: the rapid development php framework", true), 'border'=>"0")),
                'http://www.cakephp.org/',
                array('target'=>'_blank'), null, false
            );
        ?>
        </div>
    </div>
	<?php echo $cakeDebug; ?>
</body>
</html>
