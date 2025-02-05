<?php

namespace Adb\Model;

class Backlinks
{
    public $convert_toSpace;  // true if script should convert _ in folder names to spaces
    public $upperCaseWords;  // true if script should convert lowercase to initial caps
    public $htmlRoot;
    public $pagePath;
    public $index;

    // $topLevelName = "HOME";      // name of home/root directory
    public $topLevelName;  // name of home/root directory
    public $separator;
    public $server;  // characters(s) to separate links in hierarchy (default is a > with 2 spaces on either side)
    public $document_root;

    public function __construct()
    {
        $this->server = $_SERVER;
        if (empty($this->server['DOCUMENT_ROOT'])) {
            $docroot = str_ireplace('/var/www/', '', $this->server['SCRIPT_NAME']);
            $docroot = preg_match("/['?\/]([^\/'\" ]+)[\/]?/", $docroot, $matches);
            $docroot = '/var/www/' . $matches[1];
            $this->server['DOCUMENT_ROOT'] = $docroot;
        }
        $this->document_root = $_SERVER['DOCUMENT_ROOT'];
        $this->document_root;
        if ($this->document_root == '') {
            if (isset($_SERVER['SITE_HTMLROOT'])) {
                $this->htmlRoot = $_SERVER['SITE_HTMLROOT'];
            } else {
                $this->htmlRoot = '';
            }
        }

        if (isset($_SERVER['SCRIPT_FILENAME'])) {
            $this->pagePath = $_SERVER['SCRIPT_FILENAME'];
        } else {
            $this->pagePath = '';
        }

        if ($this->pagePath == '') {
            if (isset($_SERVER['SCRIPT_FILENAME'])) {
                $this->pagePath = $_SERVER['SCRIPT_FILENAME'];
            } else {
                $this->pagePath = '';
            }
        }

        if (!empty($this->server['SERVER_NAME'])) {
            $servername = $_SERVER['SERVER_NAME'];
        } else {
            $servername = '127.0.0.1';
        }
        $this->convert_toSpace = false;
        $this->upperCaseWords = false;
        $this->topLevelName = 'https://' . $servername;
        $this->separator = ' > ';
    }

    // find index page in directory...
    public function adbDirIndex($dir)
    {
        $this->index = '';
        $dir = is_dir($dir) ? $dir : '';
        @$dir_handle = opendir($dir);
        if ($dir_handle) {
            while ($file = readdir($dir_handle)) {
                $test = substr(strtolower($file), 0, 6);
                if ($test == 'index.') {
                    $this->index = $file;
                    break;
                }
            }
        }
        return $this->index;
    }

    // make clean array (trim entries and remove blanks)...
    public function adbTrimArray($array)
    {
        $clean = array();
        for ($n = 0; $n < count($array); $n++) {
            $entry = trim($array[$n]);
            if ($entry != '')
                $clean[] = $entry;
        }
        return $clean;
    }

    // function to prep string folder names if needed...
    public function adbFixNames($string)
    {
        global $convert_toSpace;
        global $upperCaseWords;

        if ($convert_toSpace)
            $string = str_replace('_', ' ', $string);
        if ($upperCaseWords)
            $string = ucwords($string);
        return $string;
    }

    public function build_backlinks()
    {
        $server = $this->server;

        $htmlRoot = $this->document_root;

        $pagePath = $this->pagePath;

        $httpPath = ($htmlRoot != '/') ? str_replace($htmlRoot, '', $pagePath) : $pagePath;

        $dirArray = explode('/', $httpPath);
        if (!is_dir($htmlRoot . $httpPath))
            $dirArray = array_slice($dirArray, 0, count($dirArray) - 1);

        $linkArray = array();
        $thisDir = '';
        if ($htmlRoot == '') {
            $baseDir = '';
        } else {
            $baseDir = $htmlRoot;
        }

        for ($n = 0; $n < count($dirArray); $n++) {
            $thisDir .= $dirArray[$n] . '/';
            $thisIndex = $this->adbDirIndex($htmlRoot . $thisDir);
            if ($n == 0) {
                $thisText = $this->topLevelName;
            } else {
                $thisText = $this->adbFixNames($dirArray[$n]);
            }

            $thisLink = ($thisIndex != '') ? '<a href="' . $thisDir . $thisIndex . '">' . $thisText . '</a>' : $thisText;
            if ($thisLink != '')
                $linkArray[] = $thisLink;
        }

        if (count($linkArray) > 0) {
            $results = implode($this->separator, $linkArray);
        } else {
            $results = '';
        }

        if ($results != '')
            $backlinksHtml = '<div id="hanseltrail">H&#xe4;nsel trail: ' . $results . 
        '<hr class="clear clearboth clearBoth hidden"></div>';
        return $backlinksHtml;
    }
}
