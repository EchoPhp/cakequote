<div class="quotes form">
	<br />
<?php echo $this->Form->create('Quote'); ?>

	<fieldset>
		<legend><?php echo __('Add Quote'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
