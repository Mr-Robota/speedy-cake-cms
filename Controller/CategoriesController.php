<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakeTime', 'Utility');

class CategoriesController extends AppController {
	
	public $uses = array(
		'SpeedyCake',
		'Page',
		'User',
		'Article',
		'Articlefield',
		'File',
		'Categorie',
		'Articlescategorie'
	);
	
	public $components = array('Session','Cookie','RequestHandler','SpeedyCake');
	
	public $helpers = array('Html', 'Form', 'Session');
	
	var $per_page = 10;
	var $q = "";
	var $filter = "";
	
	
	
	
	public function index() {
		
		$this->set('breadcrumbs', true);
		
		$this->set('title',__('Categories'));
		
		if (isset($_GET["q"])) {
			
			$conditions = array();
			
			if (isset($_GET["q"]) && $_GET["q"]!="") {
				
				$this->q = $_GET["q"];
				
				$conditions[] = array('Categorie.name LIKE '=>'%' .$this->q .'%');
				
			}
		
			$this->paginate = array(
				'conditions'=>array('AND'=>$conditions),
				'limit' => $this->per_page,
				'order'=>array('Categorie.id'=>'DESC')
			);
			
			$rows = $this->Categorie->find('all',array(
				'conditions'=>array('AND'=>$conditions),
				'order'=>array('Categorie.id'=>'DESC')
			));
		
		}
		else if (!isset($_GET["q"])) {
		
			$this->paginate = array(
				'limit' => $this->per_page,
				'order'=>array('Categorie.id'=>'DESC')
			);
			
			$rows = $this->Categorie->find('all',array('order'=>array('Categorie.id'=>'DESC')));
			
		}
		
		$rows = $this->paginate('Categorie');
		
		$this->set('rows',$rows);
		$this->set('numRows',count($rows));
		$this->set('q',$this->q);
		
		
	}
	
	
	
	
	public function add() {
		
		$this->set('breadcrumbs', true);
		
		$this->set('title',__('Add new category'));
		
		if (!empty($this->request->data) && $this->request->is('post')) {
			
			$this->request->data["Categorie"]["slug"] = strtolower(Inflector::slug($this->request->data["Categorie"]["name"],'-')); 
			
			$this->request->data["Categorie"]["user_id"] = $this->Session->read('Administrator.id');
			
			if ($this->Categorie->save($this->request->data)) {
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/categories');
				
			}
			else {
	
				$this->Session->setFlash(__('Saving failed!'),'default',
					array('class'=>'alert')
				);
				
			}
			
		}
		
	}
	
	
	
	
	public function nameIsUnique() {
		
		if (!empty($this->request->data) && $this->request->is('post') && $this->request->is('ajax')) {
			
			$this->autoRender = false;
			
			$name = $this->request->data["name"];
			
			echo $this->Categorie->find('count', array(
				'conditions' => array('Categorie.name' => $name)
			));
		
		}
		
	}
	
	
	
	
	public function edit($id=NULL) {
		
		$this->set('breadcrumbs', true);
		
		if (!empty($this->request->data) && $this->request->is('post','put')) {
			
			$this->Categorie->id = $this->request->data["Categorie"]["id"];
			
			if ($this->Categorie->save($this->request->data)) {
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/categories');
				
			}
			else {

				$this->Session->setFlash(__('Saving failed!'),'default',
					array('class'=>'alert')
				);
				
			}
			
		}
		else {
		
				if (!$id) $this->redirect(array('controller'=>'categories','action'=>'index'));
		
				$row = $this->Categorie->find('first',array(
					'conditions'=>array('Categorie.id'=>$id)
				));
				
				$this->set('title',__('Edit Category'));
				
				$this->set('id',$row["Categorie"]["id"]);
				$this->set('name',$row["Categorie"]["name"]);
				$this->set('slug',$row["Categorie"]["slug"]);
				
			
		}
		
	}
	
	
	
	
	public function delete($id=NULL) {
		
		if (!$id) $this->redirect(array('controller'=>'categories','action'=>'index'));
		
		$this->Categorie->id = $id;
		
		if ($this->Categorie->delete($id)) {
			
			$this->Articlescategorie->deleteAll(array('Articlescategorie.categorie_id' => $id), false);
			
			$this->Session->setFlash(__('Category deleted.'),'default',
				array('class'=>'alert alert-success')
			);
			
			$this->redirect('/admin/categories');
			
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