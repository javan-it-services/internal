<?php
    $html->css("form",null,array(),false);
    $javascript->link('prototype', false);
    $javascript->link('scriptaculous.js?load=effects,builder,dragdrop', false);
    $javascript->link('autoExpandContract', false);
?>

<div class="contracts form">
    <h2><?php __('Add Contract');?></h2>

<?php echo $form->create('Contract');?>
    <?php echo $form->input('id'); ?>
	<fieldset>
        <ol>
            <li><?php echo $form->input('user_id'); ?></li>
            <li><?php echo $form->input('duration'); ?></li>
            <li><?php echo $form->input('description', array("class"=>"expand")); ?></li>
            <li><?php echo $form->input('salary'); ?></li>
        </ol>
            <br />
            <hr />
            <p><em><abbr title="required">*</abbr> indicates required fields</em></p>
            <div class="buttons">
                <button type="submit" class="button"><?php echo $html->image("icon/save_16.png") ?> Save</button>
            </div>
	</fieldset>
</div>
