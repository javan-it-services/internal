<div class="catalogs view">
<h2><?php  __('Catalog');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalog['Catalog']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalog['Catalog']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalog['Catalog']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalog['Catalog']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalog['Catalog']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Catalog', true), array('action'=>'edit', $catalog['Catalog']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Catalog', true), array('action'=>'delete', $catalog['Catalog']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $catalog['Catalog']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Catalogs', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Catalog', true), array('action'=>'add')); ?> </li>
	</ul>
</div>

<div>
	<h2>Related Document</h2>	
<table cellpadding="0" cellspacing="0">
<tr>
	<th>ID</th>	
	<th>Name</th>
	<th>Description</th>		
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($catalog['Document'] as $document):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr <?php echo $class;?> >
		<td>
			<?php echo $document['id']; ?>
		</td>		
		<td>
			<?php echo $document['name']; ?>
		</td>
		<td>
			<?php echo $document['description']; ?>
		</td>				
		<td class="actions">
			<?php echo $html->link(__('Download', true), "/files/".$document['id']."_".$document['filename']); ?>
			<?php echo $html->link(__('View', true), array("controller"=>"documents",'action'=>'view', $document['id'])); ?>
			<?php echo $html->link(__('Edit', true), array("controller"=>"documents",'action'=>'edit', $document['id'])); ?>
			<?php echo $html->link(__('Delete', true), array("controller"=>"documents",'action'=>'delete', $document['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $document['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Document', true), array("controller"=>"documents",'action'=>'add')); ?></li>
	</ul>
</div>
</div>