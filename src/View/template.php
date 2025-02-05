<?php
namespace Adb\View;
use Adb\Model\Auxx as Auxx;
use Adb\View\Navview as Navview;
use Adb\Model\Navfactor as Navfactor;
use Adb\Model\Dirhandler as Dirhandler;

$Auxx = new Auxx(ADBLOCTN);
$Navview = new Navview(HTMLCHARARRAY);
$Navfactor = new Navfactor(HTMLCHARARRAY);
$htmlCharacterArray = $Navfactor->htmlCharacterArray;

$Dirhandler = new Dirhandler(TEST_DIRECTORY);

require NS_ROOT . '/src/View/html-doctype-head.page.php';
require NS_ROOT . '/src/View/html-body-top.page.php';
require NS_ROOT . '/src/View/html-maincontrols.page.php';
require NS_ROOT . '/src/View/html-main.page.php';
require NS_ROOT . '/src/View/html-footer.page.php'; 

?>