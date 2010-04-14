<div class="financeYears form">
<?php echo $form->create('FinanceYear');?>
	<fieldset>
 		<legend><?php __('Edit FinanceYear');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('active');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('FinanceYear.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('FinanceYear.id'))); ?></li>
		<li><?php echo $html->link(__('List FinanceYears', true), array('action'=>'index'));?></li>
	</ul>
</div>
