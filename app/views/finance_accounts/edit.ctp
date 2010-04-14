<div class="financeAccounts form">
<?php echo $form->create('FinanceAccount');?>
	<fieldset>
 		<legend><?php __('Edit FinanceAccount');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('description');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('FinanceAccount.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('FinanceAccount.id'))); ?></li>
		<li><?php echo $html->link(__('List FinanceAccounts', true), array('action'=>'index'));?></li>
	</ul>
</div>
