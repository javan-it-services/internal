<div class="financeBudgets view">
<h2><?php  __('FinanceBudget');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeBudget['FinanceBudget']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Finance Account Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeBudget['FinanceBudget']['finance_account_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Income'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeBudget['FinanceBudget']['income']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Expense'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeBudget['FinanceBudget']['expense']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Start'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeBudget['FinanceBudget']['start']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('End'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeBudget['FinanceBudget']['end']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit FinanceBudget', true), array('action'=>'edit', $financeBudget['FinanceBudget']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete FinanceBudget', true), array('action'=>'delete', $financeBudget['FinanceBudget']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $financeBudget['FinanceBudget']['id'])); ?> </li>
		<li><?php echo $html->link(__('List FinanceBudgets', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New FinanceBudget', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
