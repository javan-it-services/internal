<div class="accountingAccounts index page">
	<!--left column -->
	<div id="column_left" class="grid_3 alpha">
		<div class="grid_3 alpha omega">
			<?php echo $this->renderElement("nav_accounting_report")?>
		</div>
	</div>
	<!--end left column-->
	<div id="column_right" class="grid_13 omega">
		<h2><?php __('Buku Besar');?></h2>
		
		<!-- START FILTER -->
		<?php echo $form->create('FilterBukuBesar',array('url' => '/accounting_reportings/buku_besar','id'=>'filters')); ?>
		
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th>Account </th>
				<td><?php echo $form->select('FilterBukuBesar.account',$accounts,null,null,false)?></td>
	
				<th>Month </th>
				<td><?php echo $form->month('FilterBukuBesar',$selected_month,null,false)?></td>

				<th>Year </th>
				<td><?php echo $form->year('FilterBukuBesar',2006,null,$selected_year,null,false)?></td>
				
				<th><?php echo $form->end('Show')?></th>
			</tr>
		</table>
		<?php if(isset($bukubesars)):?>
			<table cellpadding="0" cellspacing="0" class="list">
				<thead>
					<tr>
						<th colspan="2"><?php echo $account['AccountingAccount']['name'] ?></th>
						<th colspan="2">No. Perkiraan: <?php echo $account['AccountingAccount']['nomor'] ?></th>
					</tr>
					<tr>
						<th align="left">Tgl</th>
						<th align="left">Reff</th>
						<th align="left">Debit</th>
						<th align="left">Kredit</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Awal</td>
						<td>-</td>
						<td class="money"><?php echo $number->currency($saldo_awal_debit) ?></td>
						<td class="money"><?php echo $number->currency($saldo_awal_credit) ?></td>
					</tr>
					<?php foreach($bukubesars as $buku):?>
					<tr>
						<td>
							<?php echo $time->format('d/m/y',$buku['AccountingBukuBesar']['created']) ?>
						</td>
						<td>
							<?php echo $buku['AccountingTransaction']['name']?>
						</td>
						<td class="money">
							<?php echo $buku['AccountingBukuBesar']['debit']!=0?$number->currency($buku['AccountingBukuBesar']['debit']):' '?>
						</td>
						<td class="money">
							<?php echo $buku['AccountingBukuBesar']['credit']!=0?$number->currency($buku['AccountingBukuBesar']['credit']):' '?>
						</td>
					</tr>
					<?php endforeach?>
					<tfoot>
						<tr>
							<th colspan="2">Saldo</th>
							<th class="money"><?php echo $number->currency($saldo_debit + $saldo_awal_debit) ?></th>
							<th class="money"><?php echo $number->currency($saldo_credit + $saldo_awal_credit )?></th>
						</tr>
						<tr>
							<th colspan="2">&nbsp;</th>
							<th class="money"><?php echo $number->currency($saldo_akhir_debit) ?></th>
							<th class="money"><?php echo $number->currency($saldo_akhir_credit) ?></th>
						</tr>
					</tfoot>
				</tbody>
			</table>
		<?php endif?>
	</div>
</div>
