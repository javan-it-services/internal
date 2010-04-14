<div class="financeAccounts view">
<h2><?php  __('FinanceAccount');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeAccount['FinanceAccount']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeAccount['FinanceAccount']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeAccount['FinanceAccount']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit FinanceAccount', true), array('action'=>'edit', $financeAccount['FinanceAccount']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete FinanceAccount', true), array('action'=>'delete', $financeAccount['FinanceAccount']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $financeAccount['FinanceAccount']['id'])); ?> </li>
		<li><?php echo $html->link(__('List FinanceAccounts', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New FinanceAccount', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
