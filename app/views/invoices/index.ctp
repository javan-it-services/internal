<div class="invoices index page">
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table class="list" cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('client_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($invoices as $invoice):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $invoice['Invoice']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($invoice['Client']['name'], array('controller'=> 'clients', 'action'=>'view', $invoice['Client']['id'])); ?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['created']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $invoice['Invoice']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $invoice['Invoice']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $invoice['Invoice']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $invoice['Invoice']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link("<span>".__('New Invoice', true)."</span>", array('action'=>'add'), array(), false, false); ?></li>
	</ul>
</div>
