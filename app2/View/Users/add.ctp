<div class="users form">
	<br />
<?php echo $this->Form->create('User'); ?>

	<fieldset>
		<legend><?php echo __("S'inscrire"); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
		//echo $this->Form->input('group_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__("S'inscrire")); ?>
</div>

