<?php

namespace P2u2\Model;

class P2u2
{

    public $pathPassed;
    public $clean_chars;
    public $path_comps;
    public $component_path;

    public $p2_patches;
    
    
    
    public function __construct($pathPassed = null)
    {
        if ($pathPassed == null) {
            $pathPassed = ADBLOCTN;
        }
        $this->pathPassed = $pathPassed;
    }

    public function extract_path_components($url = null)
    {
        $this->component_path = $url;
        if(!is_array($this->path_comps)){
        $this->path_comps = [];
        }
        // $this->path_comps['matches'] = [];
        $this->path_comps['html'] = (string) '';

        $this->path_comps['pattern'] = '/(?:^|\/)([^\/]+)/';
        if (is_array($this->component_path)) {
            preg_match_all($this->path_comps['pattern'], $this->component_path['url_2_convert'], $matches_lvl1);
            //$loop_num = count($this->component_path);
            
            
            //for ($loop = 0; $loop < $loop_num; $loop++) {

                // foreach($this->component_path as $uKey => $uVal){
                // $loop_print = $loop + 1;
              /*  $this->path_comps['html'] .= '<div id="p2u2loop">
                <h3>Loop #' . $loop_print . '</h3>
                 <ol>
                 <li>this->component_path[input_sting]: ' . $this->component_path['input_string'] . '</li>
                 <li>this->component_path[url_2_convert]): ' . $this->component_path['url_2_convert'] . '</li>'; */
                
                
                $this->path_comps['matches'] = $matches_lvl1[1];
                $this->path_comps['count'] = count($this->path_comps['matches']);
               //  echo '<p>match_count: '.$match_count.' - '. $this->path_comps['matches']. '</p>';
                
                    // echo '<br>matches_count: '.$match_count;
                    // echo '<br>var_dump(matches): '.var_dump($matches_lvl1);
                 //   break (1);
                
            //    echo '<br>var_dump(matches): '.var_dump($matches_lvl1);
                // }
            //}
            //$this->path_comps['html'] .= '</ul></div><!-- END P2URL loop 2024 -->';
        }
        if(!is_array($this->p2_patches)){
            $this->p2_patches = $this->path_comps['matches'];
        }

        return $this->path_comps;
    }

    public function clean_url_chars($url_2_convert)
    {
        if(!is_array($this->clean_chars)){
            $this->clean_chars = [];
        }
        $this->clean_chars['input_string'] = $url_2_convert;
        $this->clean_chars['url_2_convert'] = $this->clean_chars['input_string'];
        $this->clean_chars['url_2_convert'] = str_ireplace('ftp(4000):', '', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = str_ireplace('file://', '', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = str_ireplace('wsl.localhost\Debian', '', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = str_ireplace('wsl.localhost\kali-rolling', '', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = str_ireplace('wsl.localhost\[DistroName]', '', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = preg_replace('@([\x5c\x2f]+)@', '/', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = preg_replace('/"/', '', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = preg_replace('/ /', '%20', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = rtrim($this->clean_chars['url_2_convert']);
        if (preg_match('/\/mxuni\/www\/([^\/]+)\//', $this->clean_chars['url_2_convert'], $matches)) {
            $this->clean_chars['server_name'] = 'mxuni';  // Default server name
            $this->clean_chars['third_level_dir'] = $matches[1];
            $this->clean_chars['full_server_name'] = (
                $this->clean_chars['third_level_dir'] !== $this->clean_chars['server_name']
            ) ? $this->clean_chars['third_level_dir'] . '.' . $this->clean_chars['server_name'] : $this->clean_chars['server_name'];
            // Extract the filename
            $this->clean_chars['basename'] = basename($this->clean_chars['url_2_convert']);
            $this->clean_chars['url_converted'] = $this->clean_chars['full_server_name'] . '/' . $this->clean_chars['basename'];
            // Construct the processed URL
            $this->clean_chars['processed_url'] = '/' . $this->clean_chars['full_server_name'] . '/' . $this->clean_chars['basename'];
            $this->clean_chars['url_2_convert'] = $this->clean_chars['processed_url'];
        }

        $this->clean_chars['config_file'] = '/var/www/mxuni/config.json';
        $this->clean_chars['config_data'] = file_get_contents($this->clean_chars['config_file']);
        $this->clean_chars['config_data'] = json_decode($this->clean_chars['config_data']);
        $this->clean_chars['config_data'] = json_encode($this->clean_chars['config_data']);

        $fes = 0;
        if (is_array($this->clean_chars['config_data'])) {
            foreach ($this->clean_chars['config_data'] as $server => $data) {
                $pattern = str_replace('\\', '\\\\', $data);  // Escape backslashes for regex
                if (preg_match('@' . $pattern . '\/([^\/]+)@', $this->clean_chars['url_2_convert'], $matches)) {
                    $this->clean_chars['server_name'] = $server[$fes];
                    $this->clean_chars['third_level_dir'] = $matches[1];
                    $this->clean_chars['full_server_name'] = ($this->clean_chars['third_level_dir'] !== $this->clean_chars['server_name']) ? $this->clean_chars['third_level_dir'] . '.' . $this->clean_chars['server_name'] : $this->clean_chars['server_name'];
                    // Extract the filename and construct the processed URL
                    $this->clean_chars['basename'] = basename($this->clean_chars['url_2_convert']);
                    $this->clean_chars['processed_url'] = 'https://' . $this->clean_chars['full_server_name'] . '/' . $this->clean_chars['basename'];
                    $this->clean_chars['url_2_convert'] = $this->clean_chars['processed_url'];
                    // No need to continue matching if a match is found
                    break;
                }
                $fes++;
            }
        }

        return $this->clean_chars;
    }

    public function chop_varwww($regexsearch, $replaceref, $strirep)
    {
        return preg_replace($regexsearch, '$4', $strirep);
    }
}
