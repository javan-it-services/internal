<h2>My Profile</h2>
<div>
Fullname : <?php echo $user['User']['fullname'] ?>
</div>
<div>
Email : <?php echo $user['User']['email'] ?>
</div>
<div>
Group : <?php echo $user['Group']['name'] ?>
</div>

<h2>Change Password</h2>
<?php
	echo $form->create('User',array("action"=>"changepassword"));
	echo $form->input('old_password', array('size' => 20,'type'=>'password'));
	echo $form->input('new_password', array('size' =>20,'type'=>'password'));
	echo $form->input('confirm_password', array('size' =>20,'type'=>'password')); 
	echo $form->end("Submit");
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('My Task', true), array('controller'=>'tasks', 'action'=>'add')); ?></li>
		<li><?php echo $html->link(__('My Worklog', true), array('controller'=>'worklogs','action'=>'add')); ?></li>
		<li><?php echo $html->link(__('My Task Notes', true), array('controller'=>'tasknotes','action'=>'add')); ?></li>
	</ul>
</div>
