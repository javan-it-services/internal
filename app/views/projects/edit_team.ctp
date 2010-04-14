<div class="page">
    <div class="box_radial">
        <h2><span>Edit</span> Team Member</h2>
        <hr />
        <?php
        echo $form->create("Project", array("url"=>"/projects/edit"));
        echo $form->input("id");
        echo $form->input('User', array('multiple' => 'checkbox', "label"=>false));
        ?>
        <br />
        <div class="buttons">
            <button type="submit" class="button"><?php echo $html->image("icon/save_16.png") ?> Save</button>
            <?php echo $html->link(" Cancel","/projects/index",array("class"=>"cancel button passive"))?>
        </div>
        </form>
    </div>
</div>
