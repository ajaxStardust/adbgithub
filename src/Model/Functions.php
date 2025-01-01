<?php

namespace P2u2\Model;

// use P2u2\Model\Cwthumbs as Cwthumbs;

class Functions
{
    public $_constructed;

    public function __construct()
    {
        if(!is_array($this->_constructed)){
        $this->_constructed = [];
    }
    }

    public function proces_thumbs()
    {
        $CwthumbsClass = new Cwthumbs;

        if (isset($_POST['imgDirSearch'])) {
            $newimagesdir = $_POST['imgDirSearch'];
            if (is_dir($newimagesdir)) {
                $Cwthumbs = $CwthumbsClass->getImages($newimagesdir);
                $number_of = count($Cwthumbs);
                $notice_of_images = "<h4>Success:</h4><p>Found $number_of images.</p>";
            } else {
                $Cwthumbs = $CwthumbsClass->getImages('assets/images/vscode');
                $notice_of_images = '<h4>Notice:</h4><p>The directory you entered is not a valid path.</p>';
            }
        } else {
            $Cwthumbs = $CwthumbsClass->getImages('assets/images/vscode');
            $number_of = count($Cwthumbs);
            $notice_of_images = "<h4>Info:</h4><p>Found $number_of screenshots.</p>";
        }
        $imgDir = $CwthumbsClass->imagesDir;
        $imgNumber = $CwthumbsClass->thumbsCount;
        
    }

    /*
     * filter_path()
     */

    public function filter_path($url, $servername, $server_addr)
    {
        $filtered_path['url'] = $url;
        $filtered_path['servername'] = $servername;
        $filtered_path['server_addr'] = $server_addr;
        $filtered_path['servername'] = !empty($filtered_path['servername']) ? $filtered_path['servername'] : $filtered_path['server_addr'];
        return $filtered_path['servername'];
    }

    public function process_goup()
    {
        $nav_pathInfo = pathinfo(__FILE__, PATHINFO_ALL);
        $goUp = [];
        $goUp['subject'] = dirname(__DIR__,2);
        $goUp['replace'] = '';
        $goUp['search'] = '@^(.*(/)(?=.*))@';
        $goUp['result'] = preg_replace($goUp['search'], $goUp['replace'], $goUp['subject']);
        $goUp['url'] = str_ireplace($goUp['result'], $goUp['replace'], $goUp['subject']);
        $goUp['url'] = preg_replace('/([^\/]+\/)+([^\/]+)/', '$2', $goUp['url']);

        $goUp['depth'] = substr_count($goUp['subject'], '/');

        return $goUp;
    }
}
