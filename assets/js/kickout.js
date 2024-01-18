/*
* @filename ./js/kickout.js
*
* @overview
*
*	@dependency of AnnieDeBrowsa™, primary
*
*	@since 2012-12-17
*
*	@abstract
*		disallow THIS document from loading as TOP in browser
*
*/

	/* ................................................................. */
	
	function redirectPage() {
		/* @var regExp: assign regular expression to string variable */
	var initLoc	= {}, prefLoc = {}, regExp;
	regExp = /index\.html?/;

	if (top.location.href === self.location.href) {

		initLoc = self.location.href;
					
				/* @method replace: regular expression method, replace regExp string in href */
		initLoc.replace(regExp,'index.php');

		return window.location.href = initLoc.replace(regExp,'index.php');
	}
	else {
		alert('Not top level page! Use Page-Control: Frame-to-Top');
	}
}

window.onload = redirectPage();

