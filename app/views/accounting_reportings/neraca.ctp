<div class="accountingAccounts index page">
	<!--left column -->
	<div id="column_left" class="grid_3 alpha">
		<div class="grid_3 alpha omega">
			<?php echo $this->renderElement("nav_accounting_report")?>
		</div>
	</div>
	<!--end left column-->
	<div id="column_right" class="grid_13 omega">
		<h2><?php echo __('Neraca')?></h2>
		
		<!-- START FILTER -->
		<?php echo $form->create('FilterNeraca',array('url' => '/accounting_reportings/neraca')); ?>
		
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th>Per</th>
				<td><?php echo $form->month('FilterNeraca',$selected_month,null,false)?></td>
				<td><?php echo $form->year('FilterNeraca',2006,null,$selected_year,null,false)?></td>
				
				<th>
					<?php echo $form->end("Show")?>
				</th>
			</tr>
		</table>
		<!-- END FILTER -->
		
		<table cellpadding="0" cellspacing="0" class="list">
			<tbody>
				<tr>
					<th colspan="3">AKTIVA</th>
				</tr>
				<?php foreach($neraca['AKTIVA']['data'] as $n):?>
				<tr>
					<td><?php echo $n['Account']['name'] ?></td>
					<td class="money"><?php echo $number->currency($n[0]['jumlah']) ?></td>
					<td>&nbsp;</td>
				</tr>
				<?php endforeach?>
				<tr>
					<td colspan="2"><b>Total Aktiva</b></td>
					<td class="money"><?php echo $number->currency($neraca['AKTIVA']['jumlah']) ?></td>
				</tr>
				
				<tr>
					<th colspan="3">KEWAJIBAN DAN EKUITAS</th>
				</tr>
				<tr>
					<td colspan="3"><b>Kewajiban:</b></td>
				</tr>
				
				<?php foreach($neraca['KEWAJIBAN']['data'] as $n):?>
				<tr>
					<td><?php echo $n['Account']['name'] ?></td>
					<td class="money"><?php echo $number->currency($n[0]['jumlah']) ?></td>
					<td>&nbsp;</td>
				</tr>
				<?php endforeach?>
				
				<tr>
					<td colspan="2"><b>Total Kewajiban</b></td>
					<td class="money"><?php echo $number->currency($neraca['KEWAJIBAN']['jumlah']) ?></td>
				</tr>
				
				<tr>
					<td colspan="3"><b>Ekuitas:</b></td>
				</tr>
				<?php foreach($neraca['EKUITAS']['data'] as $n):?>
				<tr>
					<td><?php echo $n['Account']['name'] ?></td>
					<td class="money"><?php echo $number->currency($n[0]['jumlah']) ?></td>
					<td>&nbsp;</td>
				</tr>
				<?php endforeach?>
				<tr>
					<td colspan="2"><b>Total Ekuitas</b></td>
					<td class="money"><?php echo $number->currency($neraca['EKUITAS']['jumlah']) ?></td>
				</tr>
				<tr>
					<td colspan="2"><b>Total Kewajiban dan Ekuitas</b></td>
					<td class="money"><?php echo $number->currency($neraca['KEWAJIBAN']['jumlah'] + $neraca['EKUITAS']['jumlah']) ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
