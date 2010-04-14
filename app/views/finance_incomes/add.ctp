<div class="financeIncomes form">
<?php echo $form->create('FinanceIncome');?>
	<fieldset>
 		<legend><?php __('Add FinanceIncome');?></legend>
	<?php
		echo $form->input('finance_account_id');
		echo $form->input('description');
		echo $form->input('value');
		echo $form->input('pic');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List FinanceIncomes', true), array('action'=>'index'));?></li>
	</ul>
</div>
