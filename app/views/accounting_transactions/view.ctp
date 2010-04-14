<div class="accountingTransactions view">
<h2><?php  __('AccountingTransaction');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $accountingTransaction['AccountingTransaction']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $accountingTransaction['AccountingTransaction']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Accounting Transaction Type Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $accountingTransaction['AccountingTransaction']['accounting_transaction_type_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Amount'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $accountingTransaction['AccountingTransaction']['amount']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Timetransaction'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $accountingTransaction['AccountingTransaction']['timetransaction']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $accountingTransaction['AccountingTransaction']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit AccountingTransaction', true), array('action' => 'edit', $accountingTransaction['AccountingTransaction']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete AccountingTransaction', true), array('action' => 'delete', $accountingTransaction['AccountingTransaction']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $accountingTransaction['AccountingTransaction']['id'])); ?> </li>
		<li><?php echo $html->link(__('List AccountingTransactions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New AccountingTransaction', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
