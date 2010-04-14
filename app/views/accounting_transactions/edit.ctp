<?php

$html->css("form",null,array(),false);
$html->css("datepicker",null,array(),false);

$javascript->link('prototype', false);
$javascript->link('scriptaculous.js?load=effects', false);
$javascript->link('ajaxupload', false);
$javascript->link('autoExpandContract', false);
$javascript->link('prototype-date-extensions', false);
$javascript->link('datepicker', false);
?>
<div class="accountingTransactions form">
<h2><?php __('Edit Transaction');?></h2>
<?php echo $form->create('AccountingTransaction');?>
	<fieldset>
		<?php echo $form->input('id');?>
		<ol>
			<li><?php echo $form->input('name');?></li>
			<li><?php echo $form->input('account_debit_id',array('label'=>'Debit'));?></li>
			<li><?php echo $form->input('account_credit_id',array('label'=>'Credit'));?></li>
			<li><?php echo $form->input('amount');?></li>
			<li>
				<?php echo $form->input('created', array("readonly"=>"true","value"=>date('Y-m-d'),"type"=>"text","id"=>"created", "class"=>"inputDate", "label"=>"<abbr title='required'>*</abbr>".__("Date", true))); ?>
				<p class="helper"><?php __("Click on calendar icon to pick date", false) ?></p>
				<p class="extra_helper"><?php __("format: yyyy-mm-dd", false) ?></p>
			</li>
			<li><?php echo $form->input('description');?></li>
		</ol>
	</fieldset>
	<div class="buttons">
		<button type="submit" class="button">
			<?php echo $html->image("icon/save_16.png") ?> Save
		</button>
		<?php echo $html->link('cancel',array('action'=>'index'))?>
	</div>
</div>

<script type="text/javascript">
	var picker = new Control.DatePicker('created', { dateFormat:"yyyy-MM-dd", icon:"../img/icon/calendar.png"});
</script>
