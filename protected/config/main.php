<?php 
return array(
	'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR."..",
	'name' => 'Kinoafisha',
	'import' => array (
		'application.models.*',
		'application.components.*',
	),
	'defaultController'=>'Main',
 	'components' => array (
        'db' => array (
            'connectionString' => 'mysql:host=openserver;dbname=afisha',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'writery255',
            'charset' => 'utf8',
            'tablePrefix' => '',
	    ),
	    'urlManager' => array (
	        'urlFormat' => 'path',
	        'showScriptName' => false,
	        'rules' => array(
	            
	        ),
	    ),
    ),
);