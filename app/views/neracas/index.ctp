<div class="neracas index">
<h2><?php __('Neracas');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('nama');?></th>
	<th><?php echo $paginator->sort('keterangan');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('updated');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($neracas as $neraca):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $neraca['Neraca']['id']; ?>
		</td>
		<td>
			<?php echo $neraca['Neraca']['nama']; ?>
		</td>
		<td>
			<?php echo $neraca['Neraca']['keterangan']; ?>
		</td>
		<td>
			<?php echo $neraca['Neraca']['created']; ?>
		</td>
		<td>
			<?php echo $neraca['Neraca']['updated']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $neraca['Neraca']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $neraca['Neraca']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $neraca['Neraca']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $neraca['Neraca']['id'])); ?>
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
		<li><?php echo $html->link(__('New Neraca', true), array('action' => 'add')); ?></li>
	</ul>
</div>
