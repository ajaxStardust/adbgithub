<?php

namespace Adb\Model;

class Helpers {
    public $EnvonmentManager;
    public $Jsonconfigmanager ;
    public $Urlprocessor;
    public $Localsites;
    public $helpercount;
    
    private function __construct() {
        if(isset($this->helpercount)){
            $this->helpercount = $this->helpercount + 1;
        }
        else {
            $this->helpercount = 1;
        }
    } 

}
