<div class="accountingAccounts index page">
	<!--left column -->
	<div id="column_left" class="grid_3 alpha">
		<div class="grid_3 alpha omega">
			<?php echo $this->renderElement("nav_accounting_admin")?>
		</div>
	</div>
	<!--end left column-->
	
	<div id="column_right" class="grid_13 omega">
		
		<h2><?php __('Accounts');?></h2>
		<table cellpadding="0" cellspacing="0" class="list">
		<tr>
			<th><?php echo __('id');?></th>
			<th><?php echo __('nomor');?></th>
			<th><?php echo __('name');?></th>
			<th><?php echo __('account_type');?></th>
			<th><?php echo __('estimates');?></th>
			<th><?php echo __('Neraca');?></th>
			<th class="actions"><?php __('Actions');?></th>
		</tr>
		<?php $i = 0; foreach ($accounts as $account):?>
			<?php $class = $i++ % 2 == 0 ? ' class="altrow"':null?>
			<tr <?php echo $class;?>>
				<td>
					<?php echo $account['AccountingAccount']['id']; ?>
				</td>
				<td>
					<?php echo $account['AccountingAccount']['nomor']; ?>
				</td>
				<td>
					<?php echo $account['AccountingAccount']['name']; ?>
				</td>
				<td>
					<?php echo $account['AccountingAccount']['account_type']; ?>
				</td>
				<td>
					<?php echo $account['AccountingAccount']['estimates']; ?>
				</td>
				<td>
					<?php echo $account['AccountingAccount']['display']?'DISPLAY':'HIDDEN'; ?>
				</td>
				<td class="actions">
					<?php echo $html->link(__('Edit', true), array('action' => 'edit', $account['AccountingAccount']['id'])); ?>
					<?php if($account['AccountingAccount']['id'] == 2 || $account['AccountingAccount']['id'] == 14 || $account['AccountingAccount']['id'] == 18):?>
						delete
					<?php else:?>
						<?php echo $html->link(__('Delete', true), array('action' => 'delete', $account['AccountingAccount']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $account['AccountingAccount']['id'])); ?>
					<?php endif?>
				
				</td>
			</tr>
			<?php if(isset($account['children'])):?>
				<?php foreach ($account['children'] as $child):?>
					<?php $class = $i++ % 2 == 0 ? ' class="altrow"':null?>
					<tr <?php echo $class;?>>
						<td>
							<?php echo $child['AccountingAccount']['id']; ?>
						</td>
						<td>
							<?php echo $child['AccountingAccount']['nomor']; ?>
						</td>
						<td>
							<i> -- <?php echo $child['AccountingAccount']['name']; ?></i>
						</td>
						<td>
							<?php echo $child['AccountingAccount']['account_type']; ?>
						</td>
						<td>
							<?php echo $child['AccountingAccount']['estimates']; ?>
						</td>
						<td>
							<?php echo $child['AccountingAccount']['display']?'DISPLAY':'HIDDEN'; ?>
						</td>
						<td class="actions">
							<?php echo $html->link(__('Edit', true), array('action' => 'edit', $child['AccountingAccount']['id'])); ?>
							<?php echo $html->link(__('Delete', true), array('action' => 'delete', $child['AccountingAccount']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $child['AccountingAccount']['id'])); ?>
						</td>
					</tr>
				<?php endforeach ?>
			<?php endif?>
		<?php endforeach; ?>
		</table>
		<br/>
		<div class="actions">
			<ul>
				<li><?php echo $html->link("<span>".__('New Account', true)."</span>", array('action' => 'add'),array(), false, false); ?></li>
			</ul>
		</div>
	</div>
</div>
