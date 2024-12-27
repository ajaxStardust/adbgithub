<?php

namespace Adb\Model;

use Adb\Controller\Navcontroller as Navcontroller;
use Adb\Model\Adbsoc as Adbsoc;
use Adb\Model\Auxx as Auxx;
use Adb\Model\Cwthumbs as Cwthumbs;
use Adb\Model\Iframe as Iframe;
use Adb\Model\Navfactor as Navfactor;
use Adb\Model\Urlprocessor as Urlprocessor;

if (!defined('ADBLOCTN')) {
    define('ADBLOCTN', dirname($_SERVER['SCRIPT_NAME']));
}

class Htmldochead
{
    public $adbloctn_trailing;
    public $Auxx_class;
    public $bodyid;
    public $buildUrl;
    public $chop_string;
    public $chop_trim;
    public $chopThis;
    public $chopUrl;
    public $config_file;
    public $config;
    public $csspath;
    public $Cwthumbs;
    public $data;
    public $defaultIframe;
    public $document_root;
    public $favicon;
    public $favtype;
    public $frameInfo;
    public $frameTitle;
    public $head_img_obj;
    public $http_header;
    public $mainFrame;
    public $Navfactor;
    public $one_image;
    public $pagetitle;
    public $path_components = [];
    public $path_lastbit;
    public $pathInfoBasename;
    public $rootCss;
    public $server_addr;
    public $server_name;
    public $server;
    public $servername;
    public $testPath;
    public $Urlprocessor;
    public $Adbsoc;
    public $pathOps;
    public $Adbsoc_class;
    public $whychop;
    public $components;

    public function __construct($pathOps)
    {
        if (!isset($pathOps)) {
            $this->pathOps = $pathOps = ADBLOCTN;
        } else {
            $this->pathOps = $pathOps;
        }
        if (!defined('WHATIS')) {
            $this->Adbsoc_class = new Adbsoc($pathOps);
        }

        $Navfactor = new Navfactor($pathOps);

        $this->Navfactor = $Navfactor->initializeVariables($pathOps);
        $this->Auxx_class = $Auxx = new Auxx($pathOps);
        // $this->path_components = $Auxx->get_components($pathOps);
/*
*         if (is_array($this->path_components)) {
            
                // $this->path_lastbit = end($this->path_components);
            
        } else {
            
            // $this->path_lastbit = $this->path_components;
        } *
*/


        $this->http_header = '';
        // $this->http_header = header('Access-Control-Allow-Origin: *');

        $this->adbloctn_trailing = ADBLOCTN . '/';
        $this->buildUrl = '';
        $default = ADBLOCTN;
        $this->rootCss = TRUE;
        $thispath = $default . 'public/assets/slidehow/';

        $this->Urlprocessor = new Urlprocessor($pathOps);
        $this->Cwthumbs = new Cwthumbs;
        $this->Cwthumbs->getImages($thispath);
        $chopThis = $this->Urlprocessor;
        $this->chopUrl = $chopThis->chopUrl();
        $this->chopThis = $chopThis;
        $pi = [
            'basename' => '', 'dirname' => '', 'extension' => '', 'filename' => ''
        ];
        if (is_array($pathOps)) {
			$pathOpsMerge = array_merge($pathOps, $pi);
            $pathOps = $pathOpsMerge['dirname'] . '/' . $pathOpsMerge['basename'];
        }
        if (file_exists(realpath($pathOps))) {
            $pifunc = pathinfo($pathOps);
        } else {
            $pifunc = pathinfo(ADBLOCTN);
        }
        $pi = array_merge($pi, $pifunc);
        $this->chop_string = $this->Urlprocessor->whychop;
        $Iframe_class = new Iframe;
        $this->components = $Iframe_class->Iframecomps;

        $pathInfoBasename = $pi['basename'];
        $pathInfoDirname = $pi['dirname'];
        $pathInfoExtension = $pi['extension'];
        $pathinfoFilename = $pi['filename'];
        $this->pathInfoBasename = $pathInfoBasename;

        $this->bodyid = $pathinfoFilename;

        /*
         * is the prev foreach loop necessary to get to "pathinfo(filename)"?
         * e.g. is "index" when filename is "index.php"
         */

        /*
         * note THE SAME INFO is avail in the following variables:
         * $adbloctn_trailing
         * $c_url
         * $pathinfoDirname
         * $pi[dirname]
         * $Urlprocessor->chop_url
         * ADBLOCTN
         */

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
            if (empty($this->favicon)) {
                $this->favicon = 'favicon.ico';
                $this->favtype = 'image/ico';
            }
        }
    }

    // Example usage

    public function doctypeHead()
    {
        include 'public/views/html-doctype-head.page.php';
        include 'public/views/html-body-top.page.php';
    }  // end doctypeHtmlHead

    public function bodySections()
    {
        include 'public/views/html-main.page.php';
        include 'public/views/html-footer.page.php';
    }
}