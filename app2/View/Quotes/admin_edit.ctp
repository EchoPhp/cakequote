<div class="quotes form">
	<br />
<?php echo $this->Form->create('Quote'); ?>

	<fieldset>
		<legend><?php echo __('Edit Quote'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Quote.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Quote.id'))); ?></li>
	</ul>
</div>