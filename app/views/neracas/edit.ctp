<div class="neracas form">
<?php echo $form->create('Neraca');?>
	<fieldset>
 		<legend><?php __('Edit Neraca');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('nama');
		echo $form->input('keterangan');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Neraca.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Neraca.id'))); ?></li>
		<li><?php echo $html->link(__('List Neracas', true), array('action' => 'index'));?></li>
	</ul>
</div>
