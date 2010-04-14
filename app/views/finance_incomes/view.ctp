<div class="financeIncomes view">
<h2><?php  __('FinanceIncome');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeIncome['FinanceIncome']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Finance Account Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeIncome['FinanceIncome']['finance_account_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeIncome['FinanceIncome']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Value'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeIncome['FinanceIncome']['value']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeIncome['FinanceIncome']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pic'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeIncome['FinanceIncome']['pic']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit FinanceIncome', true), array('action'=>'edit', $financeIncome['FinanceIncome']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete FinanceIncome', true), array('action'=>'delete', $financeIncome['FinanceIncome']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $financeIncome['FinanceIncome']['id'])); ?> </li>
		<li><?php echo $html->link(__('List FinanceIncomes', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New FinanceIncome', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
