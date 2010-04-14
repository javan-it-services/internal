<div class="clients index page">
    <div class="grid_3 alpha">
        <div class="actions">
            <ul>
                <li><?php echo $html->link(__('<span>Add New Client</span>', true), array('action'=>'add'),array(), false, false); ?></li>
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
        <table cellpadding="0" cellspacing="0" class="list oddeven">
        <tr>
            <th><?php echo $paginator->sort('name');?></th>
            <th><?php echo $paginator->sort('address');?></th>
            <th><?php echo $paginator->sort('contact_person');?></th>
            <th><?php echo $paginator->sort('email');?></th>
            <th><?php echo $paginator->sort('phone');?></th>
            <th class="actions"><?php __('Actions');?></th>
        </tr>
        <?php
        foreach ($clients as $client):
        ?>
            <tr>
                <td>
                    <?php echo $client['Client']['name']; ?>
                </td>
                <td>
                    <?php echo $client['Client']['address']; ?>
                </td>
                <td>
                    <?php echo $client['Client']['contact_person']; ?>
                </td>
                <td>
                    <?php echo $client['Client']['email']; ?>
                </td>
                <td>
                    <?php echo $client['Client']['phone']; ?>
                </td>
                <td class="actions">
                    <?php echo $html->link(__('View', true), array('action'=>'view', $client['Client']['id'])); ?>
                    <?php echo $html->link(__('Edit', true), array('action'=>'edit', $client['Client']['id'])); ?>
                    <?php echo $html->link(__('Delete', true), array('action'=>'delete', $client['Client']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $client['Client']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
        </div>
    </div>
