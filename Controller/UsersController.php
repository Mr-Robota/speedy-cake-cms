<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakeTime', 'Utility');

class UsersController extends AppController {
	
	public $uses = array('SpeedyCake','Page','User');
	
	public $components = array('Session','Cookie','RequestHandler','SpeedyCake');
	
	public $helpers = array('Html', 'Form', 'Session');
	
	var $per_page = 10;
	var $q = "";
	
	
	
	
	public function index() {
		
		$this->set('breadcrumbs', true);
		
		$this->set('title',__('Users'));
		
		if (isset($_GET["q"])) {
			
			$conditions = array();
			
			if (isset($_GET["q"]) && $_GET["q"]!="") {
				
				$this->q = $_GET["q"];
				
				$conditions[] = array('User.username LIKE '=>'%' .$this->q .'%');
				
			}
		
			$this->paginate = array(
				'conditions'=>array('AND'=>$conditions),
				'limit' => $this->per_page,
				'order'=>array('User.id'=>'DESC')
			);
			
			$rows = $this->User->find('all',array(
				'conditions'=>array('AND'=>$conditions),
				'order'=>array('User.id'=>'DESC')
			));
		
		}
		else if (!isset($_GET["q"])) {
		
			$this->paginate = array(
				'limit' => $this->per_page,
				'order'=>array('User.id'=>'DESC')
			);
			
			$rows = $this->User->find('all',array('order'=>array('User.id'=>'DESC')));
			
		}
		
		$rows = $this->paginate('User');
		
		$this->set('rows',$rows);
		$this->set('numRows',count($rows));
		$this->set('q',$this->q);
		
		
	}
	
	
	
	
	public function add() {
		
		$this->set('breadcrumbs', true);
		
		$this->set('title',__('Add new user'));
		
		if (!empty($this->request->data) && $this->request->is('post')) {
			
			$salt = Configure::read('Security.salt');
			
			$this->request->data["User"]["pwd"] = md5($this->request->data["User"]["pwd"] .$salt);
			
			if ($this->request->data["User"]["avatar"]["name"]!="") {
				
				$newfile = $this->SpeedyCake->upload('User','avatar');
			
				$this->request->data["User"]["avatar"] = $newfile["name"];
			
			}
			else $this->request->data["User"]["avatar"] = "";
			
			if ($this->User->save($this->request->data)) {
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/users');
				
			}
			else {

				$this->Session->setFlash(__('Saving failed!'),'default',
					array('class'=>'alert')
				);
				
			}
			
		}
		
	}
	
	
	
	
	public function usernameIsUnique() {
		
		if (!empty($this->request->data) && $this->request->is('post') && $this->request->is('ajax')) {
			
			$this->autoRender = false;
			
			$username = $this->request->data["username"];
			
			echo $this->User->find('count', array(
				'conditions' => array('User.username' => $username)
			));
		
		}
		
	}
	
	
	
	public function emailIsUnique() {
		
		if (!empty($this->request->data) && $this->request->is('post') && $this->request->is('ajax')) {
			
			$this->autoRender = false;
			
			$email = $this->request->data["email"];
			
			echo $this->User->find('count', array(
				'conditions' => array('User.email' => $email)
			));
		
		}
		
	}
	
	
	
	
	public function edit($id=NULL) {
		
		$this->set('breadcrumbs', true);
		
		if (!empty($this->request->data) && $this->request->is('post','put')) {
			
			$this->User->id = $this->request->data["User"]["id"];
			
			if ($this->request->data["User"]["pwd"]!="") {
				
				$salt = Configure::read('Security.salt');
				
				$this->request->data["User"]["pwd"] = md5($this->request->data["User"]["pwd"] .$salt);
			
			}
			else $this->request->data["User"]["pwd"] = $this->request->data["User"]["oldPwd"];
			
			if ($this->request->data["User"]["avatar"]["name"]!="" 
			&& $this->SpeedyCake->fileExists($this->request->data["User"]["oldAvatar"])) {
				
				$this->SpeedyCake->deleteFile($this->request->data["User"]["oldAvatar"]);
				
				$newfile = $this->SpeedyCake->upload('User','avatar');
				
				$this->request->data["User"]["avatar"] = $newfile["name"];
			
			}
			else $this->request->data["User"]["avatar"] = $this->request->data["User"]["oldAvatar"];
			
			if ($this->User->save($this->request->data)) {
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/users/edit/' .$this->request->data["User"]["id"]);
				
			}
			else {
	
				$this->Session->setFlash(__('Saving failed!'),'default',
					array('class'=>'alert')
				);
				
			}
			
		}
		else {
		
				if (!$id) $this->redirect(array('controller'=>'users','action'=>'index'));
		
				$row = $this->User->find('first',array(
					'conditions'=>array('User.id'=>$id)
				));
				
				$this->set('title',__('Edit User'));
				
				$this->set('id',$row["User"]["id"]);
				$this->set('username',$row["User"]["username"]);
				$this->set('oldPwd',$row["User"]["pwd"]);
				$this->set('oldAvatar',$row["User"]["avatar"]);
				$this->set('email',$row["User"]["email"]);
				$this->set('role',$row["User"]["role"]);
				$this->set('status',$row["User"]["status"]);
				
			
		}
		
	}
	
	
	
	
	public function delete($id=NULL) {
		
		if (!$id) $this->redirect(array('controller'=>'users','action'=>'index'));
		
		$this->User->id = $id;
		$avatar = $this->User->field('avatar');
		
		if ($this->User->delete($id)) {
			
			if ($this->SpeedyCake->fileExists($avatar)) $this->SpeedyCake->deleteFile($avatar);
			
			$this->Session->setFlash(__('User deleted.'),'default',
				array('class'=>'alert alert-success')
			);
			
			$this->redirect('/admin/users');
			
		}
		
	}
	
	
	
	
	public function beforeFilter() {
		
		if (!$this->SpeedyCake->ifDatabaseInstalled($this->Page->tablePrefix)) $this->redirect('/speedycake');
		
		if (!$this->SpeedyCake->checkPermission($this->params["controller"],$this->params["action"],$this->params["id"])) {
			
			$this->Session->setFlash('Permission denied.','default',
					array('class'=>'alert alert-success')
				);
		
			$this->redirect(array('controller'=>'pages','action'=>'dashboard'));
				
		}
		
		if ($this->SpeedyCake->checkStatus()==1 && $this->SpeedyCake->isPublicPage($this->params["controller"],$this->params["action"])) $this->redirect(array('controller'=>'pages','action'=>'maintenance'));
		
		$this->SpeedyCake->setLang();
		
		$this->SpeedyCake->setTimezone();

		if (!$this->SpeedyCake->isAuth() && !$this->SpeedyCake->isPublicPage($this->params["controller"],$this->params["action"])) {
			
			$this->redirect(array('controller'=>'pages','action'=>'login'));
			
		}
		
	}
	
	
	
	
}

?>