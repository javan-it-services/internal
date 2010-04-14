<?php
$html->css("form",null,array(),false);
$javascript->link('prototype', false);
$javascript->link('scriptaculous.js?load=effects', false);
$javascript->link('autoExpandContract', false);

?>
<div class="invoices view page">
<h2><?php  __('Invoice');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Client'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($invoice['Client']['name'], array('controller'=> 'clients', 'action'=>'view', $invoice['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related page" >
	<h3><?php __('Related Invoiceitems');?></h3>

<?php echo $form->create("Invoiceitem", array("action"=>"add"));?>
<?php echo $form->hidden("invoice_id", array("value"=>$invoice['Invoice']['id']));?>
<fieldset>
<ol>
            <li>
<?php echo $form->input("description", array("class"=>"expand"));?>
</li>
            <li>
<?php echo $form->input("amount");?>
</li>
<li><label class="ghost"></label>
        <div class="buttons">
<?php echo $ajax->submit("Add", array('url' => '/Invoiceitems/add', 'update'
=> 'listinvoiceitem'));?>

    </div>

</li>
  </ol>

</fieldset>
</form>
<div id="listinvoiceitem">
	<?php if (!empty($invoice['Invoiceitem'])):?>
	<table class="list" cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Amount'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($invoice['Invoiceitem'] as $invoiceitem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $invoiceitem['id'];?></td>
			<td><?php echo $invoiceitem['description'];?></td>
			<td><?php echo $invoiceitem['amount'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'invoiceitems', 'action'=>'view', $invoiceitem['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'invoiceitems', 'action'=>'edit', $invoiceitem['id'])); ?>
				<?php echo $ajax->link(__('Delete', true), "/invoiceitems/delete/".$invoiceitem['id'],array("update"=>"listinvoiceitem")); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
</div>
