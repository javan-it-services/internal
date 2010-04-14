<div class="financeAccounts index">
<h2><?php __('FinanceAccounts');?></h2>
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
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($financeAccounts as $financeAccount):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $financeAccount['FinanceAccount']['id']; ?>
		</td>
		<td>
			<?php echo $financeAccount['FinanceAccount']['name']; ?>
		</td>
		<td>
			<?php echo $financeAccount['FinanceAccount']['description']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $financeAccount['FinanceAccount']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $financeAccount['FinanceAccount']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $financeAccount['FinanceAccount']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $financeAccount['FinanceAccount']['id'])); ?>
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
		<li><?php echo $html->link(__('New FinanceAccount', true), array('action'=>'add')); ?></li>
	</ul>
</div>
