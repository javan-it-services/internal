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
