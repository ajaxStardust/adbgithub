/*
** The following javascript bookmarklet, 
 * herein, shall be converted in an attempt to 
 * create a click-in-the-page function for launching another browser
 * or, as a variation on the Launch IE bookmarklet, such that
 * an alternate application might be launched, for example, Seamonkey, Chromium, Safari, Opera, etc.
*/
// javascript:location = "data:application/PLEASE-OPEN-WITH-IE,<html><body><script>location='" + escape(location.href.replace(/\\/g,"\\\\").replace(/\"/g,"\\\"")) + "';</script>";
/*
** so, it becomes the following in my trials, beginning 20110513:
*/
								
//						
// OPEN CURRENT URL IN INTERNET EXPLORER

location = "data:application/PLEASE-OPEN-WITH-IE,<html><body><script>location='" + 
	escape(location.href.
		replace(/\\/g,"\\\\").
		replace(/\"/g,"\\\"")
	)
	+ 
	"';</script>";