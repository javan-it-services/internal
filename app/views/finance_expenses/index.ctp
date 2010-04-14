<div class="financeExpenses index">
<h2><?php __('FinanceExpenses');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0" class="list oddeven">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('finance_account_id');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('value');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('pic');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($financeExpenses as $financeExpense):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $financeExpense['FinanceExpense']['id']; ?>
		</td>
		<td>
			<?php echo $financeExpense['FinanceExpense']['finance_account_id']; ?>
		</td>
		<td>
			<?php echo $financeExpense['FinanceExpense']['description']; ?>
		</td>
		<td>
			<?php echo $financeExpense['FinanceExpense']['value']; ?>
		</td>
		<td>
			<?php echo $financeExpense['FinanceExpense']['created']; ?>
		</td>
		<td>
			<?php echo $financeExpense['FinanceExpense']['pic']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $financeExpense['FinanceExpense']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $financeExpense['FinanceExpense']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $financeExpense['FinanceExpense']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $financeExpense['FinanceExpense']['id'])); ?>
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
		<li><?php echo $html->link(__('New FinanceExpense', true), array('action'=>'add')); ?></li>
	</ul>
</div>
