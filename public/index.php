<?php

namespace Adb;

define('NS', __NAMESPACE__);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('ADBLOCTN', dirname($_SERVER['SCRIPT_FILENAME']));
define('NS_ROOT', dirname(__DIR__));

require NS_ROOT . '/vendor/autoload.php';
define('TEST_DIRECTORY', NS_ROOT);

$Adbsoc = new Model\Adbsoc;
$Auxx = new Model\Auxx(ADBLOCTN);
$Navfactor = new Model\Navfactor(TEST_DIRECTORY);
ob_start();

require NS_ROOT . '/src/View/template.php';

ob_end_flush();

