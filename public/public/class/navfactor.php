<?php

namespace Bbadb\public\class;

class Navfactor {

  public $objNmbr;
  public $goUp;
  public $nav_pathInfo;
  public $filePathArray;
  public $childItems;
  public $specialExtn;
  public $htmlPrint;

  public function __construct() {
    $this->initializeVariables();
    $this->buildNavigation();
  }

  private function initializeVariables() {
    // Potentially move initialization of variables here from your existing code
    // that were previously initialized outside the class
    $this->objNmbr = 0;
    $this->goUp = [
      "subject" => null,
      "replace" => null,
      "search" => null,
      "result" => null,
      "url" => null,
    ];
    $this->nav_pathInfo = pathinfo(dirname(__DIR__), PATHINFO_ALL);
    $this->childItems = [];
  }

  private function buildNavigation() {
    // Integrate your existing logic for `prepareGoUpUrl` and potentially modify as needed
    $this->prepareGoUpUrl();
    $goUp = [];

$goUp["subject"] = $nav_pathInfo['dirname'];
$goUp["replace"] = '';
$goUp["search"] = '@^(.*(?=(/).*))@';
$goUp["result"] = preg_replace($goUp["search"], $goUp["replace"], $goUp["subject"]);
$goUp["url"] = str_ireplace($goUp["result"], $goUp["replace"], $goUp["subject"]);
$goUp['url'] = preg_replace('/([^\/]+\/)+([^\/]+)/','$2',$goUp['url']);
// $goUp['url'] = filter_path($_SERVER['DOCUMENT_ROOT'],$servername,$server_addr);
$depth = substr_count($goUp['subject'], '/');
// echo '<br>depth: ' .$depth;
if($depth < 5) {

    // $goUp['url'] = $_SERVER['HTTP_HOST'];
    // $goUp['url'] = filter_path($_SERVER['DOCUMENT_ROOT'],$servername,$server_addr);
   //  echo '<div id="gouptest">Depth < 5<ol>';

    foreach ($goUp as $guKey => $guVal) {
      //   echo '<li>goUp['.$guKey.']: '.$guVal.'</li>';
    }

    // echo '</ol></div>';
}
$dir = ADBLOCTN;
$concatSubdir = $goUp["result"];
$conSubSearch = $dir;
$conSubReplace = $goUp["result"];
$concatDirs = str_ireplace($conSubSearch, $conSubReplace, $dir);
if (is_dir(ADBLOCTN)) {
    $dh = opendir(ADBLOCTN);
}
else {
    $dh = opendir(realpath($dir));
}
   // Modify or integrate your existing logic for processing the directory structure
    // based on whether you want to read specific files or all files (consider security implications)
    $this->processDirectoryStructure();

    // Integrate your existing logic for generating the HTML output
    $this->generateHtmlOutput();
  }

  private function prepareGoUpUrl() {
    // ... (Your existing logic for preparing the "Go Up" URL)
  }

  private function processDirectoryStructure() {
    // ... (Your modified logic for processing the directory structure)
    // This might involve using `fread` for specific files or alternative approaches
  }

  private function generateHtmlOutput() {
    // ... (Your existing logic for generating the HTML output)
    // This might involve populating `$htmlPrint` with the desired structure
  }

  public function getHtmlPrint() {
    return $this->htmlPrint;
  }
}
