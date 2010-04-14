<div class="worklogs form">
<?php echo $form->create('Worklog');?>
	<fieldset>
 		<legend><?php __('Edit Worklog');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id');
		echo $form->input('start');
		echo $form->input('end');
		echo $form->input('log');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Worklog.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Worklog.id'))); ?></li>
		<li><?php echo $html->link(__('List Worklogs', true), array('action'=>'index'));?></li>
	</ul>
</div>
