
body,html{
    background-color:#fafafa;
    background-image:url(backgrounddiagonal.gif);
    color:#330;
    font-family:"Liberation Sans","DejaVu Sans",Arial,Helvetica,sans-serif;
    font-size:10pt;
	margin:0;
	padding:0;
}

body * {
	padding:0.25em;
}

dl{
    background-image:url("parchment-desat-bg.jpg");
    border:0.1em dashed #DDDDDD;
    font-family:sans-serif;
    margin:1em 0 2em 0.5em;
    padding:1em;
    width:90%;
}

dl dd dl{
    background-color:#EEEEEE;
    border:medium none;
    margin-bottom:0;
}

dl dd ul{
    background-image:none;
    background-color:rgba(255,255,235,0.7);
    list-style-position:inside;
    margin-left:-0.5em;
    padding:0.2em;
}

dl dd ul li{
    background-color:transparent;
    font-family:Arial,"DejaVu Sans","Helvetica",sans-serif;
    text-indent:0.5em;
}

dl dt{
    font-family:serif;
    font-weight:600;
    background-image:none;
    background-color:rgba(255,255,255,1.0);
}

h1,h2,h3,h4,h5,h6{
	border-right:18pt solid #E3E7F7;
    font-family:"Placard Condensed", "Liberation Serif", "DejaVu Serif", Georgia, serif;
    padding:0.5em 0.25em ;
    background-color:#fefefe;
    background-image:url(contentbg-bluegrad-horiz_plus-transparent.png);
    background-position:0px 30%;
}

li{
    font-family:serif;
    font-size:0.95em;
    font-weight:400;
}

p{
    padding:0.25em 1em;
}

pre{
    background-color:rgb(224,224,218);
    background-image:url("code-bg.jpg");
    border:0.2em 0.2em double double #eeccaa #eeccaa;
    color:rgb(0,0,204);
    display:block;
    margin:0.5em auto;
    padding:1em 1em;
    white-space:pre;
    width:92%;
}

* html p.displaynone{
    display:none;
    margin-left:8em;
    width:100%;
}

* html.unfloat{
    height:1%;
}

.antihead{
    margin-top:-0.5em;
}

.attn{
    background-color:rgb(0,0,51);
    color:rgb(221,221,51);
    font-family:"Comic Sans MS","comic sans",cursive;
}

.bg_grey{
    background-color:rgb(221,221,221);
}

.bg_lightx2grey{
    background-color:rgb(238,238,238);
}

.bg_white{
    background-color:rgb(255,255,255);
}

.bold{
    font-weight:800;
}

.bottomsmaller{
    background-color:rgb(204,221,221);
    border:0.1em 0.1em dashed dashed #999999 #999999;
    color:rgb(0,0,128);
    display:block;
    font-family:Arial,"Helvetica",sans-serif;
    font-size:0.8em;
    margin:0.5em 2em;
    padding:1.5em 1.5em;
    text-align:justify;
}

.center{
    text-align:center;
}

.closeme{
    color:rgb(0,51,255);
    font-family:serif;
    text-align:center;
}

.code{
    background-color:rgb(238,238,238);
    color:rgb(51,51,119);
    display:inline-block;
    font-family:monospace;
}

.content{
    background-color:rgb(254,254,248);
    font-family:sans-serif;
    font-weight:400;
    margin:0.5em auto;
    padding:0.25em 0.25em;
}

.content p{
    background-color:inherit;
    background-position:bottom center;
    background-repeat:repeat-x;
}

.content p *{
    background-color:rgba(255,255,255,0.6);
}

.coral{
    color:rgb(255,127,80);
}

.darkorange{
    color:rgb(255,140,0);
}

.defListTitle{
    border:none;
    color:rgb(221,0,34);
    font-family:serif;
    font-style:italic;
    margin-bottom:0.3em;
    width:50%;
}

.error{
    background-color:rgb(0,102,204);
    color:rgb(255,255,255);
    display:table-cell;
    padding:0.2em 0.2em;
}

.floatLt,.floatleft,.floatLeft,.floatlt{
    float:left;
    position:relative;
}

.floatRt,.floatright,.floatrt,.floatRight{
    float:right;
    position:relative;
}

.hidden,li.hiddenitem,li.hidden{
    visibility:hidden;
}

.indentOne{
    text-indent:1em;
}

.indianred{
    color:rgb(205,92,92);
}

.italic{
    font-style:italic;
}

.keyTerms {
    background-color:rgb(250,250,250);
    display:block;
    font-family:sans-serif;
    margin:0 2em;
    padding:0.2em 1em;
    text-align:justify;
}

.keyTerms h4{
    border:0.2em 0.2em outset outset #aaaaaa #aaaaaa;
    padding:0.3em 0.3em;
    width:8em;
}

.keyTerms ul li{
    font-size:0.8em;
    margin-bottom:2em;
}

.keyTerms ul li pre{
    background-image:none;
    font-size:larger;
}

.keyTerms ul li sup{
    font-size:1em;
}

.keyTerms ul li sup code{
    font-size:larger;
}

.mediumblue{
    color:rgb(0,0,205);
}

.parchment{
    background-image:url('parchmosteven.jpg');
}

.pseudocode {
    background-color:rgb(240,240,234);
    color:rgb(0,136,0);
    font-family:"Liberation Mono", "DejaVu Sans Mono",  "Lucida Console", "Monaco", monospace;
    font-size:0.9em;
    margin:0.2em 0.2em;
}

.right{
    text-align:right;
}

.sanserif,.sans-serif,.sansSerif,.sans{
    font-family:sans-serif;
}

.sansSerif{
    font-family:"DejaVu Sans","Liberation Sans",Arial,"Helvetica",sans-serif;
}

.sansSerifBold{
    font-family:"DejaVu Sans","Liberation Sans",Arial,"Helvetica",sans-serif;
    font-weight:700;
}

.serif{
    font-family:serif;
}

.serif{
    font-family:"DejaVu Serif Condensed","Liberation Serif","Book Antiqua","Palatino Linotype","Palatino",serif;
}

.serifBold{
    font-family:"DejaVu Serif Condensed","Liberation Serif","Book Antiqua","Palatino Linotype","Palatino",serif;
    font-weight:700;
}

.showMatches{
    background-color:rgb(221,221,238);
    border:0.1em 0.1em double double #996600 #996600;
    font-family:monospace;
    margin:1.5em auto;
    padding:0.2em 2em;
    width:80%;
}

.smaller{
    font-size:smaller;
}

.steelblue{
    color:rgb(70,130,180);
}

.tableHeadrow{
    font-family:serif;
    font-size:1.1em;
    font-weight:700;
    text-align:center;
    vertical-align:middle;
}

.testValue{
    background-color:rgb(255,255,221);
    color:rgb(0,221,0);
    font-family:monospace;
    font-size:0.9em;
    white-space:pre;
}

.toggler,.trigger{
    color:rgb(0,0,128);
    cursor:help;
    font-family:"Liberation Sans","DejaVu Sans",Arial,Helvetica,sans-serif;
    font-variant:small-caps;
    letter-spacing:0.1em;
    line-height:2em;
    vertical-align:middle;
}

.unfloat{
    display:inline-block;
}

.violet{
    color:rgb(238,130,238);
}

.width_150{
    width:150px;
}
/**     QUICK COPY FOR HOVERIN' LINKS, YAW DINKS!

:link
:visited
:focus
:hover
:active

**/

.width_200{
    width:200px;
}

.width_25{
    width:25px;
}

.width_37{
    width:37px;
}

.width_40{
    width:40px;
}

div.content{
    background-color:#fafafa;
    margin:0;
    padding:0;
}

div.content div p{
	/*    background-image:url(contentbg-bluegrad-horiz_plus-transparent.png);	*/
    background-position:0px 5%;
    background-repeat:repeat-x;
    color:green;
    margin:0;
    padding:1em;
}

span.pointer,span.toggler{
    cursor:pointer;
    font-family:"liberation mono", "dejavu sans mono", "lucida console", monospace;
    font-size:0.8em;
    font-variant:small-caps;
    padding-left:0;
}

#pagewidth{
    background-color:rgba(255,255,255,0.3);
    display:block;
    margin:0 auto;
    width:90%;
}

.alignleft,.leftalign,.left,.align-left,.left-align,.alignleft *,#dbFormContainer,.alignleft,.leftalign,.left,.align-left,.left-align,.alignleft *,.left,#dbFormContainer{
    text-align:left;
}

.inline,.inline,ul#imgShow,ul#imgShow{
    display:inline;
}

.target,.target,li.forbidden,li.forbiddenitem,li.db .nav,li.exeicon,li.hiddenitem,.displaynone,.displayNone,.collapsableDd,#collapser-0,li.forbidden,li.forbiddenitem,li.db .nav,li.exeicon,li.hiddenitem,.displaynone,.displayNone,.collapsableDd,#collapser-0{
    display:none;
}

div.centered,#calContainer{
    display:block;
    margin:0 auto;
    text-align:center;
}

ul.nobull li,li.nobull,li.nobull,ul.nobull li,#controList,#urlSplit{
    list-style-type:none;
}

a:hover{
    color:red;
}

a:link{
    color:blue;
}

a:visited{
    color:green;
}
