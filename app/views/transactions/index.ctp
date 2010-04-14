<div class="transactions index page">
    <div class="grid_3 alpha">
        <div class="actions">
            <ul>
                <li><?php echo $html->link("<span>".__('New Transaction', true)."</span>", array('action'=>'add'), array(), false, false); ?></li>
            </ul>
        </div>
    </div>

    <div class="grid_13 omega">
		<p>
		<?php
		echo $paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
		));
		?></p>
		<div class="paging">
			<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
		 | 	<?php echo $paginator->numbers();?>
			<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
		</div>

		<table cellpadding="0" cellspacing="0" class="list">
		<tr>
			<th><?php echo $paginator->sort('id');?></th>
			<th><?php echo $paginator->sort('book_id');?></th>
			<th><?php echo $paginator->sort('description');?></th>
			<th><?php echo $paginator->sort('credit');?></th>
			<th><?php echo $paginator->sort('amount');?></th>
			<th><?php echo $paginator->sort('date');?></th>
			<th class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($transactions as $transaction):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr<?php echo $class;?>>
				<td>
					<?php echo $transaction['Transaction']['id']; ?>
				</td>
				<td>
					<?php echo $html->link($transaction['Book']['name'], array('controller'=> 'books', 'action'=>'view', $transaction['Book']['id'])); ?>
				</td>
				<td>
					<?php echo $transaction['Transaction']['description']; ?>
				</td>
				<td>
					<?php echo $transaction['Transaction']['credit']?"Credit":"Debet"; ?>
				</td>
				<td>
					<?php echo $transaction['Transaction']['amount']; ?>
				</td>
				<td>
					<?php echo $transaction['Transaction']['date']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link(__('Edit', true), array('action'=>'edit', $transaction['Transaction']['id'])); ?>
					<?php echo $html->link(__('Delete', true), array('action'=>'delete', $transaction['Transaction']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $transaction['Transaction']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

    </div>
</div>
