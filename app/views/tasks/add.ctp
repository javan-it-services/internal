<?php
$html->css("form",null,array(),false);
$html->css("datepicker",null,array(),false);

$javascript->link('prototype', false);
$javascript->link('scriptaculous.js?load=effects', false);
$javascript->link('ajaxupload', false);
$javascript->link('autoExpandContract', false);
$javascript->link('prototype-date-extensions', false);
$javascript->link('datepicker', false);

?>
<div class="page task add">
    <h2><?php __("Assign Task", false) ?></h2>
<?php echo $form->create("Task", array("class"=>"std")); ?>
    <fieldset>
            <ol>
                <li>
                    <label for="TaskName"><abbr title="required">*</abbr><?php __("Title", false) ?></label>
                    <input name="data[Task][name]" type="text" id="TaskName" />
                    <p class="helper"><?php __("Short name, easy remembered title", false) ?></p>
                </li>
                <li>
                    <label for="TaskDescription"><?php __("Description", false) ?></label>
                    <textarea name="data[Task][description]" id="TaskDescription" class="expand"></textarea>
                    <p class="helper"><?php __("More detailed description", false) ?></p>
                </li>
                <li class="separator"></li>
                <li>
                    <?php echo $form->input('deadline', array("type"=>"text","id"=>"dateDeadline", "class"=>"inputDate", "label"=>"<abbr title='required'>*</abbr>".__("Due", true))); ?>
                    <p class="helper"><?php __("Click on calendar icon to pick date", false) ?></p>
                    <p class="extra_helper"><?php __("format: yyyy-mm-dd", false) ?></p>
                </li>
                <li class="separator"></li>
                <li>
                    <?php echo $form->input('user_id', array("label"=>"Assign to")); ?>
                </li>
                <li>
                    <?php
                    if(isset($project_id)){
                        if($project)
                            echo $form->input('project_id',array("label"=> __("In Project"),"readonly"=>true));
                        else
                            echo "Project is not exists";
                    }
                    else{
                        echo $form->input('project_id', array("label"=> __("In Project",true), "empty"=>"--No Project--"));
                    }
                    ?>
                </li>
                <li class="separator"></li>
                <li class="message highlight">
                    <p>
                        <strong>Attachment</strong> <?php echo $html->image("loader_small.gif", array("id"=>"loader", "style"=>"display:none;")) ?>
                        <br />
                        <?php __("You can choose one or more files to be included as attachments.", false) ?>
                        <?php __("Other users related to this task will be able to download those files.", false) ?>
                    </p>
                    <br />
                    <p>
                        <?php echo $html->link(__("Add File",true),"",array("id"=>"btnAttach","class"=>"button action"))?>
                        <?php echo $html->link(__("Uploading",true),"",array("id"=>"btnAttachDisabled","class"=>"button action disabled","onclick"=>"return false","style"=>"display:none"))?>
                    </p>
                   <div id="attachments"></div>
                </li>
            </ol>
            <hr />
            <p><em><abbr title="required">*</abbr> indicates required fields</em></p>
            <div class="buttons">
                <button type="submit" class="button"><?php echo $html->image("icon/save_16.png") ?> Save</button>
                <?php echo $html->link(" Cancel","/tasks/index",array("class"=>"cancel button passive"))?>
            </div>

    </fieldset>
</form>
		<script type="text/javascript">
			new Ajax_upload('#btnAttach', {
				action: '<?php echo $html->url('/tasks/ajax_upload')?>',
				name: 'file',
                onSubmit : function(file, ext){
                    this.disable();
                    $('btnAttach').hide();
                    $("loader").show();
                    $("btnAttachDisabled").show();
                    Event.observe($('btnAttach'), "click", function(){return false});
                },

				onComplete : function(file, response){
                    $("loader").hide();
                    this.enable();
                    $('btnAttach').update("Add More File");
                    $('btnAttach').show();
                    $("btnAttachDisabled").hide();
					var index = $('attachments').childElements().length - 1;
					var hiddenInput = '<input type="hidden" name="data[files]['+index+']" value="'+response+'"/>';
					$('attachments').insert(new Element('p').update(file + hiddenInput));
				}
			});
		</script>

    </form>
</div>

<script type="text/javascript">
    var picker = new Control.DatePicker('dateDeadline', { dateFormat:"yyyy-MM-dd", icon:"../img/icon/calendar.png"});
</script>
