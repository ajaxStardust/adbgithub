<?php
namespace Adb\Model;
use Adb\Model\Helpers as Helpers;

class Jsonconfigmanager extends Helpers
{
    private $config;
    private $jsonFile;

    public function __construct()
    {
        if (!$this->config) {
            $this->jsonFile = $_SERVER['DOCUMENT_ROOT'] . '/giterator/config.json';
            if (file_exists($this->jsonFile)) {
                $this->config = json_decode(file_get_contents($this->jsonFile), true);
            }
            elseif(file_exists('../config.json')){
                $this->config = json_decode(file_get_contents('../config.json'), true);                
            }else{
                $this->config = json_decode(file_get_contents('https://statecollegeguitarlessons.com/giterator/config.json'), true);
            }
        }
        
    }

    public function loadConfig()
    {
        return $this->config;
    }

    public function saveConfig($data)
    {
        $this->config = $data;
        file_put_contents($this->jsonFile, json_encode($this->config, JSON_PRETTY_PRINT));
    }

    public function updateUrlCount($url)
    {
        if (isset($this->config['home_urls'])) {
            foreach ($this->config['home_urls'] as &$entry) {
                if ($entry['url'] === $url) {
                    $entry['count']++;
                    $this->saveConfig($this->config);
                    return "Accessed $url. New count is {$entry['count']}.";
                }
            }
        }
        return "URL $url not found in JSON file.";
    }
}
