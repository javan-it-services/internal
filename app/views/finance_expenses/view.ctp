<div class="financeExpenses view">
<h2><?php  __('FinanceExpense');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeExpense['FinanceExpense']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Finance Account Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeExpense['FinanceExpense']['finance_account_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeExpense['FinanceExpense']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Value'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeExpense['FinanceExpense']['value']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeExpense['FinanceExpense']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pic'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeExpense['FinanceExpense']['pic']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit FinanceExpense', true), array('action'=>'edit', $financeExpense['FinanceExpense']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete FinanceExpense', true), array('action'=>'delete', $financeExpense['FinanceExpense']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $financeExpense['FinanceExpense']['id'])); ?> </li>
		<li><?php echo $html->link(__('List FinanceExpenses', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New FinanceExpense', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
