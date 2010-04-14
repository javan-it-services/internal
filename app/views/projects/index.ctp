<div class="projects index page">
<div class="actions">
	<ul>
		<li><?php echo $html->link("<span>".__('Create New Project', true)."</span>", array('action'=>'add'),array("title"=>"Assign Task"), false, false); ?></li>
	</ul>
</div>
<div class="clear"></div>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0" class="list">
<tr>
	<th class="first"><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('client_id');?></th>
	<th><?php echo $paginator->sort('start');?></th>
	<th><?php echo $paginator->sort('end');?></th>
	<th><?php echo $paginator->sort('value');?></th>
	<th class="actions last"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($projects as $project):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $project['Project']['id']; ?>
		</td>
		<td>
			<?php echo $project['Project']['name']; ?>
		</td>
		<td>
			<?php echo $project['Client']['name']; ?>
		</td>
		<td>
			<?php echo $time->nice($project['Project']['start']); ?>
		</td>
		<td>
			<?php echo $time->nice($project['Project']['end']); ?>
		</td>
		<td>
			<?php echo $project['Project']['value']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $project['Project']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $project['Project']['id'])); ?>
			<?php echo $html->link(__('Team', true), array('action'=>'edit_team', $project['Project']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $project['Project']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?>
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
