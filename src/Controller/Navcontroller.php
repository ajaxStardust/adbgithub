<?php

namespace Adb\Controller;

use Adb\Model\Dirhandler;
use Adb\Model\Navfactor;
use Adb\Model\Navmodel;
use Adb\View\Navview;

class Navcontroller
{
    private $pathOps;
    public $Navmodel_Class;
    public $Navfactor_Class;
    public $Dirhandler_Class;
    public $navViewHtml;

    public function __construct($pathOps)
    {
        $this->pathOps = $pathOps;
        $this->Navmodel_Class = new Navmodel(TEST_DIRECTORY);
        $this->Navfactor_Class = new Navfactor(TEST_DIRECTORY);
        $this->Dirhandler_Class = new Dirhandler(TEST_DIRECTORY);
        $directoryContents = $this->Dirhandler_Class->readDirectory(TEST_DIRECTORY);
    }

    public function displayNavigation()
    {
        $navItems = $this->Dirhandler_Class->readDirectory(TEST_DIRECTORY);
        sort($navItems, SORT_ASC);
        $Navview = new Navview($navItems);
        $navHtml = $Navview->renderOne($navItems);
        return $navHtml;
    }
}