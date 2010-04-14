<div id="side_nav">
    <ul id="nav-02">
        <li <?php if($current=="list") echo "class='current'" ?>><?php echo $html->link($html->image("icon/table_48.png", array("width"=>"24")).__('All tasks', true),array('action'=>'index'),array(), false, false); ?></li>
        <li <?php if($current=="pending") echo "class='current'" ?>><?php echo $html->link($html->image("icon/table_48.png", array("width"=>"24")).__('Pending tasks', true), array('action'=>'pending'),array(), false, false); ?></li>
        <li <?php if($current=="active") echo "class='current'" ?>><?php echo $html->link($html->image("icon/table_48.png", array("width"=>"24")).__('Active tasks', true), array('action'=>'active'),null, false, false); ?></li>
        <li <?php if($current=="finished") echo "class='current'" ?>><?php echo $html->link($html->image("icon/table_48.png", array("width"=>"24")).__('Finished tasks', true), array('action'=>'finished'),null, false, false); ?></li>
    </ul>
</div>


<div class="actions">
	<ul>
		<li><?php echo $html->link(__('<span>Assign Task</span>', true), array('action'=>'add'),array("title"=>"Assign Task"), false, false); ?></li>
	</ul>
</div>
