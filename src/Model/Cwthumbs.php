<?php

namespace Adb\Model;
use Adb\Model\Adbsoc as Adbsoc;

class Cwthumbs
{
    public $imagesDir;
    public $random_img;
    public $thumbsCount;
    public $tuptuo;
    public $many;
    public $images;
    public $thumbsSoc;

    public function __construct($pathOps = null)
    {
        if($pathOps == null) {
            $thumbsSoc = new Adbsoc;
            $this->thumbsSoc = $thumbsSoc->pathOps;
        }
        else {
            $this->thumbsSoc = $pathOps;
        }
        $this->getImages($this->thumbsSoc);
    }  // end makeThmbs(METHOD)

    public function getImages($pathOps = null)
    {
        if($pathOps == null) {
            $pathOps = $this->thumbsSoc;
        }
        $sort = [];
        if (empty($pathOps)) {
            $dir = $this->imagesDir = ADBLOCTN.'/assets/slideshow';
            
        } elseif ($pathOps) {
            $this->imagesDir = is_dir(ADBLOCTN.'/assets/slideshow') ? ADBLOCTN.'/assets/slideshow' : $pathOps;
        } else {
            $this->imagesDir = WHATIS;
        }

        foreach (glob("$this->imagesDir/*") as $item) {
            if (!is_dir($item)) {
                $item = explode('/', $item);
                $sort[] = end($item);
            }
        }
        $killcounter = 0;
        if(is_array($sort) && (count($sort) > 1)) {
            foreach ($sort as $thumbsCount => $sorteditem) {
                
                $this->thumbsCount[] = $thumbsCount;
                if (preg_match_all('/\.gif$/i', $sorteditem, $pma_sorteditem)) {
                } elseif (preg_match_all('/\.png$/i', $sorteditem, $pma_sorteditem)) {
                } elseif (preg_match_all('/\.jpg$/i', $sorteditem, $pma_sorteditem)) {
                } elseif (preg_match_all('/\.bmp$/i', $sorteditem, $pma_sorteditem)) {
                } elseif (preg_match_all('/\.ico$/i', $sorteditem, $pma_sorteditem)) {
                } else {
                    unset($sort[$killcounter]);
                }
                $killcounter++;
            }
        }

        if(is_array($sort)) {
            natsort($sort);
            $this->images = $sort;
        }
        /*if(is_array($sort) && (count($sort) > 1)){
        foreach($sort as $sortKey => $sortItem){
        $images[]= $dir."/".$sortItem;
        $chooser[] = $sortKey;
        }
        }
        elseif(!is_array($sort) && isset($sort) && $sort != ""){
        $images = $sort;
        }

        $this->images = $images;*/
        $this->images = $sort;
        return $this->images;
    }

    public function randIMG($random_img)
    {
        $output = $random_img;
        // CODE BELOW WILL GENERATE A RANDOM IMAGE BASED ON THE INFO FROM CWDTHUMBS
        $randhdimg = (count($output) * (0.5));
        $randimg = rand(0, $randhdimg);
        $this->random_img = $randimg;
        $imagedisplayed = $output[$randimg];
        $coolassheader = '<img src="/assets/images/' . $imagedisplayed . '" alt="groovy" id="randy" />';
        $this->random_img = $imagedisplayed;
        return $this->random_img;
    }

    /* function norMage($output,$flatfile) {

    $thenumber = count($output);
    // $thenumber = $thenumber - $_SESSION[ArrayIterator::next($output)];
    $imagedisplayed = $output[$thenumber];
    $incremental = "<img src=\"images/title/".$imagedisplayed."\" alt=\"groovy\" id=\"randy\" />";
    echo "<h1>".$thenumber.": is the value of output</h1>";

    $thenumber++;
    fwrite($fh, "$thenumber") or die("Could not write to file");

    // close file
    fclose($fh);

    return $imagedisplayed;

    } */

    public function cwCounter($bodyid, $upone, $output)
    {
        $keyit = (int) 0;
        $this->many = count($output);

        // if(($bodyid="acheader") and (isset($_GET['upone']))) {
        // DONT MISS ### THE MATCHING ELSE BELOW

        $this->tuptuo = array();
        $this->tuptuo = $output;

        /*         if (empty($keyit)) { */
        $k = 0;
        /* } */

        $keyit = $k + $_GET['upone'];

        // } DONT MISS ##### THE MATCHING IF ABOVE

        return $keyit;
    }  // END CWCOUNTER METHOD
}  // END Cwthumbs CLASS

?>
