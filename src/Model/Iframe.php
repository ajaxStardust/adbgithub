<?php

namespace Adb\Model;

class Iframe
{
    public $Iframecomps;

    public $defaultIframe;

    public $frameInfo;

    public $frameTitle;

    public $chopUrl;

    public $server_name;

    public $pagetitle;

    public $chop_trim;

    public function mainFrame()
    {
        /**
         * @logic ( iframe src=??? )`
         *    :if   HTTP_REQUEST param "path2url" exists then src=urlpatchcheck.phtml
         *    :else test for match on various common web dir index filenames
         * ~~~~~~~~~~~~~~~~~~~~~~~~~~
         *  @param ->defaultIframe stri`ng:
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
                'index.phtml',
                'p2u2.phtml',
                'tree.html',
                'https://bunsen/p2u2.phhtml'
            );

            foreach ($defaultFrameArray as $thisIframe) {
                $testFrame = ADBLOCTN . '/' . $thisIframe;
                if (file_exists($testFrame)) {
                    $this->defaultIframe = $testFrame;
                    break;
                }
            }
            if (!file_exists($this->defaultIframe)) {
                $this->defaultIframe = 'https://bunsen/p2u2.phhtml';
            }
        }

        $this->frameInfo = pathinfo($this->defaultIframe);
        $frameInfo = $this->frameInfo;
        $this->frameTitle = $frameInfo['filename'];
        $frameTitle = $this->frameTitle;
        /* create the string for the iFrame title */

        if (isset($this->chopUrl) && strlen($this->chopUrl) > 1) {
            $this->pagetitle = $this->server_name . '/' . $this->chopUrl . '/' . $this->chop_trim;
        } else {
            $this->pagetitle = $this->server_name . '/' . $this->chop_trim;
        }
        $this->Iframecomps = [
            'pagetitle' => $this->pagetitle,
            'frameTitle' => $frameTitle,
            'frameInfo' => $frameInfo,
            'chopUrl' => $this->chopUrl,
            'chop_trim' => $this->chop_trim,
            'defaultIframe' => $this->defaultIframe,
            'server_name' => $this->server_name,
        ];

        return $this->defaultIframe;
    }

    // new random image play
    // Directory containing header images

    public function randomImage()
    {
        $randomnumber = rand(0, 2);
        if (is_dir(ADBLOCTN . '/assets/')) {
            $dynamic_imgage_dir = ADBLOCTN . '/assets/';
            switch ($randomnumber) {
                case ($randomnumber == 1):
                    $imageDirectory = $dynamic_imgage_dir . 'screenshots/';
                    break;
                case ($randomnumber == 2):
                    $imageDirectory = $dynamic_imgage_dir . 'slideshow/';
                    break;
                default:
                    $imageDirectory = $dynamic_imgage_dir . 'screenshots/';
                    break;
            }
        }

        $globDir = $imageDirectory . '*';
        // Get all files in the directory
        $files = glob($globDir);

        // Select a random image file
        if (is_array($files)) {
            $randomImage = array_rand($files);
        }

        // Output the image

        /* END PHP and begin HTML for document head */
    }
}
