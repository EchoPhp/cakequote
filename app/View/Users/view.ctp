<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Statut'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($user['User']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Quotes'); ?></h3>
	<?php if (!empty($user['Quote'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Quote'] as $quote): ?>
		<tr>
			<td><?php echo $quote['id']; ?></td>
			<td><?php echo $quote['title']; ?></td>
			<td><?php echo $quote['body']; ?></td>
			<td><?php echo $quote['created']; ?></td>
			<td><?php echo $quote['updated']; ?></td>

			<td class="actions">
				 <?php echo $this->Html->link(__('View'), array('controller' => 'quotes', 'action' => 'view', $quote['id'])); ?>
                 <?php if(AuthComponent::user('id')== $user['User']['id'] || AuthComponent::user('group_id')==1): ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'quotes', 'action' => 'edit', $quote['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'quotes', 'action' => 'delete', $quote['id']), null, __('Are you sure you want to delete # %s?', $quote['id'])); ?>
				 <?php endif; ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
