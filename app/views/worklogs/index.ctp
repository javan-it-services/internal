<div class="worklogs index grid_16 alpha omega">
    <div class="grid_10 alpha ">
    <?php
    echo $paginator->counter(array(
    'format' => __('Page %page% of %pages%, showing %current% records out of %count% total', true)
    ));
    ?>
    </div>

    <div class="grid_6 ar omega">
    <?php if($isAdmin || $isManager):?>
        <?php echo $form->create('Filter',array('url'=>'/worklogs/index'))?>
        <?php echo $form->select("user_id",$employees,null,array(),"--All Employee--")?>
            <button type="submit">Go</button>
        </form>
    <?php else: ?>
        &nbsp;
    <?php endif ?>
    </div>

    <div class="grid_16 alpha omega">
        <table cellpadding="0" cellspacing="0" class="list">
        <tr>
            <th class="first"><?php echo $paginator->sort('Date', 'start');?></th>
            <?php if($isAdmin || $isManager): ?>
            <th><?php echo $paginator->sort('Write by', "user_id");?></th>
            <?php endif; ?>
            <th style="text-align:left" class="last"><?php echo $paginator->sort('log');?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($worklogs as $worklog):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
        ?>
            <tr<?php echo $class;?>>
                <td>
                    <div class="date"><h4><?php echo substr($worklog['Worklog']['start'], 0, 10); ?></h4></div>
                    From <span class="from"><?php echo substr($worklog['Worklog']['start'], 11, 5);?></span>
                    <?php if($worklog['Worklog']['end']): ?>
                        to <span class="to"><?php echo substr($worklog['Worklog']['end'], 11, 5);?></span>
                    <?php else: ?>
                        <span class="sub">and not finished yet. </span>
                    <?php endif; ?>
                    <?php if($isAdmin): ?>
                    <div class="actions">
                        <?php echo $html->link(__('Delete', true), array('action'=>'delete', $worklog['Worklog']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $worklog['Worklog']['id'])); ?>
                    </div>
                    <?php endif; ?>

                </td>
                <?php if($isAdmin || $isManager): ?>
                <td width="20%">
                    <strong><?php echo $worklog['User']['fullname']; ?></strong>
                </td>
                <?php endif; ?>
                <td width="50%">
					<table>
					<?php foreach ($worklog['Log'] as $log):?>
						<tr>
							<td>
								<span style='font-size:11px;color:#888;'><?php echo $time->niceShort($log['Log']['created']); ?></span>
							</td>
							<td>
								<?php echo $log['Log']['content']; ?>
							</td>
						</tr>
					<?php endforeach; ?>

					</table>
                </td>

            </tr>
        <?php endforeach; ?>
        </table>
    </div>

    <div class="paging">
        <?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
     | 	<?php echo $paginator->numbers();?>
        <?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
    </div>
</div>
