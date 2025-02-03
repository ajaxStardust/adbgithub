<?php

namespace Adb\Model;

use Adb\Model\Auxx as Auxx;
use Adb\Model\Dirhandler as Dirhandler;
use Adb\Model\Htmldochead as Htmldochead;

#[\AllowDynamicProperties]
class Navfactor
{
    const Child_Items_Constant = [];
    const ALPHA_NUM = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ~!%&()-.0123456789';
    const ALPHA_NUM_STRING = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ~!%&()-.0123456789';
    const ALPHA_NUM_ARRAY = [];
    const CHAR_KEYS = [];

    public $Auxx_Class;
    public $dirFirstArray;
    public $objectsHtmlArray;
    public $alphaNumKey;
    public $Dirhandler;
    public $alnumKey;
    public $alnumFuncKey;
    public $alphaFillKeys;
    public $alphaNum;
    public $alphaNumArray;
    public $alphaNumFilledKeys;
    public $firstChar;
    public $alphaNumString;
    public $alphaNumVal;
    public $anFuncKey;
    public $anFuncVal;
    public $anPregSearch;
    public $anPregSubject;
    public $anStrposResult;
    public $makeTogglesReturn;
    public $Auxx;
    public $concatDirs;
    public $concatSubdir;
    public $conSubReplace;
    public $conSubSearch;
    public $depth;
    public $dh;
    public $dir;
    public $dirObject;
    public $DirReadArray;
    public $filePathArray;
    public $fsObject;
    public $goUp;
    public $guKey;
    public $guVal;
    public $htmlPrint;
    public $lc;
    public $nav_pathInfo;
    public $nav_pathInfoArray;
    public $navClassChilds;
    public $objNmbr;
    public $pathOps;
    public $returnAlnumKeys;
    public $totalItems;
    public $specialExtn;
    public $tempTmlPrint;
    public $totalObjects;
    public $htmlCharacterArray;

    public $groupTogglerReturn;

    public function __construct($pathOps)
    {
        if (isset($pathOps) && !is_array($pathOps)) {
            $this->pathOps = $pathOps;
        } elseif (isset($pathOps) && (isset($pathOps['dirname']) && isset($pathOps['basename']))) {
            $this->pathOps = $pathOps['dirname'] . '/' . $pathOps['basename'];
        } else {
            $this->pathOps = pathinfo(dirname(TEST_DIRECTORY), PATHINFO_DIRNAME);
        }

        $Pathops_Default = [
            'basename' => pathinfo(dirname(__DIR__), PATHINFO_BASENAME),
            'dirname' => pathinfo(dirname(__DIR__), PATHINFO_DIRNAME),
            'filename' => pathinfo(dirname(__DIR__), PATHINFO_FILENAME),
            'extension' => '',
            'pathOps' => $this->pathOps
        ];
        if (empty($this->pathOps)) {
            $this->pathOps = pathinfo($this->pathOps, PATHINFO_ALL);
        }
        if ($this->pathOps !== ADBLOCTN && $this->pathOps !== NS_ROOT) {
            $this->Dirhandler = new Dirhandler($this->pathOps);
        } else {
            $this->Dirhandler = new Dirhandler(TEST_DIRECTORY);
        }

        if (defined('CONTENTS')) {
            $this->DirReadArray = CONTENTS;
        }
        if (empty($this->DirReadArray)) {
            $this->DirReadArray = $this->Dirhandler->readDirectory(TEST_DIRECTORY);
            if (!defined('CONTENTS')) {
                define('CONTENTS', $this->DirReadArray);
            }
        }

        sort($this->DirReadArray);

        if (!isset($this->htmlCharacterArray) || count($this->htmlCharacterArray) < intVal(1)) {
            if (!defined('HTMLCHARARRAY')) {
                define('HTMLCHARARRAY', $this->htmlCharacterArray);
            } else {
                $this->htmlCharacterArray = $this->Dirhandler->createCharacterArray(CONTENTS);
            }
            if (!defined('HTMLCHARARRAY')) {
                define('HTMLCHARARRAY',$this->htmlCharacterArray);
            }
        }

        /*
        PHP 8 req for this?
        $Dir_Pathinfo = pathinfo(dirname(__DIR__, 2), PATHINFO_ALL);
        */
        $Dir_Pathinfo = pathinfo(dirname(__DIR__, 2));
        $this->nav_pathInfo = array_merge($Pathops_Default, $Dir_Pathinfo);
        // var_dump($this->nav_pathInfo);
        if (empty($this->navClassChilds)) {
            $this->navClassChilds = $this->nav_pathInfo;
        }

        /*
         * @var $this->nav_pathInfo['pathOps'];
         * represents an unchanged value from TEXT_DIRECTORY
         */

        if (defined('ALPHILLED')) {
            $this->alphaNumFilledKeys = ALPHILLED;
        }
        if (!is_array($this->alphaNumFilledKeys)) {
            $this->alphaNumString = str_split(self::ALPHA_NUM);

            $this->alphaNumFilledKeys = array_fill_keys($this->alphaNumString, []);
            if (!defined('ALPHILLED')) {
                define('ALPHILLED', $this->alphaNumFilledKeys);
            }
        }

        /*
         * if (!isset($this->lc)) {
         *          $this->initializeVariables();
         *      }
         */
    }

    public function initializeVariables()
    {
        // should other vars from Auxx etc be initialized here as well?
        if (!isset($this->objNmbr)) {
            $this->objNmbr = 0;
            $this->lc = 0;
            $this->charKeys = str_split(self::ALPHA_NUM);
        } else {
            $this->objNmbr = $this->objNmbr + 1;
        }

        $this->alphaNum = self::ALPHA_NUM;
        if (!isset($this->charKeys)) {
            $this->charKeys = str_split(self::ALPHA_NUM);
        }

        // Potentially move initialization of variables here from your existing code
        // that were previously initialized outside the class

        $this->goUp = [
            'subject' => null,
            'replace' => null,
            'search' => null,
            'result' => null,
            'url' => null,
        ];
        if (isset($this->navClassChilds)) {
            if (!defined('CHILDITEMS')) {
                define('CHILDITEMS', $this->navClassChilds);
            }
        }
    }

    private function scanCurrent()
    {
        if (isset($this->pathOps)) {
            $Dirhandler = new Dirhandler($this->pathOps);
        }
        return $Dirhandler;
    }

    private function generateHtmlOutput($pathOps)
    {
        $Dirhanlder = new Dirhandler(TEST_DIRECTORY);
        $DirReadArray = $Dirhanlder->readDirectory(TEST_DIRECTORY);
        if (!is_array($this->htmlPrint)) {
            $this->htmlPrint = [];
        }
        $this->alphaNum = self::ALPHA_NUM;
        $this->lc = 0;

        $this->processAlphaNumArray($DirReadArray);
        $this->finalizeHtmlOutput();

        // sort($this->htmlPrint, SORT_NATURAL);
        return $this->htmlPrint;
    }

    private function initializeHtmlOutput()
    {
        $this->htmlPrint[] = "<nav id=\"leftcol\" class=\"navlist\"> \n <ul id=\"navlist\" class=\"navlist\"> \n";
        if (isset($this->goUp['url'])) {
            $tempArray = [];
            $tempArray[] = '<li id="goUpItem" class="nav"><a title="crazy" href="//' . $this->goUp['url'] . '">' . $this->goUp['url'] . '</a></li>
            ';
        }
        if(isset($tempArray)){
            $this->htmlPrint[] = array_pop($tempArray) ;
        }
       
        return $this->htmlPrint;
    }

    private function processAlphaNumArray($alNumArray)
    {
        sort($alNumArray, SORT_ASC);
        $this->totalItems = count($alNumArray) - 2;
        $this->dirFirstArray = $this->Dirhandler->createCharacterArray($alNumArray);
        foreach ($alNumArray as $this->alphaNumKey => $this->alphaNumVal) {
            if (strlen($this->alphaNumVal) > 2) {
                $this->firstChar = substr(ucfirst($this->alphaNumVal), 0, 1);

                if (isset($this->htmlPrint[$this->firstChar])) {
                    $this->dirFirstArray[$this->alphaNumKey] = $this->groupTogglerReturn;
                } else {
                    $this->dirFirstArray[$this->alphaNumKey] = $this->processEmptyAlphaNum($alNumArray[$this->alphaNumKey]);
                }
            }
            $this->lc++;
        }
    }

    /**
     * create a function that iterates over the dir found and checks for number of items per
     */
    private function ulToggleChildren($firstChar)
    {
        $Dirhandler = new Dirhandler(TEST_DIRECTORY);
        $this->firstChar = $firstChar;
        $directoryContents = $Dirhandler->directoryContents;
        if ($this->alphaNumVal && strlen($this->alphaNumVal) > 2) {
            $objByChar =  count($directoryContents);
            $this->htmlPrint["$this->firstChar"] = '<li onclick="showHide(\'ul_' . $this->firstChar . '\')" id="li_' . $this->firstChar . '" class="toggler"><span style="font-weight:bold;">' . $this->firstChar . '</span>:';
            $this->htmlPrint["$this->firstChar"] .= ' [ view ' . $objByChar . ' ]';
            $objectsHtmlArray = $Dirhandler->createCharacterArray($Dirhandler->directoryContents);
            $this->objectsHtmlArray = $objectsHtmlArray;
            foreach ($objectsHtmlArray as $objectsKey => $objectsVal) {
                $firstChar = count($objectsVal);
                $this->htmlPrint["$objectsKey"] .= $objectsVal;
            }
        }
        $this->htmlPrint[""];
        // return;

    }

    private function processEmptyAlphaNum($object)
    {
        if (isset($this->htmlPrint["$this->firstChar"])) {
            @$this->htmlPrint["$this->firstChar"] .= '<ul id="items-of_' . $this->firstChar . '" class="navchilds-top">';
        } else {
            @$this->htmlPrint["$this->firstChar"] .= $this->groupTogglerReturn;
        }

        if (is_array($this->alphaNumVal) && (0 != count($this->alphaNumVal))) {
            // If it's an array, this is unexpected. Let's log it and display it in a way that's helpful for debugging.
            error_log('Unexpected array in alphaNumVal for key: ' . $this->firstChar);
            $valueString = 'Unexpected array: ' . print_r($this->alphaNumVal, true);
        }
        // If it's not an array, use it as the file name (as expected)
        $valueString = $this->alphaNumVal;

        $this->htmlPrint["$this->firstChar"] .= '<li id="item_' . $this->firstChar . $this->alphaNumKey . '" class="navlist-item target-fix"> target: ' . htmlspecialchars($this->firstChar) . ' &#x3d;&#x3e; ' . htmlspecialchars($object) . '</li>
        ';
        $this->htmlPrint["$this->firstChar"] .= '</ul>';
    }

    private function prepareGoUpUrl()
    {
        // ... (Your existing logic for preparing the "Go Up" URL)
        // $this->goUp = [];

        $this->goUp['subject'] = $this->nav_pathInfo['dirname'];
        $this->goUp['replace'] = '';
        $this->goUp['search'] = '@^(.*(?=(/).*))@';
        $this->goUp['result'] = preg_replace($this->goUp['search'], $this->goUp['replace'], $this->goUp['subject']);
        $this->goUp['url'] = str_ireplace($this->goUp['result'], $this->goUp['replace'], $this->goUp['subject']);
        $this->goUp['url'] = preg_replace('/([^\/]+\/)+([^\/]+)/', '$2', $this->goUp['url']);
        // $this->goUp['url'] = filter_path($_SERVER['DOCUMENT_ROOT'],$servername,$server_addr);
    }

    private function processDirectoryStructure($DirReadArray, &$alphaNumFilledKeys, $dirObject)
    {
        $alphaNumArray = $alphaNumFilledKeys ?? [];
        $this->pathOps = $DirReadArray;
        $this->alphaNumFilledKeys = $alphaNumArray;
        $this->dirObject = $dirObject;
        $this->alphaFillKeys = [];
        $this->dirObject = $dirObject;
        if (is_array($DirReadArray)) {
            foreach ($DirReadArray as $this->firstChar) {
                $this->anPregSearch = ucfirst(strtolower($this->firstChar));
            }
        } else {
            $this->anPregSearch = ucfirst(strtolower($this->firstChar));
        }
        $this->returnAlnumKeys = array_keys($alphaNumArray);
        $this->anPregSubject = implode('', $this->returnAlnumKeys);

        $this->anStrposResult = stripos($this->anPregSubject, $this->firstChar);

        if ($this->anStrposResult !== false) {
            foreach ($this->alphaNumFilledKeys as $this->anFuncKey => $this->anFuncVal) {
                if (ucfirst($this->firstChar) === ucfirst($this->anFuncKey)) {
                    $this->alphaNumFilledKeys[ucfirst($this->firstChar)][] = $this->dirObject;
                    break;
                }
            }
        }
    }

    private function finalizeHtmlOutput()
    {
        $this->htmlPrint[] = '<li id="navTotal">Objects found: ' . $this->fsObject . '</li>
        <li id="adb_small_logo"><img
        src="assets/css/adb_logo_shadow.png"
        style="width:100px;height:80px;"
        class="floatLt" /></li>
    <li id="font_demo_serif">A QuIck Bit oF Valid TeXt bRiEfly</li>
    <li id="font_demo_sans">A QuIck Bit oF Valid TeXt bRiEfly</li>
        </ul>
    <form id="check_font" method="post" action="' . $_SERVER['PHP_SELF'] . '?check_font=">
    <input type="submit" name="check_font" value="Check Font">
    </form>
    </nav>';
    }

    public function getHtmlPrint()
    {
        // return $this->generateHtmlOutput($this->DirReadArray);
        $Auxx_Class = new Auxx($this->pathOps);
        return $Auxx_Class->arrayObjectAnchors($this->DirReadArray);
    }

    public function indexScan()
    {
        return $this->scanCurrent();
    }

    public function groupToggler($items) {
        $this->groupTogglerReturn =  $this->ulToggleChildren($items);
    }
    public function makeToggles()
    {
        $this->makeTogglesReturn = $this->processDirectoryStructure($this->DirReadArray, $this->alphaNumFilledKeys, $this->dirObject);
    }

    public function htmlForItem($dirItems)
    {
        return $this->processEmptyAlphaNum($dirItems);
    }

    public function initNav() {
        return $this->initializeHtmlOutput();
    }
}
