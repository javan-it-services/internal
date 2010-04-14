<div class="tasknotes view">
<h2><?php  __('Tasknote');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tasknote['Tasknote']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Task Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tasknote['Tasknote']['task_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Note'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tasknote['Tasknote']['note']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tasknote['Tasknote']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tasknote['Tasknote']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Tasknote', true), array('action'=>'edit', $tasknote['Tasknote']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Tasknote', true), array('action'=>'delete', $tasknote['Tasknote']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tasknote['Tasknote']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Tasknotes', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Tasknote', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
