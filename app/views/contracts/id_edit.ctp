<div class="contracts form">
<?php echo $form->create('Contract');?>
	<fieldset>
 		<legend><?php __('Edit Contract');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id');
		echo $form->input('duration');
		echo $form->input('description');
		echo $form->input('salary');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Contract.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Contract.id'))); ?></li>
		<li><?php echo $html->link(__('List Contracts', true), array('action'=>'index'));?></li>
	</ul>
</div>
