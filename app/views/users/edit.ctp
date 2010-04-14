<?php
    $html->css("form",null,array(),false);
?>

<div class="users form">
<h2><?php __('Edit Employee');?></h2>

<?php echo $form->create('User');?>
    <?php echo $form->input('id'); ?>
	<fieldset>
        <ol>
            <li><?php echo $form->input('group_id'); ?></li>
            <li><?php echo $form->input('username'); ?></li>
            <li><?php echo $form->input('password'); ?></li>
            <li><?php echo $form->input('fullname'); ?></li>
            <li><?php echo $form->input('email'); ?></li>
        </ol>
        <br />
        <hr />
        <p><em><abbr title="required">*</abbr> indicates required fields</em></p>
        <div class="buttons">
            <button type="submit" class="button"><?php echo $html->image("icon/save_16.png") ?> Save</button>
        </div>
	</fieldset>
</div>
