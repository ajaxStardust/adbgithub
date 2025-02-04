<?php

namespace Adb\Model;

use Adb\Model\Htmldochead as Htmldochead;
use Adb\Model\UrlChopper as UC;


if (!defined('ADBLOCTN')) {
    define('ADBLOCTN', dirname($_SERVER['SCRIPT_FILENAME']));
}

class HtmlDocFoot
{
    public $uc;  // instatce of urlchop
    public $Htmldochead;  // INSTANCE OF Htmldochead
    public $html_footer;
    public $class_adbloctn;
    public $class_assets;
    public $makeHtml;

    public function __construct()
    {
        // $this->uc = new UC($pathOps);
        // $this->Htmldochead_class= new Htmldochead($pathOps);
    }

    public function initializeVariables()
    {
        // $this->class_adbloctn = ADBLOCTN;
        // $this->class_assets = ASSETSPATH;
    }

    public function pageFooter()
    {
        $this->html_footer = '';
        $this->html_footer .= '<div id="footer">';
        $this->html_footer .= '<div id="footer-content">';

        $this->html_footer .= '</div>
        </div>
        <script type="text/javascript" src="./assets/js/showme-hideme.js"></script>
        <script type="text/javascript" src="./assets/js/accessories.js"></script>
        </body>
        </html>';
        // require 'public/views/html-footer.page.php';

        return $this->html_footer;
    }
}
