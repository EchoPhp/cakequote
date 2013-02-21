<div class="users index">
	<h2><?php echo __('Users'); ?></h2>

	<?php foreach ($users as $user): ?>
		<h3>Pseudo : <?php echo h($user['User']['username']); ?></h3>&nbsp;<br />
		<ul>
			<li>Mail : <?php echo h($user['User']['email']); ?>&nbsp;</li>
			<li>Statut : <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?></li>
			<li>Inscrit le : <?php echo h($user['User']['created']); ?>&nbsp;</li>
		</ul>
		

		<td class="actions">
			<?php echo $this->Html->link(__('Voir le profil'), array('action' => 'view', $user['User']['id'])); ?>
			<?php if(AuthComponent::user('id')== $user['User']['id'] || AuthComponent::user('group_id')==1): ?>
                        - <?php echo $this->Html->link(__('Editer le profil'), array('action' => 'edit', $user['User']['id'])); ?>
						- <?php echo $this->Form->postLink(__("Supprimer l'utilisateur"), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
            <?php endif; ?>
			
			
		</td>
<?php endforeach; ?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page}/{:pages}, utilisateurs {:current}/{:count}')
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
