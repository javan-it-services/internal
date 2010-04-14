<div class="bukubesars form">
<?php echo $form->create('Bukubesar');?>
	<fieldset>
 		<legend><?php __('Add Bukubesar');?></legend>
	<?php
		echo !empty($html->data['Bukubesar']['neraca_id'])?$form->input('neraca_id',array('type'=>'hidden')):$form->input('neraca_id');		
		echo $form->input('nama');
		echo $form->input('keterangan');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Bukubesars', true), array('action' => 'index'));?></li>
	</ul>
</div>
