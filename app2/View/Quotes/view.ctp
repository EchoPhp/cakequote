<div class="quotes view">
<div class = "actions">
	<h3><?php echo ($quote['Quote']['title']); ?></h3>&nbsp;
		<?php echo ($quote['Quote']['body']); ?>&nbsp;<br />
		par <?php echo $this->Html->link($quote['User']['username'], array('controller' => 'users', 'action' => 'view', $quote['User']['id'])); ?> le <?php echo ($quote['Quote']['created']); ?>&nbsp;
		</div>
</div>