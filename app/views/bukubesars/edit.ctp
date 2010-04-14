<div class="bukubesars form">
<?php echo $form->create('Bukubesar');?>
	<fieldset>
 		<legend><?php __('Edit Bukubesar');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('neraca_id');
		echo $form->input('nama');
		echo $form->input('keterangan');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Bukubesar.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Bukubesar.id'))); ?></li>
		<li><?php echo $html->link(__('List Bukubesars', true), array('action' => 'index'));?></li>
	</ul>
</div>
