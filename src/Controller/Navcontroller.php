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
        $directoryContents = $this->Dirhandler_Class->readDirectory();
        // $this->navViewHtml = new Navview($directoryContents);
    }

    public function displayNavigation()
    {
        // Create an instance of the Model

        // Get navigation items from the Model
        $navItems = $this->Dirhandler_Class->readDirectory(TEST_DIRECTORY);
        sort($navItems, SORT_ASC);
        // Create an instance of the View
        $Navview = new Navview($navItems);

        // Render the HTML using the View
        $navHtml = $Navview->renderOne($navItems);

        // Output the rendered HTML (or store it for later use)
        return $navHtml;
    }
}