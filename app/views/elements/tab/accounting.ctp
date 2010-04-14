<div id="tab" class="tab">
    <div class="spacer">
        <h2><?php echo upFirst($modul) ?></h2>
        <ul id="tab">
            
            <li><?php echo $html->link("Transaction","/accounting_transactions",array("class"=>($submodul=="transaction")?"current":"")); ?></li>
            <li><?php echo $html->link("Adjustment Transaction","/accounting_adjustment_transactions",array("class"=>($submodul=="adjustment_transaction")?"current":"")); ?></li>
            <li><?php echo $html->link("Reporting","/accounting_reportings",array("class"=>($submodul=="reporting")?"current":"")); ?></li>
            <li><?php echo $html->link("Admin","/accounting_accounts",array("class"=>($submodul=="admin")?"current":"")); ?></li>
        </ul>
    </div>
</div>
