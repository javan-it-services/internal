<div class="neracas form">
<?php echo $form->create('Neraca');?>
	<fieldset>
 		<legend><?php __('Add Neraca');?></legend>
	<?php
		echo $form->input('nama');
		echo $form->input('keterangan');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Neracas', true), array('action' => 'index'));?></li>
	</ul>
</div>
