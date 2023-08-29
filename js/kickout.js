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

	var initLoc	= {}, prefLoc = {}, regExp;
	//initLoc.location = [];
	//prefLoc.location = [];


	function redirectPage() {
            /* @var regExp: assign regular expression to string variable */
		regExp = /index\.html?/;

		if (top.location.href === self.location.href) {

			initLoc = self.location;
                        
                    /* @method replace: regular expression method, replace regExp string in href */
			prefLoc.location = initLoc.href.replace(regExp,"index.php");

			window.location.href = prefLoc.location.href;
		}
	}

	window.onload = redirectPage;

