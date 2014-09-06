<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakeTime', 'Utility');

class ArticlesController extends AppController {
	
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
		
		$this->set('title',__('Articles'));
		
		if (isset($_GET["q"]) && isset($_GET["filter"])) {
			
			$conditions = array();
			
			if (isset($_GET["q"]) && $_GET["q"]!="") {
				
				$this->q = $_GET["q"];
				
				$conditions[] = array('Article.title LIKE '=>'%' .$this->q .'%');
				
			}
			if (isset($_GET["filter"]) && $_GET["filter"]!="") {
				
				$this->filter = $_GET["filter"];
				
				$conditions[] = array('Article.status'=> $this->filter);
				
			}
			
			if ($this->Session->read("Administrator.role")=="author") {
				
				$conditions[] = array('Article.user_id'=> $this->Session->read("Administrator.id"));
				
			}
		
			$this->paginate = array(
				'conditions'=>array('AND'=>$conditions),
				'limit' => $this->per_page,
				'order'=>array('Article.id'=>'DESC')
			);
			
			$rows = $this->Article->find('all',array(
				'conditions'=>array('AND'=>$conditions),
				'order'=>array('Article.id'=>'DESC')
			));
		
		}
		else if (!isset($_GET["q"]) && !isset($_GET["filter"])) {
			
			$conditions = array();
			
			if ($this->Session->read("Administrator.role")=="author") {
				
				$conditions[] = array('Article.user_id'=> $this->Session->read("Administrator.id"));
				
			}
		
			$this->paginate = array(
				'limit' => $this->per_page,
				'conditions'=>array('AND'=>$conditions),
				'order'=>array('Article.id'=>'DESC')
			);
			
			$rows = $this->Article->find('all',array(
				'order'=>array('Article.id'=>'DESC'),
				'conditions'=>array('AND'=>$conditions)
			));
			
		}
		
		$rows = $this->paginate('Article');
		
		$this->set('rows',$rows);
		$this->set('numRows',count($rows));
		$this->set('q',$this->q);
		$this->set('filter',$this->filter);
		
	}
	
	
	
	
	public function indexcategories() {
		
		$categorie_id = $_GET["categorie_id"];
		
		$this->set('categorie_id', $categorie_id);
		
		$this->set('breadcrumbs', true);
		
		$this->set('title',__('Articles'));
		
		if (isset($_GET["q"]) && isset($_GET["filter"])) {
			
			$conditions = array();
			
			if (isset($_GET["q"]) && $_GET["q"]!="") {
				
				$this->q = $_GET["q"];
				
				$conditions[] = array('Article.title LIKE '=>'%' .$this->q .'%');
				
			}
			if (isset($_GET["filter"]) && $_GET["filter"]!="") {
				
				$this->filter = $_GET["filter"];
				
				$conditions[] = array('Article.status'=> $this->filter);
				
			}
			
			$conditions[] = array('Categorie.id'=>$categorie_id);
		
			$this->paginate = array(
			'joins' => array(
					array(
						'alias' => 'Articlescategorie',
						'table' => $this->Page->tablePrefix .'articlescategories',
						'type' => 'INNER',
						'conditions' => '`Article`.`id` = `Articlescategorie`.`article_id`'
					),
					array(
						'alias' => 'Categorie',
						'table' => $this->Page->tablePrefix .'categories',
						'type' => 'INNER',
						'conditions' => '`Categorie`.`id` = `Articlescategorie`.`categorie_id`'
					)
				),
				'conditions'=>array('AND'=>$conditions),
				'limit' => $this->per_page,
				'order'=>array('Article.id'=>'DESC')
			);
			
			$rows = $this->Article->find('all',array(
				'joins' => array(
					array(
						'alias' => 'Articlescategorie',
						'table' => $this->Page->tablePrefix .'articlescategories',
						'type' => 'INNER',
						'conditions' => '`Article`.`id` = `Articlescategorie`.`article_id`'
					),
					array(
						'alias' => 'Categorie',
						'table' => $this->Page->tablePrefix .'categories',
						'type' => 'INNER',
						'conditions' => '`Categorie`.`id` = `Articlescategorie`.`categorie_id`'
					)
				),
				'conditions'=>array('AND'=>$conditions),
				'order'=>array('Article.id'=>'DESC')
			));
		
		}
		else if (!isset($_GET["q"]) && !isset($_GET["filter"])) {
			
			$this->paginate = array(
				'limit' => $this->per_page,
				'joins' => array(
					array(
						'alias' => 'Articlescategorie',
						'table' => $this->Page->tablePrefix .'articlescategories',
						'type' => 'INNER',
						'conditions' => '`Article`.`id` = `Articlescategorie`.`article_id`'
					),
					array(
						'alias' => 'Categorie',
						'table' => $this->Page->tablePrefix .'categories',
						'type' => 'INNER',
						'conditions' => '`Categorie`.`id` = `Articlescategorie`.`categorie_id`'
					)
				),
				'conditions'=>array('Categorie.id'=>$categorie_id),
				'order'=>array('Article.id'=>'DESC')
			);
			
			$rows = $this->Article->find('all',
			array(
				'joins' => array(
					array(
						'alias' => 'Articlescategorie',
						'table' => $this->Page->tablePrefix .'articlescategories',
						'type' => 'INNER',
						'conditions' => '`Article`.`id` = `Articlescategorie`.`article_id`'
					),
					array(
						'alias' => 'Categorie',
						'table' => $this->Page->tablePrefix .'categories',
						'type' => 'INNER',
						'conditions' => '`Categorie`.`id` = `Articlescategorie`.`categorie_id`'
					)
				),
				'conditions'=>array('Categorie.id'=>$categorie_id),
				'order'=>array('Article.id'=>'DESC')
			));
			
		}
		
		$rows = $this->paginate('Article');
		
		$this->set('rows',$rows);
		$this->set('numRows',count($rows));
		$this->set('q',$this->q);
		$this->set('filter',$this->filter);
		
	}
	
	
	
	
	public function add() {
		
		$this->set('breadcrumbs', true);
		
		$this->set('categories', $this->Categorie->find('all'));
		
		$this->set('title',__('Add new article'));
		
		if (!empty($this->request->data) && $this->request->is('post')) {
			
			if ($this->request->data["Article"]["image_src"]["name"]!="") {
				
				$newfile = $this->SpeedyCake->upload('Article','image_src');
			
				$this->request->data["Article"]["image_src"] = $newfile["name"];
			
			}
			else $this->request->data["Article"]["image_src"] = "";
			
			$this->request->data["Article"]["slug"] = strtolower(Inflector::slug($this->request->data["Article"]["title"],'-')); 
			
			$this->request->data["Article"]["user_id"] = $this->Session->read('Administrator.id');
			
			if ($this->Article->save($this->request->data)) {
				
				$article_id = $this->Article->getInsertID();
				
				if (isset($this->request->data['Article']['category'])) $this->SpeedyCake->saveCategories($this->request->data['Article']['category'],$article_id,$this->Article->tablePrefix);
				
				if (isset($this->request->data["Articlefield"])) $this->SpeedyCake->saveArticlefields($this->request->data["Articlefield"],$article_id,$this->Article->tablePrefix);
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/articles');
				
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
			
			echo $this->Article->find('count', array(
				'conditions' => array('Article.title' => $title)
			));
		
		}
		
	}
	
	
	
	
	public function edit($id=NULL) {
		
		$this->set('breadcrumbs', true);
		
		$this->set('categories', $this->Categorie->find('all'));
		
		$numArticlefields = $this->Articlefield->find('count', array(
			'conditions' => array('Articlefield.article_id' => $id)
		));
		
		$articlefields = $this->Articlefield->find('all', array(
			'conditions' => array('Articlefield.article_id' => $id),
			'order'=>array('Articlefield.id'=>'ASC')
		));
		
		if (!empty($this->request->data) && $this->request->is('post','put')) {
			
			if (isset($this->request->data['Article']['category'])) $this->SpeedyCake->saveCategories($this->request->data['Article']['category'],$this->request->data["Article"]["id"],$this->Article->tablePrefix);
			
			$this->Article->id = $this->request->data["Article"]["id"];
			
			$this->Articlefield->deleteAll(array('Articlefield.article_id' => $this->request->data["Article"]["id"]));
			
			if (isset($this->request->data["Articlefield"])) $this->SpeedyCake->saveArticlefields($this->request->data["Articlefield"],$this->request->data["Article"]["id"],$this->Article->tablePrefix);
			
			if ($this->request->data["Article"]["image_src"]["name"]!="" 
			&& $this->SpeedyCake->fileExists($this->request->data["Article"]["oldimage_src"])) {
				
				$this->SpeedyCake->deleteFile($this->request->data["Article"]["oldimage_src"]);
				
				$newfile = $this->SpeedyCake->upload('Article','image_src');
				
				$this->request->data["Article"]["image_src"] = $newfile["name"];
			
			}
			else $this->request->data["Article"]["image_src"] = $this->request->data["Article"]["oldimage_src"];
			
			if ($this->Article->save($this->request->data)) {
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/articles/edit/' .$this->request->data["Article"]["id"]);
				
			}
			else {
	
				$this->Session->setFlash(__('Saving failed!'),'default',
					array('class'=>'alert')
				);
				
			}
			
		}
		else {
		
				if (!$id) $this->redirect(array('controller'=>'articles','action'=>'index'));
		
				$row = $this->Article->find('first',array(
					'conditions'=>array('Article.id'=>$id)
				));
				
				$this->set('title',__('Edit Article'));
				
				$this->set('id',$row["Article"]["id"]);
				$this->set('title_article',$row["Article"]["title"]);
				$this->set('oldimage_src',$row["Article"]["image_src"]);
				$this->set('description',$row["Article"]["description"]);
				$this->set('keywords',$row["Article"]["keywords"]);
				$this->set('slug',$row["Article"]["slug"]);
				$this->set('content',$row["Article"]["content"]);
				$this->set('status',$row["Article"]["status"]);
				$this->set('created',$row["Article"]["created"]);
				$this->set('numArticlefields',$numArticlefields);
				$this->set('articlefields',$articlefields);
			
		}
		
	}
	
	
	
	
	public function delete($id=NULL) {
		
		$this->render(false);
		
		if (!$id) $this->redirect(array('controller'=>'articles','action'=>'index'));
		
		$this->Article->id = $id;
		$image_src = $this->Article->field('image_src');
		
		if ($this->Article->delete($id)) {
			
			$this->SpeedyCake->deleteCategories($id);
			
			if ($this->SpeedyCake->fileExists($image_src)) $this->SpeedyCake->deleteFile($image_src);
			
			$this->Articlefield->deleteAll(array('Articlefield.article_id' => $id));
			
			$this->Session->setFlash(__('Article deleted.'),'default',
				array('class'=>'alert alert-success')
			);
			
			$this->redirect('/admin/articles');
			
		}
		
	}
	
	
	
	
	public function deleteImageSrc($id=NULL) {
		
		$this->render(false);
		
		if (!$id) $this->redirect(array('controller'=>'articles','action'=>'index'));
		
		$this->Article->id = $id;
		$image_src = $this->Article->field('image_src');
		$this->Article->saveField('image_src','');
		
		if ($this->SpeedyCake->fileExists($image_src)) $this->SpeedyCake->deleteFile($image_src);

		$this->Session->setFlash(__('Image deleted.'),'default',
			array('class'=>'alert alert-success')
		);
				
		$this->redirect(array('controller'=>'articles','action'=>'edit', 'id'=>$id));
		
	}
	
	
	
	
	public function uploader() {
		
		$this->response->disableCache();
		
		if (!empty($this->request->data) && $this->request->is('post')) {
			
			$newfile = $this->SpeedyCake->upload('Article','newfile');
			
			$file = Configure::read('SpeedyCake.url') .'/files/uploads/' .$newfile["name"];
			
			$this->request->data["File"]["title"] = $this->request->data["Article"]["title"];
			$this->request->data["File"]["url"] = $file;
			$this->request->data["File"]["type"] = $newfile["type"];
			$this->request->data["File"]["size"] = $newfile["size"];
			$this->File->save($this->request->data);
			
			$this->Session->write('fileUploaded',$file);
			
			$this->redirect('/admin/articles/insertfile');
			
		}
		
	}
	
	
	
	
	public function insertfile() {
		
		$this->set('file',$this->Session->read('fileUploaded'));
		
		$this->Session->delete('fileUploaded');
		
	}
	
	
	
	
	public function imagegallery() {
		
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