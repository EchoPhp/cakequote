<?php
App::uses('AppController', 'Controller');
/**
 * Quotes Controller
 *
 * @property Quote $Quote
 */
class QuotesController extends AppController {

var $paginate = array(
        'limit' => 5,
        'order' => array(
            'id' => 'desc'
        )
    );

 function random() {
                $random = $this->Quote->find('first',array(
                        'order' => 'rand()',
                        'limit' => 1
                ));
                $this->view($random['Quote']['id']);
                $this->render('view');
        }


	public function isAuthorized($user){
		if($this->action=='add'){
			if(isset($user['group_id']) && $user['group_id'] > 0)
				return true;

		}

			if(in_array($this->action, array('edit','delete'))){
				if(isset($user['group_id']) && $user['group_id'] == 2)
					return true;

				else{
					$quote_id = $this->request->params['pass'][0];
					$user_id = $user['id'];
					                                
					if($this->Quote->isOwnedBy($quote_id,$user_id)){
       					 return true;
				}

				}
			}


	return parent::isAuthorized($user);
}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Quote->recursive = 0;
		$this->set('quotes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Quote->exists($id)) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$options = array('conditions' => array('Quote.' . $this->Quote->primaryKey => $id));
		$this->set('quote', $this->Quote->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Quote->create();
			$this->request->data['Quote']['user_id'] = $this->Auth->user('id');
			//debug($this->request->data);
			//debug($this->Auth->user('id'));
			//die();
			if ($this->Quote->save($this->request->data)) {
				$this->Session->setFlash("Quote ajoutée !","notif");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("Impossible d'enregistrer la quote, veuillez réessayer","notif",array('type'=>'error'));
			}
		}
		$users = $this->Quote->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$user_id = $this->Auth->user('id_user');
		if(!$user_id){
			$this->redirect('/');
			die(); 
		}

		if (!$this->Quote->exists($id)) {
			throw new NotFoundException(__('Invalid quote'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Quote->save($this->request->data)) {
				$this->Session->setFlash("Quote sauvegardée !","notif");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("Impossible d'éditer la quote, veuillez réessayer","notif",array('type'=>'error'));
			}
		} else {
			$options = array('conditions' => array('Quote.' . $this->Quote->primaryKey => $id));
			$this->request->data = $this->Quote->find('first', $options);
		}
		$users = $this->Quote->User->find('list');
		$this->set(compact('users'));
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
		$user_id = $this->Auth->user('id_user');
		if(!$user_id){
			$this->redirect('/');

			die(); 
		}

		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Quote->delete()) {
			$this->Session->setFlash("Quote supprimée !","notif");
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash("Impossible de supprimer la quote, veuillez réessayer","notif",array('type'=>'error'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Quote->recursive = 0;
		$this->set('quotes', $this->paginate());

	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Quote->exists($id)) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$options = array('conditions' => array('Quote.' . $this->Quote->primaryKey => $id));
		$this->set('quote', $this->Quote->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Quote->create();
			if ($this->Quote->save($this->request->data)) {
				$this->Session->setFlash("Quote ajoutée !","notif");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("Impossible d'enregistrer la quote, veuillez réessayer","notif",array('type'=>'error'));
			}
		}
		$users = $this->Quote->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Quote->exists($id)) {
			throw new NotFoundException(__('Invalid quote'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Quote->save($this->request->data)) {
				$this->Session->setFlash("Quote éditée !","notif");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("Impossible d'éditer la quote, veuillez réessayer","notif",array('type'=>'error'));
			}
		} else {
			$options = array('conditions' => array('Quote.' . $this->Quote->primaryKey => $id));
			$this->request->data = $this->Quote->find('first', $options);
		}
		$users = $this->Quote->User->find('list');
		$this->set(compact('users'));
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
		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Quote->delete()) {
			$this->Session->setFlash("Quote supprimée !","notif");
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash("Impossible de supprimer la quote, veuillez réessayer","notif",array('type'=>'error'));
		$this->redirect(array('action' => 'index'));
	}
}
