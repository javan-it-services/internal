<div class="projects view">
<h2><?php  __('Project');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project Leader'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['User']['fullname']; ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project Team'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<ul>
				<?php foreach($project['User'] as $k => $v):?>
					<?php if(is_int($k)) echo $v['fullname'].','?>
				<?php endforeach?>
			</ul>
			&nbsp;
		</dd>


		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Client Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Client']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Start'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['start']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('End'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['end']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Value'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['value']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div>
<h2>Related Task</h2>
<?php
	if(count($project['Task'])):
?>
	<table>
		<tr>
			<th>ID</th>
			<th>Assigned To</th>
			<th>Name</th>
			<th>Description</th>
		</tr>
	</table>
<?php endif;?>
<div class="actions">
	<ul>
		<li><?php echo $html->link("<span>".__('Add Task', true)."</span>", array("controller"=>"tasks",'action'=>'add', $project['Project']['id']), array(), false, false); ?> </li>
	</ul>
</div>
</div>
