<?php

/**
 * @method frame_only
 * @param ENUM (TRUE,FALSE)
 * @abstract
 * 	use frame_only() to force the document into preferred frame, relative to project.
 *
 */
if (!defined('ABSOLUTELOCATION')) {
    define('ABSOLUTELOCATION', dirname(__FILE__));
    $abspath = ABSOLUTELOCATION . "/images";
}
if (!isset($thDir)) {
    $thDir = "./images";
}

require 'class/adbfuncs.class.php';
$frameControl = new adbFuncs;
$frame_only = $frameControl->frame_only($setKickout = FALSE);

require_once 'class/cwthumbs.class.php';
$cwThumbsClass = new cwThumbs;
$xsThumbsObject = new cwThumbs;
$caroselObject = new cwThumbs;
$cwdObject = new cwThumbs;
$ptbObject = new cwThumbs;
$caroselThumbs = $caroselObject->makeThumbs("images/xsidebar", "images/xsidebar");
$imgDir = $cwThumbsClass->imagesDir;
$imgNumber = $cwThumbsClass->thumbsCount;

// FIX THIS BY SENDING INSTED OF JUST $setKickout=TRUE...
// SEND URL_Chopper to file_name only with $setKickout 
//E.G.: frame_only($setKicout=TRUE,$this_filename=$URL_Chopper_blah_blah...)
// this will require modifying the adbFuncs class also

/* 
// print '<?xml version="1.0" encoding="utf-8"?>';
*/
?>
<!DOCTYPE html>
<html>

<head>
    <title>Graphic Designs by J Sabarese</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php print $frame_only; ?>
    <script type="text/javascript" src="js/iframestuff.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style type="text/css">
        .carousel-inner {
            height: 300px;
        }
    </style>
</head>

<body>
    <!--    ^    id:pagewidth    ^    -->
    <div id="pagewidth" class="container">
        <!--    ^    id:maincol    ^    -->
        <div id="maincol" class="container border">
            <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
                <div class="p-3 bg-light text-dark">
                    <h1>Graphic Designs by J. Sabarese</h1>
                    <h4 class="nav-item"><a href="https://WhatsOnYourBrain.com/about-the-author/" title="view my blog" alt="visit my blog" target="_blank">@blog</a></h4>
                    <h4 class="nav-item"><a href="https://my.indeed.com/p/9n1d3mc/preview" title="View my CV resume" alt="review my work experience" target="_blank">@indeed</a></h4>
                    
                    <h4 class="nav-item"><a href="https://www.linkedin.com/in/jeffreysabarese/" title="view my linkedin page" alt="visit the author at linked-in" target="_blank">@linkedIn</a></h4>
                    
                </div>
                <div class="container m-3">
                    <div class="h1"><i class="bi bi-columns-gap"></i></div>
                    <p class="lead">Below are samples of some graphic design work. The images were created in Inkscape (SVG), Xara, Photoshop, Fireworks, Paint.NET, and other graphic design / image editing software.</p>
                </div>
                <dl id="graphicDesignDL" class="container m-4 p-4">
                    <dt>Powertab Software</dt>
                    <dd class="m-4">
                        <p>Powertab is guitar training software. Powertab is capable of playing tableture-like files as a practice aid. See filetype .ptb</p>


                        <div id="carouselControl" class="carousel slide bg-dark" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                </div>
                                <?php
                                $contactSheet1 = "\n";
                                $ptbThumbs = $ptbObject->makeThumbs("images/ptb", "images/ptb");
                                if (isset($ptbThumbs) && is_array($ptbThumbs)) {
                                    foreach ($ptbThumbs as $ptbKey => $ptbImg) {
                                        $ptbImg = "images/ptb/" . $ptbImg;
                                        // $imgCounter = $imgNumber[$ptbKey];
                                        $contactSheet1 .= "<div class=\"carousel-item\"><img src=\"" . $ptbImg . "\" alt=\"" . $ptbImg . "\" title=\"" . $ptbImg . "\" /></div> \n";
                                    }
                                } else {
                                    $contactSheet1 .= '<li class="bold nobull noBull">Sorry, but there is an error in the source, specific to the image resources contact-sheet previews. <br />Specifically, the ADB PHP-class, <em>cwThumbs</em> fails the logical condition of <br /><pre>

                        does not exists, is not an array, is has not been properly set.</li>' . "\n";
                                }
                                print $contactSheet1;
                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControl" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselControl" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <?php
                        print " \n <hr id=\"clearImgShow\" /> \n";
                        ?>
                    </dd>
                    <dt>Centre Web Design</dt><!-- comment -->
                    <dd class="m-4">
                        <p>a web development company</p>

                        <div id="carouselControl_two" class="carousel slide bg-dark" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                </div>
                                <?php
                                $contactSheet2 = "\n";
                                $cwdThumbs = $cwdObject->makeThumbs("images/cwd", "images/cwd");
                                if (isset($cwdThumbs) && is_array($cwdThumbs)) {
                                    foreach ($cwdThumbs as $cwdKey => $cwdImg) {
                                        $cwdImg = "images/cwd/" . $cwdImg;
                                        // $imgCounter = $imgNumber[$cwdKey];
                                        $contactSheet2 .= "<div class=\"carousel-item\"><img src=\"" . $cwdImg . "\" alt=\"" . $cwdImg . "\" title=\"" . $cwdImg . "\" /></div> \n";
                                    }
                                } else {
                                    $contactSheet2 .= '<li class="bold nobull noBull">Sorry, but there is an error in the source, specific to the image resources contact-sheet previews. <br />Specifically, the ADB PHP-class, <em>cwThumbs</em> fails the logical condition of <br /><pre>

            does not exists, is not an array, is has not been properly set.</li>' . "\n";
                                }
                                print $contactSheet2;
                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControl_two" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselControl_two" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <?php
                        print " \n <hr id=\"clearImgShow\" /> \n";
                        ?>
                    </dd>
                    <dt>X Sidebar</dt><!-- comment -->
                    <dd class="m-4">
                        <p>An old addon for Mozilla web browsers</p><!-- comment -->
                        <?php

                        ?>
                        <div id="carouselControl_three" class="carousel slide bg-dark" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                </div>
                                <?php
                                $contactSheet3 = "\n";
                                $xsThumbs = $caroselObject->makeThumbs("images/xsidebar", "images/xsidebar");
                                if (isset($xsThumbs) && is_array($xsThumbs)) {
                                    foreach ($xsThumbs as $xsKey => $xsImg) {
                                        $xsImg = "images/xsidebar/" . $xsImg;
                                        // $imgCounter = $imgNumber[$xsKey];
                                        $contactSheet3 .= "<div class=\"carousel-item\"><img src=\"" . $xsImg . "\" alt=\"" . $xsImg . "\" title=\"" . $xsImg . "\" /></div> \n";
                                    }
                                } else {
                                    $contactSheet3 .= '<li class="bold nobull noBull">Sorry, but there is an error in the source, specific to the image resources contact-sheet previews. <br />Specifically, the ADB PHP-class, <em>cwThumbs</em> fails the logical condition of <br /><pre>

            does not exists, is not an array, is has not been properly set.</li>' . "\n";
                                }
                                print $contactSheet3;
                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControl_three" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselControl_three" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <?php
                        print " \n <hr id=\"clearImgShow\" /> \n";
                        ?>
                    </dd>

                </dl><!-- end DL for graphic display -->
            </section>
            <h1>h1 - Demonstrating Basic Bootstrap CSS Styles</h1>
            <p>p</p>
            <h2>
                h2
            </h2>


            <ul>
                <li>ul list item
                </li>
                <li>ul list item
                </li>
            </ul>
            <h3>
                h3
            </h3>
            <ol>
                <li>ol list item
                </li>
                <li>ol list item
                </li>
            </ol>
            <h4>
                h4
            </h4>
            <div class="container"> div.container
                <dl>
                    <dt>
                        dt - Definition Title
                    </dt>
                    <dd class="m-4">
                        DD - def data - this DL is child of div.container
                    </dd>
                </dl>
            </div>
            <h5>
                h5
            </h5>
            <div class="container-md row">
                <table class="col w-75">
                    <caption>
                        Table Caption
                    </caption>
                    <thead>
                        <tr class="border">
                            <th class="col bg-primary text-light p-1 text-center border">
                                Table Thead - TH
                            </th>
                            <th class="col bg-primary text-light p-1 text-center border">
                                Table Thead - TH
                            </th>
                            <th class="col bg-primary text-light p-1 text-center border">
                                Table Thead - TH
                            </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>
                                Tfoot - TD
                            </td>
                            <td>
                                Tfoot - TD
                            </td>
                            <td>
                                Tfoot - TD
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>
                                TR > TD - table row data
                            </td>
                            <td>
                                TD - table row data
                            </td>
                            <td>
                                TD - table row data < TR </td>
                        </tr>
                        <tr>
                            <td>
                                TR > TD - table row data
                            </td>
                            <td>
                                TD table row data
                            </td>
                            <td>
                                TD table row data < TR </td>
                        </tr>
                        <tr>
                            <td>
                                TR > TD - table row data
                            </td>
                            <td>
                                TD table row data
                            </td>
                            <td>
                                TD table row data < TR </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h6>
                h6
            </h6><code>code</code>
            <pre class="bg-dark text-light">\n
pre \n
\n
\n
    </pre>
        </div><!--    $    END class.container (former id.maincol)    $    -->
    </div><!--    $    id:pagewidth    $    -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>