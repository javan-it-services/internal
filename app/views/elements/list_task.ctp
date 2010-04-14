            <?php  if($tasks): ?>
                <table cellpadding="0" cellspacing="0">
                <tr>
                    <th class="">Task</th>
                    <th>Project</th>
                    <th>Start</th>
                    <th class="">Deadline</th>
                </tr>
                <?php
                $i = 0;
                foreach ($tasks as $task):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    $task_id = $task['Task']['id'] ;
                ?>
                    <tr<?php echo $class;?>>
                        <td>
                            <h4><?php echo $task['Task']['name']; ?></h4>
                            <?php echo $task['Task']['description']; ?>
                            <div class="actions">
                                <a href="#" onclick="Effect.toggle('notes<?php echo $task['Task']['id'] ?>', 'blind'); return false;"><span id="num_note<?php echo $task['Task']['id'] ?>"><?php echo count($task['Tasknote']) ?></span>
                                note(s)</a>
                                |
                                <span id="start_container<?php echo $task['Task']['id'] ?>">
                                    <?php
                                        switch($task['Task']['status']){

                                            // 0: pending task, need confirmation
                                            case 0:
                                                echo $ajax->link("Start It",
                                                                   "/tasks/ajax_start/".$task['Task']['id'],
                                                                   array("id"=>"start".$task['Task']['id'],
                                                                        "before"=>"$('start_container{$task['Task']['id']}').hide()",
                                                                        "complete"=>"$('start_container{$task['Task']['id']}').show()",
                                                                        "update"=>"started{$task['Task']['id']}",
                                                                        "success"=>"
                                                                            $('start_container{$task['Task']['id']}').update('You have started this task.');
                                                                            $('start_container{$task['Task']['id']}').addClassName('ajax_response notice');
                                                                            new Effect.Highlight('started{$task['Task']['id']}');
                                                                            $('numActive').update(parseInt($('numActive').innerHTML) + 1);
                                                                            $('numPending').update(parseInt($('numPending').innerHTML) - 1);
                                                                            "
                                                                        )
                                                                   );
                                                break;

                                            // 1: active task, need to finish or pending again
                                            case 1:
                                                echo $ajax->link("Finish It",
                                                                   "/tasks/ajax_finish/".$task['Task']['id'],
                                                                   array("id"=>"start".$task['Task']['id'],
                                                                        "before"=>"$('start_container{$task['Task']['id']}').hide()",
                                                                        "complete"=>"$('start_container{$task['Task']['id']}').show()",
                                                                        "update"=>"started{$task['Task']['id']}",
                                                                        "success"=>"
                                                                            $('start_container{$task['Task']['id']}').update('You have finish this task.');
                                                                            $('start_container{$task['Task']['id']}').addClassName('ajax_response notice');
                                                                            new Effect.Highlight('started{$task['Task']['id']}');
                                                                            $('numActive').update(parseInt($('numActive').innerHTML) - 1);
                                                                            $('numFinished').update(parseInt($('numFinished').innerHTML) + 1);
                                                                            "
                                                                        )
                                                                   );
                                                break;

                                            // 2: finished task, maybe need to be active again (you never know it, huh..)
                                            case 2:
                                                echo $ajax->link("Start It Again",
                                                                   "/tasks/ajax_start/".$task['Task']['id'],
                                                                   array("id"=>"start".$task['Task']['id'],
                                                                        "before"=>"$('start_container{$task['Task']['id']}').hide()",
                                                                        "complete"=>"$('start_container{$task['Task']['id']}').show()",
                                                                        "update"=>"started{$task['Task']['id']}",
                                                                        "success"=>"
                                                                            $('start_container{$task['Task']['id']}').update('You have started this task again.');
                                                                            $('start_container{$task['Task']['id']}').addClassName('ajax_response notice');
                                                                            new Effect.Highlight('started{$task['Task']['id']}');
                                                                            $('numActive').update(parseInt($('numActive').innerHTML) + 1);
                                                                            $('numFinished').update(parseInt($('numFinished').innerHTML) - 1);
                                                                            "
                                                                        )
                                                                   );
                                                break;

                                        }

                                    ?>
                                </span>
                            </div>

                        </td>
                        <td>
                            <?php echo $task['Project']['name']; ?>
                        </td>
                        <td>
                            <div id="started<?php echo $task_id ?>"><?php echo $task['Task']['started']; ?></div>
                        </td>
                        <td>
                            <?php echo $task['Task']['deadline']; ?>
                        </td>
                    </tr>
                        <tr>
                            <td class="notes" colspan="5">
                            <div class="notes"  id="notes<?php echo $task['Task']['id'] ?>" style="display:none">
                            <?php foreach ($task['Tasknote'] as $note): ?>
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
                                    <div class="content"><?php echo $note['note'] ?></div>
                                    <div class="info"><?php echo $note['created'] ?></div>
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
            <?php else: ?>
            <div class="message">No task found.</div>
            <?php endif; ?>
