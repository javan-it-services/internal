<div>
<?php if (isset($closeModalbox) && $closeModalbox) echo "<div id='closeModalbox'></div>";  ?>

<?php
echo $ajax->form('add', 'post', array(
    'model'    => 'Task',
    'url'      => array( 'controller' => 'tasks', 'action' => 'ajax_add'),
    'update'   => 'MB_content',
    'complete' => 'closeModalbox()'
));
?>
<table class="form">
    <tr>
        <td colspan=2>
            <?php
                echo $form->input('name', array("label"=>"Title","size"=>"12"));
                echo $form->input('description',array("rows"=>"6","cols"=>"12"));
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo $form->input('user_id', array("label"=>"Assign to")); ?>
        </td>
        <td>
            <?php
            if(isset($project_id)){
                if($project)
                    echo $form->input('project_id',array("label"=>"In Project","type"=>"select","readonly"=>true));
                else
                    echo "Project is not exists";
            }
            else{
                echo $form->input('project_id', array("label"=>"In Project"));
            }
            ?>
        </td>
    </tr>

</table>

<?php
		echo $form->input('deadline', array("type"=>"text", "size"=>"5","id"=>"dateDeadline"));
		echo $form->file('attachment');
	?>
		<script type="text/javascript">
			new Ajax_upload('#TaskAttachment', {
				action: '<?php echo $html->url('/tasks/ajax_upload')?>',
				name: 'file',
				onComplete : function(file, response){
					var index = $('attachments').childElements().length - 1;
					var hiddenInput = '<input type="hidden" name="data[files]['+index+']" value="'+response+'"/>';
					$('attachments').insert(new Element('li').update(file + hiddenInput));
					//
				}
			});
		</script>
		<ol id="attachments"></ol>

    <div class="buttons">
        <button type="submit" class="button"><?php echo $html->image("icon/save_16.png") ?> Save</button>
        <?php echo $html->link("Cancel","",array("class"=>"cancel button passive","onclick"=>"Modalbox.hide();return false;")) ?>
    </div>

    </form>
</div>

<script type="text/javascript">
    var picker = new Control.DatePicker('dateDeadline', { dateFormat:"dd-mm-yyyy"});
</script>
