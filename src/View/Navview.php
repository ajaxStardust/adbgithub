<?php

namespace Adb\View;

use Adb\Controller\Navcontroller as Navcontroller;
use Adb\Model\Auxx as Auxx;

#[\AllowDynamicProperties]
class Navview
{
    private $navItems;
    public $item;
    public $navViewHtml;
    public $Auxx_Class;
    public $displayNav;
    public $NavController_Class;

    public function __construct($navItems)
    {
        $this->navItems = $navItems;
        $this->Auxx_Class = new Auxx(TEST_DIRECTORY);
        $this->NavController_Class = new Navcontroller($navItems);
        // $this->displayNav = $this->NavController_Class->displayNavigation();
    }

    public function render($navItems)
    {
        if (isset($this->navViewHtml)) {
            return $this->navViewHtml;
        }
        if (!is_array($this->navViewHtml)) {
            $this->navViewHtml = [];
            $this->navViewHtml[] = '<nav><ul>';
        }
        if (is_array($navItems)) {
            foreach ($navItems as $navKey => $navVal) {
                $item = $navVal;
                $this->navViewHtml[] = '<li><a href="' . htmlspecialchars($item) . '">' . htmlspecialchars($item) . '</a></li>';
            }

            $this->navViewHtml[] = '</ul></nav>';
            return $this->navViewHtml;
        }
    }

    public function renderOne($navItems)
    {
        if (isset($this->navViewHtml)) {
            return $this->navViewHtml;
        }
        if (!is_array($this->navViewHtml)) {
            $this->navViewHtml = [];
        }
        if (is_array($navItems)) {
            // $this->navViewHtml[] = '<!-- nav><ul -->';
            $this->navViewHtml[] = $this->Auxx_Class->arrayObjectAnchors($navItems);

            // $this->navViewHtml[] .= '<!-- /ul></nav -->';
            return $this->navViewHtml;
        }
    }
}