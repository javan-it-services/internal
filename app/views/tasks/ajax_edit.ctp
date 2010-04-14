<div class="tasks form">
<?php if (isset($closeModalbox) && $closeModalbox) {$session->flash();echo "<div id='closeModalbox'></div>";exit();}  ?>

<?php
echo $ajax->form('edit', 'post', array(
    'model'    => 'Task',
    'url'      => array( 'controller' => 'tasks', 'action' => 'ajax_edit'),
    'update'   => 'MB_content',
    'complete' => 'closeModalbox()'

));
    echo $form->hidden("id");

?>

	<fieldset>
	<?php
        if(isset($this->data['Task']['creator_id']) && $this->data['Task']['creator_id'] == $currentUser['id']){
            echo $form->input('user_id', array("label"=>"Assign to"));
            if(isset($project_id)){
                if($project)
                    echo $form->input('project_id',array("label"=>"In Project","type"=>"select","readonly"=>true));
                else
                    echo "Project is not exists";
            }
            else{
                echo $form->input('project_id', array("label"=>"In Project"));
            }
            echo $form->input('name', array("label"=>"Title","size"=>"12"));
            echo $form->input('description',array("rows"=>"6","cols"=>"12"));
            echo $form->input('deadline');

        }else{
            echo $form->input('taskstatus_id', array("label"=>"Change Status"));
        }
	?>
	</fieldset>

    <div class="buttons">
        <button type="submit" class="button"><?php echo $html->image("icon/save_16.png") ?> Save</button>
        <?php echo $html->link("or cancel","",array("class"=>"cancel button passive","onclick"=>"Modalbox.hide();return false;")) ?>
    </div>

    </form>
</div>
