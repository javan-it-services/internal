<div class="neracas view">
<h2><?php  __('Neraca');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $neraca['Neraca']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $neraca['Neraca']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Keterangan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $neraca['Neraca']['keterangan']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $neraca['Neraca']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $neraca['Neraca']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Neraca', true), array('action' => 'edit', $neraca['Neraca']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Neraca', true), array('action' => 'delete', $neraca['Neraca']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $neraca['Neraca']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Neracas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Neraca', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
