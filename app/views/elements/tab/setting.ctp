<div id="tab" class="tab">
    <div class="spacer">
        <h2><?php echo upFirst($modul) ?></h2>
        <ul id="tab">
            <li><?php echo $html->link("Group","/groups",array("class"=>($submodul=="groups")?"current":"")); ?></li>
            <li><?php echo $html->link("Access Control","/configurations",array("class"=>($submodul=="configurations")?"current":"")); ?></li>
        </ul>
    </div>
</div>
