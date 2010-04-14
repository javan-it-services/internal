<div class="page">
<?php
    $javascript->link('prototype', false);
    $javascript->link('scriptaculous', false);
    $javascript->link('effects', false);
?>
<?php
echo $form->create('', array (
	"action" => "selectrole"
));
echo $form->select("role", $roles, $role,array("onchange"=>'this.form.submit()'));
?>
<?php if(isset($acos)):?>
<table cellpadding=0 cellspacing=0 class="list">
	<tr>
		<th colspan='2'>Node Name</th>
		<th>Permission</th>
	</tr>
	<tr>
		<td colspan='2'>controllers</td>
		<td>
			<?php echo $ajax->div("controller")?>
			<?php echo $acos['permission']?"Allow":$html->link('Allow',"allow/controller/$groupname",array('update' => 'controller'))?>
			<?php echo $acos['permission']?$html->link('Deny',"deny/controller/$groupname",array('update' => 'controller')):"Deny"?>
			<?php echo $ajax->divEnd("controller")?>
		</td>
	</tr>
	<?php $i=0;foreach($acos['controller'] as $controller):?>
	<tr>
		<th colspan='2'>&nbsp;&nbsp;<?php echo $controller['node']['Aco']['alias']?></th>
		<td>
			<?php echo $ajax->div("controller_".$i);?>
			<?php echo $controller['permission']?"Allow":$html->link('Allow',"allow/controller_$i/$groupname/{$controller['node']['Aco']['alias']}",array("update"=>"controller_".$i))?>
			<?php echo $controller['permission']?$html->link('Deny',"deny/controller_$i/$groupname/{$controller['node']['Aco']['alias']}",array("update"=>"controller_".$i)):"Deny"?>
			<?php echo $ajax->divEnd("controller_".$i);?>
		</td>
	</tr>
		<?php if(!empty($controller['method'])){
			$j=0;
			foreach($controller['method'] as $method):?>
		<tr>
			<td></td>
			<td><?php echo $method['node']['Aco']['alias']?></td>
			<td>
			<?php echo $ajax->div("controller_".$i."_".$j);?>
			<?php echo $method['permission']?"Allow":$ajax->link('Allow',"allow/controller_".$i."_".$j."/$groupname/{$controller['node']['Aco']['alias']}/{$method['node']['Aco']['alias']}",array("update"=>"controller_".$i."_".$j))?>
			<?php echo $method['permission']?$ajax->link('Deny',"deny/controller_".$i."_".$j."/$groupname/{$controller['node']['Aco']['alias']}/{$method['node']['Aco']['alias']}",array("update"=>"controller_".$i."_".$j)):"Deny"?>
			<?php echo $ajax->divEnd("controller_".$i."_".$j);?>
		</td>
		</tr>
		<?php $j++;endforeach;}?>

	<?php $i++;endforeach?>
</table>

<?php endif?>
</div>
