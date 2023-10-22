
function toggleFontfamily(ddClsr) {
	var ddUnhide = document.getElementById(ddClsr.id);

	if (ddUnhide.style.display !== "block") {
		ddUnhide.style.display = "block";
	}
	else {
		ddUnhide.style.display = "none";
	}
}


function scanItalic() {
	var italiClasses, italiTogg, thisList, listItems, listContainer, tc, thisContainer,
		thisDiv;
	
	function viewItalic(thisContainer) {
		thisDiv = thisContainer;
		thisList = thisDiv.getElementsByTagName("ul");
		thisList[0].style.fontStyle = "italic";
	}
	
	italiClasses = document.getElementsByClassName("toggitalic");
	
	for(tc=0; tc < italiClasses.length; tc=tc+1) {
		italiTogg = italiClasses[tc];
		listContainer = italiClasses[tc].parentNode;
		italiTogg.onclick = (function (listContainer) {
			return function() {
				viewItalic(listContainer);
			};
		}(italiTogg));
	}
}

function initTogglers() {
    var dtToggs, dtId, dtSubstr, ddId, toggRegex, i, ddUnhide, ddClsr,
		declarAnchor, decLI, ddSubjects = [];
	declarAnchor = document.getElementById("declarAnchor");
    dtToggs = document.getElementsByTagName("dt");
    toggRegex = /(toggler)(\w+)/i;
    for (i = 0; i < dtToggs.length; i++) {
		if (toggRegex.test(dtToggs[i].className)) {
			dtId = dtToggs[i].id;
			dtSubstr = (dtId.length -2);
			ddId = dtId.substr(0,dtSubstr) + "DD";
			ddSubjects[i] = document.getElementById(ddId);
			dtToggs[i].onclick = (function (ddClsr) {
				return function() {
					toggleFontfamily(ddClsr);	
				};				
			}(ddSubjects[i]));
		}
	}
}


function initCurrent() {

	var theFace, customPreview, emLight, strongLight, customPreviewStyle;

	theFace = document.getElementById('newfontname');
	customPreview = document.getElementById("disp");
	customPreviewStyle = customPreview.style;
	emLight = document.getElementById("emlight");
	strongLight = document.getElementById("stronglight");

	if (customPreviewStyle.fontStyle || customPreviewStyle.fontStyle) {
		if (customPreviewStyle.fontStyle !== "") {
			emLight.setAttribute("src", "css/green-light-on.png");
		}
		else {
			emLight.src =  "css/light-off.png";
		}

		if (customPreviewStyle.fontWeight !== "") {
			strongLight.setAttribute("src", "css/green-light-on.png");
		}
		else {
			strongLight.src = "css/light-off.png";
		}
	}
	if (theFace && theFace.style.color !== '#FF0;') {
		theFace.style.color = '#FF0;';
	}
}

function onfocusElect() {
	var theInp, theDisp, theParent, jstest;
	theInp = document.getElementById("inp");
	jstest = document.getElementById("jstest");
	theDisp = document.getElementById("disp");
	theInp.onfocus = theInp.select();
	/* theInp.onfocus = function () {
		jstest.innerHTML = "disp.length is: " + theDisp.length + "<br />disp.innerHTML is: " + theDisp.innerHTML;
		select(theInp);
	}*/

}

function fontSizer() {

	var preview, thisText, sizeSelect, sizeOption, targetEl, sizeValue,
		sizeText, i, j;

	sizeValue = [];
	sizeText = [];
	sizeSelect = document.getElementById("textsizer");
	sizeOption = sizeSelect.getElementsByTagName("option");

	for (i = 0; i < sizeOption.length; i++) {
		sizeValue[i] = sizeOption[i].value;
	}
	for (j = 0; j < sizeOption.length; j++) {
		sizeText[j] = sizeOption[j].text;
	}

	sizeSelect.onchange = function (sizeOption) {
		thisText = sizeText[this.value];
		targetEl =	document.getElementById("disp");
		targetEl.style.fontSize = thisText;
		preview = document.getElementById("jsPreview");
		preview.innerHTML = thisText;
	};

}

function toggitalic(elementId, prop, val) {
	var el;
	el = typeof elementId === 'object' ? elementId : document.all ? document.all[elementId] : document.getElementById(elementId);
	if (el.holder === val) {
		el.holder = el.style[prop] = '';
	}
	else {
		el.style[prop] = el.holder = val;
	}
}

function togglebold(elementId, prop, val) {
	var el = typeof elementId === 'object' ? elementId : document.all ? document.all[elementId] : document.getElementById(elementId);
	if (el.holder === val) {
		el.holder = el.style[prop] = '';
	}
	else {
		el.style[prop] = el.holder = val;
	}
}

function relay_text(from, to) {
	var thisRelay, thisTarget;
	if (typeof from === 'object') {
		thisRelay = this.from;
	}
	else {
		thisRelay =	document.getElementById(from);
	}
	if (typeof to === 'object') {
		thisTarget = this.to;
	}
	else {
		thisTarget = document.getElementById(to);
	}
	thisTarget.innerHTML = thisRelay.value;
}

function initDispEl() {
	var customDisp, customPreviewTextThen;
	customDisp = document.getElementById("disp");
	if (customDisp !== '') {
		customPreviewTextThen = customDisp.innerHTML;
	}
}

function onloadLooper(funkinOnload) {
	var oldOnload = this.onload;

	if (typeof oldOnload === "function") {
		window.onload = function () {
			if (oldOnload) {
				oldOnload();
			}
			funkinOnload();
		};
	} else {
		window.onload = funkinOnload;
	}
}

onloadLooper(initDispEl);
onloadLooper(initTogglers);
onloadLooper(initCurrent);
onloadLooper(fontSizer);
onloadLooper(onfocusElect);
