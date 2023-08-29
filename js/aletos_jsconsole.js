javascript:
var isXHTML=/html\:/.test(document.getElementsByTagName('body')[0].nodeName);
function createNewEle(ele){
   if(isXHTML) { return document.createElementNS('http://www.w3.org/1999/xhtml', ele); }
   else { return document.createElement(ele); };
};
(function () {
var ele=createNewEle('div');
ele.innerHTML='<input type=\'hidden\'  id=\'text1\' />';
document.body.appendChild(ele);
})();
function getJS() {
location.href='javascript:'+document.getElementById('text1').value;
}
(function (){
function openDataWindow (string) { void(window.open('data:text/plain;charset=utf-8,'+escape(string),'','height=360,width=750'))};
var Vars=['isXHTML','createNewEle','VXMLAudioRecording','navigate','getJS','scroll','setInterval','setTimeout','stop','Node','Image','close','confirm','blur','enableExternalCapture','disableExternalCapture','focus','forward','home','moveBy','moveTo','open','print','prompt','releaseEvents','resizeBy','resizeTo','scrollBy','scrollTo','Option','Event','back','alert','history','navigator','clientInformation','screen','opera','frames','java','netscape','sun','Packages','vxml','attachEvent','captureEvents','detachEvent','getComputedStyle','clearInterval','clearTimeout','parent'];
var a=''; 
for(b in window) {
	var i=0;
	var defaultFeature=false;
	while(i < Vars.length && !defaultFeature ) {
		if(b.toString()==Vars[i]) defaultFeature=true;
		i++;
	};
	if(!defaultFeature) a+='<a href=javascript:setJS(\'alert('+b+')\',false) >'+b+'</a> , ';
}
a=a.replace(/, $/,'');
var c=window.open('','','height=400,width='+window.innerWidth*.5+',top='+(window.innerHeight-(400+10))+',left='+(window.innerWidth*.5-30)+',resizable=yes,location=no');
c.document.open();
c.document.write(''+
'<!DOCTYPE html PUBLIC \u0022-//W3C//DTD XHTML 1.0 Transitional//EN\u0022 \u0022http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\u0022>'+
'<html xmlns=\u0022http://www.w3.org/1999/xhtml\u0022>'+
'<head><head><title>js console for '+document.title+'</title><style type=\u0022text/css\u0022>'+
'html {min-height:100\u0025;}'+
'body{font-family:\u0022Lucida sans unicode\u0022;font-size:12px;padding:0;margin:0;'+
'line-height:18px;'+
'background:#ccc url(\u0022data:image/gif;charset=utf-8;base64,R0lGODlhLQAqAMQAAAAAAP\u00252F\u00252F\u00252F8jGx8jHyMfGx8bFxsXExcTDxMPCw8LBwr69vr28vcjIycfHyMbGx8XFxsTExcPDxMLCw8HBwsHCw8jIyMHBwcDAwL\u00252B\u00252Fv76\u00252Bvv\u00252F\u00252F\u00252FwAAAAAAAAAAAAAAAAAAACH5BAEAABoALAAAAAAtACoAAAX\u00252FICGOZGmeaCqtbOu\u00252BcCzPdG3feI5T0vGIDggiMZkkEBCH6HGQ8F6XqHRKrVqvWKllouu6KDyfQyBImc8nSMTLbmGimMxiTq\u00252FTFe\u00252BsFKOw19uAK3qDhIWGh1iBgGA9D2NlaJFnim2SKAIVDJqbFZCWn6CfZUEIKxAFBJ6RZQUQK0hKWlyUN5u2t7i5urubsrQ3ocEoaxIRBg4DyQ2tpRKnBMkDBAUHQ0VHB6jR064SSAUNyQ4GxBCOwpIOv12hDZm8nA3o85Pr9vf4\u00252BWE\u00252FBKRERrCWNHniApFBQlvyxWAkhgw9SWoUzsgTx49FPIX4WJwjkcbBjyBDXuk4g6Ejhw\u00252FRAoQAADs\u00253D\u0022) scroll repeat 0 0;}'+
'#content {padding:3px 10px 50px 10px;background:transparent url(\u0022data:image/gif;charset=utf-8;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAbCAYAAAC9WOV0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGeYUxB9wAAACBjSFJNAAB6JQAAgIMAAPoBAACA5gAAdTEAAOpcAAA6lwAAF25E0P0BAAAAh0lEQVR42mL4DwQAAcTEwMDwGyCAQMQvgAACET8AAghE\u00252FAQIIBDxHSCAwARAAIGIbwABBCK\u00252BAgQQmAAIIDABEEBgAiCAQMQXgAACEwABBOYCBBCYBRBAYAIggMBcgAACEwABBCYAAghMAAQQ2BSAAAKbBxBAYAIggMB2AAQQ2DaAAALbCxBgAFTMHTdnhW6kAAAAAElFTkSuQmCC\u0022) scroll repeat-x 0 0;}'+
'textarea{width:100\u0025;height:200px;}'+
'#control{display:block;position:absolute;left:0;padding:0;bottom:0;width:100\u0025;background:transparent url(\u0022data:image/gif;charset=utf-8;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAbCAYAAAC9WOV0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGeYUxB9wAAACBjSFJNAAB6JQAAgIMAAPoBAACA5gAAdTEAAOpcAAA6lwAAF25E0P0BAAAAiklEQVR42mL4\u00252F\u00252F8\u00252FK0AAMTEwMLABBBCI4AAIIBDBDhBAIIITIIDABEAAgQgugAACEdwAAQQmAAIITAAEEJgACCAQwQMQQGACIIDAXIAAArMAAghMAAQQmAsQQGACIIDABEAAgQmAAAKbAhBAYPMAAghMAAQQ2A6AAALbBhBAYHsBAogB6IL\u00252FAAEGAOdiCCbNnJ39AAAAAElFTkSuQmCC\u0022) scroll repeat-x 0 100\u0025;}'+
'#control p {padding:10px;height:25px;}'+
'input{float:right;margin:0 2px;font-family:\u0022Lucida sans unicode\u0022;font-size:12px;max-width:96px;}'+
'input[value~=\u0022go\u0022] {float:left}'+
'a{text-decoration:none;color:#000;padding:0 5px}'+
'a:hover{background-color:#fff}'+
'h3{margin:7px 0px;}'+
'h3:first-child+div{border-bottom:1px solid #666;padding-bottom:7px;}'+
'</style>'+
'<script type=\'text/javascript\'>'+
'function setJS(string,bol){'+
'if(bol)document.getElementById(\'done\').innerHTML+=\'> \'+document.getElementById(\'text9\').value.replace(/\\n/g,\'<br/>&nbsp;&nbsp;&nbsp;\')+\'<br/>\';'+
'opener.document.getElementById(\'text1\').value=string;'+
'opener.location.href=\'javascript:getJS()\'}'+
'</script></head><body><div id=\'content\'>'+
'<h3>existing functions and variables:</h3><div>'+a+'</div><h3>history:</h3><div id=\'done\'></div><textarea id=\'text9\' >function changeBG(color){document.body.style.backgroundColor=color}\nchangeBG(\'#0f0\')</textarea>'+
'</div><div id=\'control\' ><p>'+
'<input type=\'button\' value=\'go !\' onclick=\'setJS(document.getElementById(\u0022text9\u0022).value,true)\' />'+
'<input type=\'button\' value=\'close\' onclick=\'close()\'; />'+
'<input type=\'button\' value=\'clear history\' onclick=document.getElementById(\'done\').innerHTML=\'\'; />'+
'<input type=\'button\' value=\'clear input\' onclick=document.getElementById(\'text9\').value=\'\'; />'+
'</p></div></body></html>');
c.document.close();
})()