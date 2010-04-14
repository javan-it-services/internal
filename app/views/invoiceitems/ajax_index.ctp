	<?php if (!empty($invoiceitems)):?>
<table class="list" cellpadding="0" cellspacing="0">
<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Amount'); ?></th>
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
			<?php echo $invoiceitem['Invoiceitem']['description']; ?>
		</td>
		<td>
			<?php echo $invoiceitem['Invoiceitem']['amount']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $invoiceitem['Invoiceitem']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $invoiceitem['Invoiceitem']['id'])); ?>
			<?php echo $ajax->link(__('Delete', true), "/invoiceitems/delete/".$invoiceitem['Invoiceitem']['id'],array("update"=>"listinvoiceitem")); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
