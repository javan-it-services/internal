<?php
    $html->css("form",null,array(),false);
?>

<div class="invoices form page">
    <h2><?php __('Add Invoice');?></h2>

<?php echo $form->create('Invoice');?>
	<fieldset>
	<ol>
    <li><?php echo $form->input('client_id');?></li>
    <li class="separator"></li>
    </ol>
            <p><em><abbr title="required">*</abbr> indicates required fields</em></p>
            <div class="buttons">
                <button type="submit" class="button"><?php echo $html->image("icon/save_16.png") ?> Save</button>
            </div>
	</fieldset>
    </form>
</div>
