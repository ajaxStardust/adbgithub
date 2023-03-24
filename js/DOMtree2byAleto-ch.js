// script (c) and written by aleto
// http://aleto.ch

// This work is licensed under the Creative Commons Attribution License. To  view a
// copy of this license, visit http://creativecommons.org/licenses/by/1.0/  or send
// a letter to Creative Commons, 559 Nathan Abbott Way, Stanford,  California 94305,
// USA.

var docEles=[];
var tempBank='';
var windowWidth=450;
var background='url(data:image/png;charset=utf-8;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAIAAAACUFjqAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGeYUxB9wAAACBjSFJNAAB6JQAAgIMAAPoBAACA5gAAdTEAAOpcAAA6lwAAF25E0P0BAAAAPUlEQVR42mLcdeAKA24AEEBMDHgBQAARkAYIIALSAAFEQBoggAhIAwQQAWmAACIgDRBABKQBAoiANECAAQDTLgJiYYMOJQAAAABJRU5ErkJggg%3D%3D)';
var currentEle='';
var currentEleStyle=false;
var shiftKey=false;
var win={};
var showItEle='';
var isXHTML=/html\:/.test(document.getElementsByTagName('body')[0].nodeName);
function createNewEle(ele, doc){
	if(isXHTML) { return ( doc ? doc : window ).document.createElementNS('http://www.w3.org/1999/xhtml', ele); }
	else { return ( doc ? doc : window ).document.createElement(ele); };
};
function showIt(key){
	showItEle=document.getElementsByTagName('*')[key];
	var ele=showItEle;
	var x=ele.offsetLeft, y=ele.offsetTop;
	while(ele.offsetParent){ele=ele.offsetParent;x+=ele.offsetLeft;y+=ele.offsetTop;};
	tempBank=window.getComputedStyle(showItEle,null).getPropertyValue('background-color');
	showItEle.style.backgroundColor='#99f';
	setTimeout('showItEle.style.backgroundColor=\''+tempBank+'\';',600);
	window.scrollTo(x-150, y-150);
}
var styleProp=[['azimuth', 'undefined'],['background-attachment', 'scroll'],['background-color', 'transparent'],['background-image', 'none'],['background-position', '0px 0px'],['background-repeat', 'repeat'],['border-collapse', 'separate'],['border-spacing', '0px',true],['border-top', '0px'],['border-right', '0px'],['border-bottom', '0px'],['border-left', '0px'],['bottom', '0px',true],['caption-side', 'top'],['clear', 'none'],['clip', 'rect(0px, 0px, 0px, 0px)'],['color', 'rgb(0, 0, 0)'],['content', 'none'],['counter-increment', 'none'],['counter-reset', 'none'],['cue-after', 'undefined'],['cue-before', 'undefined'],['cue', 'undefined'],['cursor', 'default'],['direction', 'ltr'],['display', 'doIt'],['elevation', 'undefined'],['empty-cells', 'hide'],['float', 'none'],['font-family', 'Times New Roman'],['font-size', '16px',true],['font-style', 'normal'],['font-variant', 'normal'],['font-weight', '400',true],['height', '0px',true],['left', '0px',true],['letter-spacing', '0px',true],['line-height', 'normal'],['list-style-image', 'none'],['list-style-position', 'outside'],['list-style-type', 'disc'],['list-style', 'disc outside none'],['margin-top', '0px',true],['margin-right', '0px',true],['margin-bottom', '0px',true],['margin-left', '0px',true],['max-height', '0px',true],['max-width', '0px',true],['min-height', '0px',true],['min-width', '0px',true],['orphans', '2'],['outline-color', 'invert'],['outline-style', 'none'],['outline-width', '3px',true],['outline', '3px',true],['overflow', 'visible'],['padding-top', '0px',true],['padding-right', '0px',true],['padding-bottom', '0px',true],['padding-left', '0px',true],['page-break-after', 'auto'],['page-break-before', 'auto'],['page-break-inside', 'auto'],['pause-after', 'undefined'],['pause-before', 'undefined'],['pause', 'undefined'],['pitch-range', 'undefined'],['pitch', 'undefined'],['play-during', 'undefined'],['position', 'static'],['quotes', 'none'],['richness', 'undefined'],['right', '0px',true],['speak-header', 'undefined'],['speak-numeral', 'undefined'],['speak-punctuation', 'undefined'],['speak', 'undefined'],['speech-rate', 'undefined'],['stress', 'undefined'],['table-layout', 'auto'],['text-align', 'left'],['text-decoration', 'none'],['text-indent', '0px',true],['text-transform', 'none'],['top', '0px',true],['unicode-bidi', 'normal'],['vertical-align', 'baseline'],['visibility', 'visible'],['voice-family', 'undefined'],['volume', 'undefined'],['white-space', 'normal'],['widows', '2'],['width', '0px',true],['word-spacing', '0px',true],['z-index', 'auto']];
function getStylesEle(key){
	var ele=document.getElementsByTagName('*')[key];
	if(currentEle.style) currentEle.style.backgroundImage='';
	var temp0=window.getComputedStyle(ele,null);
	var output='computed Style Propertys:\n';
	for(i=0;i<styleProp.length;i++) {
		var temp=temp0.getPropertyValue(styleProp[i][0]);
		if(temp){
			if(styleProp[i][2]){
				{ if(temp!=styleProp[i][1]) output+='\t'+styleProp[i][0]+' : '+temp+'\n'; }
			}
			else {
				{ if(temp.indexOf(styleProp[i][1])!=0 ) output+='\t'+styleProp[i][0]+' : '+temp+'\n'; }
			}
		}
	}
	if( currentEle!=document.documentElement && !/body/i.test(currentEle.nodeName) && shiftKey )
		currentEle.style.backgroundImage=background;
  return output;
};
var errorOutput='';
function showErr(){void(window.open('data:text/plain;charset=utf-8,'+escape(errorOutput),'_blank',''));};
function output(from,lastFrom){
	var a, b=win.document.createElement('ul'), b0='', i, cur, temp=[], fromPart2;
	fromPart2=from.replace(/^.*\.([^\.]*$)/,'$1');
	if( ( /string|number/.test(typeof (eval(lastFrom))) ) ||
		fromPart2=='null' || /function/.test(fromPart2) ) {return null} else {cur=eval(from)};
	function addOutput(text){
		b.appendChild(win.document.createElement('li')).
			appendChild(win.document.createTextNode(text));
	};
	if(/object|function/.test(typeof cur)) {
		if(cur==null) {addOutput('null');return b;};
		if(/function/.test(cur)) {addOutput(cur);return b;};
		for(a in cur) b0+=a;
		if( b0.length > 0 ) {
			for(a in cur ) {
				if(/^[0-9]*$/.test(a)){temp.push('['+a+']');} else {temp.push(a);};
			};
			temp.sort();
			for(i=0; i<temp.length; i++) addOutput(temp[i]);
		} else {
			if( cur.length>0 ) {
				for(var i=0;i<cur.length; i++) addOutput('['+i+']');
			}
		}
	} else {
		if( cur || cur==0 ){addOutput(cur);} else {b=null};
	};
	return b;
};
function setSourceIndex(){
	var arr=document.getElementsByTagName('*'), ele,i;
	for(i=0;ele=arr[i];i++) ele.sourceIndex=i;
};
if(!document.documentElement.sourceIndex) setSourceIndex();
function createDOMTree(node, toEle){
	if( /3|8/.test(node.nodeType)) {
		var kind='';
		if( node.nodeType==8) kind='#comment: ';
		if(!/^[\u0009\u000A\u00A0\u000D\u000B\u0020]*$/.test(node.data)) {
			toEle.appendChild(win.document.createElement('p')).
				appendChild(win.document.createElement('span')).
				appendChild(win.document.createTextNode(kind+node.nodeValue));
		}
	}
	if( /1|9/.test(node.nodeType)  ){
		var newEle=toEle.appendChild(win.document.createElement('div'));
		var getCSPEle=newEle.appendChild(win.document.createElement('span'));
		getCSPEle.appendChild(win.document.createTextNode('get computed Styles'));
		getCSPEle.className='csp';
		var attrs='',attrsProv;
		if(node.attributes && node.attributes.length > 0) {
			for(var z=0; z < node.attributes.length;z++) {
				if(node.attributes[z] ) attrs+=node.attributes[z].name+' : '+
					((attrsProv=node.attributes[z].value).length>0?attrsProv:node.getAttribute(node.attributes[z].name))+'\u000A';
			}
		}
		newEle.id=node.sourceIndex;
		var newEleName=newEle.appendChild(win.document.createElement('h2'));
		newEle.appendChild(win.document.createElement('pre')).appendChild(win.document.createTextNode(''));
		newEleName.appendChild(win.document.createTextNode(node.nodeName));
		if(node.childNodes.length>0){
			var toggle=newEleName.appendChild(win.document.createElement('span'));
			toggle.className='toggle';
			toggle.appendChild(win.document.createTextNode('\u2192'));

		}
		if(attrs.length > 0) newEle.appendChild(win.document.createElement('pre')).
			appendChild(win.document.createTextNode(attrs));
	}
}
function makeLevel(ele,arrKey){
	var childs,child, i;
	if(typeof arrKey=='number') {
		childs=document.getElementsByTagName('*')[arrKey].childNodes;
	} else {
		childs=arrKey.childNodes;
	};
	for(i=0;child=childs[i];i++) createDOMTree(child, ele);
}
function showTree(ele) {
	var arr=[ele.sourceIndex],i;
	while(ele.parentNode && ele!=document.documentElement ) {
		ele=ele.parentNode;
		arr.push(parseInt(ele.sourceIndex));
	};
	arr.reverse();
	var toggle;
	var newTree=win.document.getElementById('undefined');
	if(toggle=newTree.getElementsByTagName('h2')[0].getElementsByTagName('span')[0]) toggle.firstChild.nodeValue='\u2193';
	if(win.document.getElementById('0')) newTree.removeChild(win.document.getElementById('0'));
	createDOMTree(document.documentElement, newTree);
	for(i=0;i<arr.length;i++) {
		makeLevel(win.document.getElementById(arr[i]),arr[i]);
		if(toggle=win.document.getElementById(arr[i]).getElementsByTagName('h2')[0].getElementsByTagName('span')[0]) toggle.firstChild.nodeValue='\u2193';
	};
	var eleTar=win.document.getElementById(arr[arr.length-1]);
	var y=eleTar.offsetTop;
	while(eleTar.offsetParent){eleTar=eleTar.offsetParent;y+=eleTar.offsetTop;};
	win.scrollTo(0, y-200);
	win.document.getElementById(arr[arr.length-1]).style.backgroundColor='#99f';
	win.setTimeout('document.getElementById('+arr[arr.length-1]+').style.backgroundColor=\u0022transparent\u0022;',600);
}
function charm(){
	var maxDeep=0;
	var bankCounts=[];
	function count(eleName) {
		var isIn=false;
		for(var c=0;c < bankCounts.length; c++) {
			if(bankCounts[c][0]==eleName){isIn=true;bankCounts[c][1]++;}
		}
		if(!isIn) bankCounts.push([eleName,1]);
	};
	function createDOMTree2(node, colorDeepCurrent){
		if( node.nodeType==1 ){
			colorDeepCurrent++;
			if(maxDeep < colorDeepCurrent) maxDeep = colorDeepCurrent;
			var k,arr=node.childNodes,child;
			count(node.nodeName);
			for (k=0; child=arr[k]; k++) createDOMTree2(child, colorDeepCurrent);
		}

	}
	createDOMTree2(document.documentElement, 0);
	function createDoc1(){
		win=window.open('','','top='+window.innerHeight*0.05+',height='+
			window.innerHeight*0.9+',width='+windowWidth+',resizable=yes,locatio=yes');
		win.document.open();
		win.document.write(''+
			'<!DOCTYPE html PUBLIC \u0022-//W3C//DTD XHTML 1.0 Transitional//EN\u0022'+
			'\u0022http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\u0022>'+
			'<html xmlns=\u0022http://www.w3.org/1999/xhtml\u0022><head></head><body></body></html>'+
			'');
		win.document.close();
	};
	function createDoc2(){
		win=window.open(location.href,'','top='+window.innerHeight*0.05+',height='+
			window.innerHeight*0.9+',width='+windowWidth+',resizable=yes');
		win.clearChild=function(){
			var i,ele;
			for(i=0;i<arguments.length;i++){
				ele=this.document.getElementsByTagName(arguments[i])[0];
				while(ele.firstChild) ele.removeChild(ele.firstChild);
			};
		};
		win.appNewChild=function(){
			var i;
			for(i=0;i<arguments.length;i++){
				this.document.documentElement.appendChild(this.document.createElement(arguments[i]));
			}
		};
		win.clearChild('head','body','html');
		win.appNewChild('head','body');
	};
	if(document.documentElement.parentNode.childNodes[5]) {createDoc2();} else {createDoc1();};
	win.document.getElementsByTagName('head')[0].
		appendChild(win.document.createElement('title')).
		appendChild(win.document.createTextNode('DOM tree for: '+location.href));
	var bodyEle=win.document.getElementsByTagName('body')[0];
	bodyEle.appendChild(win.document.createElement('h1')).
		appendChild(win.document.createTextNode('DOM tree for: '+document.title));
	bodyEle.appendChild(win.document.createElement('h3')).
		appendChild(win.document.createTextNode('address: '+location.href));
	var winStyle=''+
		'body {padding:0 5px 5px 5px;margin:0;font-family:\u0022Lucida sans unicode\u0022;'+
		'font-size:11px;background-color:#26267F;color:rgb(190,190,190);}'+
		'h1, h3 {padding:5px;margin:0;font-weight:normal;}'+
		'h2, h4 {margin:0;padding:0px;font-size:11px;}'+
		'h4 {margin-left:5px;}'+
		'p {margin:5px;padding:0px;}'+
		'#tree p {margin:5px 0px;}'+
		'h1 + h3 + p + p {padding-bottom:7px}'+
		'h1, h2 {color:rgb(210,210,210)}'+
		'#tree {padding:0px;margin:-7px 0px 0px -15px;border:0px solid;clear:both;}'+
		'pre {white-space:pre-wrap;margin:0;padding:1px 0;font-family:\u0022Lucida sans unicode\u0022;font-weight:normal;}'+
		'div {padding:3px 2px 2px 3px;margin:5px 0px 0px 15px;border:1px solid rgb(170,170,210);cursor:pointer;'+
		'border-right-color:#000;border-bottom-color:#000;}'+
		'span {background-color:rgb(210,210,210);color:#333;font-weight:normal;padding:0 5px}'+
		'.toggle {background-color:transparent;cursor:pointer;padding:3px 10px;font-weight:bold;color:rgb(190,190,190);}'+
		'.toggle:hover {background-color:#1E1E66;xcolor:#fff}'+
		'.csp {float:right;background-color:transparent;color:#26267F;}'+
		'.csp:hover {color:rgb(190,190,190)}'+
		'ul {padding:0;margin:0;list-style:none;padding-left:20px;}'+
		'#featTree {padding:2px 5px 20px 5px;position:relative;}'+
		'#featTree #featTreeContol {display:block;position:absolute;right:0;top:2px;}'+
		'#featTreeContol, #featTreeContol * {padding:0;margin:0;}'+
		'li{margin:0;padding:0;cursor:pointer;}'+
		'';
	function setStyle(string, doc) {
		var ele=createNewEle('link',(doc ? doc : false) );
		ele.rel='stylesheet';
		ele.type='text/css';
		ele.href='data:text/css;charset=utf-8,'+escape(string);
		( doc ? doc : window ).document.getElementsByTagName('head')[0].appendChild(ele);
	}
	setStyle(winStyle, win);
	win.tree=function (e){
		if(win.opener==null) win.close();
		var ele=e.target;
		if(/toggle/.test(ele.className)){
			var toToggle=ele.parentNode.parentNode;
			if(ele.firstChild.nodeValue=='\u2192'){
				ele.firstChild.nodeValue='\u2193';
				if(toToggle.id!='undefined' ) {makeLevel(toToggle,(toToggle.id-=0)) } else {makeLevel(toToggle, document.documentElement.parentNode)};
			} else {
				ele.firstChild.nodeValue='\u2192';
				var arr=toToggle.getElementsByTagName('div'),runner,m;
				while(arr[0]) toToggle.removeChild(arr[0]);
				arr=toToggle.getElementsByTagName('p');
				while(arr[0]) toToggle.removeChild(arr[0]);
			};
		}else{
			var getCSP=/csp/.test(ele.className);
			var eleOrgTarg=ele;
			while(ele.parentNode && !/div/i.test(ele.nodeName))ele=ele.parentNode;
			if(getCSP) {
				if(/clear/.test(eleOrgTarg.firstChild.nodeValue)) {
					eleOrgTarg.firstChild.nodeValue='get computed Styles';
					ele.getElementsByTagName('pre')[0].firstChild.nodeValue='';
				} else {
				ele.getElementsByTagName('pre')[0].firstChild.nodeValue=win.opener.getStylesEle(ele.id);
				eleOrgTarg.firstChild.nodeValue='clear computed Styles';
				}
			} else {
				win.opener.showIt(ele.id);
			}
		}
	};
	for(var c=0;c < bankCounts.length; c++) {
		bankCounts[c][0]=bankCounts[c].join(': ');
		bankCounts[c].pop();
	};
	bodyEle.appendChild(win.document.createElement('p')).
		appendChild(win.document.createTextNode('max deep of a nested Element: '+maxDeep));
	bodyEle.appendChild(win.document.createElement('p')).
		appendChild(win.document.createTextNode(' | '+bankCounts.join(' | ')+' | '));
	bodyEle.appendChild(win.document.createElement('h4')).
		appendChild(win.document.createTextNode('functions, objects and propertys:'));
	var feat,feat1,tempFeat;
	bodyEle.appendChild(feat=win.document.createElement('ul')).
		appendChild(feat1=win.document.createElement('li')).appendChild(win.document.createTextNode('window'));
	feat.id='featTree';
	feat.onclick=function(e){
		var ele=e.target;
		if(/li/i.test(ele.nodeName)){
			var tempEle;
			if(ele.getElementsByTagName('li')[0]) {
				if(win.document.getElementById('check').checked){
					var arrLi=ele.getElementsByTagName('li'),tempArr=[],eleLi,i;
					for(i=0;eleLi=arrLi[i];i++) if(!eleLi.getElementsByTagName('ul')[0]) tempArr.push(eleLi);
					for(i=0;i<tempArr.length;i++) win.getFeat(tempArr[i]);
				} else {
					ele.removeChild(ele.getElementsByTagName('ul')[0]);
				}
			} else {
				win.getFeat(ele);
			};
		}
	};
	feat1=feat1.appendChild(win.document.createElement('p'));
	feat1.id='featTreeContol';
	tempFeat=feat1.appendChild(win.document.createElement('label'));
	tempFeat.appendChild(win.document.createTextNode('open subfolders: '));
	tempFeat=tempFeat.appendChild(win.document.createElement('input'));
	tempFeat.type='checkbox';
	tempFeat.id='check';
	win.currEle;
	win.getFeat=function(ele){
		var tempDefNew=ele.firstChild.nodeValue;
		var tempDef='';
		var tempEle=ele;
		while(/li/i.test(tempEle.parentNode.parentNode)) {
			tempDef=tempEle.parentNode.parentNode.firstChild.nodeValue+'.'+tempDef;
			tempEle=tempEle.parentNode.parentNode;
		};
		ele.appendChild( output( (tempDef+tempDefNew).replace(/\.\[/,'['), tempDef.replace(/\.$/,'').replace(/\.\[/,'[') ) );
	};
	var ele=win.document.createElement('div');
	ele.id='tree';
	createDOMTree(document.documentElement.parentNode, ele, 0);
	bodyEle.appendChild(ele);
	win.document.getElementById('tree').onclick=win.tree;
	document.onclick=function(e) {
		if(typeof win.document!='undefined'){
			var ele=e.target;
			if(e.stopPropagation()) e.stopPropagation();
			if(ele.style) {
				if(currentEleStyle) {ele.setAttribute('style',currentEleStyle);currentEleStyle=false; }
				else {ele.style.backgroundImage='';ele.removeAttribute('style')};
			};
			showTree(ele);
			win.focus();
			return false;
		}
	};
	document.onmouseover=function (e) {
		if( typeof win.document!='undefined' && shiftKey ){
			if( e.target!=currentEle ){
				if(currentEle.style) {
					if(currentEleStyle) {
						currentEle.setAttribute('style',currentEleStyle);
						currentEleStyle=false;
					} else {
						currentEle.style.backgroundImage='';
						currentEle.removeAttribute('style');
					}
				}
				currentEle=e.target;
				if( currentEle!=document.documentElement && !/body/i.test(currentEle.nodeName) ){
					currentEleStyle=currentEle.getAttribute('style');
					currentEle.style.backgroundImage=background;
				}
			}
		} else {
			if(currentEle && currentEle.style) {
				currentEle.style.backgroundImage='';
				currentEle=false;
			}
		}
	};
	document.onkeydown=function(e){
		if(e.keyCode==16) shiftKey=true;
	};
	document.onkeyup=function(e){
		if(shiftKey) shiftKey=false;
	};
	win.document.onkeydown=function(e){
		if(e.keyCode==16) shiftKey=true;
	};
	win.document.onkeyup=function(e){
		if(shiftKey) shiftKey=false;
	};
};
(function(){
var ele=document.getElementsByTagName('body')[0].appendChild(createNewEle('div'));
/*
var but=ele.appendChild(createNewEle('input'));
but.type='button';
but.onclick=function(){charm()};
but.click();
*/
// REMOVED COMMENT 20090917 - js LINEs 396-401
ele.onclick=function(){charm()};
var event=document.createEvent("MouseEvents");
var click=event.initEvent('click',1,0);
ele.dispatchEvent(event);
click.onclick = click.focus();

ele.innerHTML='<a id=\'initCons5xtr\' href=\'javascript:charm()\' style=\'display:block;height:0;overflow:hidden\'></a>';
document.getElementById('initCons5xtr').click();
ele.parentNode.removeChild(ele);
})();
