<?php
    $html->css("form",null,array(),false);
    $html->css("datepicker",null,array(),false);

    $javascript->link('prototype', false);
    $javascript->link('scriptaculous', false);
    $javascript->link('autoExpandContract', false);
    $javascript->link('prototype-date-extensions', false);
    $javascript->link('datepicker', false);
?>

<div class="transactions form page">
    <h2><?php __('Add Transaction');?></h2>

<?php echo $form->create('Transaction');?>
<?php echo $form->input("id") ?>
	<fieldset>
        <ol>
            <li><?php echo $form->input('book_id'); ?></li>
            <li><?php echo $form->input('description'); ?></li>
            <li class="checkbox"><label><?php echo $form->input('credit',array("label"=>false,"div"=>false)); ?>Income?</label></li>
            <li><?php echo $form->input('amount'); ?></li>
            <li><?php echo $form->input('date', array("type"=>"text","id"=>"dateDeadline", "class"=>"inputDate")); ?></li>
        </ol>
        <br />
        <hr />
        <p><em><abbr title="required">*</abbr> indicates required fields</em></p>
        <div class="buttons">
            <button type="submit" class="button"><?php echo $html->image("icon/save_16.png") ?> Save</button>
        </div>
	</fieldset>
</div>

<script type="text/javascript">
    var picker = new Control.DatePicker('dateDeadline', { dateFormat:"yyyy-MM-dd", icon:"../img/icon/calendar.png"});
</script>
