<div class="tasknotes index">
<h2><?php __('Tasknotes');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('task_id');?></th>
	<th><?php echo $paginator->sort('note');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($tasknotes as $tasknote):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $tasknote['Tasknote']['id']; ?>
		</td>
		<td>
			<?php echo $tasknote['Task']['name']; ?>
		</td>
		<td>
			<?php echo $tasknote['Tasknote']['note']; ?>
		</td>
		<td>
			<?php echo $tasknote['Tasknote']['created']; ?>
		</td>
		<td>
			<?php echo $tasknote['Tasknote']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $tasknote['Tasknote']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $tasknote['Tasknote']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $tasknote['Tasknote']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tasknote['Tasknote']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Tasknote', true), array('action'=>'add')); ?></li>
	</ul>
</div>
