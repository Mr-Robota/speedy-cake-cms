<?php

App::uses('Component', 'Controller');
App::uses('CakeTime', 'Utility');

class SpeedyCakeComponent extends Component {
	
	public $components = array('Session','Cookie');
	
	public $publicPages = array();



	
	public function initialize(Controller $controller) {
		
        $this->publicPages = Configure::read('SpeedyCake.publicPages');
		
    }
	
	
	
	
	public function ifDatabaseInstalled($prefix=NULL) {
		
		$return = true;
		
		$db = ConnectionManager::getDataSource('default');
		$db->cacheSources = false;
		
		if (!in_array($prefix ."settings",$db->listSources())) $return = false;
		if (!in_array($prefix ."users",$db->listSources())) $return = false;
		if (!in_array($prefix ."pages",$db->listSources())) $return = false;
		if (!in_array($prefix ."articles",$db->listSources())) $return = false;
		if (!in_array($prefix ."categories",$db->listSources())) $return = false;
		if (!in_array($prefix ."articlescategories",$db->listSources())) $return = false;
		if (!in_array($prefix ."files",$db->listSources())) $return = false;
		if (!in_array($prefix ."pagefields",$db->listSources())) $return = false;
		if (!in_array($prefix ."articlefields",$db->listSources())) $return = false;
		
		return($return);
		
	}
	
	
	
	
	public function isPublicPage($controller,$action) {
		
		if (in_array($controller ."/" .$action, $this->publicPages)) return(true);
		else return(false);
		
	}
	
	
	
	
	public function setTimezone() {
		
		$Setting = ClassRegistry::init('Setting');
		
		$Setting->id = 1;
		
		(string)$timezone = $Setting->field('timezone');
	
		Configure::write('Config.timezone',$timezone);
		
	}
	
	
	
	
	public function setLang($lang=NULL) {
		
		if ($lang===NULL) {
			$this->Session->write('Config.language',Configure::read('SpeedyCake.language'));
			Configure::write('Config.language',Configure::read('SpeedyCake.language'));
			CakeSession::write('Config.language', Configure::read('SpeedyCake.language'));
		}
		else {
			
			Configure::write('Config.language',$lang);
			$this->Session->write('Config.language',$lang);
			CakeSession::write('Config.language', $lang);
		
		}
		
	}
	
	
	
	
	public function passwordGenerator($length = 8) {
		
	  $password = "";
	  $characters = "0123456789bcdfghjkmnpqrstvwxyz";
	  $i = 0;
	  
	  while ($i<$length) {
		  
		$char = substr($characters, mt_rand(0, strlen($characters)-1), 1);
		
		if (!strstr($password, $char)) {
			
		  $password .= $char;
		  $i++;
		  
		}
		
	  }
	  
	  return($password);
	  
	}
	
	
	
	
	public function isAuth() {
		
		if ($this->Session->check('Administrator.id')) return(true);
		else return(false);
		
	}
	
	
	
	
	public function checkPermission($controller=NULL,$action=NULL,$id=NULL) {
		
		$return = true;
		
		if ($this->Session->check('Administrator.role') && $this->Session->read('Administrator.role')=="administrator") $return = true;
		
		else if ($this->Session->read('Administrator.role')=="editor") {
			
			if ($controller!="pages" && $controller!="articles" && $controller!="categories") $return = false;
			else $return = true;
			
		}
		else if ($this->Session->read('Administrator.role')=="author") {
			
			if ($controller=="articles") {
				
				if ($action=="index" || $action=="add") $return = true;
				else $return = false;
				
				if ($action=="edit" || $action=="delete") {
				
					$Article = ClassRegistry::init('Article');
					
					$Article->id = $id;
					
					(int)$user_id = $Article->field('user_id');
					
					if ($this->Session->check('Administrator.id') && $this->Session->read('Administrator.id')==$user_id) $return = true;
					else $return = false;
				
				}
				
			}
			else if ($controller=="pages" && ($action=="login" || $action=="logout" || $action=="dashboard" || $action=="forgot_password" || $this->isPublicPage($controller,$action))) $return = true;
			else $return = false;
	
			
		}
		
		return($return);
		
	}
	
	
	
	
	public function getAdmin($param=NULL) {
		
		(string)$item = "Administrator." .$param;
		 
		if ($this->Session->check($item)) {
			
			return($this->Session->read($item));
			
		}
		else return($this->Session->read('Administrator.username'));
		
	}
	

	
	
	public function upload($model,$field) {
		
		  if ($_FILES['data']['size'][$model][$field] == 0 || $_FILES['data']['error'][$model][$field]!== 0) return false;
		
		  if (is_uploaded_file($_FILES['data']['tmp_name'][$model][$field])) {
	
			  $uploadDir = Configure::read('SpeedyCake.uploads');
	  
			  $fileTmp = $_FILES['data']['tmp_name'][$model][$field];
			  
			  $fileName = $_FILES['data']['name'][$model][$field];
			  
			  $file = pathinfo($uploadDir . $fileName);
			  
			  $fileName = md5($file['filename'] .time()) ."." .$file['extension'];
		  
		  	  if (!file_exists($uploadDir)) {
				  
			  	mkdir($uploadDir);
				
			  }	
			
			  if (move_uploaded_file($fileTmp, $uploadDir . $fileName)) {
				  
				  return array('name'=>$fileName,'type'=>$file['extension'],'size'=>$_FILES['data']['size'][$model][$field]);
				  
			  }
			  else return false;
		  
		  }
		  else return false;
		
	}
	
	
	
	
	public function deleteFile($file=NULL) {
		
		if (file_exists(Configure::read('SpeedyCake.uploads') .$file)) {
			
			unlink(Configure::read('SpeedyCake.uploads') .$file);
			return(true);
			
		}
		else return(false);
		
	}
	
	
	
	
	public function fileExists($file=NULL) {
		
		if (file_exists(Configure::read('SpeedyCake.uploads') .$file)) return(true);
		else return(false);
		
	}
	
	
	
	
	public function savePagefields($pagefields = array(), $page_id = NULL, $tablePrefix = NULL) {
		
		$Page = ClassRegistry::init('Page');
	
		foreach($pagefields as $data) {
					
			$key = filter_var($data["key"], FILTER_SANITIZE_STRING);
			$value = filter_var($data["value"], FILTER_SANITIZE_STRING);
			
			$Page->query("INSERT INTO `" .$tablePrefix ."pagefields` (
				`page_id`, 
				`key`, 
				`value`
				) VALUES (
				" .$page_id .", 
				'" .$key ."', 
				'" .$value ."'
			);");
		
		}
		
	}
	
	
	
	public function saveArticlefields($articlefields = array(), $article_id = NULL, $tablePrefix = NULL) {
		
		$Article = ClassRegistry::init('Article');
	
		foreach($articlefields as $data) {
					
			$key = filter_var($data["key"], FILTER_SANITIZE_STRING);
			$value = filter_var($data["value"], FILTER_SANITIZE_STRING);
			
			$Article->query("INSERT INTO `" .$tablePrefix ."articlefields` (
				`article_id`, 
				`key`, 
				`value`
				) VALUES (
				" .$article_id .", 
				'" .$key ."', 
				'" .$value ."'
			);");
		
		}
		
	}
	
	
	
	
	public function cropImage($file=NULL,$x=100,$y=100,$w=100,$h=100) {
		
		$fileInfo = pathinfo($file);
		$ext = strtolower($fileInfo['extension']);
		
		if ($ext=="jpg" || $ext=="jpeg") $img = imagecreatefromjpeg($file);
		else if ($ext=="gif") $img = imagecreatefromgif($file);
		else if ($ext=="png") $img = imagecreatefrompng($file);
		$newImg = imagecreatetruecolor($w,$h) or die('Cannot Initialize new GD image stream');
		
		imagecopyresampled($newImg,$img,0,0,$x,$y,$w,$h,$w,$h);
		
		if ($ext=="jpg" || $ext=="jpeg") imagejpeg($newImg, $file, 100);
		else if ($ext=="gif") imagegif($newImg, $file);
		else if ($ext=="png") imagepng($newImg, $file);
		
		imagedestroy($newImg);
		
		return(true);
		
	}
	
	
	
	
	public function saveCategories($categories = array(), $article_id = NULL, $tablePrefix = NULL) {
		
		$Articlescategorie = ClassRegistry::init('Articlescategorie');
				
		$Articlescategorie->deleteAll(array('Articlescategorie.article_id' => $article_id), false);
		
		foreach($categories as $key=>$value) {
				
				if ($value==1) $Articlescategorie->query("INSERT INTO `" .$tablePrefix ."articlescategories` (
					`article_id`, 
					`categorie_id`
					) VALUES (
					" .$article_id .", 
					" .$key ."
				);");
				
		}
		
	}
	
	
	
	
	public function deleteCategories($article_id = NULL) {
		
		$Articlescategorie = ClassRegistry::init('Articlescategorie');
		
		$Articlescategorie->deleteAll(array('Articlescategorie.article_id' => $article_id), false);
		
	}
	
	
	
	
	public function checkStatus($id=NULL) {
	
		$Setting = ClassRegistry::init('Setting');
		
		$Setting->id = 1;
		
		return $Setting->field('status');
			
	}
	
	
	
	
}