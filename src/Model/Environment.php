<?php

namespace P2u2\Model;

if(!defined('ADBLOCTN')){
    define('ADBLOCTN', NS2_ROOT);
}

class Environment
{

    public $initialize_enviornment;
    public $pathOps;

    public function __construct($pathOps = null)
    {

        if(!is_array($this->initialize_enviornment)){
            $this->initialize_enviornment = [];
        }
        if(isset($pathOps)){
            $this->pathOps = $pathOps;
        }
    }

    public function whatis($pathOps)
    {
        
        // toggle with a comment 
        // maybe you dont want to see errors today
        error_reporting(E_ALL);
        header('Access-Control-Allow-Origin: *');
        date_default_timezone_set('America/New_York');
        
        $this->initialize_enviornment['lastMod'] = $lastMod = 'Modified: ' . date('D M j Y G:i:s T', getlastmod());

        if (!empty($GLOBALS['_REQUEST']['path2url'])) {
            define('REQUESTURL', $GLOBALS['_REQUEST']['path2url']);
            $this->initialize_enviornment['REQUESTURL'] = REQUESTURL;
        }
        if (!defined('INSTALLED_LOCATION')) {
            define('INSTALLED_LOCATION', ADBLOCTN);
            $this->initialize_enviornment['INSTALLED_LOCATION'] = INSTALLED_LOCATION;
        }
        $this->initialize_enviornment['abspathtml'] = $abspathtml = INSTALLED_LOCATION;
        $this->initialize_enviornment['page_heading'] = $page_heading = 'Convert System Path to HTTP URL';
        if ($page_heading == '&#x201c;Simple Template&#x201d;') {
            $this->initialize_enviornment['real_page_heading'] = $real_page_heading = pathinfo(__FILE__, PATHINFO_FILENAME);
        } else {
            $this->initialize_enviornment['real_page_heading'] = $real_page_heading = $page_heading;
        }
        $this->initialize_enviornment['pathinfo_basename'] = $pathinfo_basename = pathinfo(__FILE__, PATHINFO_BASENAME);
        $this->initialize_enviornment['title_name'] = $title_name = pathinfo(__FILE__, PATHINFO_FILENAME);
        $this->initialize_enviornment['title'] = $title = INSTALLED_LOCATION . ' @ ' . $pathinfo_basename;
        $this->initialize_enviornment['REQUEST_SCHEME'] = $REQUEST_SCHEME = !empty($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'https';
        $this->initialize_enviornment['serversoftware'] = $serversoftware = $_SERVER['SERVER_SOFTWARE'];
        $this->initialize_enviornment['server_name'] = $server_name = $_SERVER['SERVER_NAME'] ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
        $this->initialize_enviornment['server_addr'] = $server_addr = $_SERVER['SERVER_ADDR'] ? $_SERVER['SERVER_ADDR'] : $_SERVER['SERVER_NAME'];
        $this->initialize_enviornment['servername'] = $servername = $server_name;
        if (preg_match('@::1|10\.0+\.0+\.\d+|192\.\d+\.\d+\.\d+|127\.\d+\.\d+\.\d+@', $server_addr)) {
            $this->initialize_enviornment['abspathtml'] = $abspathtml = '<code class="info">' . $abspathtml . '</code>';
        } else {
            $this->initialize_enviornment['abspathtml'] = $abspathtml = '<div class="info">Uses  PHP Variables like <code>define( INSTALLED_LOCATION , dirname(__FILE__))</code>. E.g. See ABSPATH in WordPress.</div>';
        }
        return $this->initialize_enviornment;
    }
}
