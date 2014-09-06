<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakeTime', 'Utility');

class PagesController extends AppController {
	
	public $uses = array(
		'SpeedyCake',
		'Page',
		'User',
		'File',
		'Setting',
		'Article',
		'Pagefield',
		'Categorie'
	);
	
	public $components = array('Session','Cookie','RequestHandler','SpeedyCake');
	
	public $helpers = array('Html', 'Form', 'Session','Rss');
	
	var $per_page = 10;
	var $q = "";
	var $filter = "";
	
	
	
	
	public function dashboard() {
		
		$this->response->disableCache();
		
		$this->set('breadcrumbs', true);
		
		$this->set('title',__('Dashboard'));
		$this->set('description',__('Dashboard'));
		
		$users = $this->User->find('count', array(
			'conditions' => array('User.status' => 1)
		));
		
		$pages = $this->Page->find('count', array(
			'conditions' => array('Page.status' => 1)
		));
		
		$articles = $this->Article->find('count', array(
			'conditions' => array('Article.status' => 1)
		));
		
		$files = $this->File->find('count');
		
		$this->set('users',$users);
		$this->set('pages',$pages);
		$this->set('articles',$articles);
		$this->set('files',$files);
		
	}
	
	
	
	
	public function login() {
		
		$this->response->disableCache();
		
		$login = NULL;
		$this->set('title','Login');
		
		if ($this->Session->check('Administrator.id')) {
			
			$this->redirect('/dashboard');
			
		}
			
			
		if (empty($this->request->data) && ($this->Cookie->check('Auth.username') && $this->Cookie->check('Auth.token'))) {
		
			$login = $this->User->find('first', array(
				'conditions' => array(
				'User.username' => $this->Cookie->read('Auth.username'),
				'User.pwd' => $this->Cookie->read('Auth.token'),
				'User.status'=>1)
			));
			
		}
				
		else if (!empty($this->request->data) && $this->request->is('post')) {
	
			$salt = Configure::read('Security.salt');
			$this->request->data["Page"]["pwd"] = md5($this->request->data["Page"]["pwd"].$salt);
			
			$login = $this->User->find('first', array(
				'conditions' => array(
				'User.username' => $this->request->data["Page"]["username"],
				'User.pwd' => $this->request->data["Page"]["pwd"],
				'User.status'=>1)
			));
		
		}
			
			
		if (count($login)>0) {
			//Login success	
			$this->User->id = $login["User"]["id"];
			$this->User->saveField('last_login',date("Y-m-d H:i:s"));
			$this->Session->write('Administrator.id',$login["User"]["id"]);
			$this->Session->write('Administrator.username',$login["User"]["username"]);
			$this->Session->write('Administrator.email',$login["User"]["email"]);
			$this->Session->write('Administrator.role',$login["User"]["role"]);
			
			if (isset($this->request->data["Page"]["rememberme"]) && $this->request->data["Page"]["rememberme"]==1) {
				
				$this->Cookie->write('Auth.username', $this->request->data["Page"]["username"],true,'5 days');
				$this->Cookie->write('Auth.token', $this->request->data["Page"]["pwd"],true,'5 days');
				
			}
			
			$this->redirect('/dashboard');
	
		}
		else {
			//Login failed
			if (!empty($this->request->data)) {
				
				$this->Session->setFlash(__('Login fallito!'),'default',
					array('class'=>'alert')
				);
				
				$this->redirect('/admin');
				
			}
			
		}
			
		
	}
	
	
	
	
	public function forgot_password() {
		
		$this->response->disableCache();
		
		$this->set('title',__('Forgot password'));
		
		if (!empty($this->request->data) && $this->request->is('post')) {
			
			$checkEmail = $this->User->find('first', array(
				'conditions' => array(
				'User.email' => $this->request->data["Page"]["email"],
				'User.status'=>1)
			));
			
			if (count($checkEmail)>0) {
				
				$newPassword = $this->SpeedyCake->passwordGenerator();
				$salt = Configure::read('Security.salt');
				$this->User->id = $checkEmail["User"]["id"];
				$this->User->saveField('pwd', md5($newPassword.$salt));
			
				$cakeEmail = new CakeEmail();
				$cakeEmail->config('default');
				$cakeEmail->from(array(Configure::read('SpeedyCake.email') => Configure::read('SpeedyCake.name')));
				$cakeEmail->to($checkEmail["User"]["email"]);
				$cakeEmail->emailFormat('html');
				$cakeEmail->subject(Configure::read('SpeedyCake.name') .' - ' .__('New password'));
				$cakeEmail->send(__('Hi') .' ' .$checkEmail["User"]["username"] .',<br><br>' .__('this is the new password') .' <b>' .$newPassword .'</b><br><br><a href="' .Configure::read('SpeedyCake.url') .'/admin">' .__('Go to Login') .'</a>');
				
				$this->Session->setFlash(__('Email sent.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/forgot-password');
			
			}
			else {
				
				//Recovery failed
				$this->Session->setFlash(__('Email not found!'),'default',
					array('class'=>'alert')
				);
				
				$this->redirect('/forgot-password');
				
			}
			
		}
		
	}
	
	
	
	
	public function logout() {
		
		$this->response->disableCache();
		
		if ($this->Cookie->check('Auth')) $this->Cookie->delete('Auth');
		
		if ($this->Session->check('Administrator.id')) {
			$this->Session->delete('Administrator.id');
			$this->Session->delete('Administrator.username');
			$this->Session->delete('Administrator.email');
			$this->Session->delete('Administrator.role');
			$this->Session->destroy();
			$this->Session->setFlash(__('Bye!'),'default',
				array('class'=>'alert alert-success')
			);
		}
		
		$this->redirect(array('controller'=>'pages','action'=>'login'));
		
	}
	
	
	
	
	public function index() {
		
		$this->set('breadcrumbs', true);
		
		$this->set('title',__('Pages'));
		
		if (isset($_GET["q"]) && isset($_GET["filter"])) {
			
			$conditions = array();
			
			if (isset($_GET["q"]) && $_GET["q"]!="") {
				
				$this->q = $_GET["q"];
				
				$conditions[] = array('Page.title LIKE '=>'%' .$this->q .'%');
				
			}
			if (isset($_GET["filter"]) && $_GET["filter"]!="") {
				
				$this->filter = $_GET["filter"];
				
				$conditions[] = array('Page.status'=> $this->filter);
				
			}
		
			$this->paginate = array(
				'conditions'=>array('AND'=>$conditions),
				'limit' => $this->per_page,
				'order'=>array('Page.id'=>'DESC')
			);
			
			$rows = $this->Page->find('all',array(
				'conditions'=>array('AND'=>$conditions),
				'order'=>array('Page.id'=>'DESC')
			));
		
		}
		else if (!isset($_GET["q"]) && !isset($_GET["filter"])) {
		
			$this->paginate = array(
				'limit' => $this->per_page,
				'order'=>array('Page.id'=>'DESC')
			);
			
			$rows = $this->Page->find('all',array('order'=>array('Page.id'=>'DESC')));
			
		}
		
		$rows = $this->paginate('Page');
		
		$this->set('rows',$rows);
		$this->set('numRows',count($rows));
		$this->set('q',$this->q);
		$this->set('filter',$this->filter);
		
	}
	
	
	
	
	public function add() {
		
		$this->set('breadcrumbs', true);
		
		$this->set('title',__('Add new page'));
		
		if (!empty($this->request->data) && $this->request->is('post')) {
			
			if ($this->request->data["Page"]["image_src"]["name"]!="") {
				
				$newfile = $this->SpeedyCake->upload('Page','image_src');
			
				$this->request->data["Page"]["image_src"] = $newfile["name"];
			
			}
			else $this->request->data["Page"]["image_src"] = "";
			
			$this->request->data["Page"]["slug"] = strtolower(Inflector::slug($this->request->data["Page"]["title"],'-')); 
			
			$this->request->data["Page"]["user_id"] = $this->Session->read('Administrator.id');
			
			if ($this->Page->save($this->request->data)) {
				
				$page_id = $this->Page->getInsertID();
				
				if (isset($this->request->data["Pagefield"])) $this->SpeedyCake->savePagefields($this->request->data["Pagefield"],$page_id,$this->Page->tablePrefix);
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/pages');
				
			}
			else {

				$this->Session->setFlash(__('Saving failed!'),'default',
					array('class'=>'alert')
				);
				
			}
			
		}
		
	}
	
	
	
	
	public function titleIsUnique() {
		
		if (!empty($this->request->data) && $this->request->is('post') && $this->request->is('ajax')) {
			
			$this->autoRender = false;
			
			$title = $this->request->data["title"];
			
			echo $this->Page->find('count', array(
				'conditions' => array('Page.title' => $title)
			));
		
		}
		
	}
	
	
	
	
	public function edit($id=NULL) {
		
		$this->set('breadcrumbs', true);
		
		$numPagefields = $this->Pagefield->find('count', array(
			'conditions' => array('Pagefield.page_id' => $id)
		));
		
		$pagefields = $this->Pagefield->find('all', array(
			'conditions' => array('Pagefield.page_id' => $id),
			'order'=>array('Pagefield.id'=>'ASC')
		));
		
		if (!empty($this->request->data) && $this->request->is('post','put')) {
			
			$this->Page->id = $this->request->data["Page"]["id"];
			
			$this->Pagefield->deleteAll(array('Pagefield.page_id' => $this->request->data["Page"]["id"]));
			
			if (isset($this->request->data["Pagefield"])) $this->SpeedyCake->savePagefields($this->request->data["Pagefield"],$this->request->data["Page"]["id"],$this->Page->tablePrefix);
			
			if ($this->request->data["Page"]["image_src"]["name"]!="" 
			&& $this->SpeedyCake->fileExists($this->request->data["Page"]["oldimage_src"])) {
				
				$this->SpeedyCake->deleteFile($this->request->data["Page"]["oldimage_src"]);
				
				$newfile = $this->SpeedyCake->upload('Page','image_src');
				
				$this->request->data["Page"]["image_src"] = $newfile["name"];
			
			}
			else $this->request->data["Page"]["image_src"] = $this->request->data["Page"]["oldimage_src"];
			
			if ($this->Page->save($this->request->data)) {
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/pages/edit/' .$this->request->data["Page"]["id"]);
				
			}
			else {
	
				$this->Session->setFlash(__('Saving failed!'),'default',
					array('class'=>'alert')
				);
				
			}
			
		}
		else {
		
				if (!$id) $this->redirect(array('controller'=>'pages','action'=>'index'));
		
				$row = $this->Page->find('first',array(
					'conditions'=>array('Page.id'=>$id)
				));
				
				$this->set('title',__('Edit Page'));
				
				$this->set('id',$row["Page"]["id"]);
				$this->set('title_page',$row["Page"]["title"]);
				$this->set('oldimage_src',$row["Page"]["image_src"]);
				$this->set('description',$row["Page"]["description"]);
				$this->set('keywords',$row["Page"]["keywords"]);
				$this->set('slug',$row["Page"]["slug"]);
				$this->set('content',$row["Page"]["content"]);
				$this->set('status',$row["Page"]["status"]);
				$this->set('created',$row["Page"]["created"]);
				$this->set('numPagefields',$numPagefields);
				$this->set('pagefields',$pagefields);
			
		}
		
	}
	
	
	
	
	public function delete($id=NULL) {
		
		$this->render(false);
		
		if (!$id) $this->redirect(array('controller'=>'pages','action'=>'index'));
		
		$this->Page->id = $id;
		$image_src = $this->Page->field('image_src');
		
		if ($this->Page->delete($id)) {
			
			if ($this->SpeedyCake->fileExists($image_src)) $this->SpeedyCake->deleteFile($image_src);
			
			$this->Pagefield->deleteAll(array('Pagefield.page_id' => $id));
			
			$this->Session->setFlash(__('Page deleted.'),'default',
				array('class'=>'alert alert-success')
			);
			
			$this->redirect('/admin/pages');
			
		}
		
	}
	
	
	
	
	public function deleteImageSrc($id=NULL) {
		
		$this->render(false);
		
		if (!$id) $this->redirect(array('controller'=>'pages','action'=>'index'));
		
		$this->Page->id = $id;
		$image_src = $this->Page->field('image_src');
		$this->Page->saveField('image_src','');
		
		if ($this->SpeedyCake->fileExists($image_src)) $this->SpeedyCake->deleteFile($image_src);

		$this->Session->setFlash(__('Image deleted.'),'default',
			array('class'=>'alert alert-success')
		);
				
		$this->redirect(array('controller'=>'pages','action'=>'edit', 'id'=>$id));
		
	}
	
	
	
	
	public function homepage() {
		
		$this->response->disableCache();
		
		$this->layout = 'frontend';
		
		$this->set('title',$this->Setting->field('title',1));
		$this->set('description',$this->Setting->field('description',1));
		$this->set('keywords',$this->Setting->field('keywords',1));
		
		$this->paginate = array(
				'limit' => $this->per_page,
				'order'=>array('Article.id'=>'DESC'),
				'conditions'=>array('Article.status'=>1)
			);
			
		$rows = $this->Article->find('all',array(
			'order'=>array('Article.id'=>'DESC'),
			'conditions'=>array('Article.status'=>1)
		));
		
		$rows = $this->paginate('Article');
		
		$this->set('rows',$rows);
		$this->set('numRows',count($rows));
		
	}
	
	
	
	
	public function feed() {
		
		$this->layout = 'rss';
		
		$this->set('title',$this->Setting->field('title',1));
		
		if ($this->RequestHandler->isRss() ) {
			$articles = $this->Article->find(
				'all',
				array('limit' => 20, 'order' => 'Article.created DESC')
			);
			return $this->set(compact('articles'));
		}
	
		$this->paginate = array(
			'order' => 'Article.created DESC',
			'limit' => 10
		);
	
		$articles = $this->paginate('Article');
		$this->set(compact('articles'));
		
	}
	
	
	
	
	public function search() {
		
		$q = $_GET["q"];
		
		$this->response->disableCache();
		
		$this->layout = 'frontend';
		
		$pageTitle = "";
		if ($q!="") $pageTitle .= $q ." - ";
		$pageTitle .= __('Articles') ." - " .$this->Setting->field('title',1);
		
		$this->set('title',$pageTitle);
		$this->set('description',$this->Setting->field('description',1));
		$this->set('keywords',$this->Setting->field('keywords',1));
		
		$this->paginate = array(
				'limit' => $this->per_page,
				'order'=>array('Article.id'=>'DESC'),
				'conditions'=>array('Article.status'=>1,
					'OR'=>array(
							'Article.title LIKE'=>'%' .$q .'%',
							'Article.description LIKE'=>'%' .$q .'%',
							'Article.keywords LIKE'=>'%' .$q .'%',
							'Article.content LIKE'=>'%' .$q .'%'
						)
				)
			);
			
		$rows = $this->Article->find('all',array(
			'order'=>array('Article.id'=>'DESC'),
			'conditions'=>array('Article.status'=>1,
				'OR'=>array(
					'Article.title LIKE'=>'%' .$q .'%',
					'Article.description LIKE'=>'%' .$q .'%',
					'Article.keywords LIKE'=>'%' .$q .'%',
					'Article.content LIKE'=>'%' .$q .'%'
				)
			)
		));
		
		$rows = $this->paginate('Article');
		
		$this->set('rows',$rows);
		$this->set('numRows',count($rows));
		
	}
	
	
	
	
	public function single($slug=NULL) {
		
		$this->response->disableCache();
		
		$this->layout = 'frontend';
		
		if (!$slug) $this->redirect(array('controller'=>'pages','action'=>'homepage'));
		
		$row = $this->Article->find('first',array(
			'conditions'=>array('Article.slug'=>$slug)
		));
		
		if (count($row)>0) {
		
			$this->set('title',$row["Article"]["title"] ." - " .$this->Setting->field('title',1));
			$this->set('description',$row["Article"]["description"]);
			$this->set('keywords',$row["Article"]["keywords"]);
			$this->set('canonical',Configure::read('SpeedyCake.url') ."/article/" .$slug);
			
			$this->set('row',$row);
		
		}
		else $this->redirect(array('controller'=>'pages','action'=>'error404'));
		
	}
	
	
	
	
	public function page($slug=NULL) {
		
		$this->response->disableCache();
		
		$this->layout = 'frontend';
		
		if (!$slug) $this->redirect(array('controller'=>'pages','action'=>'homepage'));
		
		$row = $this->Page->find('first',array(
			'conditions'=>array('Page.slug'=>$slug)
		));
		
		if (count($row)>0) {
		
			$this->set('title',$row["Page"]["title"] ." - " .$this->Setting->field('title',1));
			$this->set('description',$row["Page"]["description"]);
			$this->set('keywords',$row["Page"]["keywords"]);
			$this->set('canonical',Configure::read('SpeedyCake.url') ."/" .$slug);
			
			$this->set('row',$row);
		
		}
		else $this->redirect(array('controller'=>'pages','action'=>'error404'));
		
	}
	
	
	
	
	public function category($slug=NULL) {
		
		$row = $this->Categorie->find('first', array(
			'conditions' => array('Categorie.slug' => $slug)
		));
		
		$this->response->disableCache();
		
		$this->layout = 'frontend';
		
		if (count($row)>0) {
			
			$id = $row["Categorie"]["id"];
			$name = $row["Categorie"]["name"];
			
			if (!$slug) $this->redirect(array('controller'=>'pages','action'=>'homepage'));
			
			$this->set('title', $name ." - " .__('Articles') ." - " .$this->Setting->field('title',1));
			$this->set('description',$this->Setting->field('description',1));
			$this->set('keywords',$this->Setting->field('keywords',1));
			
			$conditions[] = array('Articlescategorie.categorie_id'=>$id);
			
			$this->paginate = array(
					'limit' => $this->per_page,
					'order'=>array('Article.id'=>'DESC'),
					'conditions'=>array('Article.status'=>1),
					'joins' => array(
						array(
							'alias' => 'Articlescategorie',
							'table' => $this->Page->tablePrefix .'articlescategories',
							'type' => 'INNER',
							'conditions' => '`Article`.`id` = `Articlescategorie`.`article_id`'
						)
					),
					'conditions'=>array('AND'=>$conditions),
					'order'=>array('Article.id'=>'DESC')
				);
			
			$rows = $this->Article->find('all',array(
				'joins' => array(
					array(
						'alias' => 'Articlescategorie',
						'table' => $this->Page->tablePrefix .'articlescategories',
						'type' => 'INNER',
						'conditions' => '`Article`.`id` = `Articlescategorie`.`article_id`'
					)
				),
				'conditions'=>array('AND'=>$conditions),
				'order'=>array('Article.id'=>'DESC')
			));
			
			$rows = $this->paginate('Article');
		
		
			$this->set('rows',$rows);
			$this->set('numRows',count($rows));
		
		}
		else $this->redirect(array('controller'=>'pages','action'=>'error404'));
		
	}
	
	
	
	
	public function error404() {
		
		$this->response->disableCache();
		
		$this->layout = 'frontend';
		
		$this->set('title',__('Page not found!') .' - ' .$this->Setting->field('title',1));
		$this->set('message',__('speedy_cake',"Ooops! Page not found. Try searching, think positive, and you'll find what you're looking for :)"));
		
	}
	
	
	
	
	public function maintenance() {
		
		$this->response->disableCache();
		
		$this->layout = 'frontend';
		
		$this->set('title',__('Maintenance mode') .' - ' .$this->Setting->field('title',1));
		$this->set('message',__('We will be back online shortly'));
		
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