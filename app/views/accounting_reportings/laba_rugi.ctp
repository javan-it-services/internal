<div class="accountingAccounts index page">
	<!--left column -->
	<div id="column_left" class="grid_3 alpha">
		<div class="grid_3 alpha omega">
			<?php echo $this->renderElement("nav_accounting_report")?>
		</div>
	</div>
	<!--end left column-->
	<div id="column_right" class="grid_13 omega">
		<h2><?php echo __('Laporan Laba Rugi')?></h2>
		
		<!-- START FILTER -->
		<?php echo $form->create('FilterLabaRugi',array('url' => '/accounting_reportings/laba_rugi')); ?>
		
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th>Per</th>
				<td><?php echo $form->month('FilterLabaRugi',$selected_month,null,false)?></td>
				<td><?php echo $form->year('FilterLabaRugi',2006,null,$selected_year,null,false)?></td>
				
				<th>
					<?php echo $form->end("Show")?>
				</th>
			</tr>
		</table>
		<!-- END FILTER -->
		
		<table cellpadding="0" cellspacing="0" class="list">
			<tbody>
				<tr>
					<th colspan="3">PENDAPATAN</th>
				</tr>
				<?php foreach($laba_rugi['PENDAPATAN']['data'] as $n):?>
				<tr>
					<td><?php echo $n['Account']['name'] ?></td>
					<td class="money"><?php echo $number->currency($n[0]['jumlah']) ?></td>
					<td>&nbsp;</td>
				</tr>
				<?php endforeach?>
				<tr>
					<td colspan="2"><b>Total PENDAPATAN</b></td>
					<td class="money"><?php echo $number->currency($laba_rugi['PENDAPATAN']['jumlah']) ?></td>
				</tr>
				
				
				<tr>
					<th colspan="3">BEBAN</th>
				</tr>
				<?php foreach($laba_rugi['BEBAN']['data'] as $n):?>
				<tr>
					<td><?php echo $n['Account']['name'] ?></td>
					<td class="money"><?php echo $number->currency($n[0]['jumlah']) ?></td>
					<td>&nbsp;</td>
				</tr>
				<?php endforeach?>
				<tr>
					<td colspan="2"><b>Total BEBAN</b></td>
					<td class="money"><?php echo $number->currency($laba_rugi['BEBAN']['jumlah']) ?></td>
				</tr>
				
				<tr>
					<th colspan="2">LABA</th>
					<th class="money"><?php echo $number->currency($laba_rugi['PENDAPATAN']['jumlah'] + $laba_rugi['BEBAN']['jumlah']) ?> </th>
				</tr>
			</tbody>
		</table>
	</div>
</div>
