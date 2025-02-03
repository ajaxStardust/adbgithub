<?php

namespace Adb\Model;

class Environmentmanager  {
    private $default_tz;
    private $server;
    private $document_root;

    public function __construct() {
        $this->default_tz = date_default_timezone_set('America/New_York');
        $this->server = $_SERVER;
        $this->document_root = $_SERVER['DOCUMENT_ROOT'] ?? null;
    }

    public function getDefaultTimezone() {
        return $this->default_tz;
    }

    public function getServer() {
        return $this->server;
    }

    public function getDocumentRoot() {
        if (!isset($this->document_root)) {
            $docroot = str_ireplace('@/var/www', '', $this->server['SCRIPT_NAME']);
            preg_match('@[x2f][^x2f]+@', $docroot, $matches);
            $docroot = '/var/www' . $matches[1];
            $this->document_root = $docroot;
        }
        return $this->document_root;
    }
}