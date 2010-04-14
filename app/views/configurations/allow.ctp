<?php
/*
 * Created on May 1, 2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 if($allow){
	 echo "Allow";
	 echo $ajax->link('Deny',"deny/$id/".$groupname.$controller.$method,array('update' => $id));
 }
 else{
 	echo $ajax->link('Allow',"allow/$id/".$groupname.$controller.$method,array('update' => $id));
 	echo "Deny"; 	 
 }
?>
