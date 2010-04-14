<div class="accountingAccounts index page">
	<!--left column -->
	<div id="column_left" class="grid_3 alpha">
		<div class="grid_3 alpha omega">
			<?php echo $this->renderElement("nav_accounting_report")?>
		</div>
	</div>
	<!--end left column-->
	<div id="column_right" class="grid_13 omega">
		
		<h2><?php __('Jurnal');?></h2>
		
		<!-- START FILTER -->
		<?php echo $form->create('FilterJurnal',array('url' => '/accounting_reportings/jurnal')); ?>
		
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th>From</th><td><?php echo $form->dateTime('FilterJurnal.created_from','YMD','NONE',$jurnal_selected_from,null,false); ?></td>
				<td width="50">&nbsp;</td>
				<th>To</th><td><?php echo $form->dateTime('FilterJurnal.created_to','YMD','NONE',$jurnal_selected_to,null,false); ?></td>
				<th>
					<button type="submit" name="data[filter]" value="filter">Filter</button>
				</th>
			</tr>
		</table>
		<!-- END FILTER -->
		
		<p>
			<?php echo $paginator->counter(array(
			'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
			))?>
		</p>

		<table cellpadding="0" cellspacing="0" class="list">
			<tr>
				<th><?php echo __('No');?></th>
				<th width='75'><?php echo __('Tgl');?></th>
				<th><?php echo __('Ref');?></th>
				<th><?php echo __('Account');?></th>
				<th><?php echo __('Debit');?></th>
				<th><?php echo __('Credit');?></th>
			</tr>
			<?php $i = 0; foreach($jurnals as $jurnal):?>
				<?php $class = $i++ % 2 == 0 ? 'class="altrow"':null?>
				<tr <?php echo $class;?>>
					<td>
						<?php echo $i;?>
					</td>
					<td>
						<?php echo $time->format('d/m/y',$jurnal['AccountingTransaction']['created']) ?>
					</td>
					<td>
						<?php echo $jurnal['AccountingTransaction']['ref'] ?>
					</td>
					<td>
						<?php echo $jurnal['AccountDebit']['name']; ?><br/>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo $jurnal['AccountCredit']['name']; ?>
					</td>
					<td class="money">
						<?php echo $number->currency($jurnal['AccountingTransaction']['amount']); ?><br/>
						&nbsp;
					</td>
					<td class="money">
						&nbsp;<br/>
						<?php echo $number->currency($jurnal['AccountingTransaction']['amount']); ?>
					</td>
				</tr>
			<?php endforeach?>
		</table>
		<div class="paging">
			<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
		 | 	<?php echo $paginator->numbers();?>
			<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
		</div>
	</div>
</div>
