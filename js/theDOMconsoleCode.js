/*
 NOTE...
 THIS CODE ORIGINATED AS THE WEBDEVELOPER TOOLBAR DOM CONSOLE
 AND AS SUCH, WAS CONTAINED COMPLETELY WITHIN ONE LINE,
 AS A BOOKMARKLET. HOWEVER, IT IS UP TO YOU
 TO DISSECT THIS CODE AND LEARN SOMETHING ABOUT JAVASCRIPT
 IN THE PROCESS!
*/

var docEles=[];
var tempBank='';
 var windowWidth=450;
 var background='url(data:image/png;charset=utf-8;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAIAAAACUFjqAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGeYUxB9wAAACBjSFJNAAB6JQAAgIMAAPoBAACA5gAAdTEAAOpcAAA6lwAAF25E0P0BAAAAPUlEQVR42mLcdeAKA24AEEBMDHgBQAARkAYIIALSAAFEQBoggAhIAwQQAWmAACIgDRBABKQBAoiANECAAQDTLgJiYYMOJQAAAABJRU5ErkJggg%3D%3D)';
 var currentEle='';
 var shiftKey=false;
 var isXHTML=/html\:/.test(document.getElementsByTagName('body')[0].nodeName);
 function createNewEle(ele){
 if(isXHTML) { return document.createElementNS('http://www.w3.org/1999/xhtml', ele); }else { return document.createElement(ele); };
 };
 function showIt(key){
	var ele=document.getElementById(docEles[key]);
 var x=ele.offsetLeft, y=ele.offsetTop;
 while(ele.offsetParent){
	ele=ele.offsetParent;
 x+=ele.offsetLeft;
 y+=ele.offsetTop;
 };
 ele=document.getElementById(docEles[key]);
 tempBank=window.getComputedStyle(ele,null).getPropertyValue('background-color');
 ele.style.backgroundColor='#99f';
 setTimeout('document.getElementById(docEles['+key+']).style.backgroundColor=\''+tempBank+'\';',600);
 window.scrollTo(x-150, y-150);
 }
 var ns='http://www.w3.org/1999/xhtml';
 function charm(){
	var ele=createNewEle('div');
 ele.id='tree';
 var maxDeep=0;
 var bankCounts=[];
 var za=0;
 function count(eleName) {
 var isIn=false;
 for(var c=0;c < bankCounts.length; c++) {
 if(bankCounts[c][0]==eleName){
	isIn=true;
	bankCounts[c][1]++;
 }
 }
 if(!isIn) bankCounts.push([eleName,1]);
 };

 function createDOMTree(node, toEle, colorDeepCurrent){
 if( node.nodeType==3) {
 if(!/^[\u0009\u000A\u00A0\u000D\u000B\u0020]*$/.test(node.data))  {
 var eleTemp=toEle.appendChild(createNewEle('span'));
 eleTemp.className='showText';
 eleTemp.appendChild(document.createTextNode(node.nodeValue));
 }}if( node.nodeType==1){colorDeepCurrent++;
 var newEle=toEle.appendChild(createNewEle('div'));
 var attrs='';
 if(node.attributes.length > 0) {for(var z=0; z < node.attributes.length;z++) if(node.attributes[z] ) attrs+=node.attributes[z].name+' : '+node.attributes[z].value+'\u000A';
 }var hasChildTyp1=false;
 for (var k=0; ((child=node.childNodes[k]) && !hasChildTyp1); k++) if(child.nodeType==1) hasChildTyp1=true;
 count(node.nodeName);
 if(hasChildTyp1) newEle.className='folderClose';
 newEle.id='eleKey'+za;
 if(node.getAttribute('id')=='' || node.getAttribute('id')==null) node.id='keyXR5T'+za;
 docEles.push(node.id);
 za++;
 if(maxDeep < colorDeepCurrent) maxDeep = colorDeepCurrent;
 var newEleName=newEle.appendChild(createNewEle('h2'));
 newEleName.appendChild(document.createTextNode(node.nodeName));
 if(hasChildTyp1){
 var toggle=newEleName.appendChild(createNewEle('span'));
 toggle.className='toggle open';
 toggle.appendChild(document.createTextNode('\u2192'));
 toggle=newEleName.appendChild(createNewEle('span'));
 toggle.className='toggle close';
 toggle.appendChild(document.createTextNode('\u2193'));
 }
 if(node.attributes.length > 0) newEle.appendChild(createNewEle('pre')).appendChild(document.createTextNode(attrs));
 for(var k=0; child=node.childNodes[k]; k++) createDOMTree(child, newEle, colorDeepCurrent);
 }}
 createDOMTree(document.documentElement, ele, 0);
 var win=window.open('','','top='+window.innerHeight*0.05+',height='+window.innerHeight*0.9+',width='+windowWidth+',resizable=yes');
 win.document.open();
 win.document.write(''+
	 '<!DOCTYPE html PUBLIC \u0022-//W3C//DTD XHTML 1.0 Transitional//EN\u0022 \u0022http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\u0022>'+
	 '<html xmlns=\u0022http://www.w3.org/1999/xhtml\u0022>'+
		'<head>'+
		'<title>DOM tree for: '+location.href+
		'</title>'+
		'<style type=\u0022text/css\u0022 >'+
		'body {padding:0 5px 50px 5px;
		margin:0;
		font-family:\u0022Lucida sans unicode\u0022;
		font-size:11px;
		background-color:#26267F;
		color:rgb(190,190,190);
		}'+
		'h1, h3 {
		padding:5px;
		margin:0;
		}'+
		'h2 {
		margin:0;
		padding3px;
		font-size:12px;
		}'+
		'p {
		margin:5px;
		padding:0px;
		font-family:\u0022Courier New\u0022
		}'+
		'h1 + h3 + p + p {
		padding-bottom:7px
		}'+
		'h1, h2 {
		color:rgb(210,210,210)
		}'+
		'#tree {
		padding:0px;
		margin:-7px 0px 0px -15px;
		border:0px solid;
		clear:both;
		}'+
		'#divFix, #divFix:hover {
		position:fixed;
		left:0;
		right:0;
		bottom:0;
		background-color:#003;
		border:0px solid;
		margin:0;
		padding:5px;
		text-align:center;
		}'+
		'/*label {
		display:block;
		text-align:right;
		padding:0 7px
		}*/'+
		'#divFix > input {
		width:120px;
		font-family:\u0022Lucida sans unicode\u0022;
		font-size:11px;
		line-height:20px;
		color:#333;
		float:left;
		vertical-align:middle;
		}'+
		'#divFix > input + input {
			float:right
		}'+
		'pre {
			white-space:pre-wrap;
			margin:0;
			padding:1px 0;
			font-family:\u0022Courier New\u0022;
			font-weight:normal;
		}'+
		'.folderClose, div {
			padding:3px 2px 2px 3px;
			margin:5px 0px 0px 15px;
			border:1px solid transparent;
			cursor:pointer;
		}'+
		'.folderOpen, div:hover {
			border-color:rgb(170,170,210);
			border-right-color:#000;
			border-bottom-color:#000;
		}'+
		'.folderOpen div {
			display:block;
		}'+
		'.folderClose div{
			display:none;
		} '+
		'.showText {display:inline;}'+
		'.hideText {display:none;}'+
		'span {
			background-color:rgb(210,210,210);
			color:#333;
			font-weight:normal;
			padding:0 5px
		}'+
		'.folderOpen .open {
			display:none
		}'+
		'.folderOpen .close {
			display:inline
		}'+
		'.folderClose .close {
			display:none
		}'+
		'.folderClose .open {
			display:inline
		}'+
		'.toggle{
			background-color:transparent;
			cursor:pointer;
			padding:3px 10px;
			font-weight:bold;
			color:rgb(190,190,190);
		}'+
		'.toggle:hover {
			background-color:#1E1E66;
			xcolor:#fff;
		}'+
		'/*.open:hover {
			content:\'\u2193\'
		}'+
		'.close:hover {
			content:\'\u2192\';
		}*/'+
		'</style>'+
		'<script type=\u0022text/javascript\u0022>'+
		'function tree(e){'+
		'if(opener==null)
			window.close();'+
			'var ele=e.target;'+
			'if(/toggle/.test(ele.className)){'+
			'var toToggle=ele.parentNode.parentNode;'+
			'if(/Close/.test(toToggle.className)){'+
			'toToggle.className=toToggle.className.replace(/Close/i,\'Open\')'+
		'}
		else{'+
		'toToggle.className=toToggle.className.replace(/Open/i,\'Close\');'+
		'};'+
		'}
		else{'+
			'while(ele.parentNode && ele.nodeName.toUpperCase()!=\u0022DIV\u0022)
				ele=ele.parentNode;
				var eleKey=parseInt(ele.id.replace(/eleKey/,\u0022\u0022));'+
				'opener.showIt(eleKey);'+
		'}'+
		'};'+
	'function showWholeTree(ele) {'+
		'if(opener==null)
			window.close();'+
		'if(/show/.test(ele.value)){'+
		'for(var k=0;div=document.getElementsByTagName(\'div\')[k];k++)'+
		'div.className=div.className.replace(/Close/,\'Open\');'+
		'ele.value=\'close whole tree\';'+
		'}
		else{'+
		'for(var k=0;div=document.getElementsByTagName(\'div\')[k];k++)'+
		'div.className=div.className.replace(/Open/,\'Close\');'+
		'ele.value=\'show whole tree\';'+
		'}'+
	'}'+
	'function showTextNodes(ele) {'+
		'if(opener==null)'+
		'window.close();'+
		'if(/show/.test(ele.value)){'+
		'for(var k=0;span=document.getElementsByTagName(\'span\')[k];k++)'+
		'span.className=span.className.replace(/hideText/,\'showText\');'+
		'ele.value=\'hide Text Nodes\';'+
		'}
		else{'+
		'for(var k=0;span=document.getElementsByTagName(\'span\')[k];k++)'+
		'span.className=span.className.replace(/showText/,\'hideText\');'+
		'ele.value=\'show Text Nodes\';'+
		'}'+
	'}'+
	'function showEle(eleIndex) {'+
		'for(var k=0;div=document.getElementsByTagName(\'div\')[k];k++)'+
		'div.className=div.className.replace(/Open/,\'Close\');'+
		'var ele=document.getElementById(\'eleKey\'+eleIndex);'+
		'if(/folder/.test(ele.className))'+
		'ele.className=ele.className.replace(/Close/,\'Open\');'+
		'while(ele.parentNode && /folder/.test(ele.parentNode.className)) {'+
		'ele=ele.parentNode;'+
		'ele.className=ele.className.replace(/Close/,\'Open\');}'+
		'ele=document.getElementById(\'eleKey\'+eleIndex);'+
		'var y=ele.offsetTop;'+
		'while(ele.offsetParent){'+
		'ele=ele.offsetParent;'+
		'y+=ele.offsetTop;};'+
		'window.scrollTo(0, y-200);'+
		'document.getElementById(\'eleKey\'+eleIndex).style.backgroundColor=\'#99f\';'+
'setTimeout(\'document.getElementById(\u0022eleKey\'+eleIndex+\'\u0022).style.backgroundColor=\u0022transparent\u0022;\',600);'+
	'}'+
	'</script>'+
	'</head><body><h1>DOM tree for: '+
	document.title+
	'</h1><h3>address: '+location.href+'</h3></body></html>';
	);
			win.document.close();
			for(var c=0;c < bankCounts.length; c++) {
				bankCounts[c][0]=bankCounts[c].join(': ');
				bankCounts[c].pop();
			};
			win.document.body.appendChild(win.document.createElement('p')).appendChild(win.document.createTextNode('max deep of a nested Element: '+maxDeep));
			win.document.body.appendChild(win.document.createElement('p')).appendChild(win.document.createTextNode(' | '+bankCounts.join(' | ')+' | '));
			var divFix=win.document.body.appendChild(win.document.createElement('div'));
			divFix.id='divFix';
			var button=divFix.appendChild(win.document.createElement('input'));
			button.type='button';
			button.value='show whole tree';
			button.onclick=function(){win.showWholeTree(this)};
			var button2=divFix.appendChild(win.document.createElement('input'));
			button2.type='button';
			button2.value='hide Text Nodes';
			button2.onclick=function(){win.showTextNodes(this)};
			win.document.body.appendChild(win.document.importNode(ele,true));
			win.document.getElementById('tree').onclick=win.tree;
			button.onclick=function(){win.showWholeTree(this)};
			document.onclick=function(e) {
				if(typeof win.document!='undefined'){;
					var ele=e.target;
					var eleId=ele.id;
					var i=0;
					while(eleId!=docEles[i] && i<docEles.length)
						i++;
						win.showEle(i);
						win.focus();
						return false;
				}
			};
			document.onmouseover=function (e) {
				if( typeof win.document!='undefined' && shiftKey ){
					if( e.target!=currentEle ){
						if(currentEle.style) currentEle.style.backgroundImage='';
							currentEle=e.target;
							if( currentEle!=document.documentElement && !/body/.test(currentEle.nodeName.toLowerCase()) )
								currentEle.style.backgroundImage=background;
							}
						}
						else {
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
			}
		charm();
;
