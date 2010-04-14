<div class="books index page">
<div class="grid_3 alpha">
<div class="actions">
	<ul>
		<li><?php echo $html->link("<span>".__('New Book', true)."</span>", array('action'=>'add'), array(), false, false); ?></li>
	</ul>
</div>

</div>

<div class="grid_13 omega">
<table cellpadding="0" cellspacing="0" class="list">
<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Description</th>
	<th>Saldo</th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
$saldo = 0;
foreach ($books as $book):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $book['Book']['id']; ?>
		</td>
		<td>
			<?php echo $book['Book']['name']; ?>
		</td>
		<td>
			<?php echo $book['Book']['description']; ?>
		</td>
		<td>
			<?php
				echo $book[0]['saldo'];
				$saldo += $book[0]['saldo'];
			?>
		</td>

		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $book['Book']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $book['Book']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $book['Book']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $book['Book']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
<tr>
<th colspan="3">Saldo</th>
<td colspan="2"><?php echo $saldo?></td>
</tr>
</table>
</div>
</div>
