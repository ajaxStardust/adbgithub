/**
 * IMPORTANT ensure showme-hideme.js is
 * 	loaded before any other javascript files 
*/

function popMeUp(target) {

    var newWinUp = window.open((target), 'newPopWin', 'height = 500, width = 600, toolbar = no, directories = no, status = no, menubar = no, scrollbars = no, resizable = yes');
    newWinUp.focus();
    return false;
}

function initShowComm() {
	if(document.getElementById("url_addr")){
		document.getElementById("url_addr").selectedIndex = 0;
		document.getElementById("url_addr").onchange = showComments;	
	}
}

function showComments() {
	
	var commVal, elId, showPara;
	
	// GET INDEX VALUE OF FORM SELECT OPTION ON CHANGE
	commVal = this.options[this.selectedIndex].value;
	
	// APPEND VALUE OF SELECTED INDEX TO STRING var 'elId'
	elId = "sC-" + commVal;
	
	// USE 'elId' TO IDENTIFY CORRESPONDING DOM NODE p.#ID
	showPara = document.getElementById(elId);
	
	if(window.firstPara){
		if(window.firstPara.style.display !== 'none'){
			window.firstPara.style.display = 'none';
		}
	}
	
	if(showPara.style.display != 'block'){
		showPara.style.display = 'block';
		window.firstPara = showPara;
	}
	
}

function toggleSection(thisImage, thisDd) {
    var detailSection = thisDd;
    var toggleImage = thisImage;
    if (detailSection.style.display == "block") {
        detailSection.style.display = "none";
        toggleImage.src = "css/collapsed.gif";
    } else {
        detailSection.style.display = "block";
        toggleImage.src = "css/expanded.gif";
    }
}

function toggleObject(toggObject) {
    var targetObj = this.toggObject;
    if (targetObj.style.display != "block") {
        targetObj.style.display = "block";
    } else {
        targetObj.style.display = "none";
    }
}

function expandCollapse(details, toggle, txt) {
	var para1, para2, para3, detailSection, toggleImage, toggleText;
	
	para1 = details;
	para2 = toggle;
	para3 = txt;
	
    detailSection = document.getElementById(para1);
    toggleImage = document.getElementById(para2);
    toggleText = document.getElementById(para3);
    if (detailSection.style.display == "block") {
        detailSection.style.display = "none";
        toggleImage.src = "css/collapsed.gif";
        toggleText.innerHTML = "more...";
    } else {
        detailSection.style.display = "block";
        toggleImage.src = "css/expanded.gif";
        toggleText.innerHTML = "hide";
    }
}

function showHide(obj1) {
    var el1 = document.getElementById(obj1);
    if (el1.style.display != "block") {
        el1.style.display = "block";
        el1.style.background = "rgba(255,255,255,0.6)";
    } else {
        el1.style.display = "none";
    }
}

function showHidePlus(target, trigger) {
    var el1 = document.getElementById(target);
    var el2 = document.getElementById(trigger);
    if (el1.style.display != "block") {
        el1.style.display = "block";
        el1.style.background = "rgba(255,255,255,0.6)";
        el2.innerHTML = " HIDE ";
    } else {
        el1.style.display = "none";
        el2.innerHTML = " SHOW ";
    }
}

function onloadIframeLoop(getFunkyIframe) {

    var onloadIframePartial = window.onload;

    if (typeof onloadIframePartial === "function") {
        window.onload = function () {

            if (onloadIframePartial) {
                onloadIframePartial();
            }
            getFunkyIframe();
        };
    }
    else {
        window.onload = getFunkyIframe;
    }
}

// INIT the PREVIEW COMMENTS FUNCTION
onloadIframeLoop(initShowComm);
