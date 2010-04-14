<div class="page">

    <div class="message">
        <h3>You just create project <span><?php echo $this->data['Project']['name'] ?></span>
        with <span><?php echo $this->data['User']['fullname'] ?></span> as a leader.
        </h3>
        <p>
            You can allocate more employee to be involved in this project.
        </p>
    </div>
    <div class="box_radial">
        <h2><span>Choose</span> Team Member</h2>
        <hr />
        <?php
        echo $form->create("Project", array("url"=>"/projects/edit"));
        echo $form->input("id");
        echo $form->input('User', array('multiple' => 'checkbox', "label"=>false));
        ?>
        <br />
        <div class="buttons">
            <button type="submit" class="button"><?php echo $html->image("icon/save_16.png") ?> Save</button>
            <?php echo $html->link(" I will do this later","/projects/index",array("class"=>"cancel button passive"))?>
        </div>
        </form>
    </div>
</div>
