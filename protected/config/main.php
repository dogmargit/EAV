<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Интернет Магазин',
	'language'=>'ru',
  //'theme' => 'admin',
	'aliases' => array(
		'backend' => 'application.views.backend',
	),

	// preloading 'log' component
	'preload'=>array('log','settings'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.upload.Upload',
		'ext.easyimage.EasyImage',
		'ext.YiiMailer.YiiMailer',
		'application.cart.Cart.*',
	),
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'2755988',
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),
	// application components
	'components'=>array(
		'errorHandler'	 =>	array('errorAction'=>'site/error'),
		'user'			 =>	array('class'	=>	'WebUser', 'allowAutoLogin'=>true, 'loginUrl'=>array('admin/login')),
		'settings'		 =>	array('class'	=>	'application.components.Main_settings'),
		'upload'		 =>	array('class'	=>	'application.extensions.upload.Upload'),
      	'cache'			 =>	array('class'	=>	'system.caching.CFileCache'),
		'easyImage' 	 =>	array('class'	=>	'application.extensions.easyimage.EasyImage'),
		'cart'   		 =>	array('class'	=>	'application.extensions.cart.Cart'),
		'authManager' 	 =>	array('class'	=>	'PhpAuthManager','defaultRoles' => array('guest')),

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'cart'=>'orders',
				'cart/checkout'=>'orders/checkout',
				'cart/success'=>'orders/success',
				'cart/delete'=>'orders/delete',
				'cart/addtocart'=>'orders/addtocart',
				'admin'=>'backend/admin/index',
				'login'=>'users/login',
				'logout'=>'users/logout', 
				'forgotten'=>'users/forgotten', 
				'registration'=>'users/registration',
				'admin/login'=>'backend/admin/login',
				'admin/profile'=>'backend/admin/profile',

				'admin/<controller:\w+>'=>'backend/<controller>',
				'admin/<controller:\w+>/<id:\d+>'=>'backend/<controller>/update',
				'admin/<controller:\w+>/<action:\w+>/<id:\d+>'=>'backend/<controller>/<action>',
				'admin/<controller:\w+>/<action:\w+>'=>'backend/<controller>/<action>',

				'page/<name>'=>'pages/view',
				'<controller:\w+>/<name>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

                '<module:\w+>/<controller:\w+>/<action:[0-9a-zA-Z_\-]+>/<id:\d+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:[0-9a-zA-Z_\-]+>'          => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>'                                   => '<module>/<controller>/index',
			),
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString'	=>	'mysql:host=localhost;dbname=kshop',
			'emulatePrepare'	=>	true,
			'username'			=>	'root',
			'password'			=>	'',
			'charset'			=>	'utf8',
		  	'schemaCachingDuration'=>3600,

		     'enableProfiling' => true,

		),
		
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CWebLogRoute',
			         'levels'=>'profile',
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(),
);