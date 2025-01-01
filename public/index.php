<?php

namespace Adb;
define('NS', __NAMESPACE__);  // always define NS first at entry point so can use for testing i.e. if(defined(NS))
/*
 * @param ADBLOCTN 
 * defined constant for absolute URL to this file
 */

define('ADBLOCTN', dirname($_SERVER['SCRIPT_FILENAME']));
define('NS_ROOT', dirname(__DIR__));
 
require NS_ROOT . '/vendor/autoload.php';
define('TEST_DIRECTORY',NS_ROOT);

/* 
*
* @param TEST_DIRECTORY UNCOMMENT WHEN READY TO EXPERIMENT WITH CONTROL TO CHANGE WHAT NAVIGATION IS DISPLAYED and comment TEST_DIRECTORY defined above
* e.g. define('TEST_DIRECTORY','/media/wd2tb01/var/www');
would allow browsing to the several nginx server_names 
* 
	if(is_dir($_SERVER['DOCUMENT_ROOT'].'/wsl_workspace')) {
		define('TEST_DIRECTORY',realpath($_SERVER['DOCUMENT_ROOT'].'/wsl_workspace'));	
	}
	else {
		define('TEST_DIRECTORY',realpath($_SERVER['DOCUMENT_ROOT'].'/'.__DIR__));
	} 
* 
*/ 

$Adbsoc = 		new Model\Adbsoc;
$Aux = 			new Model\Auxx(ADBLOCTN);
$Navfactor = 	new Model\Navfactor(TEST_DIRECTORY);

ob_start();

require NS_ROOT . '/src/View/template.php';

ob_end_flush();

