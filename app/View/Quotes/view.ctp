<div class="quotes view">
<h2><?php  echo __('Quote'); ?></h2>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quote['User']['username'], array('controller' => 'users', 'action' => 'view', $quote['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>