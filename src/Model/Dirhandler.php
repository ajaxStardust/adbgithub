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
    public $anchor;

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

    public function readDirectory($dirPath): array
    {
        $this->dirPath = $dirPath;
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
        $characterArray = [];
        
        // Use the defined constant NS_ROOT to get the correct root path for the project
        $baseUrl = NS_ROOT; // This points to the root directory of your project
    
        foreach ($foundObjects as $objKey => $filename) {
            if (strlen($filename) > 2) {
                // Get the first character for sorting
                $firstChar = strtolower(substr($filename, 0, 1));
                $this->firstChar = ucfirst($firstChar);
                $firstChar = $this->firstChar;
                $nav_pathInfo = pathinfo(__FILE__, PATHINFO_ALL);
    
                // If the character array doesn't exist for this letter, create it
                if (!isset($characterArray[$firstChar])) {
                    $characterArray[$firstChar] = [];
                }
    
                // Generate the correct path for the filename, making sure it is relative to NS_ROOT
                $filePath = $baseUrl . '/' . $filename; // Adds filename directly to the root
    
                // Generate the anchor tag with the correct path for iframe
                $this->anchor[$objKey] = '<a title="View ' . htmlspecialchars($filename) . ' in main iFrame" href="#mainFrameContainer" id="navAnchor_' . htmlspecialchars($filename) . '" data-filepath="' . htmlspecialchars($filename) . '" class="iframe-nav-link">
    ' . $nav_pathInfo['extension'] . '</a>';

    
                // Add the anchor tag to the character array
                $characterArray[$firstChar][] = '<li class="navlist target">' . $this->anchor[$objKey] . '</li>';
            }
        }
    
        $this->characterArray = $characterArray;
        return $characterArray;
    }
}
