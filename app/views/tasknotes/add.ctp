<div class="tasknotes form">
<?php echo $form->create('Tasknote');?>
	<fieldset>
 		<legend><?php __('Add Tasknote');?></legend>
	<?php
		if(isset($task_id)){
			if($task)
				echo $form->input('task_id',array("type"=>"select","readonly"=>true));
			else 
				echo "Task is not exists";
		}
		else{
			echo $form->input('task_id');
		}
		echo $form->input('note');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Tasknotes', true), array('action'=>'index'));?></li>
	</ul>
</div>
