<?php


App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $theme = 'bootstrap';

	public $components = array(
		'Session',
		'Auth' => array(
        	'loginRedirect' => array('controller' => 'quotes', 'action' => 'index'),
        	'logoutRedirect' => array('controller' => 'quotes', 'action' => 'index'),
        	'authorize' => array('controller')
			)
		);

	function beforeFilter() {
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
			$this->layout = 'admin';
		} 

		
		$this->Auth->loginAction = array('controller'=>'users','action'=>'login','admin'=>false);
		if(!isset($this->request->params['prefix'])){
			$this->Auth->allow('index','view');
		}

		if($this->Auth->loggedIn()){
			$this->set('me',$this->Auth->user());
		}
		else{
			$this->set('me',array('id'=>0,'username'=>'not connected'));
		}
	}

	public function isAuthorized($user){

		if(isset($user['group_id']) && $user['group_id']==1)
			return true;

		return false;
	}
}
