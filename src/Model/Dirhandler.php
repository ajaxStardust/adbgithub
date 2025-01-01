<?php

namespace Adb\Model;

use Adb\Model\Navfactor as Navfactor;

#[\AllowDynamicProperties]
class Dirhandler
{
    public $openDir;
    public $directoryContents;
    public $firstChar;
    public $characterArray;
    public $htmlCharacterArray;
	public $dirPath;

    // public $Navfactor_Class;

    public function __construct($dirPath)
    {
        if ($dirPath != null) {
			$this->dirPath = $dirPath;	
		}
        
        // $this->openDir = opendir(TEST_DIRECTORY);
        // $this->Navfactor_Class = new Navfactor(TEST_DIRECTORY);
        $this->readDirectory($this->dirPath);
    }

    public function readDirectory(): array
    {
        /* if(defined('HTMLCHARARRAY')) {
            $this->htmlCharacterArray = HTMLCHARARRAY;
            $this->directoryContents = CONTENTS;
            if (is_array($this->directoryContents)) {
                return $this->directoryContents;
            }
        } */


        $directoryContents = [];
        
        $openDir = opendir($this->dirPath);

        while ($file = readdir($openDir)) {
            if ('..' != readdir(opendir($this->dirPath)) && '.' != readdir(opendir($this->dirPath))) {
                $directoryContents[] = $file;
            }
        }

        closedir($openDir);
        sort($directoryContents);
        $this->directoryContents = $directoryContents;

        return $this->directoryContents;
    }

    public function createCharacterArray($foundObjects)
    {
        // $this->Navfactor_Class;

        $characterArray = [];

        foreach ($foundObjects as $objKey => $filename) {
            if (strlen($filename) > 2) {
                $firstChar = strtolower(substr($filename, 0, 1));
                $this->firstChar = ucfirst($firstChar);
                $firstChar = $this->firstChar;

                if (!isset($characterArray[$firstChar])) {
                    $characterArray[$firstChar] = [];
                }

                $characterArray[$firstChar][] = '<li id="item_' . htmlspecialchars($firstChar) . $objKey . '" class="navlist-item target-fix">' . htmlspecialchars($filename) . '</li>
            ';
            }
        }
        $this->characterArray = $characterArray;
        return $characterArray;
    }
}
