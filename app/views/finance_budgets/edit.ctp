<div class="financeBudgets form">
<?php echo $form->create('FinanceBudget');?>
	<fieldset>
 		<legend><?php __('Edit FinanceBudget');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('finance_account_id');
		echo $form->input('income');
		echo $form->input('expense');
		echo $form->input('start');
		echo $form->input('end');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('FinanceBudget.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('FinanceBudget.id'))); ?></li>
		<li><?php echo $html->link(__('List FinanceBudgets', true), array('action'=>'index'));?></li>
	</ul>
</div>
