<div class="users view">
<h2><?php  __('User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Group'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($user['Group']['name'], array('controller'=> 'groups', 'action'=>'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['password']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fullname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['fullname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit User', true), array('action'=>'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete User', true), array('action'=>'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Groups', true), array('controller'=> 'groups', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Group', true), array('controller'=> 'groups', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Contracts', true), array('controller'=> 'contracts', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Contract', true), array('controller'=> 'contracts', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Documents', true), array('controller'=> 'documents', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Document', true), array('controller'=> 'documents', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Projects', true), array('controller'=> 'projects', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Project', true), array('controller'=> 'projects', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Tasks', true), array('controller'=> 'tasks', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Task', true), array('controller'=> 'tasks', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Worklogs', true), array('controller'=> 'worklogs', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Worklog', true), array('controller'=> 'worklogs', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Contracts');?></h3>
	<?php if (!empty($user['Contract'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Duration'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Salary'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Contract'] as $contract):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $contract['id'];?></td>
			<td><?php echo $contract['user_id'];?></td>
			<td><?php echo $contract['duration'];?></td>
			<td><?php echo $contract['description'];?></td>
			<td><?php echo $contract['salary'];?></td>
			<td><?php echo $contract['created'];?></td>
			<td><?php echo $contract['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'contracts', 'action'=>'view', $contract['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'contracts', 'action'=>'edit', $contract['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'contracts', 'action'=>'delete', $contract['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contract['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Contract', true), array('controller'=> 'contracts', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Documents');?></h3>
	<?php if (!empty($user['Document'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Catalog Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Filename'); ?></th>
		<th><?php __('Contract Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Task Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Document'] as $document):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $document['id'];?></td>
			<td><?php echo $document['catalog_id'];?></td>
			<td><?php echo $document['name'];?></td>
			<td><?php echo $document['description'];?></td>
			<td><?php echo $document['filename'];?></td>
			<td><?php echo $document['contract_id'];?></td>
			<td><?php echo $document['user_id'];?></td>
			<td><?php echo $document['task_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'documents', 'action'=>'view', $document['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'documents', 'action'=>'edit', $document['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'documents', 'action'=>'delete', $document['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $document['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Document', true), array('controller'=> 'documents', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Projects');?></h3>
	<?php if (!empty($user['Project'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Client Id'); ?></th>
		<th><?php __('Start'); ?></th>
		<th><?php __('End'); ?></th>
		<th><?php __('Value'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Project'] as $project):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $project['id'];?></td>
			<td><?php echo $project['name'];?></td>
			<td><?php echo $project['description'];?></td>
			<td><?php echo $project['client_id'];?></td>
			<td><?php echo $project['start'];?></td>
			<td><?php echo $project['end'];?></td>
			<td><?php echo $project['value'];?></td>
			<td><?php echo $project['user_id'];?></td>
			<td><?php echo $project['created'];?></td>
			<td><?php echo $project['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'projects', 'action'=>'view', $project['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'projects', 'action'=>'edit', $project['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'projects', 'action'=>'delete', $project['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Project', true), array('controller'=> 'projects', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Tasks');?></h3>
	<?php if (!empty($user['Task'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Project Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Started'); ?></th>
		<th><?php __('Finished'); ?></th>
		<th><?php __('Deadline'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Task'] as $task):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $task['id'];?></td>
			<td><?php echo $task['user_id'];?></td>
			<td><?php echo $task['project_id'];?></td>
			<td><?php echo $task['name'];?></td>
			<td><?php echo $task['description'];?></td>
			<td><?php echo $task['started'];?></td>
			<td><?php echo $task['finished'];?></td>
			<td><?php echo $task['deadline'];?></td>
			<td><?php echo $task['created'];?></td>
			<td><?php echo $task['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'tasks', 'action'=>'view', $task['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'tasks', 'action'=>'edit', $task['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'tasks', 'action'=>'delete', $task['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $task['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Task', true), array('controller'=> 'tasks', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Worklogs');?></h3>
	<?php if (!empty($user['Worklog'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Start'); ?></th>
		<th><?php __('End'); ?></th>
		<th><?php __('Log'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Worklog'] as $worklog):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $worklog['id'];?></td>
			<td><?php echo $worklog['user_id'];?></td>
			<td><?php echo $worklog['start'];?></td>
			<td><?php echo $worklog['end'];?></td>
			<td><?php echo $worklog['log'];?></td>
			<td><?php echo $worklog['created'];?></td>
			<td><?php echo $worklog['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'worklogs', 'action'=>'view', $worklog['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'worklogs', 'action'=>'edit', $worklog['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'worklogs', 'action'=>'delete', $worklog['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $worklog['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Worklog', true), array('controller'=> 'worklogs', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
