<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

public function beforeFilter(){
	parent::beforeFilter();
	$this->Auth->allow('add');
}

public function isAuthorized($user){

	if($this->action=='login' || $this->action=='logout' || $this->action=='view' )
	//if(in_array($this->action, array('login','logout'))) // équivalent
		return true;

	if($this->action=='edit'){
		$user_id = $this->request->params['pass'][0];
		$me_id = $this->Auth->user('id');
		if($user_id == $me_id)
			return true;
		else{
			$this->Session->setFlash("try harder ;)","notif",array('type'=>'error'));
		}
	}

	if($this->action=='delete')
		return false;


	return parent::isAuthorized($user);
}

public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect());
        } else {
            $this->Session->setFlash("Impossible de se loger, veuillez réessayer","notif",array('type'=>'error'));
        }
    }
}

public function logout() {
 
 	$this->Session->setFlash("Bye Bye :'(","notif",array('type'=>'error'));
 	$this->redirect($this->Auth->logout());
}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$user_id = $this->Auth->user('id');
		if(!$user_id){
			$this->redirect('/');
			die(); 
		}

		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$user_gp = $this->Auth->user('group_id');
		if(!$user_gp > 0){
			$this->redirect('/');
			die(); 
		}

		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash("Vous êtes maintenant inscrit ! :)","notif");
				$this->redirect(array('action' => 'index'));
			} else {
				
				$this->Session->setFlash("Impossible d'enregistrer l'utilisateur, veuillez réessayer","notif",array('type'=>'error'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$user_id = $this->Auth->user('id');

		if(!$user_id){
			$this->redirect('/');
			die(); 
		}

		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash("Utilisateur édité","notif");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("Impossible d'enregistrer, veuillez réessayer","notif",array('type'=>'error'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash("Utilisateur supprimé","notif");
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash("L'utilisateur n'a pas été supprimé","notif",array('type'=>'error'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash("Utilisateur enregistré","notif");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("Impossible d'enregistrer, veuillez réessayer","notif",array('type'=>'error'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash("Utilisateur modifié","notif");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("Impossible d'enregistrer, veuillez réessayer","notif",array('type'=>'error'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash("Utilisateur supprimé","notif");
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash("l'utilisateur n'a pas été supprimé","notif",array('type'=>'error'));
		$this->redirect(array('action' => 'index'));
	}
}
