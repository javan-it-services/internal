<div class="financeExpenses form">
<?php echo $form->create('FinanceExpense');?>
	<fieldset>
 		<legend><?php __('Edit FinanceExpense');?></legend>
	<?php
		echo $form->input('id');
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
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('FinanceExpense.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('FinanceExpense.id'))); ?></li>
		<li><?php echo $html->link(__('List FinanceExpenses', true), array('action'=>'index'));?></li>
	</ul>
</div>
