<?php

/* Main */
Router::connect('/', array(	 
	'controller' => 'pages', 
	'action' => 'homepage'
));
Router::promote();

Router::connect('/speedycake', array(
	'controller' => 'SpeedyCake', 
	'action' => 'index'
));

Router::connect('/speedycake/install', array( 
	'controller' => 'SpeedyCake', 
	'action' => 'install'
));

Router::connect('/speedycake/backup', array(
	'controller' => 'SpeedyCake', 
	'action' => 'backup'
));

Router::connect(
	'/speedycake/download-backup/:file',
	array(
		'controller' => 'SpeedyCake', 
		'action' => 'downloadbackup'
	),
	array('pass' => array('file'))
);

Router::connect('/admin', array(
	'controller' => 'pages', 
	'action' => 'login'
));

Router::connect('/forgot-password', array(
	'controller' => 'pages', 
	'action' => 'forgot_password'
));

Router::connect('/logout', array(
	'controller' => 'pages', 
	'action' => 'logout'
));

Router::connect('/dashboard', array(
	'controller' => 'pages', 
	'action' => 'dashboard'
));




/* Users */
Router::connect('/admin/users', array(
	'controller' => 'users', 
	'action' => 'index'
));

Router::connect(
	'/admin/users/index/*',
	array(
		'controller' => 'users',
		'action' => 'index'
	),
	array('pass' => array('page'))
);

Router::connect('/admin/users/add', array(
	'controller' => 'users', 
	'action' => 'add'
));

Router::connect('/admin/users/usernameIsUnique', array(
	'controller' => 'users', 
	'action' => 'usernameIsUnique'
));

Router::connect('/admin/users/emailIsUnique', array(
	'controller' => 'users', 
	'action' => 'emailIsUnique'
));

Router::connect(
	'/admin/users/edit/:id',
	array(
		'controller' => 'users', 
		'action' => 'edit'
	),
	array('pass' => array('id'))
);

Router::connect(
	'/admin/users/delete/:id',
	array(
		'controller' => 'users', 
		'action' => 'delete'
	),
	array('pass' => array('id'))
);




/* Settings */
Router::connect('/admin/settings', array(
	'controller' => 'settings', 
	'action' => 'index'
));

Router::connect('/admin/settings/meta', array(
	'controller' => 'settings', 
	'action' => 'meta'
));

Router::connect('/admin/settings/reading', array(
	'controller' => 'settings', 
	'action' => 'reading'
));

Router::connect('/admin/settings/writing', array(
	'controller' => 'settings', 
	'action' => 'writing'
));

Router::connect('/admin/settings/social', array(
	'controller' => 'settings', 
	'action' => 'social'
));

Router::connect('/admin/settings/import', array(
	'controller' => 'settings', 
	'action' => 'import'
));




/* Articles */
Router::connect('/admin/articles', array(
	'controller' => 'articles', 
	'action' => 'index'
));

Router::connect(
	'/admin/articles/index/*',
	array(
		'controller' => 'articles',
		'action' => 'index'
	),
	array('pass' => array('page'))
);

Router::connect(
	'/admin/articles/indexcategories/*',
	array(
		'controller' => 'articles',
		'action' => 'indexcategories'
	),
	array('pass' => array('page'))
);

Router::connect('/admin/articles/add', array(
	'controller' => 'articles', 
	'action' => 'add'
));

Router::connect('/admin/articles/titleIsUnique', array(
	'controller' => 'articles', 
	'action' => 'titleIsUnique'
));

Router::connect(
	'/admin/articles/edit/:id',
	array(
		'controller' => 'articles',
		'action' => 'edit'
	),
	array('pass' => array('id'))
);

Router::connect(
	'/admin/articles/delete/:id',
	array(
		'controller' => 'articles',
		'action' => 'delete'
	),
	array('pass' => array('id'))
);

Router::connect(
	'/admin/articles/deleteImageSrc/:id',
	array(
		'controller' => 'articles',
		'action' => 'deleteImageSrc'
	),
	array('pass' => array('id'))
);

Router::connect('/admin/articles/uploader', array(
	'controller' => 'articles', 
	'action' => 'uploader'
));

Router::connect('/admin/articles/insertfile', array(
	'controller' => 'articles', 
	'action' => 'insertfile'
));

Router::connect('/admin/articles/imagegallery', array(
	'controller' => 'articles', 
	'action' => 'imagegallery'
));




/* Categories */
Router::connect('/admin/categories', array(
	'controller' => 'categories', 
	'action' => 'index'
));

Router::connect(
	'/admin/categories/index/*',
	array(
		'controller' => 'categories',
		'action' => 'index'
	),
	array('pass' => array('page'))
);

Router::connect('/admin/categories/add', array(
	'controller' => 'categories', 
	'action' => 'add'
));

Router::connect('/admin/categories/nameIsUnique', array(
	'controller' => 'categories', 
	'action' => 'nameIsUnique'
));

Router::connect(
	'/admin/categories/edit/:id',
	array(
		'controller' => 'categories', 
		'action' => 'edit'
	),
	array('pass' => array('id'))
);

Router::connect(
	'/admin/categories/delete/:id',
	array(
		'controller' => 'categories', 
		'action' => 'delete'
	),
	array('pass' => array('id'))
);




/* Pages */
Router::connect('/admin/pages', array(
	'controller' => 'pages', 
	'action' => 'index'
));

Router::connect(
	'/admin/pages/index/*',
	array(
		'controller' => 'pages',
		'action' => 'index'
	),
	array('pass' => array('page'))
);

Router::connect('/admin/pages/add', array(
	'controller' => 'pages', 
	'action' => 'add'
));

Router::connect('/admin/pages/titleIsUnique', array(
	'controller' => 'pages', 
	'action' => 'titleIsUnique'
));

Router::connect(
	'/admin/pages/edit/:id',
	array(
		'controller' => 'pages',
		'action' => 'edit'
	),
	array('pass' => array('id'))
);

Router::connect(
	'/admin/pages/delete/:id',
	array(
		'controller' => 'pages',
		'action' => 'delete'
	),
	array('pass' => array('id'))
);

Router::connect(
	'/admin/pages/deleteImageSrc/:id',
	array(
		'controller' => 'pages',
		'action' => 'deleteImageSrc'
	),
	array('pass' => array('id'))
);

Router::connect('/admin/pages/uploader', array(
	'controller' => 'pages', 
	'action' => 'uploader'
));

Router::connect('/admin/pages/insertfile', array(
	'controller' => 'pages', 
	'action' => 'insertfile'
));

Router::connect('/admin/pages/imagegallery', array(
	'controller' => 'pages', 
	'action' => 'imagegallery'
));




/* Files */
Router::connect('/admin/files', array(
	'controller' => 'files', 
	'action' => 'index'
));

Router::connect(
	'/admin/files/index/*',
	array(
		'controller' => 'files',
		'action' => 'index'
	),
	array('pass' => array('page'))
);

Router::connect('/admin/files/add', array(
	'controller' => 'files', 
	'action' => 'add'
));

Router::connect(
	'/admin/files/edit/:id',
	array(
		'controller' => 'files',
		'action' => 'edit'
	),
	array('pass' => array('id'))
);

Router::connect(
	'/admin/files/delete/:id',
	array(
		'controller' => 'files',
		'action' => 'delete'
	),
	array('pass' => array('id'))
);

Router::connect(
	'/admin/files/crop/:id',
	array(
		'controller' => 'files',
		'action' => 'crop'
	),
	array('pass' => array('id'))
);




/* Frontend */
Router::connect('/homepage', array(
	'controller' => 'pages', 
	'action' => 'homepage'
));

Router::connect(
	'/homepage/*',
	array(
		'controller' => 'pages',
		'action' => 'homepage'
	),
	array('pass' => array('page'))
);

Router::connect('/feed', array(
	'controller' => 'pages', 
	'action' => 'feed'
));

Router::connect('/search', array(
	'controller' => 'pages', 
	'action' => 'search'
));

Router::connect(
	'/search/*',
	array(
		'controller' => 'pages',
		'action' => 'search'
	),
	array('pass' => array('page'))
);

Router::connect('/404', array(
	'controller' => 'pages', 
	'action' => 'error404'
));

Router::connect('/maintenance', array(
	'controller' => 'pages', 
	'action' => 'maintenance'
));

Router::connect(
	'/article/:slug',
	array(
		'controller' => 'pages',
		'action' => 'single'
	),
	array('pass' => array('slug'))
);

Router::connect(
	'/:slug',
	array(
		'controller' => 'pages',
		'action' => 'page'
	),
	array('pass' => array('slug'))
);

Router::connect(
	'/category/:slug',
	array(
		'controller' => 'pages',
		'action' => 'category'
	),
	array('pass' => array('slug'))
);

Router::connect(
	'/category/*',
	array(
		'controller' => 'pages',
		'action' => 'category'
	),
	array('pass' => array('slug'))
);

?>