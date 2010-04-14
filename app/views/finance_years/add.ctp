<div class="financeYears form">
<?php echo $form->create('FinanceYear');?>
	<fieldset>
 		<legend><?php __('Add FinanceYear');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('active');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List FinanceYears', true), array('action'=>'index'));?></li>
	</ul>
</div>
