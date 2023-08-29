/** @texteditor
* 		Using Geany, the GTK+ editor based on Scintilla,
* 		collapse and reveal will function as intended for the
* 		per-item, multi-line comments such as those in loadIframe()
**/

function initLoaders() {

    var thisDocHead, docHead, fbloader, firebugLite;

    thisDocHead = document.getElementsByTagName("head");
    fbloader = document.getElementById("fbloader");

    docHead = thisDocHead[0];

    firebugLite = document.createElement('script');
    firebugLite.setAttribute('type', "text/javascript");
    firebugLite.setAttribute('src', 'js/fbl/firebug-lite.js');

    fbloader.onclick = function() {
        docHead.appendChild(firebugLite);
        firebug.init();
        firebugLite.init();
    }

}

/**
 * send pagename navigation to jscontrols.inc.php
 */
function jsControlsIndex() {
    var indexNav, js2index;

    indexNav = document.getElementById("indexNav");
    js2index = document.getElementById("js2index");
    js2index.innerHTML = indexNav.innerHTML;
}

/** @function toggleSection(param1, param2)
*		toggle the visibility of the designated parameters passed
* @param thisImage: an image object contained within the document
* @param thisDd:	a DD element object contained within the document
* @var object detailSection: eq thisDd, the element to be hidden or shown
* @var object toggleImage: eq thisImage. when thisImage.onclick, the detailSection is toggled
*/

function toggleSection(thisImage, thisDd) {

    var detailSection, toggleImage;
    detailSection = thisDd;
    toggleImage = thisImage;

    if (detailSection.style.display === 'block') {
        detailSection.style.display = 'none';
        toggleImage.src = 'css/collapsed.gif';
    }
    else {
        detailSection.style.display = 'block';
        toggleImage.src = 'css/expanded.gif';
    }

}

/** @function getToggleGraphics()
**		scan the document for elements which are assigned as triggers for toggling
**			other elements to be hidden or made visible using CSS style properties
**/

function getToggleGraphics() {

    var i, j, allNodes, classArr, thisNode, thisImage, thisNodeClass, thisSibling, nodeSiblings, thisNodeId, regexTrigger, regexTarget, jsTriggerRevDump, triggerReview, siblingId;

   /*
*	GET NODE: #maincol DIV #jsTriggerRevDump |	SET VAR{OBJ} jsTriggerRevDump */
    jsTriggerRevDump = document.getElementById("jsTriggerRevDump");
   /*
*	GET NODE: #maincol DIV #triggerReview	 |	SET VAR{OBJ} triggerReview */
    triggerReview = document.getElementById("triggerReview");
   /*
*	TRAVERSE_DOM[*]	AT #document			 |	SET VAR{ARRAY} allNodes */
    allNodes = document.getElementsByTagName("*");
   /*
*	REGEX_MATCH	"/(\w+)Trigger/ig"			 |	SET VAR{MATCH}	regexTrigger */
    regexTrigger = /(\w+)Trigger/ig;
   /*
*	REGEX_MATCH	"/(\w+)Target/ig"			 |	SET VAR{MATCH}	regexTarget */
    regexTarget = /(\w+)Target/ig;

    for (i = 0; i < allNodes.length; ++i) {

        if (allNodes[i].className) {
           /*
*	GET {STRING}	WHERE ARRAY ITEM allNodes[i] HAS className	|
*												SET VAR{STRING} thisNodeClass */
            thisNodeClass = allNodes[i].className;
           /*
*	WITH thisNodeClass
*	TESTRX regexTrigger 	*/
            if (regexTrigger.test(thisNodeClass)) {

               /*	TRAVERSE_DOM[*] AT PARENT_OF ARRAY ITEM allNodes[i]	|
*	SET VAR{ARRAY} nodeSiblings */
                nodeSiblings = allNodes[i].parentNode.getElementsByTagName("*");

               /*	WITH LENGTH OF VAR{ARRAY} nodeSiblings
*	ITERATE LOOP FOR{J} */
                for (j = 0; j < nodeSiblings.length; ++j) {
                   /*
*	AT ARRAY ITEM nodeSiblings[j]
*	GET NODE							|	SET VAR{OBJECT}	thisSibling		*/
                    thisSibling = nodeSiblings[j];
                   /*	WITH thisSibling	GET TAG_NAME	|	SET VAR{STRING} siblingId	*/
                    siblingId = thisSibling.nodeName;
                    if (regexTarget.test(siblingId)) {
                       /*
*	FLOW_CONTROL{TRUE}
*	USE ERROR_HANDLING:	*/
                        try {
                            allNodes[i].onclick = (function() {
                                toggleObject(thisSibling);
                                //								if(thisSibling.style){
                                //									if(thisSibling.style.display != "block") {
                                //										thisSibling.style.display = "block";
                                //									}
                                //									else{
                                //										thisSibling.style.display = "none";
                                //									}
                                //								}
                                return true;
                            });
                        }
                        catch(e) {
                            jsTriggerRevDump.innerHTML += "<p><em>Diptwist!</em> I was unable to do some shit, because: " + e + "</p>";
                        }
                    }
                }
            }
        }
    }
}

/** @function toggleObject()
*
* 	@param toggObject object
**/

function toggleObject(toggObject) {
    var targetObj;

    targetObj = toggObject;

    if (targetObj.style.display !== "block") {
        targetObj.style.display = "block";
    }
    else {
        targetObj.style.display = "none";
    }

    if (toggObject.style.display !== "block") {
        toggObject.style.display = "block";
    }
    else {
        toggObject.style.display = "none";
    }
    return false;
}



function scanCssLoaders() {
    var cssLoaderTarget, cssLoaderTrigger, cssLoaderOther, i, j, cssClassArray, cssClassString, allLoaders, loaderRegex;

    allLoaders = document.getElementsByTagName("span");
    loaderRegex = /cssloader/ig;
	function loadCss() {

		var thisDocHead, docHead, cssLoader, targetCss;
		targetCss = toString(this);

		targetCss.replace(/(\w+)(Loader)/, "$1");


		thisDocHead = document.getElementsByTagName("head");
		docHead = thisDocHead[0];
		cssLoader = document.createElement('style');
		cssLoader.setAttribute('type', "text/css");
		cssLoader.innerHTML = '@import "css/' + targetCss + '.css"';

		docHead.appendChild(cssLoader);
	}
    for (i = 0; i < allLoaders.length; i++) {
        if (allLoaders[i].className) {
            cssClassArray = allLoaders[i].className.split(" ");
            for (j = 0; j < cssClassArray.length; j++) {
                if (loaderRegex.test(cssClassArray[j])) {
                    cssLoaderTarget = allLoaders[i].id;
                    allLoaders[i].onclick = loadCss(cssLoaderTarget);
                }
            }
        }
    }
}

/** @function scanTriggers()
**		scan nodes of the DOM for those which are triggers and trigger-targets
**		the former.onclick will check style.property of the latter
**		depending upon that style.display.value, the element will
**		either be made style.display.block or style.display.none
**/

function scanTriggers() {

    var triggerReview, triggerReviewDiv, cssClassString, classArray, triggerClassNode, i, j, trigger, targetObject, regexTrigger, gEmtByTgNmAll, test_ID, regexTarget, jsTriggerRevDump, tiBackref;
   /**
**		gEmtByTgNmAll: 	get all elements of the document. store the list here.
**		cssClassString: current DOM element class. Derived from "i", in gEmtByTgNmAll[i]
**		classArray: 	small array of strings. created using split.cssClassString
**		toggReview:		an element in the document meant for displaying events within this function, scanTogglers
**		toggReview.innerHTML: textual representation of the values rendered by this function
**		toggReviewDiv: 	eq toggReview
**		togglerClass: 	current DOM element Object. Derived from "i", in gEmtByTgNmAll[i]
**		test_ID:		represents the ID of togglerClass
**		demoDiv:		CURRENTLY UNDEFINED
**/
    jsTriggerRevDump = document.getElementById("jsTriggerRevDump");
    triggerReview = document.getElementById("triggerReview");
    triggerReview.style.backgroundColor = "#FFA";
    triggerReview.innerHTML = "triggerReview";
    triggerReviewDiv = triggerReview;
    regexTrigger = /trigger/gi;
    regexTarget = /(\w+)Target/gi;
    gEmtByTgNmAll = document.getElementsByTagName("*");

    for (i = 0; i < gEmtByTgNmAll.length; i++) {
        if (gEmtByTgNmAll[i].className) {
            cssClassString = gEmtByTgNmAll[i].className;
            classArray = cssClassString.split(" ");
            triggerReviewDiv.innerHTML += gEmtByTgNmAll[i].nodeName + "<br>";

            for (j = 0; j < classArray.length; j++) {

                if (regexTrigger.test(classArray[j])) {
                    triggerClassNode = gEmtByTgNmAll[i];
                    try {
                        test_ID = triggerClassNode.id;
                        if (regexTarget.exec(test_ID)) {
                            tiBackref = RegEx.$1;
                            regexTarget = new RegEx(tiBackref + "Target", "gi");
                        }
                    }
                    catch(e) {
                        jsTriggerRevDump += "<p>Unable to assign triggerClassNodeId to test_id for regexExec, because: " + e + "</p>";
                    }
                }
            }
        }

        if (gEmtByTgNmAll[i].id) {
            var targetNodeId = gEmtByTgNmAll[i].id;

            if (regexTarget.test(targetNodeId)) {
                // TEST FOR id = __Target
                targetObject = gEmtByTgNmAll[targetNodeId];
                var trigId = tiBackref + "Trigger";
                trigger = triggerClassNode[trigId];
            }
        }
        // experimenting here...
        // targetObject.onclick = toggleObject(trigger);
        trigger.onclick = toggleObject(targetObject);
    }
}

/** @function loadIframe
* 	@param whatclick (var.typeof.string)
* 		2009-09-12
* 			#see /inc/arrayobjectanchors.inc.php
* 		HTML Attribute: onClick="loadIframe( PHP::$basename )"
*	whatclick Detailed:
* 		DOM Node Path: div#leftcol > ul#navlist > li > a#navAnchor_'whatclick'
* 		where _whatclick set by PHP::readdir(basename), as unique filename string
* 		thus, loadIframe() attempts to set iframe src attribute using a filename
* 		string as written dynamically by PHP to <a #navAnchor_basename>
**/

function loadIframe(whatclick) {

    var anchorClicked, clickId, node2style, jsLoadIframeDump, mainFrame, parentListItem, frameName, i, mainFrameStyleStr = '';

   /* 	GET HTML EVENT HANDLER:	whatclick
	SET VAR: anchorClicked 	*/
    anchorClicked = whatclick;

   /* 	GET NODE:	IFRAME	#mainFrame
	SET VAR:	mainFrame	*/
    mainFrame = document.getElementById("mainFrame");

   /* 	GET NODE:	DIV	#frameName
	SET VAR:	frameName	*/
    frameName = document.getElementById("frameName");

   /* 	GET NODE:	DIV	#jsLoadIframeDump
	SET VAR:	jsLoadIframeDump	*/
    jsLoadIframeDump = document.getElementById("jsLoadIframeDump");

   /*	WITH anchorClicked:	CONCAT STRING
	SET VAR:	node2style	*/
    node2style = "navAnchor_" + anchorClicked;

   /* 	GET NODE:	A	#navAnchor_X
	SET VAR:	clickId		*/
    clickId = document.getElementById(node2style);

   /*	(WITH	clickId)
	GET NODE:	UL #navlist > LI
	SET VAR:	parentListItem	*/
    parentListItem = clickId.parentNode;

   /*	(WITH	clickId)
	GET NODE: A #navAnchor_Xyz
	SET	#navAnchor_Xyz	ATTRIBUTE.STYLE	*/
    if (clickId.style.backgroundColor != "navy") {
        clickId.style.backgroundColor = "rgba(255,255,255,0.0)";
        clickId.style.color = "rgba(0,0,0,0.2)";
    }

   /* WITH parentListItem
	GET NODE:	UL #navList > LI
	SET LI ATTRIBUTE.STYLE.BACKGROUND	*/
    if (parentListItem.style.backgroundImage != "none") {
        parentListItem.style.backgroundImage = "none";
        parentListItem.style.backgroundColor = "rgba(205,235,235,0.4)";
        parentListItem.style.color = "rgba(0,0,0,0.2)";
        parentListItem.style.firstLetter = "#fff";
        parentListItem.style.border = "none";
    }

   /*	GET NODE:	IFRAME #mainFrame
	SET	#mainFrame	ATTRIBUTE.SRC	*/
    mainFrame.src = anchorClicked;

   /*	GET NODE: DIV #frameName
		GET PARAM: anchorClicked	->	whatclick
		SET #frameName ATTRIBUTE.innerHTML	*/
    frameName.innerHTML = anchorClicked;

   /* 	IF|ELSE #mainFrame ATTRIBUTE.STYLE
		SET #mainFrame ATTRIBUTE.STYLE.BORDER	*/
    if (!mainFrame.style.border || mainFrame.style.borderColor == "purple") {
        mainFrame.style.borderStyle = "ridge";
        mainFrame.style.borderColor = "red";
        mainFrame.style.borderWidth = "0.3em";

    }
    else if (mainFrame.style.borderColor == "red") {
        mainFrame.style.borderStyle = "ridge";
        mainFrame.style.borderColor = "blue";
        mainFrame.style.borderWidth = "0.3em";
    }
    else if (mainFrame.style.borderRightStyle) {
        mainFrame.style.borderStyle = "ridge";
        mainFrame.style.borderColor = "purple";
        mainFrame.style.borderWidth = "0.3em";
    }

   /* 	ITERATE:
		#mainFrame.STYLE.LENGTH
		#mainFrame.style._?_	CONCAT STRING:
		SET STRING mainFrameStyleStr */
    for (i = 0; i < mainFrame.style.length; i++) {
        mainFrameStyleStr += mainFrame.style[i] + ":" + mainFrame.style[i].text + "<br />";
    }

   /*	CONCAT STRING #jsLoadIframeDump + #mainFrameStyleStr
	CHANGE_NODE #jsLoadIframeDump	->	SET ATTRIBUTE.innerHTML	*/

    // jsLoadIframeDump.innerHTML = "mainFrameStyle: " + mainFrameStyleStr;
    // return false;
}

function load3rdFrame(whatclick) {

    var anchorClicked, mainFrame, frameName, i, mainFrameStyleStr = '';

   /* 	GET HTML EVENT HANDLER:	whatclick
	SET VAR: anchorClicked 	*/
    anchorClicked = whatclick;

   /* 	GET NODE:	IFRAME	#mainFrame
	SET VAR:	mainFrame	*/
    mainFrame = document.getElementById("mainFrame");

   /* 	GET NODE:	DIV	#frameName
	SET VAR:	frameName	*/
    frameName = document.getElementById("frameName");
    frameTitler = document.getElementById("frameTitler");

   /* 	GET NODE:	DIV	#jsLoadIframeDump
	SET VAR:	jsLoadIframeDump	*/
    if (document.getElementById("jsLoadIframeDump")) {
        jsLoadIframeDump = document.getElementById("jsLoadIframeDump");
    }

   /*	GET NODE:	IFRAME #mainFrame
	SET	#mainFrame	ATTRIBUTE.SRC	*/
    mainFrame.src = anchorClicked;

   /*	GET NODE: DIV #frameName
		GET PARAM: anchorClicked	->	whatclick
		SET #frameName ATTRIBUTE.innerHTML	*/
    frameName.innerHTML = anchorClicked;

   /* 	IF|ELSE #mainFrame ATTRIBUTE.STYLE
		SET #mainFrame ATTRIBUTE.STYLE.BORDER	*/
    if (!mainFrame.style.border || mainFrame.style.borderColor == "purple") {
        mainFrame.style.borderStyle = "ridge";
        mainFrame.style.borderColor = "red";
        mainFrame.style.borderWidth = "0.3em";

    }
    else if (mainFrame.style.borderColor == "red") {
        mainFrame.style.borderStyle = "ridge";
        mainFrame.style.borderColor = "blue";
        mainFrame.style.borderWidth = "0.3em";
    }
    else if (mainFrame.style.borderRightStyle) {
        mainFrame.style.borderStyle = "ridge";
        mainFrame.style.borderColor = "purple";
        mainFrame.style.borderWidth = "0.3em";
    }

   /* 	ITERATE:
		#mainFrame.STYLE.LENGTH
		#mainFrame.style._?_	CONCAT STRING:
		SET STRING mainFrameStyleStr */
    for (i = 0; i < mainFrame.style.length; i++) {
        mainFrameStyleStr += mainFrame.style[i] + ":" + mainFrame.style[i].text + "<br />";
    }

   /*	CONCAT STRING #jsLoadIframeDump + #mainFrameStyleStr
	CHANGE_NODE #jsLoadIframeDump	->	SET ATTRIBUTE.innerHTML	*/

    // jsLoadIframeDump.innerHTML = "mainFrameStyle: " + mainFrameStyleStr;
    // return false;
}

function justTitleIt() {

    var firstFrame, secondFrame;
    secondFrame = this.frameSource;
    firstFrame = document.getElementById("mainFrame");
    frameTitle = document.getElementById("jsLoadIframeDump");

    if (firstFrame.src !== secondFrame.src) {
        frameTitle.innerHTML = secondFrame.src;
    }
}

function collapseNav(navDiv) {

    var leftcol, maincol, navImage, toggleTxt, spacer;
    leftcol = document.getElementById(navDiv);
    maincol = document.getElementById('maincol');
    navImage = document.getElementById('navControl');
    toggleTxt = document.getElementById('navTxt');
    spacer = '';

    if (navImage.src === ('css/directional-arrow-left.png' || 'css/directional-arrow-right.png')) {
        spacer = '../';
    }
    else {
        spacer = '';
    }

    if (leftcol.style.display !== 'none') {
        leftcol.style.display = 'none';
        maincol.style.width = '100%';
        maincol.style.paddingLeft = 0;
        navImage.src = spacer + 'css/directional-arrow-right.png';
        toggleTxt.innerHTML = "show";
    }
    else {
        leftcol.style.display = 'block';
        maincol.style.width = '79%';
        navImage.src = spacer + 'css/directional-arrow-left.png';
        toggleTxt.innerHTML = "collapse";
    }
}

function popMeUp(target) {

    var newWinUp = window.open((target), 'newPopWin', 'height = 500, width = 600, toolbar = no, directories = no, status = no, menubar = no, scrollbars = no, resizable = yes');
    newWinUp.focus();
    return false;
}

function showHide(obj1) {

    var el1 = document.getElementById(obj1);
    if (el1.style.display !== "block") {
        el1.style.display = 'block';
    }
    else {

        el1.style.display = 'none';
    }
}

function goBack() {

    window.history.back();
}

function onloadLoop(getFunky) {

    var onloadPartial = window.onload;

    if (typeof onloadPartial === "function") {
        window.onload = function() {

            if (onloadPartial) {
                onloadPartial();
            }
            getFunky();
        };
    }
    else {
        window.onload = getFunky;
    }
}

onloadLoop(getToggleGraphics);
//~GY onloadLoop(scanTriggers);
onloadLoop(initLoaders);
onloadLoop(jsControlsIndex);
onloadLoop(scanCssLoaders);

/**
* *
*
* @end
*/

