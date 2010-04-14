<div class="books view">
<h2><?php  __('Book');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $book['Book']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $book['Book']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $book['Book']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $book['Book']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $book['Book']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Book', true), array('action'=>'edit', $book['Book']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Book', true), array('action'=>'delete', $book['Book']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $book['Book']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Books', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Book', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Transactions', true), array('controller'=> 'transactions', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Transaction', true), array('controller'=> 'transactions', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Transactions');?></h3>
	<?php if (!empty($book['Transaction'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>		
		<th><?php __('Transaksi'); ?></th>
		<th><?php __('Amount'); ?></th>
		<th><?php __('Date'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($book['Transaction'] as $transaction):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $transaction['id'];?></td>			
			<td><?php echo $transaction['credit']?"Credit":"Debet";?></td>
			<td><?php echo $transaction['amount'];?></td>
			<td><?php echo $transaction['date'];?></td>
			<td><?php echo $transaction['created'];?></td>			
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'transactions', 'action'=>'view', $transaction['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'transactions', 'action'=>'edit', $transaction['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'transactions', 'action'=>'delete', $transaction['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $transaction['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Transaction', true), array('controller'=> 'transactions', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
