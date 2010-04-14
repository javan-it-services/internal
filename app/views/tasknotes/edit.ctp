<div class="tasknotes form">
<?php echo $form->create('Tasknote');?>
	<fieldset>
 		<legend><?php __('Edit Tasknote');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('task_id');
		echo $form->input('note');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Tasknote.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Tasknote.id'))); ?></li>
		<li><?php echo $html->link(__('List Tasknotes', true), array('action'=>'index'));?></li>
	</ul>
</div>
