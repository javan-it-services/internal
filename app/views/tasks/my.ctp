<h2>My Task</h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th>ID</th>	
	<th>Project</th>
	<th>Name</th>
	<th>Description</th>
	<th>Deadline</th>	
	<th>Started</th>
	<th>Finished</th>	
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($tasks as $task):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $task['Task']['id']; ?>
		</td>		
		<td>
			<?php echo $task['Project']['name']; ?>
		</td>
		<td>
			<?php echo $task['Task']['name']; ?>
		</td>
		<td>
			<?php echo $task['Task']['description']; ?>
		</td>
		
		<td>
			<?php echo $task['Task']['deadline']; ?>
		</td>
		<td>
			<?php echo $task['Task']['started']; ?>
		</td>
		<td>
			<?php echo $task['Task']['finished']; ?>
		</td>		
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $task['Task']['id'])); ?>
			
			<?php  
				if(!$task['Task']['started']){
					echo $html->link(__('Start', true), array('action'=>'start', $task['Task']['id'])); 
				}
				elseif(!$task['Task']['finished']){
			 		echo $html->link(__('Finish', true), array('action'=>'finish', $task['Task']['id'])); 
				}
			 	?>			
					
			<?php echo $html->link(__('Add Note', true), array('controller' => 'tasknotes' ,'action'=>'add', $task['Task']['id'])); ?>			
		</td>
	</tr>
<?php endforeach; ?>
</table>