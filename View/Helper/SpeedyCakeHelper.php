<?php

App::uses('AppHelper', 'View/Helper');
App::uses('CakeTime', 'Utility');

class SpeedyCakeHelper extends AppHelper {
	
	public $helpers = array('Html', 'Form', 'Session','Paginator','Time');
	
	
	
	
    public function getAdmin($param=NULL) {
		
		(string)$item = "Administrator." .$param;
		 
		if ($this->Session->check($item)) {
			
			return($this->Session->read($item));
			
		}
		else return($this->Session->read('Administrator.username'));
		
	}
	
	
	
	
	public function isHome() {
	
		if ($this->request->params['controller'] == "pages" && $this->request->params['action']=="homepage") return(true);
		else return(false);
		
	}
	
	
	
	
	public function getTime($created=NULL) {
		
		$time = $this->Time->nice($created);
		
		$time = str_replace("Mon,",__('Mon,'),$time);
		$time = str_replace("Tue,",__('Tue,'),$time);
		$time = str_replace("Wed,",__('Wed,'),$time);
		$time = str_replace("Thu,",__('Thu,'),$time);
		$time = str_replace("Fri,",__('Fri,'),$time);
		$time = str_replace("Sat,",__('Sat,'),$time);
		$time = str_replace("Sun,",__('Sun,'),$time);
		
		$time = str_replace("Jan",__('Jan'),$time);
		$time = str_replace("Feb",__('Feb'),$time);
		$time = str_replace("Mar",__('Mar'),$time);
		$time = str_replace("Apr",__('Apr'),$time);
		$time = str_replace("May",__('May'),$time);
		$time = str_replace("Jun",__('Jun'),$time);
		$time = str_replace("Jul",__('Jul'),$time);
		$time = str_replace("Aug",__('Aug'),$time);
		$time = str_replace("Sep",__('Sep'),$time);
		$time = str_replace("Oct",__('Oct'),$time);
		$time = str_replace("Nov",__('Nov'),$time);
		$time = str_replace("Dec",__('Dec'),$time);
		
		return $time;
		
	}
	
	
	
	
	public function getUsername($id=NULL) {  
	
		$User = ClassRegistry::init('User');
		
		$User->id = $id;
		
		return $User->field('username');
			
	}

	
	
	
	public function slogan() {  
	
		$Setting = ClassRegistry::init('Setting');
		
		$Setting->id = 1;
			
		return $Setting->field('slogan');
			
	}
	
	
	
	
	public function author($id=NULL) {
		
		$User = ClassRegistry::init('User');
		
		$User->id = $id;
			
		return $User->field('username');
		
	}
	
	
	
	
	public function mainImage($model=NULL,$id=NULL,$codeBefore='',$codeAfter='') {
		
		$model = ClassRegistry::init($model);
		
		$model->id = $id;
		
		$image_src = $model->field('image_src');
			
		$img = Configure::read('SpeedyCake.url') .'/files/uploads/' .$image_src;
		
		if ($image_src!="") return $codeBefore .$this->Html->image($img) .$codeAfter;
		else return(false);
		
	}
	
	
	
	
	public function mainImageUrl($model=NULL,$id=NULL) {
		
		$model = ClassRegistry::init($model);
		
		$model->id = $id;
		
		$image_src = $model->field('image_src');
			
		$img = Configure::read('SpeedyCake.url') .'/files/uploads/' .$image_src;
		
		if ($image_src!="") return $img;
		else return(false);
		
	}
	
	
	
	
	public function getArticleCategories($article_id=NULL) {
		
		$Page = ClassRegistry::init('Page');
		
		$Articlescategorie = ClassRegistry::init('Articlescategorie');
		
		$Categorie = ClassRegistry::init('Categorie');
		
		$conditions[] = array('Articlescategorie.article_id'=>$article_id);
		
		$rows = $Categorie->find('all',array(
			'joins' => array(
				array(
					'alias' => 'Articlescategorie',
					'table' => $Page->tablePrefix .'articlescategories',
					'type' => 'INNER',
					'conditions' => '`Categorie`.`id` = `Articlescategorie`.`categorie_id`'
				)
			),
			'conditions'=>array('AND'=>$conditions),
			'order'=>array('Categorie.name'=>'ASC')
		));
		
		$html = "";
		
		foreach ($rows as $row):
			$html .= '<a href="' .Configure::read('SpeedyCake.url') .'/category/' .$row["Categorie"]["slug"] .'"><span class="label label-inverse">' .$row["Categorie"]["name"] .'</span></a>&nbsp;';
		endforeach;
		
		return $html;
		
	}
	
	
	
	
	public function ifExists($name=NULL) {
		
		$count = 0;
		
		$table = Inflector::classify($name);
		
		$entity = $table .".status";
		
		$table = ClassRegistry::init($table);
		
		if ($name=="articles" || $name=="pages") {
			
			$count = $table->find('count', array(
				'conditions' => array($entity => 1)
			));
		
		}
		else {
			
			$count = $table->find('count');
			
		}
		
		if ($count>0) return(true);
		else return(false);
		
	}
	
	
	
	
	public function getCustomField($id=NULL,$type=NULL,$key=NULL) {
		
		if ($type=="article") {
			
			$Articlefield = ClassRegistry::init('Articlefield');
			
			$value = $Articlefield->find('first', array(
				'conditions' => array(
					'Articlefield.article_id' => $id,
					'Articlefield.key' => $key
				)
			));
				
			if (count($value)>0) return $value["Articlefield"]["value"];
			else return(false);
		
		}
		
		if ($type=="page") {
			
			$Pagefield = ClassRegistry::init('Pagefield');
			
			$value = $Pagefield->find('first', array(
				'conditions' => array(
					'Pagefield.page_id' => $id,
					'Pagefield.key' => $key
				)
			));
				
			if (count($value)>0) return $value["Pagefield"]["value"];
			else return(false);
		
		}
		
	}
	
	
	
	
	public function checkOpenGraph() {
		
		$Setting = ClassRegistry::init('Setting');
			
		$data = $Setting->find('first', array(
			'conditions' => array(
				'Setting.id' => 1
			)
		));
		
		return $data["Setting"]["opengraph"];
		
	}
	
	
	
	
	public function lastArticles($limit=5) {
		
		$Article = ClassRegistry::init('Article');
		
		$rows = $Article->find('all', array(
			'conditions' => array('Article.status' => 1),
			'order'=>array('Article.id'=>'DESC'),
			'limit'=>$limit
		));
		
		$html = '';
		
		foreach ($rows as $row):
			$html .= '<li><a href="' .Configure::read('SpeedyCake.url') .'/article/' .$row["Article"]["slug"] .'">' .$row["Article"]["title"] .'</a></li>';
		endforeach;
		
		return $html;
		
	}
	
	
	
	
	public function getPages() {
		
		$Page = ClassRegistry::init('Page');
		
		$rows = $Page->find('all', array(
			'conditions' => array('Page.status' => 1),
			'order'=>array('Page.title'=>'ASC')
		));
		
		$html = '';
		
		foreach ($rows as $row):
			$html .= '<li><a href="' .Configure::read('SpeedyCake.url') .'/' .$row["Page"]["slug"] .'">' .$row["Page"]["title"] .'</a></li>';
		endforeach;
		
		return $html;
		
	}
	
	
	
	
	public function getCategories() {
		
		$Categorie = ClassRegistry::init('Categorie');
		
		$rows = $Categorie->find('all', array(
			'order'=>array('Categorie.name'=>'ASC')
		));
		
		$html = '';
		
		foreach ($rows as $row):
			$html .= '<li><a href="' .Configure::read('SpeedyCake.url') .'/category/' .$row["Categorie"]["slug"] .'">' .$row["Categorie"]["name"] .'</a></li>';
		endforeach;
		
		return $html;
		
	}
	
	
	
	
	public function getSocial() {  
	
		$Setting = ClassRegistry::init('Setting');
		
		$Setting->id = 1;
		
		$html = '';
			
		$facebook = $Setting->field('facebook');
		$google = $Setting->field('google');
		$instagram = $Setting->field('instagram');
		$linkedin = $Setting->field('linkedin');
		$twitter = $Setting->field('twitter');
		$youtube = $Setting->field('youtube');
		
		if ($facebook!="") $html .= '<li><a href="' .$facebook .'">' .$this->Html->image('facebook.png') .' Facebook</a></li>';
		if ($google!="") $html .= '<li><a href="' .$google .'">' .$this->Html->image('google.png') .' Google+</a></li>';
		if ($instagram!="") $html .= '<li><a href="' .$instagram .'">' .$this->Html->image('instagram.png') .' Instagram</a></li>';
		if ($linkedin!="") $html .= '<li><a href="' .$linkedin .'">' .$this->Html->image('linkedin.png') .' LinkedIn</a></li>';
		if ($twitter!="") $html .= '<li><a href="' .$twitter .'">' .$this->Html->image('twitter.png') .' Twitter</a></li>';
		if ($youtube!="") $html .= '<li><a href="' .$youtube .'">' .$this->Html->image('youtube.png') .' YouTube</a></li>';
		
		return $html;
			
	}
	
	
	
	
	public function theContent($content=NULL) {
		
		$Setting = ClassRegistry::init('Setting');
		
		$Setting->id = 1;
			
		$text_format = $Setting->field('text_format');
		$convert_emoticons = $Setting->field('convert_emoticons');
		
		if ($text_format==1) $content = substr($content,0,500) ."...";
		
		if ($convert_emoticons==1) {
		
			//Confused
			$content = str_replace(":S",$this->Html->image('emoticons/confused.gif', array('alt' => 'Confused','title' => 'Confused')),$content);
			$content = str_replace(":s",$this->Html->image('emoticons/confused.gif', array('alt' => 'Confused','title' => 'Confused')),$content);
			$content = str_replace(":?",$this->Html->image('emoticons/confused.gif', array('alt' => 'Confused','title' => 'Confused')),$content);
			$content = str_replace(":-?",$this->Html->image('emoticons/confused.gif', array('alt' => 'Confused','title' => 'Confused')),$content);
			
			//Cool
			$content = str_replace("8)",$this->Html->image('emoticons/cool.gif', array('alt' => 'Cool','title' => 'Cool')),$content);
			$content = str_replace("8-)",$this->Html->image('emoticons/cool.gif', array('alt' => 'Cool','title' => 'Cool')),$content);
			
			//Grin
			$content = str_replace(":D",$this->Html->image('emoticons/grin.gif', array('alt' => 'Grin','title' => 'Grin')),$content);
			$content = str_replace(":-D",$this->Html->image('emoticons/grin.gif', array('alt' => 'Grin','title' => 'Grin')),$content);
			$content = str_replace(":d",$this->Html->image('emoticons/grin.gif', array('alt' => 'Grin','title' => 'Grin')),$content);
			$content = str_replace(":-d",$this->Html->image('emoticons/grin.gif', array('alt' => 'Grin','title' => 'Grin')),$content);
			
			//Mad
			$content = str_replace(":x",$this->Html->image('emoticons/mad.gif', array('alt' => 'Mad','title' => 'Mad')),$content);
			$content = str_replace(":-x",$this->Html->image('emoticons/mad.gif', array('alt' => 'Mad','title' => 'Mad')),$content);
			$content = str_replace(":X",$this->Html->image('emoticons/mad.gif', array('alt' => 'Mad','title' => 'Mad')),$content);
			$content = str_replace(":-X",$this->Html->image('emoticons/mad.gif', array('alt' => 'Mad','title' => 'Mad')),$content);
			
			//Neutral
			$content = str_replace(":|",$this->Html->image('emoticons/neutral.gif', array('alt' => 'Neutral','title' => 'Neutral')),$content);
			$content = str_replace(":-|",$this->Html->image('emoticons/neutral.gif', array('alt' => 'Neutral','title' => 'Neutral')),$content);
			
			//Sad
			$content = str_replace(":(",$this->Html->image('emoticons/sad.gif', array('alt' => 'Sad','title' => 'Sad')),$content);
			$content = str_replace(":-(",$this->Html->image('emoticons/sad.gif', array('alt' => 'Sad','title' => 'Sad')),$content);
			
			//Surprised
			$content = str_replace(":o",$this->Html->image('emoticons/surprised.gif', array('alt' => 'Surprised','title' => 'Surprised')),$content);
			$content = str_replace(":-o",$this->Html->image('emoticons/surprised.gif', array('alt' => 'Surprised','title' => 'Surprised')),$content);
			$content = str_replace(":O",$this->Html->image('emoticons/surprised.gif', array('alt' => 'Surprised','title' => 'Surprised')),$content);
			$content = str_replace(":-O",$this->Html->image('emoticons/surprised.gif', array('alt' => 'Surprised','title' => 'Surprised')),$content);
			
			//Shock
			$content = str_replace("8o",$this->Html->image('emoticons/shock.gif', array('alt' => 'Shock','title' => 'Shock')),$content);
			$content = str_replace("8-o",$this->Html->image('emoticons/shock.gif', array('alt' => 'Shock','title' => 'Shock')),$content);
			$content = str_replace("8O",$this->Html->image('emoticons/shock.gif', array('alt' => 'Shock','title' => 'Shock')),$content);
			$content = str_replace("8-O",$this->Html->image('emoticons/shock.gif', array('alt' => 'Shock','title' => 'Shock')),$content);
			
			//Smile
			$content = str_replace(":)",$this->Html->image('emoticons/smile.gif', array('alt' => 'Smile','title' => 'Smile')),$content);
			$content = str_replace(":-)",$this->Html->image('emoticons/smile.gif', array('alt' => 'Smile','title' => 'Smile')),$content);
			
			//Tongue
			$content = str_replace(":p",$this->Html->image('emoticons/tongue.gif', array('alt' => 'Tongue','title' => 'Tongue')),$content);
			$content = str_replace(":-p",$this->Html->image('emoticons/tongue.gif', array('alt' => 'Tongue','title' => 'Tongue')),$content);
			$content = str_replace(":P",$this->Html->image('emoticons/tongue.gif', array('alt' => 'Tongue','title' => 'Tongue')),$content);
			$content = str_replace(":-P",$this->Html->image('emoticons/tongue.gif', array('alt' => 'Tongue','title' => 'Tongue')),$content);
			
			//Wink
			$content = str_replace(";)",$this->Html->image('emoticons/wink.gif', array('alt' => 'Wink','title' => 'Wink')),$content);
			$content = str_replace(";-)",$this->Html->image('emoticons/wink.gif', array('alt' => 'Wink','title' => 'Wink')),$content);
			
		
		}
		
		return $content;
		
	}
	
	
	
	
	public function checkCategorieSelected($article_id,$categorie_id) {
		
		$Articlescategorie = ClassRegistry::init('Articlescategorie');
		
		return $Articlescategorie->find('count', array(
			'conditions' => array('Articlescategorie.article_id' => $article_id, 'Articlescategorie.categorie_id'=>$categorie_id)
		));
		
	}
	
	
	
	
	public function articlesAssociated($categorie_id = NULL) {
		
		$Articlescategorie = ClassRegistry::init('Articlescategorie');
		
		return $Articlescategorie->find('count', array(
			'conditions' => array('Articlescategorie.categorie_id'=>$categorie_id)
		));
		
	}
	
	
	
	
}

?>