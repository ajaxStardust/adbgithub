<?php
// @filename ./inc/footer.inc.php
//
if (defined('XRO')) {
	$xro = XRO;
} else {
	$xro = '';
}

if (isset($_SERVER['SERVER_NAME'])) {
	$serverName = $_SERVER['SERVER_NAME'];
} else {
	$serverName = 'localhost';
}
$footRoot = 'http://' . $serverName;
$footFile = $footRoot . $_SERVER['PHP_SELF'];
$footParse = parse_url($footRoot);
foreach ($footParse as $fPkey => $fPval) {
	if ($fPkey == 'host') {
		$footPath = $fPval;
		break;
	} else {
		$footPath = $fPval;
	}
}
$footDir = __FILE__;
$footReplace = '';
$footHost = str_replace($footFile, $footReplace, $footRoot);

/*
 * echo '<div>footVars thing<ol><li>footRoot: '.$footRoot.'</li><li>footFile: '.$footFile.'</li><li>footParse: '.$footParse.'</li>
 * <li>footPath: '.$footPath.'</li><li>footDir: '.$footDir.'</li><li>footHost: '.$footHost.'</li></ol></div>';
 */

?>

<div id="footer" class="container">
    <!-- 	^	#footer 	^	-->


    <?php print $backlinksHtml; ?>

    <div class="vertMid">
        <!--	^	.vertMid	^	-->
        <!-- p id="toTop" class="floatRt"></p -->
        <p id="searchrec">Search privately: <a href="https://duckduckgo.com/goodies"
                title="Search privately">Duck-Duck-Go for it!</a> </p><object id="duckduckgo" class="transparentback"
            title="Search at DuckDuckGo.com" data="assets/css/duckduckgo-icon.svg" type="image/svg+xml" height="32"
            width="32">
        </object>

    </div> <!--	$	.vertMid	$	-->

</div>
<!-- 	$	#footer 	$	-->