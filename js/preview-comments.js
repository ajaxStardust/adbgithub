/*
    ATTEMPTING TO MAKE JAVASCRIPT CREATE NODE
    TO DISPLAY A PREVIEW OF THE COMMENTS FOR EACH
    SELECTED WEB LINK NAME OF THE DIRECTORY BROWSER
*/


// window.onload = initShowComm;

function initShowComm() {
	document.getElementById("url_addr").selectedIndex = 0;
	document.getElementById("url_addr").onchange = showComments;
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
