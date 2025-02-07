<?php

namespace Adb\Model;

// notused use Adb\Model\Adbsoc as Adbsoc;
use Adb\Model\Htmldochead as Htmldochead;
use Adb\Model\Navfactor as Navfactor;
use Adb\Model\Navsubfactor as Navsubfactor;

if(!defined('NS_ROOT')) {
    define('NS_ROOT', dirname(NS));
}

#[\AllowDynamicProperties]
class Auxx
{
    public $charCount;
    public $alphaNumArray;
    public $anPregSearch;
    public $anPregSubject;
    public $childItems;
    public $cleanBasename;
    public $cleanName;
    public $components;
    public $dotfilename;
    public $extension;
    public $firstChar;
    public $Htmldochead;
    public $nav;
    public $arrayObjectAnchors = [];
    public $Navfactor;
    public $path_components;
    public $returnAlnumKeys;
    public $specialExtn;
    public $splext;
    public $url;
    public $pathOps;
    public $Navfactor_class;
    public $Htmldochead_class;
    public $dfnCount;

    public function __construct($pathOps)
    {
        if (!defined('ADBLOCTN')) {
            define('ADBLOCTN', dirname($_SERVER['SCRIPT_FILENAME']));
        }
        $this->dfnCount = isset($this->dfnCount) ? (int) $this->dfnCount : (int) 0;
        if (isset($pathOps)) {
            $this->pathOps = $pathOps;
            $this->cleanBasename = $pathOps;
        } else {
            $this->pathOps = ADBLOCTN;
            $this->cleanBasename = $this->pathOps;
        }
        if (!isset($this->alphaNumArray)) {
            $this->alphaNumArray = [];
        }

        $this->Navfactor = new Navfactor($this->pathOps);
        $this->Navfactor_class = new Navsubfactor($this->pathOps);

        $this->dotfilename = $this->Navfactor_class->nav_pathInfo['dirname'] . $this->Navfactor_class->nav_pathInfo['extension'];
        $this->dfnCount++;
    }

    public function get_components($url)
    {
        // check call stack vscode
        $this->url = $url;
        if (is_array($url)) {
            // $url=$url['dirname'];
        } else {
            $this->components = [
                'url' => $url,
                'exurl' => explode('/', $url),
                'components_count' => count($this->path_components->components),
                'components_length' => strlen($this->components),
            ];
        }

        if (!is_array($this->components)) {
            $this->components = [];
        }
        // Define a regular expression pattern to match directory components
        $this->components['pattern'] = '/(?:^|\/)([^\/]+)/';
        if (is_array($url)) {
            $loop_num = count($url);
            $this->components['url'] = end($url);
            $this->components['component'] = [];
            foreach ($url as $charKey => $charVal) {
                preg_match_all($this->components['pattern'], $charVal, $matches);
                $this->components['component'] = $matches[1];
            }
        } else {
            preg_match_all($this->components['pattern'], $url, $matches);
            $this->components['component'] = $matches[1];
        }
        return $this->components;
    }

    public function addAlphaNum($pathOps, &$alphaNumArray, $thisDirObject)
    {
        $basename = $pathOps;
        echo 'adding basename / ' . $basename . ' to array.';
        $this->alphaNumArray = $alphaNumArray;
        $this->firstChar = strtoupper(substr($basename, 0, 1));
        $this->anPregSearch = $this->firstChar;

        $keys = array_keys($alphaNumArray);
        $this->returnAlnumKeys = $keys;
        $this->anPregSubject = implode('', $this->returnAlnumKeys);

        if (stripos($this->anPregSubject, $this->firstChar) !== false) {
            $alphaNumArray[$this->firstChar][] = $thisDirObject;
        } else {
            // If the character is not in our alphaNum string, add it to a special category
            $alphaNumArray['#'][] = $thisDirObject;
        }

        // Debugging output
        echo 'alphaNumArray[' . $this->firstChar . "] now contains:\n";
        var_dump($alphaNumArray[$this->firstChar]);
    }

    public function cleanBasename($pathOps)
    {
        $this->Navfactor_class = new Navfactor($pathOps);
        $this->Htmldochead_class = new Htmldochead($pathOps);
        //  note: experimental array value= ".bak", since str_replace, not regex

        $invalidCharacters = array('?',
            '[',
            ']',
            '/',
            '\\',
            '=',
            '<',
            '>',
            ':',
            ';',
            ',',
            "'",
            '"',
            '&',
            '$',
            '#',
            '*',
            '(',
            ')',
            '|',
            '~',
            '`',
            '!',
            '{',
            '}',
            ' '  // add space char just to test 2022.02.02 JS
        );
        $bnc_count = 0;
        foreach ($invalidCharacters as $invalidSubject) {
            $this->cleanName = str_replace($invalidSubject, htmlspecialchars($invalidSubject), $pathOps);
            $bnc_count++;
        }

        return $this->cleanName;
    }

    public function arrayObjectAnchors($pathOps)
    {
        if (!isset($this->childItems) || empty($this->childItems)) {
            $this->childItems = [];
        }
        $this->Navfactor_class = new Navsubfactor(TEST_DIRECTORY);
        $this->Htmldochead_class = new Htmldochead(NS_ROOT);
        foreach ($pathOps as $objNmbr => $pathOpsArrayItem) {
            $cleanThis = $pathOpsArrayItem;
            $length = strlen($cleanThis);
            $this->cleanBasename = urlencode($cleanThis);
            if($length < 3) {
                continue;
            }
            elseif (isset($this->childItems[$objNmbr])) {
                // THIS readdir() item _NOT_ A DIRECTORY  #see nav.inc.php, lines ~70,*,~100
                $splext = $this->Navfactor_class->nav_pathInfo['extension'];
                if (isset($this->specialExtn[$splext])) {
                    // HANDLE IMAGE OR SPECIAL FILETYPE
                    if (isset($this->dotfilename)) {
                        $this->childItems[$objNmbr] .= '<a title="View ' . $this->dotfilename . ' in main iFrame" href="#mainFrameContainer" id="navAnchor_' . $this->dotfilename . '" onclick="loadIframe(\'' . $this->dotfilename . '\')"><!-- ' . __LINE__ . ' -->' . $this->Navfactor_class->nav_pathInfo['extension'] . '</a> [' . $this->dotfilename . ' to iframe]</li>' . "\n";
                    } else {
                        $this->childItems[$objNmbr] .= '<a href="#mainFrameContainer" id="navAnchor_' . $this->cleanBasename . '" title="' . $this->cleanBasename . '" onclick="loadIframe(\'' . $this->cleanBasename . '\')">' . $this->Navfactor_class->nav_pathInfo['filename'] . '</a><!-- ' . __LINE__ . ' -->[view ' . $this->Navfactor_class->nav_pathInfo['extension'] . ']</li>' . "\n";
                    }
                } else {
                    if ($this->Navfactor_class->nav_pathInfo['extension'] == 'php') {
                        $this->childItems[$objNmbr] .= '<a href="' . $this->cleanBasename . '" title="' . $this->cleanBasename . '" target="_blank"><!-- ' . __LINE__ . ' -->' . $this->Navfactor_class->nav_pathInfo['filename'] . '</a> [php to top]</li>' . "\n";
                    } else {
                        // BASENAME INVALID FOR HTML ATTRIBUTES - FIXed WITH @cleanBasename func
                        if ($this->cleanBasename) {
                            // ACCORDING TO cleanBasename(), FILENAME IS "invalid" (e.g. contains spaces, or invalid chars)
                            $this->childItems[$objNmbr] .= '<a title="Invalid Filename cleaned to ' . $this->cleanBasename . ' using HEX equivalents. This buggy JavaScript will likely not respond. sorry!" id="navAnchor_' . $this->cleanBasename . '"><!-- ' . __LINE__ . ' -->' . $this->cleanBasename . '</a> [!badpath]</li>' . "\n";
                        }
                        // NOT .PHP BUT IS VALID FILENAME
                        else {
                            $this->childItems[$objNmbr] .= '<a title="View ' . $this->cleanBasename . ' in main iFrame" href="#mainFrameContainer" id="navAnchor_' . $this->cleanBasename . '" onclick="loadIframe(\'' . $this->cleanBasename . '\')"><!-- ' . __LINE__ . ' -->' . $this->Navfactor_class->nav_pathInfo['filename'] . '</a> [' . $this->Navfactor_class->nav_pathInfo['extension'] . ' to iframe]</li>' . "\n";
                        }
                    }
                }

         } else {
                // OBJECT IS A DIRECTORY
                if($length < 3) {
                    break;
                }
                $switchFilename = strtolower($this->cleanBasename);
                switch ($switchFilename) {
                    case 'inc':
                        $this->childItems[$objNmbr] = '<!-- li class="forbidden" title="' . $this->cleanBasename . '"><a href="' . $this->cleanBasename . '" title="' . $this->cleanBasename . '">' . $this->cleanBasename . '</a></li -->' . "\n";
                        break;
                    case 'class':
                        $this->childItems[$objNmbr] = '<!-- li class="forbidden" title="' . $this->cleanBasename . '"><a href="' . $this->cleanBasename . '" title="' . $this->cleanBasename . '">' . $this->cleanBasename . '</a></li -->' . "\n";
                        break;
                    case 'error_log':
                        $this->childItems[$objNmbr] = '<!-- li class="forbidden" title="' . $this->cleanBasename . '"><a href="' . $this->cleanBasename . '" title="' . $this->cleanBasename . '">' . $this->cleanBasename . '</a></li -->' . "\n";
                        break;
                    case 'css':
                        $this->childItems[$objNmbr] = '<!-- li class="forbidden" title="' . $this->cleanBasename . '"><a href="' . $this->cleanBasename . '" title="' . $this->cleanBasename . '">' . $this->cleanBasename . '</a></li -->' . "\n";
                        break;
                    case 'js':
                        $this->childItems[$objNmbr] = '<!-- li class="forbidden" title="' . $this->cleanBasename . '"><a href="' . $this->cleanBasename . '" title="' . $this->cleanBasename . '">' . $this->cleanBasename . '</a></li -->' . "\n";
                        break;
                    case '.settings':
                        $this->childItems[$objNmbr] = '<!-- li class="hiddenitem" title="' . $this->cleanBasename . '"><a href="' . $this->cleanBasename . '" title="' . $this->cleanBasename . '">' . $this->cleanBasename . '</a></li -->' . "\n";
                        break;
                    case '.svn':
                        $this->childItems[$objNmbr] = '<!-- li class="hiddenitem" title="' . $this->cleanBasename . '"><a href="' . $this->cleanBasename . '" title="' . $this->cleanBasename . '">' . $this->cleanBasename . '</a></li -->' . "\n";
                        break;
                    case '.buildpath':
                        $this->childItems[$objNmbr] = '<!-- li class="hiddenitem" title="' . $this->cleanBasename . '"><a href="' . $this->cleanBasename . '" title="' . $this->cleanBasename . '">' . $this->cleanBasename . '</a></li -->' . "\n";
                        break;
                    case 'images':
                        $this->childItems[$objNmbr] = '<li class="hiddenitem" title="' . $this->cleanBasename . '"><a href="' . $this->cleanBasename . '" title="' . $this->cleanBasename . '">' . $this->cleanBasename . '</a></li>' . "\n";
                        break;
                    case 'resources':
                        $this->childItems[$objNmbr] = '<!-- li class="hiddenitem" title="' . $this->cleanBasename . '"><a href="' . $this->cleanBasename . '" title="' . $this->cleanBasename . '">' . $this->cleanBasename . '</a></li -->' . "\n";
                        break;
                    case 'htaccess':
                        $this->childItems[$objNmbr] = '';
                    default:
                        $this->childItems[$objNmbr] = '<li class="navnobull" title="' . $this->cleanBasename . '"><a href="' . $this->cleanBasename . '"><!-- ' . __METHOD__ . ' at line ' . __LINE__ . ' -->' . $this->cleanBasename . '</a></li>' . "\n";
                }
            }
        }
        return $this->childItems;
    }

    public function objectParser()
    {
        $pathOps = $this->pathOps;
        $this->Navfactor_class = new Navfactor($pathOps);
        $this->Htmldochead_class = new Htmldochead($pathOps);

        $pathInfo = pathinfo($pathOps);
        $extension = isset($pathInfo['extension']) ? strtolower($pathInfo['extension']) : '';

        $this->extension = $extension;

        // Your existing switch statement for $extension
        switch ($extension) {
            case 'php':
            case 'phtml':
                $this->specialExtn = 'php';
                break;
            case 'html':
            case 'htm':
                $this->specialExtn = 'html';
                break;
                // ... other cases ...
            default:
                $this->specialExtn = $extension;
        }

        // Ensure $this->arrayObjectAnchors is an array before using it
        if (!is_array($this->arrayObjectAnchors)) {
            $this->arrayObjectAnchors = [];
        }

        $filename = $pathInfo['filename'] ?? '';
        $basename = $pathInfo['basename'] ?? '';

        // Use null coalescing operator to avoid warnings
        $this->arrayObjectAnchors[] = '<li id="' . $filename . '" class="'
            . ($this->specialExtn ?? 'adb') . '"><a href="' . $pathOps . '">'
            . $basename . '</a></li>';

        return $this->arrayObjectAnchors;
    }
}

