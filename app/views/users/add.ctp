<?php
    $html->css("form",null,array(),false);
?>

<div class="users form">
<h2><?php __('Add Employee');?></h2>

<?php echo $form->create('User');?>
	<fieldset>
        <ol>
            <li><?php echo $form->input('group_id', array("label"=>"<abbr>*</abbr> Role")); ?></li>
            <li><?php echo $form->input('username', array("label"=>"<abbr>*</abbr> Username")); ?></li>
            <li><?php echo $form->input('password', array("label"=>"<abbr>*</abbr> Password")); ?></li>
            <li class="separator"></li>
            <li><?php echo $form->input('fullname', array("label"=>"<abbr>*</abbr> Full Name")); ?></li>
            <li><?php echo $form->input('email', array("label"=>"<abbr>*</abbr> Email Address")); ?></li>
        </ol>
        <br />
        <hr />
        <p><em><abbr title="required">*</abbr> indicates required fields</em></p>
        <div class="buttons">
            <button type="submit" class="button"><?php echo $html->image("icon/save_16.png") ?> Save</button>
        </div>
	</fieldset>
</div>
