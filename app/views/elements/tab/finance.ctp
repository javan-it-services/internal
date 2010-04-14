<div id="tab" class="tab">
    <div class="spacer">
        <h2><?php echo upFirst($modul) ?></h2>
        <ul id="tab">
            <li><?php echo $html->link("Transaction","/transactions",array("class"=>($submodul=="transactions")?"current":"")); ?></li>
            <li><?php echo $html->link("Invoice","/invoices",array("class"=>($submodul=="invoices")?"current":"")); ?></li>
            <li><?php echo $html->link("Book","/books",array("class"=>($submodul=="books")?"current":"")); ?></li>
        </ul>
    </div>
</div>
