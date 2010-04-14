<div class="documents index page">
<div class="grid_3 alpha">
<div class="actions">
	<ul>
		<li><?php echo $html->link("<span>".__('New Document', true)."</span>", array('action'=>'add'), array(), false, false); ?></li>
	</ul>
</div>
</div>
<div class="grid_13 omega">
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));

?></p>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>

<table cellpadding="0" cellspacing="0" class="list">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<?php if($type=="catalog"):?>
	<th><?php echo $paginator->sort('catalog_id');?></th>
	<?php endif;?>
	<?php if($type=="contract"):?>
	<th><?php echo $paginator->sort('contract_id');?></th>
	<?php endif;?>
	<?php if($type=="task"):?>
	<th><?php echo $paginator->sort('task_id');?></th>
	<?php endif;?>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('filename');?></th>

	<th><?php echo $paginator->sort('user_id');?></th>

	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($documents as $document):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $document['Document']['id']; ?>
		</td>
		<?php if($type=="catalog"):?>
		<td>
			<?php echo $document['Catalog']['name']; ?>
		</td>
		<?php endif;?>

		<?php if($type=="task"):?>
		<td>
			<?php echo $document['Task']['name']; ?>
		</td>
		<?php endif;?>
		<?php if($type=="contract"):?>
		<td>
			<?php echo $document['Contract']['id']; ?>
		</td>
		<?php endif;?>
		<td>
			<?php echo $document['Document']['name']; ?>
		</td>
		<td>
			<?php echo $document['Document']['description']; ?>
		</td>
		<td>
			<?php echo $document['Document']['filename']; ?>
		</td>
		<td>
			<?php echo $document['User']['fullname']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Download', true), "/files/".$document['Document']['id']."_".$document['Document']['filename']); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $document['Document']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $document['Document']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $document['Document']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
</div>
