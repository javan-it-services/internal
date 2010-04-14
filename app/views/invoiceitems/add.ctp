<div class="invoiceitems form">
<?php echo $form->create('Invoiceitem');?>
	<fieldset>
 		<legend><?php __('Add Invoiceitem');?></legend>
	<?php
		echo $form->input('invoice_id');
		echo $form->input('description');
		echo $form->input('amount');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Invoiceitems', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Invoices', true), array('controller'=> 'invoices', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Invoice', true), array('controller'=> 'invoices', 'action'=>'add')); ?> </li>
	</ul>
</div>
