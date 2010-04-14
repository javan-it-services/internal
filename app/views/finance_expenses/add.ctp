<div class="financeExpenses form">
<?php echo $form->create('FinanceExpense');?>
	<fieldset>
 		<legend><?php __('Add FinanceExpense');?></legend>
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
		<li><?php echo $html->link(__('List FinanceExpenses', true), array('action'=>'index'));?></li>
	</ul>
</div>
