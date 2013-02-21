<div class="quotes index">
	<h2><?php echo __('les dernières Quotes'); ?></h2>

	<?php foreach ($quotes as $quote): ?>
	<div>
		<h3><?php echo ($quote['Quote']['title']); ?></h3>&nbsp;
		<?php echo ($quote['Quote']['body']); ?>&nbsp;<br />
		par <?php echo $this->Html->link($quote['User']['username'], array('controller' => 'users', 'action' => 'view', $quote['User']['id'])); ?> le <?php echo ($quote['Quote']['created']); ?>&nbsp;<bt />
		<div class="actions modif">
			<?php echo $this->Html->link(__('Voir en détail'), array('action' => 'view', $quote['Quote']['id'])); ?>

			<?php if(AuthComponent::user('id')== $quote['Quote']['user_id'] || AuthComponent::user('group_id')==1): ?>
                        - <?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $quote['Quote']['id'])); ?>
						- <?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $quote['Quote']['id']), null, __('Are you sure you want to delete # %s?', $quote['Quote']['id'])); ?>
            <?php endif; ?>
			
			
		</div>
	</div>	
<?php endforeach; ?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page}/{:pages}, quotes {:current}/{:count}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('page précédente '), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => '|'));
		echo $this->Paginator->next(__(' page suivante') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
