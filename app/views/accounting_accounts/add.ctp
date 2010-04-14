<?php $html->css("form",null,array(),false);?>

<div class="accountingAccounts form page">
	<!--left column -->
	<div id="column_left" class="grid_3 alpha">
		<div class="grid_3 alpha omega">
			<?php echo $this->renderElement("nav_accounting_admin")?>
		</div>
	</div>
	<!--end left column-->
	
	<div id="column_right" class="grid_13 omega">
		<h2><?php __('Add Account');?></h2>
		<?php echo $form->create('AccountingAccount');?>
		<fieldset>
			<ol>
				<li><?php echo $form->input('nomor')?></li>
				<li><?php echo $form->input('name')?></li>
				<li>
					<label>Account Type</label>
					<?php 
					echo $form->select('account_type',array('AKTIVA'=>'AKTIVA',
															'KEWAJIBAN'=>'KEWAJIBAN',
															'EKUITAS'=>'EKUITAS'),
															'AKTIVA',false);
					?>
				</li>
				<li><?php echo $form->input('parent_id')?></li>
			</ol>
		</fieldset>
		<div class="buttons">
			<button type="submit" class="button">
				<?php echo $html->image("icon/save_16.png") ?> Save
			</button>
			<?php echo $html->link('cancel','/accounting_accounts')?>
		</div>
	</div>
</div>
