<?php

/*
 * URL Path ./inc/nav.inc.php
 */
if (defined('XRO')) {
    $xro = XRO;
} else {
    $xro = '';
}
// initialize counter
$objNmbr = 0;
// initialize goUp array():

$goUp = [
    'subject' => NULL,
    'replace' => NULL,
    'search' => NULL,
    'result' => NULL,
    'url' => NULL
];

$nav_pathInfo = [
    'basename' => NULL,
    'dirname' => NULL,
    'filename' => NULL,
    'extension' => NULL
];

$nav_pathInfo = pathinfo(dirname(__DIR__), PATHINFO_ALL);

$filePathArray = pathinfo(__FILE__);


$childItems = array();
// $baseNameEQonePage = array();
$specialExtn = array();


/**
 * @todo fix pmAllCollector
 * currently pmAllCollector records all extensions, including duplicates. we don't want duplicates.
 * '
 * @var array pmAllCollector
 */
$pmAllCollector = array();
$myPathInfo = array('dirname', 'basename', 'extension', 'filename');

$dir = __FILE__;

require $xro . 'public/inc/alphanumarray.inc.php';
require $xro . 'public/inc/basenamecleaner.inc.php';

if (file_exists($xro . 'public\inc\nav.inc.php')) {
    $search = '\public\inc\nav.inc.php';
} elseif (file_exists($xro . 'public/inc/nav.inc.php')) {
    $search = '/public/inc/nav.inc.php';
}
$subject = $dir;
$replace = '';
$dir = str_ireplace($search, $replace, $subject);
$server_name = $_SERVER['SERVER_NAME'] ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
$server_addr = $_SERVER['SERVER_ADDR'] ? $_SERVER['SERVER_ADDR'] : $_SERVER['SERVER_NAME'];
$servername = $server_name;

function convert_url_chars($url_2_convert)
{
    // if(!preg_match('@/var/www/html@', $_GET['path2url'])){
    if (!empty($_GET['path2url'])) {
        $url_2_convert = preg_replace('/"/', '', $url_2_convert);
        $url_2_convert = preg_replace('/ /', '%20', $url_2_convert);
        $url_2_convert = preg_replace('/%20$/', '', $url_2_convert);
        $url_2_convert = str_ireplace('file://', '', $url_2_convert);
        $url_2_convert = preg_replace('@([\x5c\x2f])@', '/', $url_2_convert);
    }
    return $url_2_convert;
}

function filter_path($url, $servername, $server_addr)
{
    /**
     * to see everything, uncomment this var
     * $filtered_url = $_SERVER;
     */
    $filtered_url['url'] = $url;
    $filtered_url['servername'] = $servername;
    $filtered_url['server_addr'] = $server_addr;
    $filtered_url['servername'] = !empty($filtered_url['servername']) ? $filtered_url['servername'] : $filtered_url['server_addr'];
    return $filtered_url['servername'];
}

$goUp = [];

$goUp['subject'] = $nav_pathInfo['dirname'];
$goUp['replace'] = '';
$goUp['search'] = '@^(.*(/)(?=.*))@';
$goUp['result'] = preg_replace($goUp['search'], $goUp['replace'], $goUp['subject']);
$goUp['url'] = str_ireplace($goUp['result'], $goUp['replace'], $goUp['subject']);
// $goUp['url'] = preg_replace('/([^\/]+\/)+([^\/]+)/','$2',$goUp['url']);

$depth = substr_count($goUp['subject'], '/');
// echo '<br>depth: ' .$depth;
if ($depth < 5) {
    // $goUp['url'] = $_SERVER['HTTP_HOST'];

    $goUp['url'] = filter_path($_SERVER['DOCUMENT_ROOT'], $servername, $server_addr);
    //  echo '<div id="gouptest">Depth < 5<ol>';

    foreach ($goUp as $guKey => $guVal) {
        //   echo '<li>goUp['.$guKey.']: '.$guVal.'</li>';
    }

    // echo '</ol></div>';
}

// if(strlen($goUp["url"]) < 1) {
//    $goUp["url"] = $serverUrl."/";
// }

/* echo '<div id="gouptest">after if()<ol>';
foreach ($goUp as $guKey => $guVal) {
    echo '<li>goUp['.$guKey.']: '.$guVal.'</li>';
}
echo '</ol></div>'; */

$concatSubdir = '/' . $chopThis . '/';
$conSubSearch = '\\';
$conSubReplace = '/';
$concatDirs = str_ireplace($conSubSearch, $conSubReplace, $dir . $concatSubdir);

$currentUrlPath = preg_replace('@' . $goUp['result'] . '/?$@', '', $currentUrlPath);

if (is_dir($concatDirs)) {
    $dh = opendir($concatDirs);
} else {
    $dh = opendir(realpath($dir));
}
if ($dh) {
    while (($thisObject = readdir($dh)) !== false) {
        foreach ($myPathInfo as $myKey => $myVal) {
            if (isset(${$myVal})) {
                unset(${$myVal});
            }
        }
        $thisObject_pathInfo = pathinfo($thisObject);

        foreach ($thisObject_pathInfo as $pathKey => $pathVal) {
            ${$pathKey} = $pathVal;
        }

        if ($dirname == '.' && empty($thisObject_pathInfo['extension'])) {
            $dirname = $basename;
        }
        if ($dirname == '.') {
            if ($dirname . $extension == $basename) {
                if (strlen($filename) < 1) {
                    // REACH THIS POINT? THEN MUST BE SIMILAR TO:
                    // '.buildpath'
                    // IN WHICH CASE WE can define list item as hiddenitem
                    // HOW ABOUT THE FOLLOWING:

                    if (isset($extension) && strlen($extension) < 1) {
                        unset($extension);
                        $dirname = $basename;
                    }
                    /*                      else{
                                                 // $dirname = $basename;
                                            } */
                }
            }
        }
        if (($basename != '.') && ($basename != '..')) {
            $objNmbr++;
            if (
                !is_dir($thisObject) &&
                (isset($extension) && strlen($extension) > 0) &&
                ($extension != 'htaccess' && $extension != 'htpasswd')
            ) {
                // POPULATE THE ELUSIVE ALPHANUMARRY
                // continued in ./arrayobjectparser.inc.php
                require $xro . 'public/inc/arrayobjectparser.inc.php';
            }  //    ENDIF- LARGEST CONTAINER CLOSED HERE

            require $xro . 'public/inc/arrayobjectanchors.inc.php';
            addAlphaNum($basename, $alphaNumArray, $childItems[$objNmbr]);
        }

        //     ENDIF  ( pathinfo != "." or "..")
    }
    // ENDWHILE
    closedir($dh);
}
// comment 20220604 - dangling brace }

$htmlPrint = array();

/*  for($i=0;$i<=$objNmbr;$i++) {
        if(isset($childItems[$i])) {
            $htmlPrint[$i] = $childItems[$i];
        }
    } */

$lc = 0;
$htmlPrint[$lc] = "<nav id=\"leftcol\" class=\"navlist\"> \n <ul id=\"navlist\" class=\"navlist\"> \n";
if (isset($goUp['url'])) {
    $htmlPrint[$lc] .= '<li id="goUpItem" class="nav"><a title="crazy" href="' . $currentUrlPath . '">' . $currentUrlPath . '</a></li>';
}

$totalObjects = $objNmbr;
foreach ($alphaNumArray as $alphaNumKey => $alphaNumVal) {
    $lc++;
    $htmlPrint[$lc] = '';

    if (is_array($alphaNumVal) && $alphaNumVal !== '') {
        $toggleCount = count($alphaNumVal);
        if ($toggleCount != 0) {
            $htmlPrint[$lc] .= '<li onclick="showHide(\'ul_' . $alphaNumKey . '\')" id="li_' . $alphaNumKey . '" class="toggler"><span style="font-weight:bold;">' . $alphaNumKey . '</span>:';

            if (is_array($alphaNumVal)) {
                $htmlPrint[$lc] .= ' [ view ' . $toggleCount . ' ]';

                // ############ ATTN 20220816 - THIS IS WHERE THE EMPTY LI is created.
                // ############ FIX TO MAKE NAV not include EMPTY ITEMS!

                $htmlPrint[$lc] .= '
<ul id="ul_' . $alphaNumKey . '" class="alphaNumChildList target">';
                foreach ($alphaNumVal as $alphaNumSortedKey => $alphaNumSortedItem) {
                    if ($alphaNumSortedItem != '') {
                        $htmlPrint[$lc] .= $alphaNumSortedItem;
                    }
                }
                $htmlPrint[$lc] .= '</ul>
                ';
            }
        } elseif (!is_array($alphaNumVal) && $alphaNumVal != '') {
            $htmlPrint[$lc] .= ' string:';
            $htmlPrint[$lc] .= '<ul id="ul_' . $alphaNumKey . '" class="alphaNumChildList target">
                    <li style="white-space:pre;">$[' . $alphaNumKey . '] &#x3d;&gt; ' . $alphaNumVal . '</li>
                    </ul>
                    ';
        }
        //          else{
        //              $htmlPrint[$lc] .= ' <!-- line '.__LINE__.': -->&#x3d;&gt; '.$alphaNumVal;
        //          }
        $htmlPrint[$lc] .= '';
    } /* WHY IS THERE no ELSE or ELSEIF here? - this doesn't make much sense */ else {
        unset($htmlPrint[$lc]);
    }
}
// $totalObjects = $lc;
// $oneMore = $i++;
$oneMore = $lc++;

$htmlPrint[$oneMore] = '<li id="navTotal">Objects found: ' . $totalObjects . '</li>
        <li id="adb_small_logo"><img
        src="assets/css/adb_logo_shadow.png"
        style="width:100px;height:80px;"
        class="floatLt" /></li>
    <li id="font_demo_serif">A QuIck Bit oF Valid TeXt bRiEfly</li>
    <li id="font_demo_sans">A QuIck Bit oF Valid TeXt bRiEfly</li>
        </ul>
<form id="check_font" method="post" action="' . $_SERVER['PHP_SELF'] . '?check_font=">
<input type="text" name="font_name" id="font_name">
<input type="submit" name="submit_font" id="submit_font" value="Check">
<label for="submit_font">Check Font</label>
</form>
        <div id="js_return_serif"></div>
        <!-- close navlist -->
        </nav>';
?>
<script>
font_props('font_demo_serif', 'fontFamily');
font_props('font_demo_sans', 'fontFamily');
</script>
<!-- close leftcol -->
<?php
ksort($htmlPrint);
