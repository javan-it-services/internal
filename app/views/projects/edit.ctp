<?php
    $html->css("dateslider",null,array(),false);
    $html->css("form",null,array(),false);

    $javascript->link('prototype', false);
    $javascript->link('scriptaculous.js?load=effects,builder,dragdrop', false);
    $javascript->link('autoExpandContract', false);
    $javascript->link('date', false);
    $javascript->link('dateslider', false);
?>

<div class="projects edit page">
<h2><?php __('Edit Project');?></h2>
<?php echo $form->create('Project');?>
    <?php echo $form->input('id'); ?>
    <fieldset>
        <ol>
            <li><?php echo $form->input('name', array("label"=>"<abbr>*</abbr> Name")); ?></li>
            <li><?php echo $form->input('user_id',array("label"=>"<abbr>*</abbr> Project Leader")); ?></li>
            <li class="separator"></li>
            <li><?php echo $form->input('description', array("class"=>"expand")); ?></li>
            <li class="separator"></li>
            <li><?php echo $form->input('client_id', array("label"=>"<abbr>*</abbr> Client")); ?></li>
            <li>
                <?php echo $form->input('value', array("label"=>"<abbr>*</abbr> Value")); ?>
                <p class="helper">Project value, based on contract or estimated.</p>
                <p class="extra_helper">example: type 23000000 for Rp 23.000.000</p>
            </li>

            <li class="separator"></li>
            <li ><label ><?php __("Duration") ?></label>
                <p>Use slider below to adjust start and finish date.</p>
            </li>
            <li>
                <label class="ghost"></label>
                <div id = "slider-container"><div id = "sliderbar"></div></div>
            </li>
            <li>
                <label class="ghost"></label>
                <?php echo $form->input('start', array("type"=>"text", "id"=>"datestart", "class"=>"inputDate", "label"=>false)); ?>
                <p class="helper" id="startNice"></p>
                <p class="extra_helper"><abbr>*</abbr> Start Date</p>
            </li>
            <li>
                <label class="ghost"></label>
                <?php echo $form->input('end', array("type"=>"text", "id"=>"dateend", "class"=>"inputDate", "label"=>false)); ?>
                <p class="helper" id="endNice"></p>
                <p class="extra_helper"><abbr>*</abbr> End Date</p>
            </li>
        </ol>
<script language = "javascript">
p_oDateSlider = new DateSlider('sliderbar', '<?php echo date('Y-m-d') ?>', '2009-08-06', <?php echo date('Y')-1 ?>, <?php echo date('Y')+2 ?>);
p_oDateSlider.attachFields($('datestart'), $('dateend'),$('startNice'),$('endNice'));
</script>

    <hr />
    <p><em><abbr title="required">*</abbr> indicates required fields</em></p>
    <div class="buttons">
        <button type="submit" class="button"><?php echo $html->image("icon/save_16.png") ?> Save</button>
        <?php echo $html->link(" Cancel","/projects/index",array("class"=>"cancel button passive"))?>
    </div>
    </fieldset>
</div>
