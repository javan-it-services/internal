<div class="financeAccounts form">
<?php echo $form->create('FinanceAccount');?>
	<fieldset>
 		<legend><?php __('Add FinanceAccount');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('description');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List FinanceAccounts', true), array('action'=>'index'));?></li>
	</ul>
</div>
