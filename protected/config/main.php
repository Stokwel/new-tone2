<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name' => 'new-tone',
	'language' => 'ru',

	// preloading 'log' component
	'preload' => array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.'
	),

	'defaultController' => 'default',

    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '12345',
        ),
		'admin' => array(
            'modules' => array(
                'pages'
            )
        ),
    ),
    
	// application components
	'components'=>array(
        
        'clientScript' => array(
            'packages' => array(
               'admin' => array(
                    'basePath' => 'application.data.admin',
                    'js' => array(
                        'js/files/bootstrap.js',
						'js/files/customFunctions.js',
						'js/plugins/forms/jquery.ibutton.js',
						'js/plugins/forms/jquery.chosen.min.js',
						'js/plugins/ui/jquery.breadcrumbs.js',
                    ),
                    'css' => array(
                        'css/styles.css',
                    ),
                    'depends' => array('jquery', 'jquery.ui'),
                ),
				'backbone' => array(
					'basePath' => 'application.data.backbone',
					'js' => array(
						'underscore.js',
						'json2.js',
						'backbone.js',
					),
					'depends' => array('jquery'),
				),
            )
        ),    
        
		'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
		),
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=new_tone',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'gw4t3sns',
			'charset' => 'utf8',
			'tablePrefix' => '',
		),

        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
        ),

		'errorHandler' => array(
			'errorAction' => 'default/error',
		),

		'urlManager' => array(
			'urlFormat' => 'path',
			'rules' => array(
				'post/<id:\d+>/<title:.*?>' => 'post/view',
				'posts/<tag:.*?>' => 'post/index',

				'/page/<name:.*?>' => 'default/staticPage',

				'/contact' => 'default/contact',

				'/login' => 'user/login',
                '/registration' => 'user/registration',
				'/logout' => 'user/logout',

				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			),
            'showScriptName' => false,
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);