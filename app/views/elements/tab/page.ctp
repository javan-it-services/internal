<div id="tab" class="tab">
    <div class="spacer">
        <?php if(isset($back)): ?>
        <div id="back" style="float:left"><?php echo $html->link("&larr;".$back['title'], $back['url'],array(),false,false) ?></div>
        <?php endif; ?>
        <?php if(isset($next)): ?>
        <div id="next" style="float:right"><?php echo $html->link($next['title']."&rarr;", $next['url'],array(),false,false) ?></div>
        <?php endif; ?>
        <div class="clear"></div>
    </div>
</div>
