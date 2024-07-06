<?php

namespace Bbadb\public\class;

class AdbSoc
{
	public $error_reporting;
	public $header;
	public $default_tz;
	public $last_mod;
	public $abspath;
	public $page_heading;
	public $real_page_heading;
	public $pathinfo_basename;
	public $title_name;
	public $title;
	public $REQUEST_SCHEME;
	public $serversoftware;
	public $server_name;
	public $server_addr;
	public $servername;



	public function __construct()
	{
		$this->error_reporting = error_reporting(E_ALL);
		$this->header = header('Access-Control-Allow-Origin: *');
		$this->default_tz = date_default_timezone_set('America/New_York');

		$this->last_mod = 'Modified: ' . date('D M j Y G:i:s T', getlastmod());
		if (!empty($GLOBALS['_REQUEST']['path2url'])) {
			define('REQUESTURL', $GLOBALS['_REQUEST']['path2url']);
		}
		if (!defined('ADBLOCTN')) {
			define('ADBLOCTN', dirname(__FILE__));
		}
		$this->abspath = ADBLOCTN;
		$this->page_heading = 'Convert System Path to HTTP URL';
		if ($this->page_heading == '&#x201c;Simple Template&#x201d;') {
			$this->real_page_heading = pathinfo(__FILE__, PATHINFO_FILENAME);
		} else {
			$this->real_page_heading = $this->page_heading;
		}
		$this->pathinfo_basename = pathinfo(__FILE__, PATHINFO_BASENAME);
		$this->title_name = pathinfo(__FILE__, PATHINFO_FILENAME);
		$this->title = ADBLOCTN . ' @ ' . $this->pathinfo_basename;
		$this->REQUEST_SCHEME = !empty($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'https';

		$this->serversoftware = $_SERVER['SERVER_SOFTWARE'];
		$this->server_name = $_SERVER['SERVER_NAME'] ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
		$this->server_addr = $_SERVER['SERVER_ADDR'] ? $_SERVER['SERVER_ADDR'] : $_SERVER['SERVER_NAME'];
		$this->servername = $this->server_name;
		if (preg_match('@::1|10\.0\.0\.\d+|192\.\d\.\d\.\d+|127\.\d\.\d\.\d+@', $this->server_addr)) {
			$this->abspath = '<code class="info">' . $this->abspath . '</code>';
		} else {
			$this->abspath = '<div class="info">Uses  PHP Variables like <code>define( ADBLOCTN , dirname(__FILE__))</code>. E.g. See ABSPATH in WordPress.</div>';
		}

		return $this;
	}
}
