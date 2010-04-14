<div class="invoiceitems index">
<h2><?php __('Invoiceitems');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('invoice_id');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('amount');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($invoiceitems as $invoiceitem):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $invoiceitem['Invoiceitem']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($invoiceitem['Invoice']['id'], array('controller'=> 'invoices', 'action'=>'view', $invoiceitem['Invoice']['id'])); ?>
		</td>
		<td>
			<?php echo $invoiceitem['Invoiceitem']['description']; ?>
		</td>
		<td>
			<?php echo $invoiceitem['Invoiceitem']['amount']; ?>
		</td>
		<td>
			<?php echo $invoiceitem['Invoiceitem']['created']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $invoiceitem['Invoiceitem']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $invoiceitem['Invoiceitem']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $invoiceitem['Invoiceitem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $invoiceitem['Invoiceitem']['id'])); ?>
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
		<li><?php echo $html->link(__('New Invoiceitem', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Invoices', true), array('controller'=> 'invoices', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Invoice', true), array('controller'=> 'invoices', 'action'=>'add')); ?> </li>
	</ul>
</div>
