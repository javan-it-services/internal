<div class="bukubesars index">
<h2><?php __('Bukubesars');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('neraca_id');?></th>
	<th><?php echo $paginator->sort('nama');?></th>
	<th><?php echo $paginator->sort('keterangan');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('updated');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($bukubesars as $bukubesar):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $bukubesar['Bukubesar']['id']; ?>
		</td>
		<td>
			<?php echo $bukubesar['Bukubesar']['neraca_id']; ?>
		</td>
		<td>
			<?php echo $bukubesar['Bukubesar']['nama']; ?>
		</td>
		<td>
			<?php echo $bukubesar['Bukubesar']['keterangan']; ?>
		</td>
		<td>
			<?php echo $bukubesar['Bukubesar']['created']; ?>
		</td>
		<td>
			<?php echo $bukubesar['Bukubesar']['updated']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $bukubesar['Bukubesar']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $bukubesar['Bukubesar']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $bukubesar['Bukubesar']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bukubesar['Bukubesar']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Bukubesar', true), array('action' => 'add')); ?></li>
	</ul>
</div>
