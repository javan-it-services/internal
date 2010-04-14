<?php
    $html->css("form",null,array(),false);
    $javascript->link('prototype', false);
    $javascript->link('scriptaculous', false);
    $javascript->link('autoExpandContract', false);
?>

<div class="catalogs form page">
    <h2><?php __('Add Book');?></h2>

<?php echo $form->create('Book');?>
    <?php echo $form->input('id'); ?>
	<fieldset>
        <ol>
            <li><?php echo $form->input('name'); ?></li>
            <li><?php echo $form->input('desctiption', array("class"=>"expand")); ?></li>
        </ol>
            <br />
            <hr />
            <p><em><abbr title="required">*</abbr> indicates required fields</em></p>
            <div class="buttons">
                <button type="submit" class="button"><?php echo $html->image("icon/save_16.png") ?> Save</button>
            </div>
	</fieldset>
</div>
