<div class="accountingTransactions index">
<h2><?php __('Transactions');?></h2>

<!-- START FILTER -->
<?php echo $form->create('FilterTransaction',array('url' => '/accounting_transactions')); ?>

<table cellpadding="0" cellspacing="0">
	<tr>
		<th>From</th><td><?php echo $form->dateTime('FilterTransaction.created_from','YMD','NONE',$jurnal_selected_from,null,false); ?></td>
		<td width="50">&nbsp;</td>
		<th>To</th><td><?php echo $form->dateTime('FilterTransaction.created_to','YMD','NONE',$jurnal_selected_to,null,false); ?></td>
		<th>
			<button type="submit" name="data[filter]" value="filter">Filter</button>
		</th>
	</tr>
</table>
<!-- END FILTER -->



<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0" class="list">
<tr>
	<th>No</th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('Debit','account_debit_id');?></th>
	<th><?php echo $paginator->sort('Credit','account_credit_id');?></th>
	<th><?php echo $paginator->sort('amount');?></th>
	<th><?php echo $paginator->sort('Time','created');?></th>
	
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
$paging = $paginator->params();
$start = (($paging['page'] - 1) * $paging['options']['limit']) + 1;
foreach ($accountingTransactions as $accountingTransaction):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $start++ ?>
		</td>
		<td>
			<?php echo $accountingTransaction['AccountingTransaction']['name']; ?>
		</td>
		<td>
			<?php echo $accountingTransaction['AccountingTransaction']['description']; ?>
		</td>
		<td>
			<?php echo $accountingTransaction['AccountDebit']['name']; ?>
		</td>

		

		<td>
			<?php echo $accountingTransaction['AccountCredit']['name']; ?>
		</td>
		<td class="money">
			<?php echo $number->currency($accountingTransaction['AccountingTransaction']['amount']); ?>
		</td>
		<td>
			<?php echo $accountingTransaction['AccountingTransaction']['created']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $accountingTransaction['AccountingTransaction']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $accountingTransaction['AccountingTransaction']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $accountingTransaction['AccountingTransaction']['id'])); ?>
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
<br/>
<div class="actions">
	<ul>
		<li><?php echo $html->link("<span>".__('New Transaction', true)."</span>", array('action' => 'add'),array(), false, false); ?></li>
	</ul>
</div>
