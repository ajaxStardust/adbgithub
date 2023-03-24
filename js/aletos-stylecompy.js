/**
** @fileoverview
** 	creates an instance of a new window which monitors its opener,
**	reporting the CSS properties of any element clicked in the opener
**/

var keyCSV=true;
var highlightedTarget='';
var outputerWidth=320;
var outputerHeight=65;
var outputer='';
var shiftKey=false;
var showToggle=false;
var styleProp = [
	['azimuth', 'undefined'],
	['background-attachment', 'scroll'],
	['background-color', 'transparent'],
	['background-image', 'none'],
	['background-position', '0px 0px'],
	['background-repeat', 'repeat'],
	['border-collapse', 'separate'],
	['border-spacing', '0px',true],
	['border-top', '0px'],
	['border-right', '0px'],
	['border-bottom', '0px'],
	['border-left', '0px'],
	['bottom', '0px',true],
	['caption-side', 'top'],
	['clear', 'none'],
	['clip', 'rect(0px, 0px, 0px, 0px)'],
	['color', 'rgb(0, 0, 0)'],
	['content', 'none'],
	['counter-increment', 'none'],
	['counter-reset', 'none'],
	['cue-after', 'undefined'],
	['cue-before', 'undefined'],
	['cue', 'undefined'],
	['cursor', 'default'],
	['direction', 'ltr'],
	['display', 'doIt'],
	['elevation', 'undefined'],
	['empty-cells', 'hide'],
	['float', 'none'],
	['font-family', 'Times New Roman'],
	['font-size', '16px',true],
	['font-style', 'normal'],
	['font-variant', 'normal'],
	['font-weight', '400',true],
	['height', '0px',true],
	['left', '0px',true],
	['letter-spacing', '0px',true],
	['line-height', 'normal'],
	['list-style-image', 'none'],
	['list-style-position', 'outside'],
	['list-style-type', 'disc'],
	['list-style', 'disc outside none'],
	['margin-top', '0px',true],
	['margin-right', '0px',true],
	['margin-bottom', '0px',true],
	['margin-left', '0px',true],
	['max-height', '0px',true],
	['max-width', '0px',true],
	['min-height', '0px',true],
	['min-width', '0px',true],
	['orphans', '2'],
	['outline-color', 'invert'],
	['outline-style', 'none'],
	['outline-width', '3px',true],
	['outline', '3px',true],
	['overflow', 'visible'],
	['padding-top', '0px',true],
	['padding-right', '0px',true],
	['padding-bottom', '0px',true],
	['padding-left', '0px',true],
	['page-break-after', 'auto'],
	['page-break-before', 'auto'],
	['page-break-inside', 'auto'],
	['pause-after', 'undefined'],
	['pause-before', 'undefined'],
	['pause', 'undefined'],
	['pitch-range', 'undefined'],
	['pitch', 'undefined'],
	['play-during', 'undefined'],
	['position', 'static'],
	['quotes', 'none'],
	['richness', 'undefined'],
	['right', '0px',true],
	['speak-header', 'undefined'],
	['speak-numeral', 'undefined'],
	['speak-punctuation', 'undefined'],
	['speak', 'undefined'],
	['speech-rate', 'undefined'],
	['stress', 'undefined'],
	['table-layout', 'auto'],
	['text-align', 'left'],
	['text-decoration', 'none'],
	['text-indent', '0px',true],
	['text-transform', 'none'],
	['top', '0px',true],
	['unicode-bidi', 'normal'],
	['vertical-align', 'baseline'],
	['visibility', 'visible'],
	['voice-family', 'undefined'],
	['volume', 'undefined'],
	['white-space', 'normal'],
	['widows', '2'],
	['width', '0px',true],
	['word-spacing', '0px',true],
	['z-index', 'auto']
];
var background='url(data:image/png;charset=utf-8;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAIAAAACUFjqAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGeYUxB9wAAACBjSFJNAAB6JQAAgIMAAPoBAACA5gAAdTEAAOpcAAA6lwAAF25E0P0BAAAAPUlEQVR42mLcdeAKA24AEEBMDHgBQAARkAYIIALSAAFEQBoggAhIAwQQAWmAACIgDRBABKQBAoiANECAAQDTLgJiYYMOJQAAAABJRU5ErkJggg%3D%3D)';
function getStylesEle(ele){
	if(showToggle) {
		if(highlightedTarget.style) highlightedTarget.style.backgroundImage='';
			var temp0=window.getComputedStyle(ele,null);
			var output='';
			for(i=0;i<styleProp.length;i++) {
				var temp=temp0.getPropertyValue(styleProp[i][0]);
				if(temp) {
					if(styleProp[i][2]) {{ 
						if(temp!=styleProp[i][1]) output+=styleProp[i][0]+' : '+temp+'<br/>'; 
					}}
					else {{ 
						if(temp.indexOf(styleProp[i][1])!=0 ) output+=styleProp[i][0]+' : '+temp+'<br/>'; 
					}}
				}
			}
			outputer.document.getElementById('text9').innerHTML=output;
			outputer.document.getElementById('container').style.display='block';
			outputer.adjust();
			outputer.focus();
			if( highlightedTarget!=document.documentElement && !/body/.test(highlightedTarget.nodeName.toLowerCase()) && shiftKey ) highlightedTarget.style.backgroundImage=background;
	}
}
function closeViewer() {
	if(outputer.close) outputer.close();highlightedTarget.style.backgroundImage='';
	keyCSV=false;
}
function makeOutput(ele) {
	var za=0;
	var output='';
	var temp='';
	function makeEntry(){
		output=''+'<a '+((za==0)?'class=\'current\'':'')+' href=javascript:opener.getStylesEle(opener.highlightedTarget'+temp+')   >'+ele.nodeName+'</a>'+output;
}makeEntry();while(ele.parentNode && ele.parentNode.nodeName!='#document'){ele=ele.parentNode;
output=' > '+output;
za++;temp+='.parentNode';makeEntry();}outputer.document.getElementById('output1').innerHTML=output;
}(function () {
document.onmouseover=function (e) {
	if(outputer.document=='undefined' || outputer.document==null) closeViewer();
	if( typeof outputer.document!='undefined' && !showToggle){
		if( e.target!=highlightedTarget ){
			if(highlightedTarget.style) highlightedTarget.style.backgroundImage='';highlightedTarget=e.target;outputer.document.getElementById('container').style.display='none';makeOutput(highlightedTarget);outputer.adjust();
			if( highlightedTarget!=document.documentElement && !/body/.test(highlightedTarget.nodeName.toLowerCase()) && shiftKey ) highlightedTarget.style.backgroundImage=background;
		}
	}
};
document.onclick=function (e) { 
	if(keyCSV) {
		if(outputer.focus){
			outputer.focus()
		}
		else {
		closeViewer ();keyCSV=false
		};
		if(!showToggle){
			showToggle=true;
			getStylesEle(highlightedTarget);
		}
		else {
		showToggle=false;
		outputer.document.getElementById('container').style.display='none';
		outputer.adjust();
		};
	return false;
	}
};
document.onkeydown=function(e){
		if(e.keyCode==16) shiftKey=true;
};
document.onkeyup=function(e){
	if(shiftKey) shiftKey=false;
};
outputer=window.open('','','height='+(outputerHeight)+',width='+outputerWidth+'');
outputer.document.open();
outputer.document.write(''+
'<!DOCTYPE html PUBLIC \u0022-//W3C//DTD XHTML 1.0 Transitional//EN\u0022 \u0022http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\u0022>'+
'<html xmlns=\u0022http://www.w3.org/1999/xhtml\u0022>'+
'<head>'+
'<title>computed style for '+document.title+'</title>'+
'<style type=\'text/css\'>'+
'html {	min-height:100%;'+'background:%23ccc url(\u0022data:image/gif;charset=utf-8;base64,R0lGODlhLQAqAMQAAAAAAP%2F%2F%2F8jGx8jHyMfGx8bFxsXExcTDxMPCw8LBwr69vr28vcjIycfHyMbGx8XFxsTExcPDxMLCw8HBwsHCw8jIyMHBwcDAwL%2B%2Fv76%2Bvv%2F%2F%2FwAAAAAAAAAAAAAAAAAAACH5BAEAABoALAAAAAAtACoAAAX%2FICGOZGmeaCqtbOu%2BcCzPdG3feI5T0vGIDggiMZkkEBCH6HGQ8F6XqHRKrVqvWKllouu6KDyfQyBImc8nSMTLbmGimMxiTq%2FTFe%2BsFKOw19uAK3qDhIWGh1iBgGA9D2NlaJFnim2SKAIVDJqbFZCWn6CfZUEIKxAFBJ6RZQUQK0hKWlyUN5u2t7i5urubsrQ3ocEoaxIRBg4DyQ2tpRKnBMkDBAUHQ0VHB6jR064SSAUNyQ4GxBCOwpIOv12hDZm8nA3o85Pr9vf4%2BWE%2FBKRERrCWNHniApFBQlvyxWAkhgw9SWoUzsgTx49FPIX4WJwjkcbBjyBDXuk4g6Ejhw%2FRAoQAADs%3D\u0022) scroll repeat 0 0; }'+
'body {	'+
'	font-family:\'Lucida sans unicode\'; '+
'	font-size:12px; '+
'	padding:0; '+
'	margin:0; '+
'	line-height:18px;'+
'	overflow:hidden;'+
'	background:transparent url(\u0022data:image/gif;charset=utf-8;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAbCAYAAAC9WOV0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGeYUxB9wAAACBjSFJNAAB6JQAAgIMAAPoBAACA5gAAdTEAAOpcAAA6lwAAF25E0P0BAAAAh0lEQVR42mL4DwQAAcTEwMDwGyCAQMQvgAACET8AAghE%2FAQIIBDxHSCAwARAAIGIbwABBCK%2BAgQQmAAIIDABEEBgAiCAQMQXgAACEwABBOYCBBCYBRBAYAIggMBcgAACEwABBCYAAghMAAQQ2BSAAAKbBxBAYAIggMB2AAQQ2DaAAALbCxBgAFTMHTdnhW6kAAAAAElFTkSuQmCC\u0022) scroll repeat-x 0 0; '+
'}'+
'input, label, select {	position:relative;	display:inline-block;	height:24px;	vertical-align:middle;}'+
'select {margin-left:10px}'+
'input[type=\'button\']{float:right;margin-right:2px;}'+
'a {	text-decoration:none;	color:%23333;	padding:0 2px;	font-size:11px;	vertical-align:-1px;}'+
'a:hover {background-color:%23fff}'+
'%23output1 {	font-size:8px;	padding:5px;}'+
'%23control {height:32px; line-height:24px; margin-top:5px; background:transparent url(\u0022data:image/gif;charset=utf-8;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAbCAYAAAC9WOV0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGeYUxB9wAAACBjSFJNAAB6JQAAgIMAAPoBAACA5gAAdTEAAOpcAAA6lwAAF25E0P0BAAAAiklEQVR42mL4%2F%2F8%2FK0AAMTEwMLABBBCI4AAIIBDBDhBAIIITIIDABEAAgQgugAACEdwAAQQmAAIITAAEEJgACCAQwQMQQGACIIDAXIAAArMAAghMAAQQmAsQQGACIIDABEAAgQmAAAKbAhBAYPMAAghMAAQQ2A6AAALbBhBAYHsBAogB6IL%2FAAEGAOdiCCbNnJ39AAAAAElFTkSuQmCC\u0022) scroll repeat-x 0 100%;}'+
'.current {	font-weight:bold;	color:%23000}'+
'%23container {	padding:0 2px;}'+
'%23container div {'+
'	background-color:%23fff;'+
'	border-left:1px solid rgb(90,90,90);'+
'	border-right:1px solid rgb(90,90,90);'+
'	padding:0px 7px;'+
'}'+
'%23container span {'+
'	display:block;'+
'	margin:0 5px;'+
'	height:6px;'+
'	background-color:%23ff0;'+
'	position:relative;'+
'	background:transparent url(\'data:image/png;charset=utf-8;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAMCAYAAACqYHctAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGeYUxB9wAAACBjSFJNAAB6JQAAgIMAAPoBAACA5gAAdTEAAOpcAAA6lwAAF25E0P0BAAAAU0lEQVR42mJkYGBQY0ADAAHEGBUV9R9dECCAGP8DAbogQAAxMWABAAGEVRAggLAKAgQQVkGAAMIqCBBAWAUBAgirIEAAsURHR2MIAgQQVscDBBgAszALU0wK9JgAAAAASUVORK5CYII%3D\') repeat-x scroll 0 -6px;'+
'}'+
'%23container span:first-child {background-position:0 0}'+
'%23container span:before, %23container span:after {'+
'	content:\' \';'+
'	height:6px;'+
'	width:5px;'+
'	display:block;'+
'	position:absolute;'+
'	background:transparent url(\'data:image/png;charset=utf-8;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAMCAYAAABbayygAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGeYUxB9wAAACBjSFJNAAB6JQAAgIMAAPoBAACA5gAAdTEAAOpcAAA6lwAAF25E0P0BAAABI0lEQVR42mL8%2F%2F8%2FAyMjIysDA4MIEHMCMQsDBPwB4u9A%2FAao5jdAALEAFbHp6elZqampVbCyshoA%2BeIgVUDJl79%2F%2F75w69atDqDYMYAAYrC2tnaIj49%2Ft3Xr1v%2Fv3r37DwMgNkgMJAdSAxBADAkJCccfPHjwHxe4d%2B%2Fef5AagABiArJN5eTkGHABBQUFkDNMAQKICegOZqAbcCoEyYHUAAQQEwORACCAmDg4OEBG41QAkgOpAQggJk1NzT9AB%2BNUCPQoA0gNQAAx3L59e19mZua33bt3%2F3%2F%2F%2Fj3ctyA2SAwkB1IDEECMQDGtly9fnlixYgUvMHAZPnz4ADZJQECAARgJDBEREZ%2FFxcUtAAII7AYgVgTi1UD8HCkIn0PFQHIMAAEGAONMxws2CoMDAAAAAElFTkSuQmCC\') no-repeat scroll 0 -6px;'+
'}'+
'%23container span:before{left:-5px;}'+
'%23container span:first-child:before {background-position:0 0}'+
'%23container span:first-child:after {background-position:-5px 0}'+
'%23container span:after {right:-5px;background-position:-5px -6px;}'+
'</style>'+
'<script type=\'text/javascript\'>'+
'var outputerWidth='+outputerWidth+';'+
'var targetClass=\'\';'+
'function adjust(){'+
'var newHeight=56;'+
'var ele=document.getElementById(\'control\');'+
'while(ele.offsetParent) {newHeight+=ele.offsetTop;ele=ele.offsetParent};'+
'window.resizeTo(outputerWidth,newHeight);'+
'}'+
'window.onload=function(){'+
'document.onclick=function(e){'+
'if(e.target.nodeName.toLowerCase()==\'a\'){'+
'	var ele=e.target;'+
'	for(i=0; childs=document.getElementById(\'output1\').getElementsByTagName(\'a\')[i]; i++) childs.className=\'\';'+
'	ele.className=\'current\''+
'}'+
'}'+
'}'+
'</script></head><body>'+
'<div id=\'output1\' class=\'key56zr8\' ></div>'+
'<div id=\'container\'><span></span><div id=\'text9\' ></div><span></span></div>'+
'<div id=\'control\'>'+
'<input type=\'button\' value=\'close\' onclick=opener.closeViewer(); />'+
'</div><span id=\u0022footer\u0022></span>'+
'</body></html>');
outputer.document.close();outputer.document.getElementById('container').style.display='none';outputer.document.onkeydown=function(e){if(e.keyCode==16) shiftKey=true;
};outputer.document.onkeyup=function(e){if(shiftKey) shiftKey=false;
};
}
)();