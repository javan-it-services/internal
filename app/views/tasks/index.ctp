<?php
    $html->css("modalbox",null,array(),false);
    $html->css("form",null,array(),false);

    $javascript->link('prototype', false);
    $javascript->link('scriptaculous.js?load=effects', false);
    $javascript->link('autoExpandContract', false);
    $javascript->link('modalbox', false);
    $javascript->link('cookies', false);
    $javascript->link('app', false);
?>

<div class="index page">
    <!--left column -->
    <div id="column_left" class="grid_3 alpha">
        <div class="grid_3 alpha omega">
            <?php echo $this->renderElement("nav_task") ?>
        </div>
    </div>
    <!--end left column-->


    <!--right column-->
    <div id="column_right" class="grid_13 omega">

        <div id="tasklist" class="grid_13 alpha omega">
            <div class="top"></div>
            <div class="spacer">
            <?php  if($tasks): ?>
        <form class="plain">
            <table class="plain">
                <tr>
                    <td><label class="ghost"><input id="chkReceived" name="received" type="checkbox" checked="checked" onchange="setCookie('task_received', this.checked);toggleView('received', this.checked);" />Received</label></td>
                    <td><label class="ghost"><input id="chkCreated" nama="created" type="checkbox" checked="checked" onchange="setCookie('task_created', this.checked);toggleView('created', this.checked);" />Create by me</label></td>
                </tr>
            </table>
        </form>

                <table id="tblTask" class="list" cellpadding="0" cellspacing="0">
                <tr>
                    <th class="first">&nbsp;</th>
                    <th>Task</th>
                    <th>Assigned</th>
                    <th >Deadline</th>
                    <th class="last">Attachment</th>
                </tr>
                <?php
                $i = 0;
                foreach ($tasks as $task):
                    //just another counter
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = "altrow";
                    }
                    // shortcut call
                    $task_id = $task['Task']['id'] ;

                    //prepare data to display
                    if($task['Task']['creator_id']==$currentUser['id']){
                        $mode = "created";
                        $fromTo = "<span class='ket'>To</span> ".$html->link($task['User']['fullname'], "/users/view/".$task['User']['id']);
                    }else{
                        $mode = "received";
                        $fromTo = "<span class='ket'>From</span> ".$html->link($task['Creator']['fullname'], "/users/view/".$task['Creator']['id']);
                    }

                ?>
                    <tr class="<?php echo $mode." ". $class  ?>" style="display:none">
                        <td class="first">
                            <?php echo $fromTo ?>
                            <br /><span class="ket">on</span> <?php echo $task['Project']['name']; ?>
                            <br /><span class="ket">status: </span><span class="status <?php echo low($task['Taskstatus']['name']) ?>"><?php echo $task['Taskstatus']['name'] ?></span>
                        </td>
                        <td>
                            <h4><?php echo $task['Task']['name']; ?></h4>
                            <?php echo $task['Task']['description']; ?>
                        </td>
                        <td>
                            <div id="started<?php echo $task_id ?>"><?php echo $time->niceShort($task['Task']['started']); ?></div>
                        </td>
                        <td>
                            <?php echo $time->niceShort($task['Task']['deadline']); ?>
                        </td>
                        <td class="last">
                            <ul>
                            <?php foreach($task['Document'] as $doc):?>
                            	<li><a href="<?php echo $html->url('/files/tasks/'.$task['Task']['id'].'/'.$doc['filename'])?>"><?php echo $doc['filename']?></a></li>
                            <?php endforeach?>
                            </ul>
                        </td>
                    </tr>
                    <tr class="<?php echo $mode." ". $class  ?> actions">
                        <td colspan="6">
                            <div class="actions">
                                <a href="#" onclick="Effect.toggle('notes<?php echo $task['Task']['id'] ?>', 'blind'); return false;"><span id="num_note<?php echo $task['Task']['id'] ?>"><?php echo count($task['Tasknote']) ?></span>
                                note(s)</a>
                                |
                                <?php if($task['Task']['creator_id'] == $currentUser['id']): ?>
                                   <?php echo $html->link(__('Edit', true), array('action' => 'edit', $task['Task']['id']), array('title' => 'Edit task')); ?>
                                <?php else: ?>
                                   <?php echo $html->link(__('Edit', true), array('action' => 'ajax_edit', $task['Task']['id']), array('title' => 'Edit task', 'onclick' => "Modalbox.show(this.href, {title: this.title}); return false;")); ?>
                                <?php endif; ?>
                                |
                            <?php echo $html->link(__('Delete', true), array('action'=>'delete', $task['Task']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $task['Task']['id'])); ?>

                            </div>

                        </td>
                    </tr>
                    <tr class="<?php echo $mode  ?>" style="display:none">
                        <td class="notes" colspan="6">
                        <div class="notes"  id="notes<?php echo $task['Task']['id'] ?>" style="display:none">
                        <?php foreach ($task['Tasknote'] as $note):?>
                            <div class="note" id="note_content<?php echo $note['id'] ?>">
                                <div class="actions" style="float:right">
                                    <?php echo $ajax->link("remove"
                                                            ,"/tasknotes/delete/".$note['id']
                                                            ,array("success"=>" Effect.Fade('note_content{$note['id']}');
                                                                                $('num_note{$task['Task']['id']}').update(parseInt($('num_note{$task['Task']['id']}').innerHTML) - 1)
                                                                                ",
                                                                   )
                                                            ,"Are you sure to remove this note ?")
                                    ?>
                                </div>
                                <div class="info"><?php echo $html->link($note['User']['fullname'],"/users/view/".$note['User']['id']) ?> <?php echo $time->niceShort($note['created']) ?></div>
                                <div class="content"><?php echo $note['note'] ?></div>
                            </div>
                        <?php endforeach; ?>
                            <div id="postNote<?php echo $i ?>" class="note">
                                <?php echo $form->create("Tasknote".$i,array("action"=>"addnote")); ?>
                                <?php echo $form->hidden("Tasknote.task_id",array("value"=>$task["Task"]["id"])) ?>
                                <?php echo $form->textarea("Tasknote.note",array("id"=>"note$i",
                                                                                 "cols"=>20,
                                                                                 "rows"=>2,
                                                                                 "class"=>"expand"
                                                                                 )) ?>
                                <div class="buttons">
                                    <?php
                                    //echo $form->submit("Endwork", array("div"=>false));
                                    echo $ajax->submit("Post it",array("url"=>"/tasknotes/ajax_add",
                                                                    "name"=>"data[Tasknote][submit]",
                                                                    "id"=>"btnPostNote$i",
                                                                    "class"=>"button",
                                                                    "div"=>false,
                                                                    "before"=>"$('btnPostNote$i').addClassName('disabled')",
                                                                    "complete"=>"$('btnPostNote$i').removeClassName('disabled');$('note$i').value='';$('note$i').focus();",
                                                                    "success"=>"new Insertion.Before('postNote$i', request.responseText);
                                                                                $('num_note{$task['Task']['id']}').update(parseInt($('num_note{$task['Task']['id']}').innerHTML) + 1)
                                                                    "
                                                                    ))
                                    ?>
                                </div>
                                <?php echo $form->end(); ?>
                            </div>
                        </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </table>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
            <?php else: ?>
            <div class="message notice">No task found.</div>
            <?php endif; ?>

            </div>
            <!--end spacer-->
            <div class="bottom"></div>
        </div>
    </div>

</div>
<!--end tasks -->

<script type="text/javascript">
    $('chkReceived').checked = (getCookie('task_received')=="true" || getCookie('task_received')==null);
    toggleView('received', $('chkReceived').checked);

    $('chkCreated').checked = (getCookie('task_created')=="true"|| getCookie('task_created')==null);
    toggleView('created', $('chkCreated').checked);
</script>
