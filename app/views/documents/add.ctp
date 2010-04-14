<?php
    $html->css("form",null,array(),false);
    $javascript->link('prototype', false);
    $javascript->link('scriptaculous', false);
    $javascript->link('autoExpandContract', false);
?>

<div class="documents form page">
    <h2><?php __('Add Document');?></h2>

<?php echo $form->create('Document',array("type"=>"file"));?>
	<fieldset>
        <ol>
            <li><?php echo $form->input('catalog_id',array("type"=>"select","empty"=>true)); ?></li>
		<li><?php echo $form->input('task_id',array("type"=>"select","empty"=>true));?></li>
		<li><?php echo $form->input('contract_id',array("type"=>"select","empty"=>true));?></li>
		<li><?php echo $form->input('name');?></li>
		<li><?php echo $form->input('description', array("class"=>"expand"));?></li>
		<li><?php echo $form->input('user_id');?></li>
		<li><?php echo $form->label("File");?></li>
		<li><?php echo $form->file('file');?></li>
        </ol>
            <br />
            <hr />
            <p><em><abbr title="required">*</abbr> indicates required fields</em></p>
            <div class="buttons">
                <button type="submit" class="button"><?php echo $html->image("icon/save_16.png") ?> Save</button>
            </div>
	</fieldset>
    </form>
</div>
