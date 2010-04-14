<div id="tab" class="tab">
    <div class="spacer">
        <h2><?php echo upFirst($modul) ?></h2>
        <ul id="tab">
            <li><?php echo $html->link("Task","/tasks", array("class"=>($submodul=="tasks")?"current":"")); ?></li>
            <li><?php echo $html->link("Worklog","/worklogs",array("class"=>($submodul=="worklogs")?"current":"")); ?></li>
            <li><?php echo $html->link("Project","/projects",array("class"=>($submodul=="projects")?"current":"")); ?></li>
        </ul>
    </div>
</div>
