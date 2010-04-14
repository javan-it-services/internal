<div id="tab" class="tab">
    <div class="spacer">
        <h2><?php echo Inflector::humanize($modul) ?></h2>
        <ul id="tab">
            <li><?php echo $html->link("Client","/clients", array("class"=>($submodul=="clients")?"current":"")); ?></li>
            <li><?php echo $html->link("Employee","/users",array("class"=>($submodul=="employees")?"current":"")); ?></li>
            <li><?php echo $html->link("Contract","/contracts",array("class"=>($submodul=="contracts")?"current":"")); ?></li>
        </ul>
    </div>
</div>
