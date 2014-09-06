<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakeTime', 'Utility');

class FilesController extends AppController {
	
	public $uses = array('SpeedyCake','Page','User','File');
	
	public $components = array('Session','Cookie','RequestHandler','SpeedyCake');
	
	public $helpers = array('Html', 'Form', 'Session');
	
	var $per_page = 10;
	var $q = "";
	
	
	
	
	public function index() {
		
		$this->response->disableCache();
		
		$this->set('breadcrumbs', true);
		
		$this->set('title',__('Images'));
		
		if (isset($_GET["q"])) {
			
			$conditions = array();
			
			if (isset($_GET["q"]) && $_GET["q"]!="") {
				
				$this->q = $_GET["q"];
				
				$conditions[] = array('File.title LIKE '=>'%' .$this->q .'%');
				
			}
		
			$this->paginate = array(
				'conditions'=>array('AND'=>$conditions),
				'limit' => $this->per_page,
				'order'=>array('File.id'=>'DESC')
			);
			
			$rows = $this->File->find('all',array(
				'conditions'=>array('AND'=>$conditions),
				'order'=>array('File.id'=>'DESC')
			));
		
		}
		else if (!isset($_GET["q"])) {
		
			$this->paginate = array(
				'limit' => $this->per_page,
				'order'=>array('File.id'=>'DESC')
			);
			
			$rows = $this->File->find('all',array('order'=>array('File.id'=>'DESC')));
			
		}
		
		$rows = $this->paginate('File');
		
		$this->set('rows',$rows);
		$this->set('numRows',count($rows));
		$this->set('q',$this->q);
		$this->set('filter',$this->filter);
		
		
	}
	
	
	
	
	public function add() {
		
		$this->set('breadcrumbs', true);
		
		$this->set('title',__('Add new image'));
		
		if (!empty($this->request->data) && $this->request->is('post')) {
			
			if ($this->request->data["File"]["newfile"]["name"]!="") {
				
				$newfile = $this->SpeedyCake->upload('File','newfile');
			
				$this->request->data["File"]["url"] = Configure::read('SpeedyCake.url') .'/files/uploads/' .$newfile["name"];
				$this->request->data["File"]["type"] = $newfile["type"];
				$this->request->data["File"]["size"] = $newfile["size"];
			
			}
			else {
				
				$this->request->data["File"]["url"] = "";
				$this->request->data["File"]["type"] = "";
				$this->request->data["File"]["size"] = "";
				
			}
			
			if ($this->File->save($this->request->data)) {
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/files');
				
			}
			else {

				$this->Session->setFlash(__('Saving failed!'),'default',
					array('class'=>'alert')
				);
				
			}
			
		}
		
	}
	
	
	
	
	public function edit($id=NULL) {
		
		$this->set('breadcrumbs', true);
		
		if (!empty($this->request->data) && $this->request->is('post','put')) {
			
			$this->File->id = $this->request->data["File"]["id"];
			
			$oldUrl = $this->request->data["File"]["oldUrl"];
			
			$oldUrl = str_replace(Configure::read('SpeedyCake.url') .'/files/uploads/',"",$oldUrl);
			
			if ($this->request->data["File"]["newfile"]["name"]!="" 
			&& $this->SpeedyCake->fileExists($oldUrl)) {
				
				$this->SpeedyCake->deleteFile($oldUrl);
			
				$newfile = $this->SpeedyCake->upload('File','newfile');
			
				$this->request->data["File"]["url"] = Configure::read('SpeedyCake.url') .'/files/uploads/' .$newfile["name"];
				$this->request->data["File"]["type"] = $newfile["type"];
				$this->request->data["File"]["size"] = $newfile["size"];
			
			}
			else $this->request->data["File"]["url"] = $this->request->data["File"]["oldUrl"];
			
			if ($this->File->save($this->request->data)) {
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/files/edit/' .$this->request->data["File"]["id"]);
				
			}
			else {

				$this->Session->setFlash(__('Saving failed!'),'default',
					array('class'=>'alert')
				);
				
			}
			
		}
		else {
		
				if (!$id) $this->redirect(array('controller'=>'files','action'=>'index'));
		
				$row = $this->File->find('first',array(
					'conditions'=>array('File.id'=>$id)
				));
				
				$this->set('title',__('Edit Image'));
				
				$this->set('id',$row["File"]["id"]);
				$this->set('title',$row["File"]["title"]);
				$this->set('oldUrl',$row["File"]["url"]);
			
		}
		
	}
	
	
	
	
	public function delete($id=NULL) {
		
		$this->set('breadcrumbs', true);
		
		if (!$id) $this->redirect(array('controller'=>'files','action'=>'index'));
		
		$this->File->id = $id;
		$file = $this->File->field('url');
		
		$file = str_replace(Configure::read('SpeedyCake.url') .'/files/uploads/',"",$file);
		
		if ($this->File->delete($id)) {
			
			if ($this->SpeedyCake->fileExists($file)) $this->SpeedyCake->deleteFile($file);
			
			$this->Session->setFlash(__('Image deleted.'),'default',
				array('class'=>'alert alert-success')
			);
			
			$this->redirect('/admin/files');
			
		}
		
	}
	
	
	
	
	public function crop($id=NULL) {
		
		$this->set('breadcrumbs', true);
		
		$this->File->id = $id;
		$file = $this->File->field('url');
		
		$this->set('id',$id);
		$this->set('file',$file);
		
		$this->set('title','Crop - Files');
		
		if (!empty($this->request->data) && $this->request->is('post','put')) {
			
			$this->File->id = $this->request->data["File"]["id"];
			$file = $this->File->field('url');
			
			$filepath = str_replace(Configure::read('SpeedyCake.url') .'/files/uploads/',"",$file);
			$filepath = WWW_ROOT . 'files/uploads' . DS .$filepath;
			
			$x = $this->request->data["File"]["x"];
			$y = $this->request->data["File"]["y"];
			$w = $this->request->data["File"]["w"];
			$h = $this->request->data["File"]["h"];
			
			$this->SpeedyCake->cropImage($filepath,$x,$y,$w,$h);
			
			$this->Session->setFlash('Image saved.','default',
				array('class'=>'alert alert-success')
			);
			
			$this->redirect(array('controller'=>'files','action'=>'index'));
			
		}
		else if (!$id) $this->redirect(array('controller'=>'files','action'=>'index'));
		
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