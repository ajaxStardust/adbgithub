/**
* @overview: Version of "View Source Chart" bookmarklet which allows for Editing content of elements displayed
*	
*	https://pastebin.com/QX6rbyty
*
*	View Source Chart - Edit option
*	
*/
javascript:wprops = ''; 
function getComments(pnode) {     
    function doGetComments(node) {         
        if (node.nodeType == 8) {             
            node.nodeValue = node.nodeValue.replace(/</g, '<vsc')         
        } 
        else if (node.childNodes != null) {             
            for (var i = 0; i < node.childNodes.length; ++i) {                 
                doGetComments(node.childNodes.item(i))             
            }         
        }         
        return node     
    }     
    return doGetComments(pnode) 
} 
function vsc_getScripts(scriptTagArray) {     
    scrTags = scriptTagArray;     
    for (var si = 0; si < scrTags.length; si++) {         
        if (scrTags[si].childNodes) {             
            if (scrTags[si].childNodes.length > 1) {                 
                var thisisthelength = scrTags[si].childNodes.length;                 
                for (var xx = 1; xx < thisisthelength; xx++) {                     
                    scrTags[si].childNodes[xx].nodeValue = ''                 
                }             
            }             
            s = scrTags[si].text;             
            s = s.replace(/;/gi, 'vsc;');             
            s = s.replace(/</gi, '&lt;vsc ');             
            s = s.replace(/>/gi, '&gt;vsc');             
            s = s.replace(/\{/gi,'{vsc');             
            scrTags[si].text = s         
        }     
    }     
    return scrTags 
} 
function VSCb() {     
    vrs_doctypeTag = '';     
    for (var len = 0; len < document.childNodes.length; len++) {         
        rootElm = document.childNodes[len];         
        if (rootElm.nodeType == 1) {             
            if (rootElm.attributes.length > 0) {                 
                htatts = '';                 
                for (at = 0; at < rootElm.attributes.length; at++) {                     
                    htatts += ' ' + rootElm.attributes[at].nodeName + '="' + rootElm.attributes[at].nodeValue + '"'                 
                }                 vrs_htmlTag = '&lt;html <span style="color:#669966;">' + htatts + '</span>&gt;'             
            } 
            else {                 
                vrs_htmlTag = '&lt;html&gt;'             
            }         
        } 
        else {             
            var doc_type = document.doctype;             
            vrs_doctypeTag = '<span style="color:#37A8E9;font-style: italic;">&lt;!DOCTYPE ' + doc_type.name;             
            vrs_doctypeTag += doc_type.publicId ? ' PUBLIC "' + doc_type.publicId + '"' : '';             
            vrs_doctypeTag += doc_type.systemId ? '<br>"' + doc_type.systemId + '"&gt;' : '&gt;';             
            vrs_doctypeTag += '</span><BR>'         
        }     
    }     
    dom = document.documentElement.cloneNode(true);     
    vsc_getScripts(dom.getElementsByTagName('script'));     
    getComments(dom);     
    var titleString = ' onmouseover="this.title=this.childNodes[0] && this.childNodes[0].nodeType!=1 ? \'<\'+\'$2\'+this.childNodes[2].nodeValue : this.title;"';     
    var clicktagargs =  ' id="expandcollapse" onclick="event.stopPropogation;event.cancelBubble=true;collapseContainer(event.target);"';     
    elms = dom.innerHTML;     
    elms = elms.replace(/&/g, '&amp;');     
    elms = elms.replace(/</g, '&lt;');     
    elms = elms.replace(/>/g, '&gt;');     
    elms = elms.replace(/(&lt;(?! ?\/)(?=head(?= |&)|title|body|script|style|article|section|header|aside|footer|nav|dialog|figure|canvas|svg|div|span|p(?= |&)|table|thead|tfoot|tr|th|td|frameset|iframe|ul|ol|dl|dt|dd|li(?= |&)|blockquote))(\w+)/gi, '<div id="$2Tag"'+titleString+'>$1<span'+clicktagargs+'>$2</span>');
    /*onmouseover="this.title=(this.title==\' \')?\'<$2\'+this.childNodes[2].nodeValue:this.title;"*/     
    elms = elms.replace(/(&lt;(?! ?\/)(?=a(?= |&)|form|select|option|legend|fieldset|textarea|h[1-6]|center|caption|code|em(?= |&)|i(?= |&)|strong|b(?= |&)|font|m(?= |&)|progress|time|meter))(\w+)/gi, '<div id="$2Tag" onmouseover="this.title=this.childNodes[0].nodeValue;">$1$2');
    /*this.childNodes[0].nodeValue*/     
    elms = elms.replace(/(&lt; ?\/(head|title|body|script|style|article|section|header|aside|footer|nav|dialog|figure|canvas|svg|div|span|table|thead|tfoot|tr|th|td|frameset|iframe|ul|ol|dl|dt|dd|li|p|blockquote|code|a|form|select|option|legend|fieldset|textarea|em|i|strong|b|font|h[1-6]|center|caption|m|time|progress|meter)&gt;)/gi, '$1</div>');     
    elms = elms.replace(/&lt;!--/gi, '<div id="commTag" onmouseover="this.title=this.childNodes[0] && this.childNodes[0].nodeType!=1 ?\'<!--\'+this.childNodes[2].nodeValue:this.title"> <span'+clicktagargs+'>&lt;!--</span> ');     
    elms = elms.replace(/--&gt;/gi, '--&gt;</div>');     
    elms = elms.replace(/&lt;/g, '<br>&lt;');     
    elms = elms.replace(/&gt;/g, '&gt;<br>');     
    elms = elms.replace(/>\s*<br>/g, '>');     
    elms = elms.replace(/}(?!&lt;\/)/g, '}<br>');     
    elms = elms.replace(/{vsc/g, '{<br>');     
    elms = elms.replace(/&lt;vsc/g, '&lt;');     
    elms = elms.replace(/&amp;lt;vsc /gi, '&lt;');     
    elms = elms.replace(/&amp;gt;vsc/gi, '&gt;');     
    elms = elms.replace(/vsc;/gi, ';<br>');     
    elms = elms.replace(/<br>(\s*)<br>/gi, '<br>');     
    w = window.open('', '', wprops);     
    arsc = w.document.createElement('script');     
    w.document.getElementsByTagName('head')[0].appendChild(arsc);               
    /*'alert(contContent.parentNode.childNodes[0].nodeValue);'+  childNodes[0].nodeType*/     
    arsc.innerHTML = 'var collCon=new Array();'+     
        'function collapseContainer(contContent){'+     
        'if(contContent.parentNode.firstChild.nodeType != 1){'+    
        'var opentagtitle = contContent.parentNode.getAttribute(\'title\');opentagtitle=opentagtitle.replace("<","&lt;");'+     
        'var findendtagname = opentagtitle.indexOf(\' \')==-1?opentagtitle.length-1:opentagtitle.indexOf(\' \');'+     
        'var opentaglink=opentagtitle.substring(4,findendtagname);'+     
        'var openingtag = opentagtitle.replace(opentaglink,\'<span'+clicktagargs+'>\'+opentaglink+\'</span>\');'+     
        'collCon.push(contContent.parentNode.innerHTML);'+     
        'contContent.parentNode.innerHTML=\'<\'+\'input type=hidden name=jenja value=\'+(collCon.length-1)+\'>\'+openingtag;'/*'contContent.parentNode.childNodes[2].nodeValue*/+       
        '}else{'+     
        'var hiddenValue = parseInt(contContent.parentNode.firstChild.value);'+     
        'contContent.parentNode.innerHTML = collCon[hiddenValue];collCon[hiddenValue] = \'\';'+     
        '}'+     
        '}';               
    st = document.createElement('style');     
    w.document.getElementsByTagName('head')[0].appendChild(st);     
    st.innerHTML = 'div{padding:5px;margin:7px;font-family:verdana;font-size:10px;}div:hover{box-shadow:0 0 .75em #CCF}#expandcollapse{color:blue;cursor:pointer;}#headTag{border:dashed 1px #dcdcdc;}#titleTag{color:#556b2f;font-weight:bold;border:dashed 1px #556b2f;}#scriptTag{color:#009900;border:dashed 1px #009900;}#statements{border:1px dashed;}#styleTag{color:#8b008b;border:dashed 1px #8b008b;background-color:#ffffff; }#rulesChar{ margin:0px 3px 0px 7px;}#bodyTag,#canvasTag,#svgTag{border:dashed 1px #000000;}#divTag{background-color:#e6e6fa;border:solid 1px #d8bfd8;}#spanTag{background-color:#ffffe0;border:solid 1px #FFDF80;}#tableTag,#articleTag,#headerTag,#sectionTag,#asideTag,#footerTag,#navTag,#figureTag{background-color:#E8F0FF;margin:9px;border:solid 1px #99ccff;}#tbodyTag,#theadTag,#tfootTag{margin:4px}#trTag{border:dashed 1px #99ccff;background-color:#E8F0FF;}#thTag,#tdTag,#figcaptionTag{background-color:#E8F0FF;border:dotted 1px #99ccff;}#framesetTag{margin:7px;background-color:#ffe4ca;border:solid 1px #deb887;}#iframeTag{background-color:#c2e0ec;border:solid 1px #94c8de;}#ulTag,#olTag,#dialogTag,#dlTag{background-color:#E6F7DA;border:solid 1px #ADCA98;}#liTag,#dtTag{background-color:#E6F7DA;border:dotted 1px #ADCA98;}#ddTag{background-color:#E6F7DA;margin:7px 27px 7px 27px;border:dashed 1px #ADCA98;}#pTag{background-color:#fce0de;border:solid 1px #f9c3bf;}#blockquoteTag{background-color:#FBF0E9;border:solid 1px #F3D9C7;}#commTag{color:#999999;border: dashed 1px #999999;}#aTag{color:#000099;margin:0px 3px 0px 7px;}#emTag,#iTag,#strongTag,#bTag,#uTag,#h1Tag,#h2Tag,#h3Tag,#h4Tag,#h5Tag,#h6Tag,img,#centerTag,#fontTag,#formTag,#selectTag,#fieldsetTag,#legendTag,#textareaTag{margin:0px 3px 0px 7px;}#emTag,#iTag{font-style:italic;}#strongTag,#bTag{font-weight:bold;}#uTag{text-decoration:underline;}#h1Tag,#h2Tag,#h3Tag,#h4Tag,#h5Tag,#h6Tag{font-weight:bold;}';     
    w.document.body.innerHTML = '<section contenteditable="true"><span style="font-family:verdana;font-size:10px;">' + 
        vrs_doctypeTag + vrs_htmlTag + elms + '&lt;/html&gt</span></section>';     
    w.document.title = 'View Source Chart bookmarklet' 
}
VSCb();