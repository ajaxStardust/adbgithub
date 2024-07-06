<?php
namespace Bbadb;

require_once 'public/class/updatejson.php';
use Bbadb\UpdateJson;

$config_file = $_SERVER['DOCUMENT_ROOT'] . '/config.json';
$updateJson = new UpdateJson($config_file);
echo $updateJson->updateCount();
?>