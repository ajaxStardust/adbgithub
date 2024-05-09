<?php

// namespace adb_simplest/public/inc;

/**
 * @depends
 *   ./class/class-urlchopper.php
 *   ./css/style.css.php
 */

/**
 * add 45 secs to default of 30 = 75 secs if invoked
 * set_time_limit(45);
 */

/** @TODO CSSPATH concept introduced here but never embellished */

/**
 * TRUE OR FALSE?
 * whether to pull css from the site root ./css folder
 * or the css container most closely relative to this document
 */
define('ABSOLUTELOCATION', dirname($_SERVER['SCRIPT_NAME']));
$abspath = ABSOLUTELOCATION;

// echo '<br>included: '.var_dump(ABSOLUTELOCATION);

if (defined('XRO')) {
    $xro = XRO;
} else {
    $xro = '';
}
$abspath = ABSOLUTELOCATION . '/' . $xro;
$rootCss = FALSE;
/* for future impletation of CSS control - useless idea really */

require $xro . 'public/class/class-urlchopper.php';
require $xro . 'public/class/class-cwthumbs.php';

$testPath = $_SERVER['SCRIPT_NAME'];

$urlChopper = new urlChopper;

$head_img_obj = new CwThumbs;

$one_image = $head_img_obj->makeThumbs('assets/screenshots', $none = NULL);

$many = count($one_image);
$rand = rand(0, $many) - 1;
if ($rand == -1) {
    $rand = 0;
}
// $random_head_img = $one_image[$rand];

$chopThis = $urlChopper->chopUrl($testPath);
/* what is the point of creating the _chopThis variable? */

$c_subject = $urlChopper->chop_subject;
$c_replace = $urlChopper->chop_replace;
$c_search = $urlChopper->chop_search;
$c_result = $urlChopper->chop_result;
$c_url = $urlChopper->chop_url;
$c_trim = $urlChopper->chop_trim;

/*
 * what is the point of doubling this data?
 * E.g. _chopTHis = urlChopper->chopUrl already has the desired string!
 */

// TRY A DIFFERENT METHOD OF THE urlChopper CLASS 2021.11.11
// $printResults = $urlChopper->printResults($c_replace,$c_result,$c_search,$c_subject,$c_trim,$c_url,$chopThis);

$pi = pathinfo($testPath);

$pathInfoBasename = $pi['basename'];
$pathInfoDirname = $pi['dirname'];
$pathInfoExtension = $pi['extension'];
$pathinfoFilename = $pi['filename'];

$bodyid = $pathinfoFilename;

/*
 * is the prev foreach loop necessary to get to "pathinfo(filename)"?
 * e.g. is "index" when filename is "index.php"
 */

if (isset($_SERVER['SERVER_NAME'])) {
    $serverName = $_SERVER['SERVER_NAME'];
} else {
    $serverName = 'localhost';
}
$serverUrl = 'http://' . $serverName;
$abspath = $serverUrl . '/' . $chopThis;
$currentUrlPath = $serverUrl . $c_url;

/*
 * note THE SAME INFO is avail in the following variables:
 * $abspath
 * $c_url
 * $pathinfoDirname
 * $pi[dirname]
 * $urlChopper->chop_url
 * ABSOLUTELOCATION
 */
if (!preg_match('@^.*/$@', $currentUrlPath)) {
    $currentUrlPath = $currentUrlPath . '/';
}

$solidusCount = substr_count($currentUrlPath, '/');
if (is_int($solidusCount)) {
    $solidusDepth = ($solidusCount - 3);
}

$depthString = '';
for ($sd = 0; $sd < $solidusDepth; $sd++) {
    $depthString .= '../';
}

if (!defined('CSS')) {
    if ($rootCss == TRUE) {
        if (file_exists($xro . $depthString . 'assets/css/style.css')) {
            define('CSS', $xro . 'assets/css/style.css');
            define('CSSPATH', $xro . 'assets/css/');
            /* we dont need the $depthString offset for the defined vars */
        }
    } else {
        if (file_exists($xro . 'assets/css/style.css')) {
            define('CSS', $xro . 'assets/css/style.css');
            define('CSSPATH', $xro . 'assets/css/');
        }
    }
}

/**
 * TODO - figure a way to determine whether depthstring is required or harmful
 *  = str_replace($depthString, '', substr($depthString, 1, 2));
 */

//  = $depthString;

if (file_exists($xro . 'favicon.ico')) {
    $favicon = $xro . 'favicon.ico';
    $favtype = 'image/ico';
} else {
    /*
     * *  @var array $defaultIconArray
     * *      guess the shortcut icon name (i.e. Favicon.ico )
     * *      from an array of common names
     * *  @var array $iconExtnsArray
     * *      guess icon type from array of common image formats
     */

    $defaultIconArray = array('favicon', 'siteicon', 'icon', 'shortcut');
    $iconExtnsArray = array('ico', 'png', 'bmp');

    foreach ($defaultIconArray as $thisIconName) {
        foreach ($iconExtnsArray as $thisIconExtn) {
            $testFavicon = $thisIconName . '.' . $thisIconExtn;
            if (file_exists($testFavicon)) {
                $favicon = $testFavicon;
                $favtype = 'image/' . $thisIconExtn;
            }
        }
    }
    if (empty($favicon)) {
        $favicon = $xro . 'favicon.ico';
        $favtype = 'image/ico';
    }
}

/**
 * @logic ( iframe src=??? )
 *    :if   HTTP_REQUEST param "path2url" exists then src=urlpatchcheck.phtml
 *    :else test for match on various common web dir index filenames
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~
 *  @var defaultIframe string:
 *      assign a value for iframe src attribute
 */
$defaultIframe = '';
if (isset($_GET['path2url'])) {
    $defaultIframe = $xro . './path2url.phtml?path2url=' . $_GET['path2url'];
} else {
    /*
     * *  @var defaultFrameArray array
     * *      array of strings containing various common web directory index filenames
     * *  #NOTE# Add any file names here you wish to load by default. The further
     * *  toward the end of the array (i.e. currently, default.html), the greater
     * *  the priority.
     */
    $defaultFrameArray = array(
        $xro . 'default.phtml',
        $xro . 'Overview.html',
        $xro . 'Overview.htm',
        $xro . 'default.htm',
        $xro . 'toc.html',
        $xro . 'toc.htm',
        $xro . 'index.htm',
        $xro . 'index.html',
        $xro . 'readme.txt',
        $xro . 'readme.md',
        $xro . 'default.html',
        $xro . 'db_admin.phtml',
        $xro . 'graphic_design.php',
        $xro . 'path2url.phtml',
        $xro . 'p2u2.phtml',
    );

    foreach ($defaultFrameArray as $thisIframe) {
        if (file_exists($thisIframe)) {
            $defaultIframe = $thisIframe;
        }
    }
}

$frameInfo = pathinfo($defaultIframe);
$frameTitle = $frameInfo['filename'];
/* create the string for the iFrame title */

if (isset($chopThis) && strlen($chopThis) > 1) {
    $pagetitle = $serverName . '/' . $chopThis . '/' . $c_trim;
} else {
    $pagetitle = $serverName . '/' . $c_trim;
}

// new random image play
// Directory containing header images
error_reporting(E_ALL);
$randomnumber = rand(0,2);
if($randomnumber == 1) {
    $imageDirectory = 'assets/screenshots/';
    }
elseif($randomnumber == 2) {
 $imageDirectory = 'assets/screenshots/';
}
else {
 $imageDirectory = 'assets/screenshots/';
}



        // Get all files in the directory
        $files = glob($imageDirectory . '/*');

        // Select a random image file
        $randomImage = $files[array_rand($files)];

        // Output the image

/* END PHP and begin HTML for document head */






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php print $pagetitle; ?></title>

    <meta charset="UTF-8">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="assets/css/emeyereset.css" media="all">


    <link rel="icon" type="<?php print $favtype; ?>" href="<?php print $favicon; ?>">
    <link rel="shortcut icon" type="<?php print $favtype; ?>" href="<?php print $favicon; ?>">



    <!-- Bootstrap Css v5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet">
    <!-- Bootstrap Css v5 -->
    <style>
    <!--
    .hide-show-element {
        /*
  *
  background-color: #eee;
  height: 400px;
  position: relative;
  text-align: center;
  *
  */
        width: 10rem;
        display: inline-block;
    }

    .hide-show-element label:hover {
        color: #D00;
    }

    .hide-show-element input[type='checkbox'] {
        display: none;
    }

    .hide-show-element label {
        margin: 0 .1em;
        padding: 0 .3em;
        border-radius: 3px;
        border: .1em solid #ccc;
        color: #333;
        line-height: 1.625;
        font-size: .83em;
        font-family: inherit;
        background-color: #f7f7f7;
        box-shadow: 0 .1em 0 rgba(0, 0, 0, .2), 0 0 0 .2em #fff inset;
    }

    .hide-show-element label {
        /* background-color: #a00; */
        /* border: 1px solid #111; */
        color: #E8E6FF;
        cursor: pointer;
        /* display: block; */
        /* padding: 20px; */
        display: inline-block;
        text-align: center;
        transition-duration: 0.4s;
        width: 90%;
        margin: 0;
        text-shadow: 0.06rem 0.06rem 0.1rem #33333355;
    }

    .hide-show-element label:after {
        display: block;
        content: "Show Controls";
    }

    .hide-show-element input:checked+label {
        background-color: none;
        /* border: 1px solid #a00; */
        color: #3A29BB;
    }

    .hide-show-element input:checked+label:after {
        content: "Hide Controls";
    }

    .test1 {
        opacity: 0;
        position: relative;
        height: 0;
        transform: rotate(135deg);
        top: 20%;
        transition-duration: 0.6s;
        width: 0;
    }

    .hide-show-element input:checked~.test1 {
        filter: grayscale(25%);
        opacity: 1;
        height: 200px;
        transform: rotate(0);
        width: 8rem;
    }
    .randomimage {
        display:inline-block;
        max-width:1024;
        max-height:768;
    }
    #jsaffect {

    display: inline-block;
    flex-direction: unset;
    border: 0.01rem solid #7fd5ff;

    }
    -->
    </style>

    <!-- SPECTRE CSS>
    <!-- link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <!-- link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <!-- link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <!-- SPECTRE CSS -->
    <?php

        /*
         * there is no _javaScriptAlert variable, but we might keep the idea
         */
        if (isset($javaScriptAlert)) {
            if (is_array($javaScriptAlert)) {
                foreach ($javaScriptAlert as $jsaKey => $jsaVal) {
                    print $jsaVal;
                }
            } else {
                print $javaScriptAlert;
            }
        }
        require $xro . 'assets/css/style.css.php';

    ?>
    <link id="unlockFrame" rel="stylesheet" type="text/css" href="<?php echo $xro; ?>assets/css/unlockframe.css"
        media="screen">
    <link id="style_main" rel="stylesheet" type="text/css" href="<?php echo CSS; ?>" media="all">
    <!-- ajaxStardust style_main anniedebrowsa -->
    <script type="text/javascript" src="./assets/js/accessories.js">
    </script>
<script>
window.onload = cloneAttributes("jsaffect", "locallinks");

</script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script>
        <script>
    $(document).ready(function() {
        // Function to update the news ticker with a random variable
        function updateNewsTicker() {
            $.getJSON('assets/json/bash_variables.json', function(data) {
                var variables = data.variables;

                // Select a random variable
                var random_variable_key = Math.floor(Math.random() * Object.keys(variables).length);
                var random_variable_name = Object.keys(variables)[random_variable_key];
                var random_variable = variables[random_variable_name];

                $('#news-ticker').text(random_variable_name + ': ' + random_variable.description + ' (Used for: ' + random_variable.used_for + ')');
            });
        }

        // Update the news ticker every 5 seconds
        updateNewsTicker();
        setInterval(updateNewsTicker, 5000); // Change interval as needed
    });
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
</style>

</head>

<body id="<?php print $bodyid; ?>">
    <figure id="cssBox_Target" class="target displaynone">
        <!-- ^ cssBoxContainer ^ -->
        <img src="<?php echo $xro; ?>assets/css/css-box_novicenotes-dot-net_transp.png" alt="CSS Box-model illustration"
            id="cssBoxImg">
    </figure>
<<<<<<< HEAD
    <!-- $ cssBoxContainer $ -->
    <div id="pagewidth">
        <!-- ^ id=pagewidth -->


        <div id="header" title="<?php
print $c_trim . ' of ' . $chopThis;
?> Header">
            <!--     ^   Begin Dynamic and SVG styled Header  ^   -->
            <object id="svgtitle" class="floatleft transparentback"
                title="Documents of <?php print $chopThis; ?> container" data="assets/css/masthead.php"
                type="image/svg+xml">
            </object>

        </div><!-- $ END Dynamic and SVG HTML node ID#header $ -->

        <div id="wrapper" class="unfloat">
            <!-- ^ id=wrapper ^ -->
            <div class="content" id="cookieData"></div>
        <div id="headrandom">
        <dl>
            <dt class="keyTerms pointer" id="jsaffect">View <span class="normal blue pointer" id="show_n01"
                    onclick="swap_text('show_n01','notes_01') ">[toggle img]</span>
            </dt>
            <dd id="notes_01" class="displaynone">
            <figure id="toggle-head"><?php echo '<img src="' . $randomImage . '" alt="Header Image" class="randomimage">'; ?><figcaption><?php echo $imageDirectory; ?></figcaption></figure>
            <div id="randomslide" class="">


    </div>
            </dd>
        </dl>
                <marquee id="news-ticker" behavior="scroll" direction="left" scrollamount="4"></marquee>
         
</div> <!-- //#headrandom -->
            <!-- div class="content" id="docLinks" style="z-index:9999 !important;"></div -->
