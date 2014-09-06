<?php

App::uses('ConnectionManager', 'Model');

class SpeedyCakeController extends AppController {
	
	public $uses = array('SpeedyCake','Page','User');
	
	public $components = array('Session','Cookie','RequestHandler','SpeedyCake');
		
	public $helpers = array('Html', 'Form', 'Session');
	
	
	public function index() {
	
		$this->response->disableCache();
	
		$this->set('title',__('Installation'));
	
		if ($this->SpeedyCake->ifDatabaseInstalled($this->Page->tablePrefix)) $this->redirect('/admin');
		
	}
	
	
	
	
	public function install() {
		
		$this->response->disableCache();
		
		$this->set('title',__('Installation'));
		
		if ($this->SpeedyCake->ifDatabaseInstalled($this->Page->tablePrefix)) $this->redirect('/admin');
		
		
		if ($this->request->is('post')) {
		
			$installModules = 0;
			$db = ConnectionManager::getDataSource('default');
			
			$email = $this->request->data["email"];
			$username = $this->request->data["username"];
			
			$salt = Configure::read('Security.salt');
				
			$pwd = md5($this->request->data["pwd"] .$salt);
			
			$created = date("Y-m-d") ." " .date("H:i:s");
			
			$sql = "CREATE TABLE IF NOT EXISTS `" .$this->Page->tablePrefix ."settings` (
				  `id` int(11) NOT NULL auto_increment,
				  `slogan` varchar(255) collate utf8_unicode_ci default NULL,
				  `timezone` varchar(255) collate utf8_unicode_ci default NULL,
				  `status` int(11) NOT NULL,
				  `title` varchar(255) collate utf8_unicode_ci default NULL,
				  `description` varchar(255) collate utf8_unicode_ci default NULL,
				  `keywords` varchar(255) collate utf8_unicode_ci default NULL,
				  `text_format` int(11) NOT NULL,
				  `convert_emoticons` varchar(255) collate utf8_unicode_ci default NULL,
				  `opengraph` int(11) NOT NULL,
				  `facebook` varchar(255) collate utf8_unicode_ci default NULL,
				  `google` varchar(255) collate utf8_unicode_ci default NULL,
				  `instagram` varchar(255) collate utf8_unicode_ci default NULL,
				  `linkedin` varchar(255) collate utf8_unicode_ci default NULL,
				  `twitter` varchar(255) collate utf8_unicode_ci default NULL,
				  `youtube` varchar(255) collate utf8_unicode_ci default NULL,
				  PRIMARY KEY  (`id`)
			) ENGINE=" .Configure::read('SpeedyCake.engine') ." DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";
			
			if ($db->query($sql)) {
				$installModules++;
				//echo "Settings table created.<br>";
			}
			
			$sql = "INSERT INTO `" .$this->Page->tablePrefix ."settings` (
				`id`, 
				`slogan`,
				`timezone`, 
				`status`, 
				`title`, 
				`description`, 
				`keywords`, 
				`text_format`,
				`convert_emoticons`,
				`opengraph`,
				`facebook`,
				`google`,
				`instagram`,
				`linkedin`,
				`twitter`,
				`youtube`
			) VALUES (
				1, 
				'Example website', 
				'Europe/Rome',
				0,
				'Example Website',
				'', 
				'', 
				0, 
				'1',
				0,
				'',
				'',
				'',
				'',
				'',
				''
			);";
			
			if ($db->query($sql)) {
				$installModules++;
				//echo "Settings table data entered.<br>";
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS `" .$this->Page->tablePrefix ."users` (
			  `id` bigint(64) NOT NULL auto_increment,
			  `avatar` varchar(255) collate utf8_unicode_ci default NULL,
			  `username` varchar(255) collate utf8_unicode_ci default NULL,
			  `pwd` varchar(255) collate utf8_unicode_ci default NULL,
			  `email` varchar(255) collate utf8_unicode_ci default NULL,
			  `role` varchar(255) collate utf8_unicode_ci default NULL,
			  `status` int(11) NOT NULL,
			  `last_login` datetime NOT NULL,
			  `created` datetime NOT NULL,
			  `modified` datetime NOT NULL,
			  PRIMARY KEY  (`id`)
			) ENGINE=" .Configure::read('SpeedyCake.engine') ." DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";
			
			if ($db->query($sql)) {
				$installModules++;
				//echo "Users table created.<br>";
			}
			
			$sql = "INSERT INTO `" .$this->Page->tablePrefix ."users` (
					`id`, 
					`username`, 
					`pwd`, 
					`email`, 
					`role`, 
					`status`, 
					`last_login`, 
					`created`, 
					`modified`
				) VALUES (
					1, 
					'" .$username ."', 
					'" .$pwd ."', 
					'" .$email ."', 
					'administrator', 
					1, 
					'" .$created ."', 
					'" .$created ."', 
					'" .$created ."'
				);";
				
				if ($db->query($sql)) {
					$installModules++;
					//echo "Users table data entered.<br>";
				}
				
				$sql = "CREATE TABLE IF NOT EXISTS `" .$this->Page->tablePrefix ."pages` (
				  `id` bigint(64) NOT NULL auto_increment,
				  `user_id` bigint(64) NOT NULL,
				  `title` varchar(255) collate utf8_unicode_ci default NULL,
				  `image_src` varchar(255) collate utf8_unicode_ci default NULL,
				  `description` varchar(160) collate utf8_unicode_ci default NULL,
				  `keywords` varchar(255) collate utf8_unicode_ci default NULL,
				  `slug` varchar(255) collate utf8_unicode_ci default NULL,
				  `content` longtext collate utf8_unicode_ci,
				  `status` int(11) NOT NULL,
				  `created` datetime NOT NULL,
				  `modified` datetime NOT NULL,
				   PRIMARY KEY  (`id`)
				) ENGINE=" .Configure::read('SpeedyCake.engine') ." DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";
				
				if ($db->query($sql)) {
					$installModules++;
					//echo "Pages table created.<br>";
				}
				
				$sql = "INSERT INTO `" .$this->Page->tablePrefix ."pages` (
					`id`, 
					`user_id`, 
					`title`, 
					`image_src`, 
					`description`, 
					`keywords`, 
					`slug`, 
					`content`, 
					`status`, 
					`created`, 
					`modified`
				) VALUES (
					1, 
					1, 
					'hello world', 
					NULL, 
					'test page', 
					NULL, 
					'hello-world', 
					'<p><strong>test page</strong>.</p>\r\n', 
					1, 
					'" .$created ."', 
					'" .$created ."'
				);";
				
				if ($db->query($sql)) {
					$installModules++;
					//echo "Pages table data entered.<br>";
				}
				
				$sql = "CREATE TABLE IF NOT EXISTS `" .$this->Page->tablePrefix ."articles` (
				  `id` bigint(64) NOT NULL auto_increment,
				  `user_id` bigint(64) NOT NULL,
				  `title` varchar(255) collate utf8_unicode_ci default NULL,
				  `image_src` varchar(255) collate utf8_unicode_ci default NULL,
				  `description` varchar(160) collate utf8_unicode_ci default NULL,
				  `keywords` varchar(255) collate utf8_unicode_ci default NULL,
				  `slug` varchar(255) collate utf8_unicode_ci default NULL,
				  `content` longtext collate utf8_unicode_ci,
				  `status` int(11) NOT NULL,
				  `created` datetime NOT NULL,
				  `modified` datetime NOT NULL,
				   PRIMARY KEY  (`id`)
				) ENGINE=" .Configure::read('SpeedyCake.engine') ." DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";
				
				if ($db->query($sql)) {
					$installModules++;
					//echo "Articles table created.<br>";
				}
				
				$sql = "INSERT INTO `" .$this->Page->tablePrefix ."articles` (
					`id`, 
					`user_id`, 
					`title`, 
					`image_src`, 
					`description`, 
					`keywords`, 
					`slug`, 
					`content`, 
					`status`, 
					`created`, 
					`modified`
				) VALUES (
					1, 
					1, 
					'my first article', 
					NULL, 
					'test content', 
					NULL, 
					'my-first-article', 
					'<p><strong>test content</strong>.</p>\r\n', 
					1, 
					'" .$created ."', 
					'" .$created ."'
				);";
				
				if ($db->query($sql)) {
					$installModules++;
					//echo "Articles table data entered.<br>";
				}
				
				$sql = "CREATE TABLE IF NOT EXISTS `" .$this->Page->tablePrefix ."categories` (
				  `id` bigint(64) NOT NULL AUTO_INCREMENT,
				  `user_id` bigint(64) NOT NULL,
				  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				  `created` datetime NOT NULL,
				  `modified` datetime NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=" .Configure::read('SpeedyCake.engine') ." DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";
				
				if ($db->query($sql)) {
					$installModules++;
					//echo "Categories table created.<br>";
				}
				
				$sql = "CREATE TABLE IF NOT EXISTS `" .$this->Page->tablePrefix ."articlescategories` (
				  `id` bigint(64) NOT NULL AUTO_INCREMENT,
				  `article_id` bigint(64) NOT NULL,
				  `categorie_id` bigint(64) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=" .Configure::read('SpeedyCake.engine') ." DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";
				
				if ($db->query($sql)) {
					$installModules++;
					//echo "Articles - Categories table created.<br>";
				}
				
				$sql = "CREATE TABLE IF NOT EXISTS `" .$this->Page->tablePrefix ."files` (
				  `id` bigint(64) NOT NULL auto_increment,
				  `url` varchar(255) collate utf8_unicode_ci default NULL,
				  `title` varchar(255) collate utf8_unicode_ci default NULL,
				  `type` varchar(255) collate utf8_unicode_ci default NULL,
				  `size` bigint(64) NOT NULL,
				  `created` datetime NOT NULL,
				  `modified` datetime NOT NULL,
				  PRIMARY KEY  (`id`)
				) ENGINE=" .Configure::read('SpeedyCake.engine') ."  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
				
				if ($db->query($sql)) {
					$installModules++;
					//echo "Files table created.<br>";
				}
				
				$sql = "CREATE TABLE IF NOT EXISTS `" .$this->Page->tablePrefix ."pagefields` (
				  `id` bigint(64) NOT NULL auto_increment,
				  `page_id` bigint(64) NOT NULL,
				  `key` varchar(255) collate utf8_unicode_ci default NULL,
				  `value` varchar(255) collate utf8_unicode_ci default NULL,
				  PRIMARY KEY  (`id`)
				) ENGINE=" .Configure::read('SpeedyCake.engine') ."  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
				
				if ($db->query($sql)) {
					$installModules++;
					//echo "Page fields table created.<br>";
				}
				
				$sql = "CREATE TABLE IF NOT EXISTS `" .$this->Page->tablePrefix ."articlefields` (
				  `id` bigint(64) NOT NULL auto_increment,
				  `article_id` bigint(64) NOT NULL,
				  `key` varchar(255) collate utf8_unicode_ci default NULL,
				  `value` varchar(255) collate utf8_unicode_ci default NULL,
				  PRIMARY KEY  (`id`)
				) ENGINE=" .Configure::read('SpeedyCake.engine') ."  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
				
				if ($db->query($sql)) {
					$installModules++;
					//echo "Article fields table created.<br>";
				}
			
			if ($installModules==9) $this->set('message',__('Installation completed :)'));
			else $this->set('message',__('Installation failed! :('));
			
		
		}
		else $this->set('message','');
		
	}
	
	
	
	
	public function backup() {
		
		$this->response->disableCache();
		
		$this->set('title', __('Export') .' Database');
		
		$ds = ConnectionManager::getDataSource('default')->config;
		$host = $ds['host'];
		$database = $ds['database'];
		$login = $ds['login'];
		$password = $ds['password'];
		$dirName = Configure::read('SpeedyCake.backups');
	
		$fileName   =   strtotime(date("Y-m-d H:i:s"))."-{$database}-backup.sql";
		$command    =   "mysqldump --opt --host={$host} --user={$login} --password={$password} {$database} > {$dirName}{$fileName}";
		$res = exec($command);
		
		$this->set('file',$fileName);
		
	}
	
	
	
	
	public function downloadbackup($file=NULL) {
		
		$this->response->disableCache();
		
		$dirName = Configure::read('SpeedyCake.backups');
		
		$this->response->file("{$dirName}{$file}", array('download' => true, 'name' => 'latest_backup_' .time() .'.sql'));
		
	}
	
	
	
	
	public function beforeFilter() {
		
		$this->SpeedyCake->setLang();
		
	}
	
	
	
	
}

?>