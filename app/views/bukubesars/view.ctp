<div class="bukubesars view">
<h2><?php  __('Bukubesar');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bukubesar['Bukubesar']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Neraca Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bukubesar['Bukubesar']['neraca_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bukubesar['Bukubesar']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Keterangan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bukubesar['Bukubesar']['keterangan']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bukubesar['Bukubesar']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bukubesar['Bukubesar']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Bukubesar', true), array('action' => 'edit', $bukubesar['Bukubesar']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Bukubesar', true), array('action' => 'delete', $bukubesar['Bukubesar']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bukubesar['Bukubesar']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Bukubesars', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Bukubesar', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div><?php pr($transaksi);?>
	<?php echo $form->create('Transaksibukubesar',array('url'=>'/bukubesars/tambahtransaksi'));?>
	<table>
		<tr>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Debet</th>
			<th>Kredit</th>
		</tr>
		<tr>
			<td>
				<?php
					echo $form->hidden('bukubesar_id',array('value'=>$bukubesar['Bukubesar']['id']));
					echo $form->text('tanggal',array('value'=>date('Y-m-d')));
				?>
			</td>
			<td><?php echo $form->text('keterangan');?></td>
			<td><?php echo $form->text('debet');?></td>
			<td><?php echo $form->text('kredit');?></td>
		</tr>
	</table>
	<?php echo $form->end('Submit');?>
</div>