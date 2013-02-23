<div class="users view">
	<?php if(AuthComponent::user('id')== $user['User']['id']): ?>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Username'); ?></th>
			<th><?php echo __('password'); ?></th>
			<th><?php echo __('email'); ?></th>
			<th><?php echo __('created'); ?></th>
			<th><?php echo __('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['updated']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('Editer mon profil'), array('action' => 'edit', $user['User']['id'])); ?>
		</td>
	</tr>
	</table>

	<div class="related">
	<h3><?php echo __('Mes mots'); ?></h3>
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

			<td>
				 <?php echo $this->Html->link(__('Voir'), array('controller' => 'quotes', 'action' => 'view', $quote['id'])); ?>
				 - <?php echo $this->Html->link(__('Editer'), array('controller' => 'quotes', 'action' => 'edit', $quote['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

<?php else: ?>
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
		<dt><?php echo __('Inscrit depuis le '); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
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
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
<?php endif; ?>
</div>
