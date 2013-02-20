<?php


App::uses('Controller', 'Controller');

class AppController extends Controller {


	public $components = array(
		'Session',
		'Auth' => array(
        	'loginRedirect' => array('controller' => 'quotes', 'action' => 'index'),
        	'logoutRedirect' => array('controller' => 'quotes', 'action' => 'index')
			)
		);

	function beforeFilter() {
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$this->layout = 'admin';
		} 

		$this->Auth->Allow('index','view');

		if($this->Auth->loggedIn()){
			$this->set('me',$this->Auth->user());
		}
		else{
			$this->set('me',array('id'=>0,'username'=>'not connected'));
		}
	}
}
