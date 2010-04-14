<div class="financeBudgets index">
<h2><?php __('FinanceBudgets');?></h2>
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
	<th><?php echo $paginator->sort('income');?></th>
	<th><?php echo $paginator->sort('expense');?></th>
	<th><?php echo $paginator->sort('start');?></th>
	<th><?php echo $paginator->sort('end');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($financeBudgets as $financeBudget):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $financeBudget['FinanceBudget']['id']; ?>
		</td>
		<td>
			<?php echo $financeBudget['FinanceBudget']['finance_account_id']; ?>
		</td>
		<td>
			<?php echo $financeBudget['FinanceBudget']['income']; ?>
		</td>
		<td>
			<?php echo $financeBudget['FinanceBudget']['expense']; ?>
		</td>
		<td>
			<?php echo $financeBudget['FinanceBudget']['start']; ?>
		</td>
		<td>
			<?php echo $financeBudget['FinanceBudget']['end']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $financeBudget['FinanceBudget']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $financeBudget['FinanceBudget']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $financeBudget['FinanceBudget']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $financeBudget['FinanceBudget']['id'])); ?>
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
		<li><?php echo $html->link(__('New FinanceBudget', true), array('action'=>'add')); ?></li>
	</ul>
</div>
