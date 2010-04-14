<?php
    $javascript->link('prototype', false);
    $javascript->link('scriptaculous', false);
?>

<div class="users index page">
    <div class="grid_3 alpha">
        <div class="actions">
            <ul>
                <li><?php echo $html->link("<span>".__('Add New Employee', true)."</span>", array('action'=>'add'), array(), false, false); ?></li>
            </ul>
        </div>
    </div>
    <div class="grid_13 omega">
        <p>
        <?php
        echo $paginator->counter(array(
        'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
        ));
        ?></p>
        <div class="paging">
            <?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
         | 	<?php echo $paginator->numbers();?>
            <?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
        </div>

        <table cellpadding="0" cellspacing="0" class="list evenodd">
        <tr>
            <th><?php echo $paginator->sort('id');?></th>
            <th><?php echo $paginator->sort('group_id');?></th>
            <th><?php echo $paginator->sort('username');?></th>
            <th><?php echo $paginator->sort('fullname');?></th>
            <th><?php echo $paginator->sort('email');?></th>
            <th><?php echo $paginator->sort('created');?></th>
            <th><?php echo $paginator->sort('modified');?></th>
            <th class="actions"><?php __('Actions');?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($users as $user):
        ?>
            <tr>
                <td>
                    <?php echo $user['User']['id']; ?>
                </td>
                <td>
                    <?php echo $html->link($user['Group']['name'], array('controller'=> 'groups', 'action'=>'view', $user['Group']['id'])); ?>
                </td>
                <td>
                    <?php echo $user['User']['username']; ?>
                </td>
                <td>
                    <?php echo $user['User']['fullname']; ?>
                </td>
                <td>
                    <?php echo $user['User']['email']; ?>
                </td>
                <td>
                    <?php echo $user['User']['created']; ?>
                </td>
                <td>
                    <?php echo $user['User']['modified']; ?>
                </td>
                <td class="actions">
                    <?php echo $html->link(__('View', true), array('action'=>'view', $user['User']['id'])); ?>
                    <?php echo $html->link(__('Edit', true), array('action'=>'edit', $user['User']['id'])); ?>
                    <?php echo $html->link(__('Delete', true), array('action'=>'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    </div>
</div>
