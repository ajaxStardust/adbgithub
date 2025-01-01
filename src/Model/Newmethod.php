<?php

namespace P2u2\Model;

use P2u2\Model\P2u2;

class Newmethod
{

    public $_construct_NewMethod;
    public $pathPassed;

    public function __construct($pathPassed = null)
    {
        if (!is_array($this->_construct_NewMethod)) {
            $this->_construct_NewMethod = [];
        }
        if (!empty($pathPassed)) {
            $this->pathPassed = $pathPassed;
        } else {
            $this->pathPassed = INSTALLED_LOCATION;
        }
    }

    public function buildUrl($enterpathhere = null)
    {
        $P2 = new P2u2($enterpathhere);
        if (!isset($_dynamichost)) {
            $_dynamichost = $_SERVER['HTTP_HOST'];
        }
        if (!isset($enterpathhere)) {
            $this->_construct_NewMethod['enterpathhere'] = $enterpathhere = isset($_GET['path2url']) ? $_GET['path2url'] : $_SERVER['DOCUMENT_ROOT'];
        }
        $this->_construct_NewMethod['_dynamichost'] = $_dynamichost ??= 'localhost';
        $this->_construct_NewMethod['prep_extract_path'] = $prep_extract_path = $P2->clean_url_chars($enterpathhere)['url_2_convert'];
        $this->_construct_NewMethod['extracted_components'] = $extracted_components = $P2->extract_path_components($prep_extract_path);
        $this->_construct_NewMethod['new_url_concat'] = $new_url_concat = '';
        $this->_construct_NewMethod['extracted_comps_html'] = '<br>extracted_components[html]: ' . $extracted_components['html'];
        $this->_construct_NewMethod['feloop'] = $feloop = 0;
        $this->_construct_NewMethod['_dynamichost'] = $_dynamichost = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_dynamichost;
        foreach ($extracted_components as $nUrlKey => $nUrlVal) {

            if (!$nUrlKey == 'component') {

                $this->_construct_NewMethod['nurlLoop'] =         $nurlLoop = '<br>counting values of nUrlVal (key n val, if is array):<br>';
                if (is_array($nUrlVal)) {
                    foreach ($nUrlVal as $this_key => $this_component) {
                        $this->_construct_NewMethod['this_component'] = $this_component;
                        $this->_construct_NewMethod['nurlLoop'] = $nurlLoop .= 'this_component: ' . $this_component . '<br>';
                        if (preg_match('/\w:/', $this_component)) {
                            $this->_construct_NewMethod['tc']               = $tc = $this_component;

                            $this->_construct_NewMethod['_dynamichost']     = $_dynamichost ??= 'mxuni';
                            $this->_construct_NewMethod['new_url_concat']   = $new_url_concat .= '/' . $this_component . '/';
                        } elseif ($this_key < 2) {
                            $this->_construct_NewMethod['tc']               = $tc = $this_component;
                            $this->_construct_NewMethod['_dynamichost']     = $_dynamichost ??= 'mxuni';

                            $this->_construct_NewMethod['new_url_concat']   = $new_url_concat .= '/' . $this_component . '/';
                            break;
                        }
                        if ($this_key > 2) {
                            $this->_construct_NewMethod['tc']               = $tc = $this_component;
                            $this->_construct_NewMethod['new_url_concat']   =     $new_url_concat .= '/' . $this->_construct_NewMethod['this_component']  . '/';
                        }
                    }
                } elseif (isset($nUrlVal)) {

                    $this->_construct_NewMethod['urlConcatArray']           = $urlConcatArray = [];
                    if ($feloop < 1) {
                        $this->_construct_NewMethod['urlConcatArray'][]       = $urlConcatArray[] = $this->_construct_NewMethod['this_component'] ;
                        $this->_construct_NewMethod['nurlLoop']             = $nurlLoop .= '<br>nUrlVal: @' . __LINE__ . ' == ' . $nUrlVal . ' is concat to new_url_concat.';
                        $this->_construct_NewMethod['new_url_concat']       = $new_url_concat .= $nUrlVal;
                    } else {
                        $this->_construct_NewMethod['nurlLoop']             = $nurlLoop .=  '<br>nUrlVal: @' . __LINE__ . ' == ' . $nUrlVal . ' is concat to new_url_concat.';
                        $this->_construct_NewMethod['urlConcatArray'][]       = $urlConcatArray[] = $nUrlVal['url_2_convert'];
                        //$get_comp = count($nUrlVal) -1;
                        $this->_construct_NewMethod['new_url_concat']       = $new_url_concat .= $nUrlVal;
                    }
                }
            }
            $this->_construct_NewMethod['feloop'] = $feloop++;
        }
        return $this->_construct_NewMethod;
    }

    public function buildUrlLast($pathPassed)
    {
        $new_url_concat = $pathPassed;
        if (!isset($_dynamichost)) {
            $_dynamichost = $_SERVER['HTTP_HOST'];
            $tc = $this->_construct_NewMethod['component'];
        }
        
        $nurlLoop = $this->_construct_NewMethod["extracted_comps_html"];
        $new_url_concat = rtrim($new_url_concat, '/');
        
        $this->_construct_NewMethod['new_url_concat'] = str_ireplace('/var/www/wsldebian/', '', $new_url_concat);
        $nurlLoop = $nurlLoop . '<p>new_url_concat: ' . $new_url_concat . '</p>
    <p>New URL Construct:<br> _SERVER[REQUEST_SCHEME] . :// . _SERVER[HTTP_HOST] . new_url_concat ==</p>
    <p><a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_dynamichost . '/' . $this->_construct_NewMethod['new_url_concat'] . '" target="_blank">'
            . $_SERVER['REQUEST_SCHEME'] . '://' . $_dynamichost . '/' . $this->_construct_NewMethod['new_url_concat']  . '</a></p>
    </div>';
        $this->_construct_NewMethod['nurlLoop'] = $nurlLoop;

        return $this->_construct_NewMethod;
    }
}
