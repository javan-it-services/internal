<div class="financeYears index">
<h2><?php __('FinanceYears');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0" class="list oddeven">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('active');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($financeYears as $financeYear):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $financeYear['FinanceYear']['id']; ?>
		</td>
		<td>
			<?php echo $financeYear['FinanceYear']['name']; ?>
		</td>
		<td>
			<?php echo $financeYear['FinanceYear']['description']; ?>
		</td>
		<td>
			<?php echo $financeYear['FinanceYear']['active']?"Yes":"No"; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $financeYear['FinanceYear']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $financeYear['FinanceYear']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $financeYear['FinanceYear']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $financeYear['FinanceYear']['id'])); ?>
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
		<li><?php echo $html->link(__('New FinanceYear', true), array('action'=>'add')); ?></li>
	</ul>
</div>
