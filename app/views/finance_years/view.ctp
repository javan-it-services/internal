<div class="financeYears view">
<h2><?php  __('FinanceYear');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeYear['FinanceYear']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeYear['FinanceYear']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeYear['FinanceYear']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Active'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $financeYear['FinanceYear']['active']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit FinanceYear', true), array('action'=>'edit', $financeYear['FinanceYear']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete FinanceYear', true), array('action'=>'delete', $financeYear['FinanceYear']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $financeYear['FinanceYear']['id'])); ?> </li>
		<li><?php echo $html->link(__('List FinanceYears', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New FinanceYear', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
