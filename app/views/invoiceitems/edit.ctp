<div class="invoiceitems form">
<?php echo $form->create('Invoiceitem');?>
	<fieldset>
 		<legend><?php __('Edit Invoiceitem');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('invoice_id');
		echo $form->input('description');
		echo $form->input('amount');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Invoiceitem.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Invoiceitem.id'))); ?></li>
		<li><?php echo $html->link(__('List Invoiceitems', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Invoices', true), array('controller'=> 'invoices', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Invoice', true), array('controller'=> 'invoices', 'action'=>'add')); ?> </li>
	</ul>
</div>
