<?php
// ./inc/footer.inc.php
//
if(defined("XRO")){
	$xro = XRO;
}
else {
	$xro = '';
}
require $xro.'inc/backlinks.inc.php';

if(isset($_SERVER['SERVER_NAME'])){
	$serverName = $_SERVER['SERVER_NAME'];
}
else{
	$serverName = 'localhost';
}
$footRoot = "http://".$serverName;
$footFile = $footRoot.$_SERVER['PHP_SELF'];
$footParse = parse_url($footRoot);
foreach($footParse as $fPkey => $fPval){
	if($fPkey == "host"){
		$footPath = $fPval;
		break;
	}
	else {
		$footPath = $fPval;
	}
}
$footDir = __FILE__;
$footReplace = '';
$footHost = str_replace($footFile, $footReplace, $footRoot);
 
?>

	<div id="footer">	<!-- 	^	#footer 	^	-->

				<?php print $backlinksHtml; ?>

	<div class="vertMid">						<!--	^	.vertMid	^	-->
		<img src="css/adb_small_greyscale.png style="width:100%;height:100%;" class="floatLt" />
		<p id="toTop" class="floatRt">
			<a class="intraNav" href="#header">
			<img src="css/arrow-up.gif" alt="jump to top" />[ Top ]
			</a>
		</p>
		<p id="searchrec">Search privately: <a href="https://duckduckgo.com/goodies" title="Duck Duck Go does not keep tabs on your privacy. This is what you want!"><strong>Duck-Duck-Go-for-it!</strong></a>&trade;</p>
	</div>										<!--	$	.vertMid	$	-->

	</div>
						<!-- 	$	#footer 	$	-->
