<div class="accountingAccounts index page">
	<!--left column -->
	<div id="column_left" class="grid_3 alpha">
		<div class="grid_3 alpha omega">
			<?php echo $this->renderElement("nav_accounting_report")?>
		</div>
	</div>
	<!--end left column-->
	<div id="column_right" class="grid_13 omega">
		<h2><?php echo __('Neraca Saldo')?></h2>
		
		
		
		<!-- START FILTER -->
		<?php echo $form->create('FilterNeracaSaldo',array('url' => '/accounting_reportings/neraca_saldo')); ?>
		
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th>Per</th>
				<td><?php echo $form->month('FilterNeracaSaldo',$selected_month,null,false)?></td>
				<td><?php echo $form->year('FilterNeracaSaldo',2006,null,$selected_year,null,false)?></td>
				
				<th>
					<?php echo $form->end("Show")?>
				</th>
			</tr>
		</table>
		<!-- END FILTER -->
		
		
		<table cellpadding="0" cellspacing="0" class="list">
			<thead>
				<tr>
					<th>No.</th>
					<th>Account</th>
					<th>Debit</th>
					<th>Credit</th>
				</tr>
			</thead>
			<tbody>
				<?php $jumlah_debit = $jumlah_credit = 0;foreach($neraca as $n):?>
				<tr>
					<td><?php echo $n['Account']['nomor'] ?></td>
					<td><?php echo $n['Account']['name'] ?></td>
					<td class="money"><?php echo $n[0]['debit'] > 0 ? $number->currency($n[0]['debit']):' ' ?></td>
					<td class="money"><?php echo $n[0]['credit'] > 0 ? $number->currency($n[0]['credit']):' ' ?></td>
				</tr>
				<?php $jumlah_debit += $n[0]['debit'] > 0 ? $n[0]['debit']:0 ?>
				<?php $jumlah_credit += $n[0]['credit'] > 0 ? $n[0]['credit']:0 ?>
				<?php endforeach?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="2">Saldo</th>
					<th class="money"><?php echo $number->currency($jumlah_debit) ?></th>
					<th class="money"><?php echo $number->currency($jumlah_credit) ?></th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
