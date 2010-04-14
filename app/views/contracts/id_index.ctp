<div class="contracts index">
<h2><?php __('Contracts');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('duration');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('salary');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($contracts as $contract):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $contract['Contract']['id']; ?>
		</td>
		<td>
			<?php echo $contract['Contract']['user_id']; ?>
		</td>
		<td>
			<?php echo $contract['Contract']['duration']; ?>
		</td>
		<td>
			<?php echo $contract['Contract']['description']; ?>
		</td>
		<td>
			<?php echo $contract['Contract']['salary']; ?>
		</td>
		<td>
			<?php echo $contract['Contract']['created']; ?>
		</td>
		<td>
			<?php echo $contract['Contract']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $contract['Contract']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $contract['Contract']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $contract['Contract']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contract['Contract']['id'])); ?>
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
		<li><?php echo $html->link(__('New Contract', true), array('action'=>'add')); ?></li>
	</ul>
</div>
