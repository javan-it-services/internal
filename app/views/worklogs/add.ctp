<div class="worklogs form">
<?php echo $form->create('Worklog');?>
	<fieldset>
 		<legend><?php __('Add Worklog');?></legend>
	<?php
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
		<li><?php echo $html->link(__('List Worklogs', true), array('action'=>'index'));?></li>
	</ul>
</div>
