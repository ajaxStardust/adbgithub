<?php

namespace Bbadb\public\class;

use Bbadb\public\class\CwThumbs as CwThumbs;
use Bbadb\public\class\UrlChopper as UrlChopper;


/* $head_img_obj = new CwThumbs;
$cwThumbs = new CwThumbs; */

/**
 * @depends
 *  ./class/class-urlchopper.php
 *  ./css/style.css.php
 */

/**
 * add 45 secs to default of 30 = 75 secs if invoked
 * set_time_limit(45);
 */

/** @TODO CSSPATH concept introduced here but never embellished */
if (!defined('ADBLOCTN')) {
    define('ADBLOCTN', dirname($_SERVER['SCRIPT_NAME']));
}

class HtmlDocHead
{
    public $adbloctn_trailing;
    public $bodyid;
    public $buildUrl;
    public $chop_trim;
    public $chopThis;
    public $chop_string;
    public $csspath;
    public $chopUrl;
    public $config;
    public $config_file;
    public $cwThumbs;
    public $defaultIframe;
    public $favicon;
    public $favtype;
    public $head_img_obj;
    public $http_header;
    public $one_image;
    public $pagetitle;
    public $rootCss;
    public $server_addr;
    public $server_name;
    public $servername;
    public $testPath;
    public $url_chopper;
    public $jsonFile;
    public $jsonData;
    public $data;
    public $frameInfo;
    public $frameTitle;
    
    

    public function __construct($passpath)
    {
        $this->http_header = header('Access-Control-Allow-Origin: *');
        $this->adbloctn_trailing  = ADBLOCTN . '/';
        $this->buildUrl = '';
        $default = ADBLOCTN;
        $this->rootCss = TRUE;
        $thispath = $passpath . '/assets/slidehow/';
        if (!defined('CSS')) {
            if (isset($this->rootCss) == TRUE) {
                if (file_exists($this->adbloctn_trailing . 'assets/css/style.css')) {
                    define('CSS', $this->adbloctn_trailing . 'assets/css/style.css');
                    define('CSSPATH', $this->adbloctn_trailing . 'assets/css/');
                    define('ASSETSPATH', $this->adbloctn_trailing . 'assets/');
                    /* we dont need the $depthString offset for the defined vars */
                }
            } else {
                if (file_exists('assets/css/style.css')) {
                    define('CSS', 'assets/css/style.css');
                    define('CSSPATH', 'assets/css/');
                }
            }
        }

        $this->url_chopper = new UrlChopper($passpath);
        $this->cwThumbs = new CwThumbs;
        $chopThis = $this->url_chopper;
        $this->chopUrl = $this->url_chopper->chopUrl();
        $this->chopThis = $chopThis;
        $pi = [
            'basename' => '', 'dirname' => '', 'extension' => '', 'filename' => ''
        ];
        $pifunc = pathinfo(ADBLOCTN);
        $pi = array_merge($pi,$pifunc);
        $this->chop_string = $chopThis->chop_url;
        $this->chop_trim = $chopThis->chop_trim;
        

        $pathInfoBasename = $pi['basename'];
        $pathInfoDirname = $pi['dirname'];
        $pathInfoExtension = $pi['extension'];
        $pathinfoFilename = $pi['filename'];

        $this->bodyid = $pathinfoFilename;

        /*
         * is the prev foreach loop necessary to get to "pathinfo(filename)"?
         * e.g. is "index" when filename is "index.php"
         */

        if (isset($_SERVER['HTTP_HOST'])) {
            $server_name = $_SERVER['HTTP_HOST'];
        } else {
            $server_name = 'other.mxuni';
        }
        $serverUrl = 'https://' . $server_name;
        // $adbloctn_trailing = $serverUrl . '/' . $this->chopThis;
        $this->buildUrl = str_ireplace($chopThis->chop_url,'',$passpath);
        $currentUrlPath = $serverUrl . $this->buildUrl;

        /*
         * note THE SAME INFO is avail in the following variables:
         * $adbloctn_trailing
         * $c_url
         * $pathinfoDirname
         * $pi[dirname]
         * $url_chopper->chop_url
         * ADBLOCTN
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

        /**
         * TODO - figure a way to determine whether depthstring is required or harmful
         *  = str_replace($depthString, '', substr($depthString, 1, 2));
         */

        //  = $depthString;

        if (file_exists(ADBLOCTN . '/favicon.ico')) {
            $this->favicon = 'favicon.ico';
            $this->favtype = 'image/ico';
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
                        $this->favicon = $testFavicon;
                        $this->favtype = 'image/' . $thisIconExtn;
                    }
                }
            }
            if (empty($favicon)) {
                $this->favicon = 'favicon.ico';
                $this->favtype = 'image/ico';
            }
        }
    }

    public function updateUrlCount($url)
    {
        // Read JSON file
        $jsonFile = $_SERVER['DOCUMENT_ROOT'] . '/config.json';
        if(file_exists($jsonFile)){
            $this->jsonFile = $jsonFile;
            $this->config = file_get_contents($jsonFile);
        }
        
        
        $this->jsonData = file_get_contents($jsonFile);
        $jsonData = $this->jsonData;
        $this->data = json_decode($jsonData, true);
        $this->config =$this->data;
        $data = $this->data;

        // Find the URL in the JSON data and update its count
        $found = false;
        foreach ($data['home_urls'] as &$entry) {
            if ($entry['url'] === $url) {
                $entry['count']++;
                $found = true;
                break;
            }
        }

        // Save updated JSON data back to file
        if ($found) {
            $updatedJson = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($jsonFile, $updatedJson);
            return "Accessed $url. New count is {$entry['count']}.";
        } else {
            return "URL $url not found in JSON file.";
        }
    }


    public function saveConfig()
    {
        $configurationFile = $this->config_file;
        $configurationData = json_encode($this->config, JSON_PRETTY_PRINT);
        file_put_contents($configurationFile, $configurationData);

     }


    // Example usage

    public function mainFrame()
    {
        /**
         * @logic ( iframe src=??? )`
         *    :if   HTTP_REQUEST param "path2url" exists then src=urlpatchcheck.phtml
         *    :else test for match on various common web dir index filenames
         * ~~~~~~~~~~~~~~~~~~~~~~~~~~
         *  @var defaultIframe stri`ng:
         *      assign a value for iframe src attribute
         */
        $this->defaultIframe = '';
        if (isset($_GET['path2url'])) {
            $this->defaultIframe = './p2u2.phtml?path2url=' . $_GET['path2url'];
        } else {
            /*
             * *  @var defaultFrameArray array
             * *      array of strings containing various common web directory index filenames
             * *  #NOTE# Add any file names here you wish to load by default. The further
             * *  toward the end of the array (i.e. currently, default.html), the greater
             * *  the priority.
             */
            $defaultFrameArray = array(
                'default.phtml',
                'Overview.html',
                'Overview.htm',
                'default.htm',
                'toc.html',
                'toc.htm',
                'index.htm',
                'index.html',
                'readme.txt',
                'readme.md',
                'default.html',
                'db_admin.phtml',
                'graphic_design.php',
                'path2url.phtml',
                'p2u2.phtml',
                'index.html',
                'tree.html',
            );

            foreach ($defaultFrameArray as $thisIframe) {
                if (file_exists($thisIframe)) {
                    $this->defaultIframe = $thisIframe;
                }
                else {
                    $this->defaultIframe = 'p2u2.phtml';
                }
            }
        }

        $this->frameInfo = pathinfo($this->defaultIframe);
        $frameInfo = $this->frameInfo;
        $this->frameTitle = $frameInfo['filename'];
        $frameTitle = $this->frameTitle;
        /* create the string for the iFrame title */

        if (isset($this->chopThis) && strlen($this->chopUrl) > 1) {
            $this->pagetitle = $this->server_name . '/' . $this->chopThis . '/' . $this->chop_trim;
        } else {
            $this->pagetitle = $this->server_name . '/' . $this->chop_trim;
        }

        // new random image play
        // Directory containing header images

        $randomnumber = rand(0, 2);
        if ($randomnumber == 1) {
            $imageDirectory = 'assets/screenshots/';
        } elseif ($randomnumber == 2) {
            $imageDirectory = 'assets/slideshow/';
        } else {
            $imageDirectory = 'assets/screenshots/';
        }

        // Get all files in the directory
        $files = glob($imageDirectory . '/*');

        // Select a random image file
        $randomImage = array_rand($files);

        // Output the image

        /* END PHP and begin HTML for document head */
    }

    public function doctypeHead()
    {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $this->pagetitle; ?></title>

    <meta charset="UTF-8">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="assets/css/emeyereset.css" media="all">


    <link rel="icon" type="<?= $this->favtype; ?>" href="<?= $this->favicon; ?>">
    <link rel="shortcut icon" type="<?= $this->favtype; ?>" href="<?= $this->favicon; ?>">



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
        display: inline-block;
        max-width: 1024;
        max-height: 768;
    }

    #jsaffect {

        display: inline-block;
        flex-direction: unset;
        border: 0.01rem solid #7fd5ff;
        

    }
    body {
        background-color:#f5f5f5;
    }
    -->
    </style>

    <!-- SPECTRE CSS -->
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <!-- SPECTRE CSS may be a lightweight tailwind -->
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
        require ADBLOCTN . '/assets/css/style.css.php';

    ?>
    <link id="unlockFrame" rel="stylesheet" type="text/css" href="assets/css/unlockframe.css" media="screen">
    <link id="style_main" rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
    <!-- ajaxStardust style_main anniedebrowsa -->
    <script type="text/javascript" src="./assets/js/accessories.js">
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

                $('#news-ticker').text(random_variable_name + ': ' + random_variable.description +
                    ' (Used for: ' + random_variable.used_for + ')');
            });
        }

        // Update the news ticker every 5 seconds
        updateNewsTicker();
        setInterval(updateNewsTicker, 5000); // Change interval as needed
    });
    </script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
    .material-symbols-outlined {
        font-variation-settings:
            'FILL'0,
            'wght'400,
            'GRAD'0,
            'opsz'24
    }
    </style>

</head>
<?php
    }  // end doctypeHtmlHead

    public function bodySections()
    {
?>

<body id="<?= $this->bodyid; ?>" style="background-color:#f5f5f5">
    <figure id="cssBox_Target" class="target displaynone">
        <!-- ^ cssBoxContainer ^ -->
        <img src="assets/css/css-box_novicenotes-dot-net_transp.png" alt="CSS Box-model illustration" id="cssBoxImg">
    </figure>
    <!-- $ cssBoxContainer $ -->
    <div id="pagewidth" style="background-color:#f5f5f5">
        <!-- ^ id=pagewidth -->


        <div id="header" title="<?php
        print $this->chop_trim . ' of ' . $this->chopThis;
?> Header">
            <!--     ^   Begin Dynamic and SVG styled Header  ^   -->
            <object id="svgtitle" class="floatleft transparentback"
                title="Documents of <?= $this->chopThis; ?> container" data="assets/css/masthead.php"
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
                        <figure id="toggle-head">
                            <?php echo '<img src="unknown"' /* $randomImage  */. '" alt="Header Image" class="randomimage">'; ?>
                            <figcaption>caption <!-- ?= /* $imageDirectory; */ ? --></figcaption>
                        </figure>
                        <div id="randomslide" class="">


                        </div>
                    </dd>
                </dl>
                <marquee id="news-ticker" behavior="scroll" direction="left" scrollamount="4"></marquee>

            </div> <!-- //#headrandom -->
            <!-- div class="content" id="docLinks" style="z-index:9999 !important;"></div -->

            <?php
    }
}

// require_once 'public/inc/nav.inc.php';
