<div class="invoiceitems view">
<h2><?php  __('Invoiceitem');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoiceitem['Invoiceitem']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Invoice'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($invoiceitem['Invoice']['id'], array('controller'=> 'invoices', 'action'=>'view', $invoiceitem['Invoice']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoiceitem['Invoiceitem']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Amount'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoiceitem['Invoiceitem']['amount']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoiceitem['Invoiceitem']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Invoiceitem', true), array('action'=>'edit', $invoiceitem['Invoiceitem']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Invoiceitem', true), array('action'=>'delete', $invoiceitem['Invoiceitem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $invoiceitem['Invoiceitem']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Invoiceitems', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Invoiceitem', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Invoices', true), array('controller'=> 'invoices', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Invoice', true), array('controller'=> 'invoices', 'action'=>'add')); ?> </li>
	</ul>
</div>
