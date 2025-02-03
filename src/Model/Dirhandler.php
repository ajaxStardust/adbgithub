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

    public function __construct($dirPath)
    {
        if ($dirPath != null) {
            $this->dirPath = $dirPath;
        }
        $this->readDirectory($this->dirPath);
    }

    public function readDirectory($dirPath): array
    {
        $this->dirPath = $dirPath;
        $directoryContents = [];
        $openDir = opendir($this->dirPath);

        while ($file = readdir($openDir)) {
            if ($file !== '..' && $file !== '.') {
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
        $baseUrl = NS_ROOT;

        foreach ($foundObjects as $objKey => $filename) {
            if (strlen($filename) > 2) {
                $firstChar = strtolower(substr($filename, 0, 1));
                $this->firstChar = ucfirst($firstChar);
                $firstChar = $this->firstChar;
                $nav_pathInfo = pathinfo(__FILE__);

                if (!isset($characterArray[$firstChar])) {
                    $characterArray[$firstChar] = [];
                }

                $filePath = $baseUrl . '/' . $filename;
                $this->anchor[$objKey] = '<a title="View ' . htmlspecialchars($filename) . ' in main iFrame" href="file_loader.php?file=' . urlencode($filename) . '" id="navAnchor_' . htmlspecialchars($filename) . '" class="iframe-nav-link">
    ' . $nav_pathInfo['extension'] . '</a>';

                $characterArray[$firstChar][] = '<li class="navlist target">' . $this->anchor[$objKey] . '</li>';
            }
        }

        $this->characterArray = $characterArray;
        return $characterArray;
    }
}
