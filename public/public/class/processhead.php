<?php

namespace Bbadb\public\class;

class ProcessHead
{
    public $p2upath;
    public $http_header;
    public $time_zone;
    public $lastMod;
    public $request_url;
    public $adbloctn_defined;
    public $html_heading;
    public $html_title;
    public $html_filename;
    public $serversoftware;
    public $servername;
    public $server_addr;
    
    public $request_scheme;
    public $pi_bn;
    

    public function __construct()
    {
        
        $this->http_header = header('Access-Control-Allow-Origin: *');

        $this->time_zone = date_default_timezone_set('America/New_York');
        $this->lastMod = 'Modified: ' . date('D M j Y G:i:s T', getlastmod());
        if (!empty($GLOBALS['_REQUEST']['path2url'])) {
            define('REQUESTURL', $GLOBALS['_REQUEST']['path2url']);
            $this->request_url = REQUESTURL;
        }
        if (!defined('ADBLOCTN')) {
            define('ADBLOCTN', dirname(__FILE__));
        }
        $this->p2upath = ADBLOCTN;
        $page_heading = 'Convert System Path to HTTP URL';
        if ($page_heading == '&#x201c;Simple Template&#x201d;') {
            $real_page_heading = pathinfo(__FILE__, PATHINFO_FILENAME);
        } else {
            $real_page_heading = $page_heading;
        }
        $this->html_heading = $real_page_heading;
        $pathinfo_basename = pathinfo(__FILE__, PATHINFO_BASENAME);
        $title_name = pathinfo(__FILE__, PATHINFO_FILENAME);
        $this->html_filename = $title_name;
        $title = ADBLOCTN . ' @ ' . $pathinfo_basename;
        $this->html_title = $title;
        $this->request_scheme = !empty($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'https';

        $this->serversoftware = $_SERVER['SERVER_SOFTWARE'];
        $server_name = $_SERVER['SERVER_NAME'] ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
        $this->server_addr = $_SERVER['SERVER_ADDR'] ? $_SERVER['SERVER_ADDR'] : $_SERVER['SERVER_NAME'];
        $this->servername = $server_name;
    }
}
