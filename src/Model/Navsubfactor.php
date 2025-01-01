<?php

namespace Adb\Model;

use Adb\Model\Auxx as Auxx;
use Adb\Model\Dirhandler as Dirhandler;
use Adb\Model\Htmldochead as Htmldochead;

#[\AllowDynamicProperties]
class Navsubfactor extends Navfactor
{
    public $Dirhandler_Class;

    public function __construct($pathOps)
    {
        parent::__construct($pathOps);
        $this->Dirhandler_Class = new Dirhandler(TEST_DIRECTORY);
        if(parent::ALPHA_NUM == null) {
            parent::initializeVariables();
        }
    }
}
