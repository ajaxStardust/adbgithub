<?php
namespace Bbadb\public\class;

use Bbadb\public\class\HtmlDocHead;

class UpdateJson {

    private $config_file;

    public function __construct($configFilePath) {
        $this->config_file = $configFilePath;
    }

    public function updateCount() {
        if (isset($_POST['url'])) {
            $url = $_POST['url'];
            $htmlDocHead = new HtmlDocHead($this->config_file);
            $htmlDocHead->updateUrlCount($url);
            $htmlDocHead->saveConfig();
            return json_encode(['status' => 'success']);
        } else {
            return json_encode(['status' => 'error', 'message' => 'No URL provided']);
        }
    }
}
?>