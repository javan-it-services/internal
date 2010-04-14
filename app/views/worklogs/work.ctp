<div id="dashboard">
<?php
    $javascript->link('prototype', false);
    $javascript->link('scriptaculous', false);
    $javascript->link('autoExpandContract', false);
    $javascript->link('tooltip', false);
?>
<div id="today" ><span style='color:#438b9a'><?php echo $currentUser['fullname'] ?></span> on <?php echo date("l, j F Y") ?></div>
<div id="dashboard_content">
<?php if($worklog): ?>
    <!--left column dashboard-->
    <div id="dashboard_left" class="grid_4 alpha">
        <div id="task_status" class="box_4 grid_4 alpha omega">
            <div class="top_first"><h4><span class="l"><?php echo __("Your tasks (coming soon)") ?></span><span class="r"><?php echo $html->link("see all", "/tasks/") ?></span></h4></div>
            <div class="spacer">
                <ul class="sidenav">
                    <li><?php echo $html->link("<span id='numActive'>".count($activeTasks)."</span> active tasks","/tasks/active", null, null, false) ?></li>
                    <li><?php echo $html->link("<span id='numActive'>".count($pendingTasks)."</span> pending tasks","/tasks/pending", null, null, false) ?></li>
                    <li><?php echo $html->link("<span id='numActive'>".count($finishedTasks)."</span> finished tasks","/tasks/finished", null, null, false) ?></li>
                    <br />
                </ul>

            </div>
        </div>

        <div id="news_feed" class="box box_4 grid_4 alpha omega">
            <div class="top"><h4><span class="l"><?php echo __("Today Activity") ?></span><span class="r"><?php echo $html->link("history", "/tasks/") ?></span></h4></h4></div>
            <div class="spacer">
                <ul class="sidenav">
                    <li><?php echo $html->link("All people", "#") ?> (coming soon)</li>
                    <li><?php echo $html->link("Only Me", "#") ?> (coming soon)</li>
                </ul>

            </div>
            <div class="bottom"></div>
        </div>

        <div id="endwork" class="box box_4 grid_4 alpha omega">
            <div class="top_first"><h4><?php echo __("Cukup untuk hari ini ?") ?></h4></div>
            <div class="spacer">
                <p>Klik tombol dibawah untuk mencatat waktu pulang Anda.</p>
                <?php echo $form->create("Worklog",array("action"=>"endwork")); ?>
                <div class="buttons">
                    <?php
                    echo $ajax->submit("Endwork",array("url"=>"endwork",
                                                    "name"=>"data[Worklog][end]",
                                                    "id"=>"btnEndwork",
                                                    "class"=>"button",
                                                    "div"=>false,
                                                    "update"=>"finish_time",
                                                    "before"=>"$('btnEndwork').addClassName('disabled')",
                                                    "complete"=>"$('btnEndwork').removeClassName('disabled');new Effect.Highlight('finish_time')"
                                                    ))
                    ?>
                </div>
                <?php echo $form->end(); ?>
            </div>
            <div class="bottom"></div>
        </div>
    </div>
    <!--end left column-->


    <!--right column-->
    <div id="column_right" class="grid_12 omega page">
        <div id="worklog" class="grid_11 box_10 ">
            <div class="top"></div>
            <div class="spacer">
                <?php echo $form->create("Worklog",array("action"=>"endwork")); ?>
                <h4>Dari pukul <span id="start_time"><?php echo substr($worklog['Worklog']['start'],11,5) ?></span> sampai <span id='finish_time'><?php echo ($worklog['Worklog']['end'])? substr($worklog['Worklog']['end'],11,5):"sekarang"?></span>.</h4>
                <div id="tt_worklog" class="tooltip">
                    Gunakan kalimat kerja yang sederhana dan mendeskripsikan pekerjaan yang Anda lakukan secara spesifik, contoh:
                    <br />"Mengerjakan modul pembayaran bagian tiket", "Membuat dokumen analisis bab 3", "Meeting with Mr. Susilo", dll.
                </div>
                <?php echo $form->textarea("Worklog.log",array("rows"=>1,"cols"=>24 , "class"=>"expand worklog"));?>
                <?php echo $html->image("icon/info_16.png", array("id"=>"img_hint")) ?>
                <?php echo $javascript->codeBlock(" var my_tooltip = new Tooltip('img_hint', 'tt_worklog')") ?>
                <div class="clear"></div>
                <div class="buttons">
                    <?php
                    //echo $form->submit("Update", array("div"=>false));
                        //echo $ajax->submit("Update",array("url"=>"endwork",
                        //                                "name"=>"data[Worklog][update]",
                        //                                "id"=>"btnUpdate",
                        //                                "class"=>"button",
                        //                                "div"=>false,
                        //                                "before"=>"$('btnUpdate').addClassName('disabled');$('WorklogLog').removeClassName('highlight');$('WorklogLog').addClassName('disabled')",
                        //                                "complete"=>"$('btnUpdate').removeClassName('disabled');$('WorklogLog').removeClassName('disabled');$('WorklogLog').addClassName('highlight')"
                        //                                ));

                        echo $ajax->submit("Add",array("url"=>"endwork",
                                                        "name"=>"data[Worklog][update]",
                                                        "id"=>"btnUpdate",
                                                        "class"=>"button",
                                                        "div"=>false,
                                                        "before"=>"$('btnUpdate').addClassName('disabled');$('WorklogLog').removeClassName('highlight');$('WorklogLog').addClassName('disabled')",
                                                        "complete"=>"$('WorklogLog').clear();$('WorklogLog').focus();$('btnUpdate').removeClassName('disabled');$('WorklogLog').removeClassName('disabled');$('WorklogLog').addClassName('highlight');new Insertion.Top('log_item', request.responseText);"
                                                        ));
                    ?>
                </div>
                <?php echo $form->end(); ?>
            </div>
            <div class="bottom"></div>
        </div>

        <div class="grid_12 box_12_main alpha omega">
            <div id="loader" class="grid_11 alpha omega ac loader_dashboard" style="display:none"><?php echo $html->image("loader2.gif") ?></div>

            <div class="top"></div>
            <div id="tasklist" class="spacer">
        <table cellpadding="0" cellspacing="0" class="list oddeven">
		<thead>
        <tr>
            <th width='80px'><?php __('Log');?></th>
            <th >&nbsp;</th>
            <th class="actions">&nbsp;</th>
        </tr>
		</thead>
		<tbody id="log_item">
        <?php foreach ($worklog['Log'] as $log):?>
            <tr>
                <td>
					<span style='font-size:11px;color:#888;'><?php echo $time->niceShort($log['created']); ?></span>
                </td>
                <td>
					<?php echo $log['content']; ?>
                </td>
                <td class="actions">
                    <?php echo $html->link(__('Delete', true), array('action'=>'log_delete', $log['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $log['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
		</tbody>

        </table>
            </div>
            <!--end spacer-->
            <div class="bottom"></div>
        </div>
    </div>

<?php else: ?>
    <div id="start" class="box_12 grid_12 suffix_4 alpha omega">
        <div class="top"></div>
        <div class="spacer ac">

            <?php echo $html->image("logo-final.png") ?>
			<br /><br /><br /><br />
            <p class="hint">Klik tombol dibawah untuk memulai worklog !</p>
            <div class="buttons grid_4 prefix_4 ac">
               <?php echo $html->link(" Start ".$html->image("icon/f1.png"),array("action"=>"startwork"), array("class"=>"button"), false, false); ?>
           </div>
            <div class="clear"></div>
        </div>
        <div class="bottom"></div>
    </div>
<?php endif; ?>

</div>
<!--end dashboard content-->
</div>
<!--end dashboard-->
