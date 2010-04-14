<div id="side_nav">
    <ul id="nav-02">
        <li <?php if($current=="jurnal") echo "class='current'" ?>>
			<?php echo $html->link(__('Jurnal', true),array(
				'action'=>'jurnal'
			),array(), false, false); ?>
		</li>
		<li <?php if($current=="buku_besar") echo "class='current'" ?>>
			<?php echo $html->link(__('Buku Besar', true),array(
				'action'=>'buku_besar'
			),array(), false, false); ?>
		</li>
		<li <?php if($current=="neraca_saldo") echo "class='current'" ?>>
			<?php echo $html->link(__('Neraca Saldo', true),array(
				'action'=>'neraca_saldo'
			),array(), false, false); ?>
		</li>
		<li <?php if($current=="neraca") echo "class='current'" ?>>
			<?php echo $html->link(__('Neraca', true),array(
				'action'=>'neraca'
			),array(), false, false); ?>
		</li>
		<li <?php if($current=="laba_rugi") echo "class='current'" ?>>
			<?php echo $html->link(__('Laba Rugi', true),array(
				'action'=>'laba_rugi'
			),array(), false, false); ?>
		</li>
		<li <?php if($current=="jurnal_penyesuaian") echo "class='current'" ?>>
			<?php echo $html->link(__('Jurnal Penyesuaian', true),array(
				'action'=>'jurnal_penyesuaian'
			),array(), false, false); ?>
		</li>
		<li <?php if($current=="neraca_lajur") echo "class='current'" ?>>
			<?php echo $html->link(__('Neraca Lajur', true),array(
				'action'=>'neraca_lajur'
			),array(), false, false); ?>
		</li>
		<li <?php if($current=="jurnal_penutup") echo "class='current'" ?>>
			<?php echo $html->link(__('Jurnal Penutup', true),array(
				'action'=>'jurnal_penutup'
			),array(), false, false); ?>
		</li>
	</ul>
</div>
