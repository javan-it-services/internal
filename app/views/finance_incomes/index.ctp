<div class="financeIncomes index">
<h2><?php __('FinanceIncomes');?></h2>
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
foreach ($financeIncomes as $financeIncome):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $financeIncome['FinanceIncome']['id']; ?>
		</td>
		<td>
			<?php echo $financeIncome['FinanceIncome']['finance_account_id']; ?>
		</td>
		<td>
			<?php echo $financeIncome['FinanceIncome']['description']; ?>
		</td>
		<td>
			<?php echo $financeIncome['FinanceIncome']['value']; ?>
		</td>
		<td>
			<?php echo $financeIncome['FinanceIncome']['created']; ?>
		</td>
		<td>
			<?php echo $financeIncome['FinanceIncome']['pic']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $financeIncome['FinanceIncome']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $financeIncome['FinanceIncome']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $financeIncome['FinanceIncome']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $financeIncome['FinanceIncome']['id'])); ?>
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
		<li><?php echo $html->link(__('New FinanceIncome', true), array('action'=>'add')); ?></li>
	</ul>
</div>
