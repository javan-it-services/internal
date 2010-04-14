<div id="side_nav">
    <ul id="nav-02">
        <li <?php if($current=="account") echo "class='current'" ?>>
			<?php echo $html->link(__('Account', true),array(
				'controller' => 'accounting_accounts','action'=>'index'
			),array(), false, false); ?>
		</li>
    </ul>
</div>
