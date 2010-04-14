<div class='note' id="note_content<?php echo $note['Tasknote']['id'] ?>">
    <div class='actions' style='float:right'>
        <?php
            echo $ajax->link("remove"
                        ,"/tasknotes/delete/".$note['Tasknote']['id']
                        ,array("success"=>"Effect.Fade('note_content{$note['Tasknote']['id']}');
                                            $('num_note{$note['Tasknote']['task_id']}').update(parseInt($('num_note{$note['Tasknote']['task_id']}').innerHTML) - 1)
                                            ",
                               )
                        ,"Are you sure to remove this note ?")
        ?>
    </div>
        <div class="info"><?php echo $html->link($note['User']['fullname'],"/users/view/".$note['User']['id']) ?> <?php echo $note['Tasknote']['created'] ?></div>
        <div class="content"><?php echo $note['Tasknote']['note'] ?></div>
</div>
<?php echo $javascript->codeBlock("new Effect.Highlight('note_content{}')") ?>
