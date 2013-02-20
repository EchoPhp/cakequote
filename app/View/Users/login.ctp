<?php
 	echo $this->Session->Flash('auth');
	echo $this->Form->create('User', array('action' => 'login'));
	echo $this->Form->inputs(array(
	    'legend' => __('Se connecter'),
	    'username',
	    'password'
	));
	echo $this->Form->end('Login');

?>