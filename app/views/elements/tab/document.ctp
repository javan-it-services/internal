<div id="tab" class="tab">
    <div class="spacer">
        <h2><?php echo upFirst($modul) ?></h2>
        <ul id="tab">
            <li><?php echo $html->link("Document","/documents",array("class"=>($submodul=="documents")?"current":"")); ?></li>
            <li><?php echo $html->link("Catalog","/catalogs",array("class"=>($submodul=="catalogs")?"current":"")); ?></li>
        </ul>
    </div>
</div>
