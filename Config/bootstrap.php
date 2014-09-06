<?php

/* Config variables */

Configure::write('SpeedyCake.url','http://localhost');
Configure::write('SpeedyCake.name','SpeedyCake CMS');
Configure::write('SpeedyCake.email','your@email');
Configure::write('SpeedyCake.language','en');
Configure::write('SpeedyCake.engine','MyISAM');
Configure::write('SpeedyCake.uploads',WWW_ROOT . 'files/uploads' . DS);
Configure::write('SpeedyCake.backups',WWW_ROOT . 'files/backups' . DS);

Configure::write('SpeedyCake.publicPages', array(
	'pages/homepage',
	'pages/search',
	'pages/feed',
	'pages/login',
	'pages/logout',
	'pages/forgot_password',
	'pages/page',
	'pages/single',
	'pages/category',
	'pages/error404'
));

/* SpeedyCake CMS info */

Configure::write('SpeedyCake.version','1.0');
Configure::write('SpeedyCake.codename','Arcadia');
Configure::write('SpeedyCake.license','MIT License');

?>