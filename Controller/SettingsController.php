<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakeTime', 'Utility');

class SettingsController extends AppController {
	
	public $uses = array('SpeedyCake','Page','User','Setting');
	
	public $components = array('Session','Cookie','RequestHandler','SpeedyCake');
	
	public $helpers = array('Html', 'Form', 'Session');
	
	var $per_page = 10;
	var $q = "";
	
	
	
	
	public function index() {
		
		$this->set('breadcrumbs', true);
		
		$this->set('title',__('Generals'));
		
		if (empty($this->request->data)) {
		
			$data = $this->Setting->find('first', array(
				'conditions' => array('Setting.id'=>1)
			));
			
			$this->set('slogan',$data["Setting"]["slogan"]);
			$this->set('timezone',$data["Setting"]["timezone"]);
			$this->set('status',$data["Setting"]["status"]);
		
		} elseif ($this->request->is('post')) {
			
			$this->Setting->id = 1;
			
			if ($this->Setting->save($this->request->data)) {
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/settings');
				
			}
			else {

				$this->Session->setFlash(__('Saving failed!'),'default',
					array('class'=>'alert')
				);
				
			}
			
		}
		
	}
	
	
	
	
	public function meta() {
		
		$this->set('breadcrumbs', true);
		
		$this->set('title','Meta');
		
		if (empty($this->request->data)) {
		
			$data = $this->Setting->find('first', array(
				'conditions' => array('Setting.id'=>1)
			));
			
			$this->set('tagTitle',$data["Setting"]["title"]);
			$this->set('description',$data["Setting"]["description"]);
			$this->set('keywords',$data["Setting"]["keywords"]);
		
		} elseif ($this->request->is('post')) {
			
			$this->Setting->id = 1;
			
			if ($this->Setting->save($this->request->data)) {
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/settings/meta');
				
			}
			else {

				$this->Session->setFlash(__('Saving failed!'),'default',
					array('class'=>'alert')
				);
				
			}
			
		}
		
	}
	
	
	
	
	public function reading() {
		
		$this->set('breadcrumbs', true);
		
		$this->set('title',__('Reading'));
		
		if (empty($this->request->data)) {
		
			$data = $this->Setting->find('first', array(
				'conditions' => array('Setting.id'=>1)
			));
			
			$this->set('text_format',$data["Setting"]["text_format"]);
		
		} elseif ($this->request->is('post')) {
			
			$this->Setting->id = 1;
			
			if ($this->Setting->save($this->request->data)) {
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/settings/reading');
				
			}
			else {
	
				$this->Session->setFlash(__('Saving failed!'),'default',
					array('class'=>'alert')
				);
				
			}
			
		}
		
	}
	
	
	
	
	public function writing() {
		
		$this->set('breadcrumbs', true);
		
		$this->set('title',__('Writing'));
		
		if (empty($this->request->data)) {
		
			$data = $this->Setting->find('first', array(
				'conditions' => array('Setting.id'=>1)
			));
			
			$this->set('convert_emoticons',$data["Setting"]["convert_emoticons"]);
		
		} elseif ($this->request->is('post')) {
			
			$this->Setting->id = 1;
			
			if ($this->Setting->save($this->request->data)) {
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/settings/writing');
				
			}
			else {
	
				$this->Session->setFlash(__('Saving failed!'),'default',
					array('class'=>'alert')
				);
				
			}
			
		}
		
	}
	
	
	
	
	public function social() {
		
		$this->set('breadcrumbs', true);
		
		$this->set('title',__('Social'));
		
		if (empty($this->request->data)) {
		
			$data = $this->Setting->find('first', array(
				'conditions' => array('Setting.id'=>1)
			));
			
			$this->set('facebook',$data["Setting"]["facebook"]);
			$this->set('opengraph',$data["Setting"]["opengraph"]);
			$this->set('google',$data["Setting"]["google"]);
			$this->set('instagram',$data["Setting"]["instagram"]);
			$this->set('linkedin',$data["Setting"]["linkedin"]);
			$this->set('twitter',$data["Setting"]["twitter"]);
			$this->set('youtube',$data["Setting"]["youtube"]);
		
		} elseif ($this->request->is('post')) {
			
			$this->Setting->id = 1;
			
			if ($this->Setting->save($this->request->data)) {
				
				$this->Session->setFlash(__('Data saved.'),'default',
					array('class'=>'alert alert-success')
				);
				
				$this->redirect('/admin/settings/social');
				
			}
			else {
	
				$this->Session->setFlash(__('Saving failed!'),'default',
					array('class'=>'alert')
				);
				
			}
			
		}
		
	}
	
	
	
	
	public function import() {
		
		$this->set('breadcrumbs', true);
		
		$this->set('title', __('Import') .' Database');
		
		$sql = "";
		$code = "";
		
		if (!empty($this->request->data) && $this->request->is('post')) {
			
			if ($this->request->data["Setting"]["file"]["name"]!="") {
				
				$newfile = $this->SpeedyCake->upload('Setting','file');
			
				$this->request->data["Setting"]["file"] = $newfile["name"];
				
				$filename = new File(Configure::read('SpeedyCake.uploads') .$newfile["name"]);
				
				$code = $filename->read(true, 'r');
				
				$this->SpeedyCake->deleteFile($this->request->data["Setting"]["file"]);
			
			}
			
			if (isset($this->request->data["Setting"]["sql"])) $sql = $this->request->data["Setting"]["sql"];
			
			if ($code!="" || $sql!="") {
				
				$result = true;
				
				if ($code!="") {
					
					$result = $this->Setting->query($code);
					
				}
				elseif ($sql!="") {
					
					$result = $this->Setting->query($sql);
					
				}
				
				if ($result) {
				
					$this->Session->setFlash(__('Database imported. This is wonderful :)'),'default',
						array('class'=>'alert alert-success')
					);
					
					$this->redirect('/admin/settings/import');
				
				}
				
				else {
					$this->Session->setFlash(__('Database import failed! :('),'default',
						array('class'=>'alert')
					);
				}
			}
			
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