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
                $filepath = $baseUrl . '/' . $filename;
                $nav_pathInfo = pathinfo(realpath($filepath));

                if (!isset($characterArray[$firstChar])) {
                    $characterArray[$firstChar] = [];
                }

                $this_extension = $nav_pathInfo['extension'] ?? ' ';
                $this_filename = $nav_pathInfo['filename'] ?? ' ';
                $this_basename = $nav_pathInfo['basename'] ?? ' ';

                $this->anchor[$objKey] = '<a data-filepath="' . urlencode($this_basename) . '" title="View ' . urlencode($this_basename) . ' in main iFrame" href="file_loader.php?file=' . urlencode($this_basename) . '" id="navAnchor_' . urlencode($this_basename) . '" class="iframe-nav-link">'. $this_filename .'.<span class="bold red">'. $this_extension . '</span></a>';

                $characterArray[$firstChar][] = '<li class="navlist target">' . $this->anchor[$objKey] . '</li>
                ';
            }
        }

        $this->characterArray = $characterArray;
        return $characterArray;
    }
}
