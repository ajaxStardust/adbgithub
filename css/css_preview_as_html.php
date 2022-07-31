<?php
/*
**     NOTE: THIS DOCUMENT IS DECLARED AS HTTP-EQUIV(Content-Type) "application/xml-html"
**     IF YOUR SERVER CONFIGURATION (i.e. .conf, .htaccess, php.ini, etc.) is set to
**    parse HTML as XHTML (i.e. XML), in a strict manner, this document may not display,
**     instead, rendering as bad XML markup. In its original form, the XHTML below
**     should NOT cause a server error, but "never" is a heavy word in this business. ;-)
**
**    The recommended Content-type for the WWW as of 2009 is "text/html",
**    albeit such use is a direct contradiction of the very philosophy of XHTML.
*/
require 'inc/processor.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<head>
<title>DOCTYPE: W3C XHTML STRICT | Content-Type: APPLICATION/XML-HTML</title>

<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="content-type" content="application/xhtml+xml;charset=utf-8" />

<style type="text/css">
/*--><![CDATA[/*><!--*/
body {
  background-color: #f5f5f5;
  background-image: url("htmlbackground.jpg");
  background-position: 0px 0px;
  background-repeat:repeat-x;
  background-attachment: scroll;
  color: #330044;
  font-family: Arial, "DejaVu Sans", Helvetica, sans-serif;
  margin-top: 0;
  margin-right: 0;
  margin-bottom: 0;
  margin-left: 0;
  padding-top: 0;
  padding-right: 0;
  padding-bottom: 0;
  padding-left: 0
  }

code {
  background-color: inherit;
  color: #0055cc;
  line-height: 140%;
  padding-top: 0.2em;
  padding-right: 0.2em;
  padding-bottom: 0.2em;
  padding-left: 0.2em
}

dl {
  background-image: url("parchment-desat-bg.jpg");
  border-top-color: #dddddd;
  border-left-color: #dddddd;
  border-right-color: #dddddd;
  border-bottom-color: #dddddd;
  border-top-width: 0.1em;
  border-left-width: 0.1em;
  border-right-width: 0.1em;
  border-bottom-width: 0.1em;
  border-top-style: dashed;
  border-left-style: dashed;
  border-right-style: dashed;
  border-bottom-style: dashed;
  font-family: sans-serif;
  margin-top: 1em;
  margin-right: 0;
  margin-bottom: 2em;
  margin-left: 0.5em;
  padding-top: 1em;
  padding-right: 1em;
  padding-bottom: 1em;
  padding-left: 1em;
  width: 90%
  }

dl dd {
  background-color: #fcfcfa;
  background-image: none;
  margin-top: 1em;
  margin-right: 0;
  margin-bottom: 1em;
  margin-left: 0
  }

dl dt {
  font-weight: 600;
  font-family: serif;
  text-indent: -1em;
  border-bottom-color: #777777;
  border-bottom-width: 0.01em;
  border-bottom-style: solid
  }

dl dd code {
  background-image: url("code-bg.jpg");
  display: block;
  margin-top: 0.5em;
  margin-right: 0.5em;
  margin-bottom: 0.5em;
  margin-left: 0.5em;
  padding-top: 0.6em;
  padding-right: 0.6em;
  padding-bottom: 0.6em;
  padding-left: 0.6em
  }

dl dd dl {
  background-color: #eeeeee;
  border-top-color: currentColor;
  border-left-color: currentColor;
  border-right-color: currentColor;
  border-bottom-color: currentColor;
  border-top-width: medium;
  border-left-width: medium;
  border-right-width: medium;
  border-bottom-width: medium;
  border-top-style: none;
  border-left-style: none;
  border-right-style: none;
  border-bottom-style: none
  }

dl dd dl dd {
  background-image: inherit
  }

dl dd ul {
  background-color: transparent;
  list-style-position: inside;
  margin-left: -0.5em;
  padding-top: 0.2em;
  padding-right: 0.2em;
  padding-bottom: 0.2em;
  padding-left: 0.2em
  }

dl dd ul li {
  background-color: transparent;
  font-family: Arial, "DejaVu Sans", "Helvetica", sans-serif;
  text-indent: 0.5em
  }

dl dd ul ul {
  margin-left: 1em
  }

dt code {
  background-color: inherit;
  font-weight: 700
  }

h1, h2, h3, h4, h5, h6 {
  color: inherit;
  background-color: inherit
  }

h1 {
  text-shadow: 0.06em 0.05em 0.06em
  }

h3 {
  border-bottom-color: #aaaaff;
  border-bottom-width: 0.15em;
  border-bottom-style: groove;
  color: #1111aa;
  letter-spacing: -0.02em;
  width: 90%
  }

html {
  background-color: #efefef;
  color: #333333;
  margin-top: 0;
  margin-right: 0;
  margin-bottom: 0;
  margin-left: 0;
  padding-top: 0;
  padding-right: 0;
  padding-bottom: 0;
  padding-left: 0
  }

iframe {
  border-top-color: currentColor;
  border-left-color: currentColor;
  border-right-color: currentColor;
  border-bottom-color: currentColor;
  border-top-width: medium;
  border-left-width: medium;
  border-right-width: medium;
  border-bottom-width: medium;
  border-top-style: none;
  border-left-style: none;
  border-right-style: none;
  border-bottom-style: none;
  outline-width: medium;
  outline-style: none
  }

li {
  font-family: serif;
  font-weight: 400;
  font-size: 0.95em
  }

p {
  line-height: 140%;
  padding-top: 0;
  padding-right: 0.8em;
  padding-bottom: 0;
  padding-left: 0.8em
  }

pre {
  background-color: #e0e0da;
  background-image: url("code-bg.jpg");
  border-top-color: #eeccaa;
  border-left-color: #eeccaa;
  border-right-color: #eeccaa;
  border-bottom-color: #eeccaa;
  border-top-width: 0.2em;
  border-left-width: 0.2em;
  border-right-width: 0.2em;
  border-bottom-width: 0.2em;
  border-top-style: double;
  border-left-style: double;
  border-right-style: double;
  border-bottom-style: double;
  color: #0000cc;
  display: block;
  margin-top: 0.5em;
  margin-right: auto;
  margin-bottom: 0.5em;
  margin-left: auto;
  padding-top: 1em;
  padding-right: 1em;
  padding-bottom: 1em;
  padding-left: 1em;
  white-space: pre;
  width: 92%
  }

* html .unfloat {
  height: 1%
  }

* html p.displaynone {
  display: none;
  margin-left: 8em;
  width: 100%
  }

.alignleft, .leftalign, .left, .align-left, .left-align, .alignleft * {
  text-align: left
  }

.steelblue {
  color: #4682b4
  }

.indianred {
  color: #cd5c5c
  }

.inline {
	display:inline;
}

.coral {
  color: #ff7f50
  }

.darkorange {
  color: #ff8c00
  }

.violet {
  color: #ee82ee
  }

.mediumblue {
  color: #0000cd
  }

.antihead {
  margin-top: -0.5em
  }

.attn {
  background-color: #000033;
  color: #dddd33;
  font-family: "Comic Sans MS", "comic sans", cursive
  }

.bg_grey {
	background-color: #dddddd;
}

.bg_lightx2grey {
	background-color: #eeeeee;
}

.bg_white {
	background-color: #ffffff;
}

.bottomsmaller {
  background-color: #ccdddd;
  border-top-color: #999999;
  border-left-color: #999999;
  border-right-color: #999999;
  border-bottom-color: #999999;
  border-top-width: 0.1em;
  border-left-width: 0.1em;
  border-right-width: 0.1em;
  border-bottom-width: 0.1em;
  border-top-style: dashed;
  border-left-style: dashed;
  border-right-style: dashed;
  border-bottom-style: dashed;
  color: #000080;
  display: block;
  font-family: Arial, "Helvetica", sans-serif;
  font-size: 0.8em;
  margin-top: 0.5em;
  margin-right: 2em;
  margin-bottom: 0.5em;
  margin-left: 2em;
  padding-top: 1.5em;
  padding-right: 1.5em;
  padding-bottom: 1.5em;
  padding-left: 1.5em;
  text-align: justify
  }

.closeme {
  color: #0033ff;
  font-family: serif;
  text-align: center
  }

.code {
  background-color: #eeeeee;
  color: #333377;
  display: inline-block;
  font-family: monospace
  }

.content {
  background-color: #fefef8;
  font-family: sans-serif;
  font-weight: 400;
  margin-top: 0.5em;
  margin-right: auto;
  margin-bottom: 0.5em;
  margin-left: auto;
  padding-top: 0.25em;
  padding-right: 0.25em;
  padding-bottom: 0.25em;
  padding-left: 0.25em
  }

.defListTitle {
  border-top-color: currentColor;
  border-left-color: currentColor;
  border-right-color: currentColor;
  border-bottom-color: currentColor;
  border-top-width: medium;
  border-left-width: medium;
  border-right-width: medium;
  border-bottom-width: medium;
  border-top-style: none;
  border-left-style: none;
  border-right-style: none;
  border-bottom-style: none;
  color: #dd0022;
  font-family: serif;
  font-style: italic;
  margin-bottom: 0.3em;
  width: 50%
  }

.error {
  background-color: #0066cc;
  color: #ffffff;
  display: table-cell;
  padding-top: 0.2em;
  padding-right: 0.2em;
  padding-bottom: 0.2em;
  padding-left: 0.2em
  }

.floatLt, .floatleft, .floatLeft, .floatlt {
  float: left;
  position: relative
  }

.floatRt, .floatright, .floatrt, .floatRight {
  float: right;
  position: relative
  }

.hidden, li.hiddenitem, li.hidden {
  visibility: hidden
  }

.italic {
  font-style: italic
  }

.keyTerms {
  background-color: #fafafa;
  display: block;
  font-family: sans-serif;
  margin-top: 0;
  margin-right: 2em;
  margin-bottom: 0;
  margin-left: 2em;
  padding-top: 0.2em;
  padding-right: 1em;
  padding-bottom: 0.2em;
  padding-left: 1em;
  text-align: justify
  }

.keyTerms h4 {
  border-top-color: #aaaaaa;
  border-left-color: #aaaaaa;
  border-right-color: #aaaaaa;
  border-bottom-color: #aaaaaa;
  border-top-width: 0.2em;
  border-left-width: 0.2em;
  border-right-width: 0.2em;
  border-bottom-width: 0.2em;
  border-top-style: outset;
  border-left-style: outset;
  border-right-style: outset;
  border-bottom-style: outset;
  padding-top: 0.3em;
  padding-right: 0.3em;
  padding-bottom: 0.3em;
  padding-left: 0.3em;
  width: 8em
  }

.keyTerms ul li {
  font-size: 0.8em;
  margin-bottom: 2em
  }

.keyTerms ul li pre {
  background-image: none;
  font-size: larger
  }

.keyTerms ul li sup {
  font-size: 1em
  }

.keyTerms ul li sup code {
  font-size: larger
  }
.left {
	text-align:left;
}
.center {
	text-align:center;
	}
.right {
	text-align:right;
}
.parchment {
	background-image: url('parchmentintslightfinegrain-h.jpg');
}

.pseudocode {
  background-color: #f0f0ea;
  color: #008800;
  font-family: "Lucida Console", "DejaVu Sans Mono", "Monaco", monospace;
  font-size: 0.9em;
  margin-top: 0.2em;
  margin-right: 0.2em;
  margin-bottom: 0.2em;
  margin-left: 0.2em
  }

.red {
  color: #ff0000
  }

.sansSerif {
  font-family: Arial, "DejaVu Sans Condensed", "DejaVu Sans", "Helvetica", sans-serif
  }

.sansSerifBold {
  font-family: Arial, "DejaVu Sans", "Helvetica", sans-serif;
  font-weight: 700
  }

.serif {
  font-family: "Palatino Linotype", "Book Antiqua", "DejaVu Serif Condensed", "Palatino", serif
  }

.serifBold {
  font-family: "Palatino Linotype", "Book Antiqua", "DejaVu Serif", "Palatino", serif;
  font-weight: 700
  }

.showMatches {
  background-color: #ddddee;
  border-top-color: #996600;
  border-left-color: #996600;
  border-right-color: #996600;
  border-bottom-color: #996600;
  border-top-width: 0.1em;
  border-left-width: 0.1em;
  border-right-width: 0.1em;
  border-bottom-width: 0.1em;
  border-top-style: double;
  border-left-style: double;
  border-right-style: double;
  border-bottom-style: double;
  font-family: monospace;
  margin-top: 1.5em;
  margin-right: auto;
  margin-bottom: 1.5em;
  margin-left: auto;
  padding-top: 0.2em;
  padding-right: 2em;
  padding-bottom: 0.2em;
  padding-left: 2em;
  width: 80%
  }

.smaller {
  font-size: smaller
  }

.testValue {
  background-color: #ffffdd;
  color: #00dd00;
  font-family: monospace;
  font-size: 0.9em;
  white-space: pre
  }

.target {
  display: none
  }

.toggler, .trigger {
  font-family: "DejaVu Sans Condensed", "Arial Narrow", Arial, Helvetica, sans-serif;
  font-variant: small-caps;
  letter-spacing: 0.1em;
  vertical-align: middle;
  line-height: 2em;
  color:navy;
  cursor:help;
  }

.unfloat {
  display: inline-block
}

.width_40 {
	width: 40px;
}

.width_25 {
	width: 25px;
}

.width_37 {
	width: 37px;
}

.width_200 {
	width: 200px;
}

.width_150 {
	width: 150px;
}

code.codelite {
  background-color: #fffaef;
  color: #339955;
  line-height: 140%;
  padding-top: 0.4em;
  padding-right: 0.4em;
  padding-bottom: 0.4em;
  padding-left: 0.4em
  }

dt.cross {
  color: #008888;
  cursor: crosshair;
  font-family: Arial, "DejaVu Sans Condensed", "Helvetica", sans-serif;
  letter-spacing: 0.02em;
  margin-top: 1em
  }

h4.keyTermsHeading {
  color: #cc3300;
  font-family: Georgia, "DejaVu Serif", "Times", serif;
  font-style: italic
  }

hr.hidden {
  clear: both;
  visibility: hidden
  }

li.bakicon {
  list-style-image: url("bakicon.gif");
  list-style-type: none;
  visibility: hidden
  }

li.cssicon {
  list-style-image: url("css.png")
  }

li.dbicon, #navlist li.dbicon, li.nav.dbicon {
  list-style-image: url("db-icon.gif")
  }

li.htmlicon {
  list-style-image: url("html.png")
  }

li.imgShowItem img {
  color: #555555;
  height: 3em;
  width: 5em
  }

li.iniicon, li.conficon, li.cfgicon {
  list-style-image: url("ini-icon.gif")
  }

li.jsicon {
  list-style-image: url("javascript-icon.png")
  }

li.listhead li, li.listheaditem li, li.listHead li, li.listHeadItem li {
  counter-reset: inherit;
  list-style-image: url("bullet-rightwardarrow.gif")
  }

li.listhead, li.listheader, li.listHeader, li.listheaditem, li.listHead, li.listHeadItem {
  background-color: #ffffff;
  color: #800080;
  font-family: Georgia, "DejaVu Serif", "times", serif;
  font-size: 14pt;
  font-style: normal;
  font-variant: small-caps;
  font-weight: 700;
  list-style-type: none;
  margin-bottom: 1em;
  margin-top: 1.3em;
  padding-left: 0px;
  text-decoration: none
  }

li.logicon {
  list-style-image: url("log-icon.gif")
  }

li.mp3, li.mp3icon {
	list-style-image: url("mp3-icon.gif");
}

li.nav {
  list-style-image: url("bullet_square_grey.png");
  margin-left: -0.5em;
  padding-left: 0px
  }

li.navnobull {
  list-style-image: url("folder.gif")
  }

li.netcomicon {
  list-style-image: url("netcomicon16.gif")
  }

li.new_dirHandArr {
  list-style-image: url("folder-new.gif")
  }

li.pdficon {
  list-style-image: url("pdf.png")
  }

li.phpicon {
  list-style-image: url("page_white_php.png")
  }

li.phticon {
  list-style-image: url("page_white_code_php.png")
  }

li.proj-in-nav, li.projecticon, li.proj-in-nav a, li.projecticon a {
  background-color: #aaaaaa;
  color: #ffffff;
  list-style-image: url("project-files.gif")
  }

li.selicon {
  list-style-image: url("sel-icon.png")
  }

li.shortcutlink {
  list-style-image: url("link-icon.gif")
  }

li.sourceline, li.sourceLine {
  color: #cccccc;
  font-family: monospace;
  font-size: 0.5em;
  vertical-align: middle
  }

li.swficon {
  list-style-image: url("swf-icon.gif")
  }

li.thumbicon {
  list-style-image: url("thumb-icon.gif");
  list-style-type: none
  }

li.txticon {
  list-style-image: url("txt-icon.gif")
  }

li.xmlicon {
  list-style-image: url("xml-icon.gif")
  }

li.zipicon {
  list-style-image: url("zip-icon.gif")
  }

li.gif, li.png, li.psd, li.bmp, li.jpg, li.ico, li.tga, li.tif, li.tiff {
  list-style-image: url("image-icon.gif");
  margin-left: -0.5em;
  padding-left: 0px;
  white-space: pre
  }

p.displaynone {
  background-color: #ffffcc;
  border-top-color: #ff0033;
  border-left-color: #ff0033;
  border-right-color: #ff0033;
  border-bottom-color: #ff0033;
  border-top-width: 0.1em;
  border-left-width: 0.1em;
  border-right-width: 0.1em;
  border-bottom-width: 0.1em;
  border-top-style: ridge;
  border-left-style: ridge;
  border-right-style: ridge;
  border-bottom-style: ridge;
  color: #3333cc;
  float: right;
  font-family: "Bradley Hand ITC", "Staccato222 BT", cursive;
  margin-left: 13em;
  margin-top: -2em;
  padding-top: 1em;
  padding-right: 1em;
  padding-bottom: 1em;
  padding-left: 1em;
  position: absolute
  }

span.keyStyle {
  color: #cc0000;
  font-family: monospace;
  font-weight: 900
  }

span.pointer, span.toggler {
  cursor: pointer;
  font-family: monospace;
  font-size: 0.8em;
  font-variant: small-caps;
  padding-left: 0px
  }

ul.keyTermsList {
  background-color: #f8f8f8;
  color: #000066;
  font-family: "Palatino Linotype", "Book Antiqua", "DejaVu Serif Condensed", "Palatino", serif;
  padding-top: 0.8em;
  padding-right: 0.8em;
  padding-bottom: 0.8em;
  padding-left: 0.8em
  }

ul.keyTermsList li {
  list-style-image: url("info-icon.gif")
  }

ul.keyTermsList li sup {
  background-color: #fafafa;
  border-bottom-color: #aaaaaa;
  border-bottom-width: 0.18em;
  border-bottom-style: groove;
  color: #0000ff;
  letter-spacing: 0.15em;
  margin-top: 0.2em;
  margin-right: 0.2em;
  margin-bottom: 0.2em;
  margin-left: 0.2em;
  padding-top: 0.3em;
  padding-right: 0.3em;
  padding-bottom: 0.3em;
  padding-left: 0.3em
  }

#aboveFooter {
  display: block;
  float: right;
  font-family: sans-serif;
  margin-top: 1em;
  margin-right: 1em;
  margin-bottom: 1em;
  margin-left: 1em;
  padding-top: 1em;
  padding-right: 1em;
  padding-bottom: 1em;
  padding-left: 1em
  }

#accessoryContainer {
	padding:0 0.5em;
	margin:0;
	color:#333;
	line-height:100%;
	font-size:0.99em;
}

#calContainer #calendarIframe {
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto;
  visibility: hidden
  }

#controList li {
  border-top-color: #ffffff;
  border-left-color: #ffffff;
  border-right-color: #ffffff;
  border-bottom-color: #ffffff;
  border-top-width: 0.08em;
  border-left-width: 0.08em;
  border-right-width: 0.08em;
  border-bottom-width: 0.08em;
  border-top-style: solid;
  border-left-style: solid;
  border-right-style: solid;
  border-bottom-style: solid;
  display: block;
  float: left;
  margin-top: 0.5em;
  margin-right: 1em;
  margin-bottom: 0.5em;
  margin-left: 1em;
  padding-top: 0.2em;
  padding-right: 0.3em;
  padding-bottom: 0.2em;
  padding-left: 0.3em;
  vertical-align: middle
  }

#cssBoxContainer {
  margin-top: 1em;
  margin-right: 0.5em;
  margin-bottom: 0.5em;
  margin-left: 0.5em
  }

#cssBoxImg {
  float: right
  }

#cssTips * {
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto;
  width: 85%
  }

#cssTips * dd {
  padding-top: 0.8em;
  padding-right: 0.8em;
  padding-bottom: 0.8em;
  padding-left: 0.8em
  }

#cssTips * dt {
  font-family: serif;
  font-style: oblique;
  margin-top: 0;
  margin-right: 0;
  margin-bottom: 0;
  margin-left: 0;
  padding-top: 0.3em;
  padding-right: 0;
  padding-bottom: 0.2em;
  padding-left: 0;
  text-align: left;
  text-indent: 0px
  }

#cssTips dl {
  background-color: #fafaef;
  font-family: sans-serif
  }

#dbFormContainer {
  text-align: left
  }

#footer {
  background-color: #222266;
  clear: both;
  color: #9ac4d8;
  height: 3em;
  text-align: center
  }

#footer p {
  display: block;
  font-family: sans-serif;
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto;
  padding-top: 1em
  }

#foundDirs {
  background-color: #cc0022;
  color: #ffffaa;
  list-style-type: upper-roman
  }

#header {
  background-color: rgb(63,63,94);
  background-image: url("openmasthead.png");
  background-position: 50% 50%;
  background-repeat: repeat-x;
  clear: both;
  color: #ffffee;
  font-family: impact, charcoal, fantasy, sans-serif;
  height: 10em;
  text-align: center;
  text-shadow: 0.08em 0.08em 0.06em rgba(63,63,63,0.6);
  vertical-align: middle;
  z-index: 20
  }

#headimage {
  background-color: transparent;
  display: block;
  float: left;
  margin-top: 0.5em;
  margin-right: 1em;
  margin-bottom: 0.5em;
  margin-left: 1em;
  overflow-x: visible;
  overflow-y: visible;
  padding-top: 0;
  padding-right: 1em;
  padding-bottom: 0;
  padding-left: 0;
  position: relative;
  vertical-align: middle
  }

#headtext {
  display: block;
  font-weight: 400;
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto;
  padding-top: 1.6em;
  padding-right: 0;
  padding-bottom: 0;
  padding-left: 0;
  text-align: center
  }

#javaScriptletDomi {
  background-color: #ffffff;
  color: #880088;
  font-family: "DejaVu Serif Condensed", "DejaVu Sans", Tahoma, "geneva", sans-serif;
  font-size-adjust: 0.1em;
  font-weight: 600;
  unicode-bidi: normal
  }

#leftcol {
  background-color: transparent;
  display: block;
  float: left;
  font-family: "Trebuchet MS", "Trebuchet", sans-serif;
  font-size: 0.9em;
  position: relative;
  width: 18%;
  z-index: 10;
/*
  border-right-style: outset;
  border-bottom-style: outset;
  border-left-style: outset;
  border-right-color: #aabfff;
  border-bottom-color: #aabfff;
  border-left-color: #aabfff;
  border-right-width: 1em;
  border-top-width: 0.5em;
  border-top-color: #000000;
  border-top-style: solid
*/
  }

#leftcol dl#alpharrayTest {
  z-index: 9
  }

#localScope {
  border-top-color: #cccccc;
  border-left-color: #cccccc;
  border-right-color: #cccccc;
  border-bottom-color: #cccccc;
  border-top-width: 2em;
  border-left-width: 2em;
  border-right-width: 2em;
  border-bottom-width: 2em;
  border-top-style: solid;
  border-left-style: solid;
  border-right-style: solid;
  border-bottom-style: solid;
  font-family: serif;
  margin-top: 0;
  margin-right: 2em;
  margin-bottom: 0;
  margin-left: 2em;
  width: 30em
  }

#localScope li ul li.resetListCount {

  }

#maincol {
  background-color: #fdfdfd;
  display: block;
  float: right;
  font-family: "Trebuchet MS", "Trebuchet", sans-serif;
  position: relative;
  width: 80%;
  z-index: 11
  }


#maincol div,
#maincol p,
#maincol ul,
#maincol ol,
#maincol dl,
#maincol form,
#maincol table,
#maincol h1,
#maincol h2,
#maincol h3,
#localScope li {
  padding-left: 2em
  }



#maincol .centered dl {
  background-color: #f0f0f0;
  background-image: url("parchment-desat-bg.jpg");
  display: block;
  margin-top: 0;
  margin-right: 0;
  margin-bottom: 0;
  margin-left: 0;
  text-align: left
  }

#maincol div > *, #maincol p *, #maincol form > *, #maincol table > * {
  padding-left: 0px
  }

#maincol div.centered {
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto;
  text-align: center
  }

#maincol div.displayNone dl dd {
  background-color: #fffaf5
  }

#maincol div.displaynone, #maincol div.displayNone {
  background-color: transparent;
  margin-top: 1em;
  margin-right: 1em;
  margin-bottom: 0.5em;
  margin-left: 0.5em;
  padding-top: 0;
  padding-right: 0;
  padding-bottom: 0;
  padding-left: 0
  }

#maincol dl {
  background-color: #f5f5ff
  }

#maincol dl dd {
  border-top-color: #cc5555;
  border-left-color: #cc5555;
  border-right-color: #cc5555;
  border-bottom-color: #cc5555;
  border-top-width: 0.08em;
  border-left-width: 0.08em;
  border-right-width: 0.08em;
  border-bottom-width: 0.08em;
  border-top-style: dotted;
  border-left-style: dotted;
  border-right-style: dotted;
  border-bottom-style: dotted
  }

#maincol dl dt {
  font-size: 1.2em;
  margin-top: 1em;
  margin-right: auto;
  margin-bottom: 0.5em;
  margin-left: auto
  }

#mainFrame {
  height: 50em;
  margin-top: 1em;
  margin-right: 5%;
  margin-bottom: 1em;
  margin-left: 5%;
  text-align: center;
  width: 90%
  }

#matchList {
  background-color: #fffffc;
  color: #00aa00;
  font-family: monospace;
  font-size: 0.9em;
  white-space: pre
  }

#navlist {
  background-color: transparent;
  /*
border-top-color: #ffffff;
  border-left-color: #ffffff;
  border-right-color: #ffffff;
  border-bottom-color: #ffffff;
  border-top-width: 1px;
  border-left-width: 1px;
  border-right-width: 1px;
  border-bottom-width: 1px;
  border-top-style: solid;
  border-left-style: solid;
  border-right-style: solid;
  border-bottom-style: solid;
*/
  color: #aaaaaa;
  display: block;
  font-family: serif;
  font-size: 0.9em;
  font-variant: small-caps;
  margin-top: 1em;
  text-align: left
  }

#navlist li {
  background-color: #eaeaef;
  background-image: url("navlistitembg.png");
  background-position: 50% 50%;
  border-bottom-color: #eeeeee;
  border-bottom-width: 0.2em;
  border-bottom-style: solid;
  border-right-color: #efefef;
  border-right-width: 0.1em;
  border-right-style: solid;
  list-style-position: outside;
  margin-top: 0.1em;
  margin-right: 0;
  margin-bottom: 0.2em;
  margin-left: 0;
  padding-top: 0.01em;
  padding-right: 0;
  padding-bottom: 0.2em;
  padding-left: 0.5em;
  text-align: justify;
  vertical-align: middle;
  width:110%;
  list-style-shadow: rgba(127,127,127,0.5);
  }

#navlist li a {
  display: block;
  cursor: pointer;
  width:100%;
  }

#navlist li.unknown {
  list-style-image: url("unknown-icon.png");
  margin-left: -0.5em;
  padding-left: 0px;
  white-space: pre
  }

#pageControls, #pageControl {
  background-color: #f5f5f5;
  display: block;
  font-family: sans-serif;
  font-size: x-small;
  font-size-adjust: none;
  font-style: normal;
  font-variant: small-caps;
  font-weight: 400;
  line-height: normal;
  position: fixed;
  right:5%;
  top: 0.5em;
  outline-color: #e1e6f1;
  outline-width: 0.2em;
  outline-style: outset;
  z-index: 9995
  }

#pageControls ul {
  text-align: center;
  padding-top: 0;
  padding-right: 0;
  padding-bottom: 0;
  padding-left: 0;
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto
  }

#pageControls ul li a {
  text-decoration: none
  }

#pagewidth {
  /*
background-color: #ffffff;
  background-image: url("anyothersidewalk.png");
  background-repeat: repeat-y;
*/
  background-color: rgba(255,255,255,0.3);
  display: block;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  width: 90%
  }

#printrPost  {
	border: 0.3em double #A55;
	margin: 0.7em;
	padding: 1em;
	font: 0.9em #222 serif;
	background-color:#EFFAEF;
	font-family: monospace;
}
#printrGet {
	border: 0.3em double #55A;
	margin: 0.7em;
	padding: 1em;
	font: 0.9em #222 serif;
	background-color:#EFFAEF;
	font-family: monospace;
}
#printrRequest {
	border: 0.3em double #5A5;
	margin: 0.7em;
	padding: 1em;
	font: 0.9em #222 serif;
	background-color:#EFFAEF;
	font-family: monospace;
}

#testStringSplit {
  color: #cc2200;
  font-family: sans-serif;
  font-size: 14px
  }

#toBottom {
  clear: right;
  margin-top: 0.2em;
  margin-right: 0.2em;
  margin-bottom: 0.2em;
  margin-left: 0.2em
  }

#toTop {
  float: right;
  margin-top: 0.2em;
  margin-right: 0.2em;
  margin-bottom: 0.2em;
  margin-left: 0.2em
  }

#urlSplit li {
  font-family: "Lucida Sans Unicode", "Lucida Grande", "lucida", sans-serif;
  font-size: 0.8em;
  margin-top: 0.4em;
  margin-right: 0.5em;
  margin-bottom: 0.4em;
  margin-left: 0.5em
  }

#wrapper {
  width: 100%
  }

div.centered, #calContainer {
  display: block;
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto;
  text-align: center
  }

dl p, #maincol div.displaynone dl, #maincol div.displayNone dl {
  background-color: transparent
  }

hr#clearImgShow {
  clear: both
  }

li#goUpItem {
  list-style-image: url("folder-up.gif")
  }

li.forbidden, li.forbiddenitem, li.db .nav, li.exeicon, li.hiddenitem, .displaynone, .displayNone, .collapsableDd, #collapser-0 {
  display: none
  }

li.imgShowItem a, .intraNav, #controList li * {
  border-top-color: currentColor;
  border-left-color: currentColor;
  border-right-color: currentColor;
  border-bottom-color: currentColor;
  border-top-width: medium;
  border-left-width: medium;
  border-right-width: medium;
  border-bottom-width: medium;
  border-top-style: none;
  border-left-style: none;
  border-right-style: none;
  border-bottom-style: none
  }

ol#pathItems {
  font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
  font-size: small
  }

ol#readyStateList {
  background-color: #eeffee
  }

p#collapser {
  clear: right;
  float: right;
  font-size: x-small;
  font-variant: small-caps;
  letter-spacing: 0.3em
  }

p#collapser img {
  vertical-align: middle
  }

p#jumpBack {
  float: right;
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto
  }

p#jumpBack img {
  display: table-cell
  }

ul#imgShow {
  display: inline
  }

ul#imgShow li.imgShowItem {
  background-color: #ccddff;
  display: table-cell;
  float: left;
  list-style-type: none;
  margin-top: 0.1em;
  margin-right: 0.3em;
  margin-bottom: 0.1em;
  margin-left: 0.3em;
  outline-color: #cccccc;
  outline-width: 0.05em;
  outline-style: solid;
  padding-top: 0.1em;
  padding-right: 0.1em;
  padding-bottom: 0.2em;
  padding-left: 0.4em;
  text-indent: 0px
  }

ul.nobull li, li.nobull, li.nobull, ul.nobull li, #controList, #urlSplit {
  list-style-type: none
  }

#footer p a:hover {
  color: #aaffff
  }

#footer p a:link {
  color: #ffffaa
  }

#footer p a:visited {
  color: #ddddff
  }

#matchList:before {
  background-color: #fafafa;
  color: #3300ff;
  content: "Showing:($matches as $matchKey->matchVal):";
  font-family: monospace;
  font-weight: 800;
  padding-top: 0.2em;
  padding-right: 0.2em;
  padding-bottom: 0.2em;
  padding-left: 0.2em
  }

#navlist li a:first-letter {
  font-size: 1.5em;
  color: #3434ee
  }

dl dd dl dt:first-letter, .bottomsmaller:first-letter {
  font-weight: 800;
  vertical-align: baseline
  }

#urlSplit:before {
  background-color: #fafafa;
  color: #ff0033;
  content: "Showing:splitKey-splitVal[preg_split(matches[0])]:";
  font-family: monospace;
  font-size-adjust: 0.63;
  font-weight: 800;
  padding-top: 0.2em;
  padding-right: 0.2em;
  padding-bottom: 0.2em;
  padding-left: 0.2em
  }

.bottomsmaller:first-line {
  font-variant: small-caps
  }

.closeme:hover {
  color: #cc2222;
  font-weight: 700;
  text-align: center
  }

.toggler:hover {
  background-color: #ffffff;
  color: #ff0000;
  display: inline;
  padding-top: 0.2em;
  padding-right: 0;
  padding-bottom: 0.3em;
  padding-left: 0;
  visibility: visible
  }

.unfloat:after {
  clear: both;
  content: ".";
  display: block;
  height: 0px;
  visibility: hidden
  }

div.hiddenPath:before {
  content: "\a\d"
  }

li.netcomicon:before {
  content: "www"
  }

li.sourceLine:after {
  content: "	"
  }

ol#navlist li a:hover, ul#navlist li a:hover {
  background-color: #ffffff;
  color: #cc3300;
  }

ol#navlist li a:hover, ul#navlist li a:hover {
	list-style-image: url("load_to_top.png");
}

ol#navlist li:hover, ul#navlist li:hover {
  background-color: #ffffff;
  background-image: none;
  border-bottom-color: #cccccc;
  border-bottom-width: 0.2em;
  border-bottom-style: solid;
  border-right-color: #cfcfcf;
  border-right-width: 0.1em;
  border-right-style: solid;
  color: #aaF;
  }

/*]]>*/-->
</style>
</head>
<body>
<code>code</code>

<dl>
	<dt>dt</dt>
	<dd>dd</dd>
</dl>

<dl>
	<dt>dt</dt>
	<dd>dd <code>code</code></dd>
</dl>

<dl>
	<dt>dt</dt>
	<dd>
		<dl>
		<dt>dt</dt>
		<dd>dd</dd>
		</dl>
	</dd>
</dl>


<dl>
	<dt>dt</dt>
	<dd>dd
		<ul>
			<li>li</li>
			<li>li</li>
			<li>
				<ul>
					<li>li</li>
					<li>li</li>
				</ul>
			</li>
		</ul>
	</dd>
</dl>

<dl>
	<dt>dt <code>code</code></dt>
	<dd>dd </dd>
</dl>

<h1>h1</h1>
<h2>h2</h2>
<h3>h3</h3>
<h4>h4</h4>
<h5>h5</h5>
<h6>h6</h6>
<iframe src="<?php print $defaultIframe; ?>"></iframe>
<p>p</p>
<pre>pre</pre>
<span class="unfloat">(span) .unfloat</span>
<p class="displaynone">p.displaynone</p>


<span class="alignleft">.alignleft, .leftalign, .left, .align-left, .left-align, .alignleft *</span>

<span class="steelblue">(span) .steelblue</span>
<span class="indianred">.indianred</span>
<span class="inline">.inline</span>
<span class="coral">
.coral {
  color: #ff7f50
  }

.darkorange {
  color: #ff8c00
  }

.violet {
  color: #ee82ee
  }

.mediumblue {
  color: #0000cd
  }

.antihead {
  margin-top: -0.5em
  }

.attn {
  background-color: #000033;
  color: #dddd33;
  font-family: "Comic Sans MS", "comic sans", cursive
  }

.bg_grey {
	background-color: #dddddd;
}

.bg_lightx2grey {
	background-color: #eeeeee;
}

.bg_white {
	background-color: #ffffff;
}

.bottomsmaller {
  background-color: #ccdddd;
  border-top-color: #999999;
  border-left-color: #999999;
  border-right-color: #999999;
  border-bottom-color: #999999;
  border-top-width: 0.1em;
  border-left-width: 0.1em;
  border-right-width: 0.1em;
  border-bottom-width: 0.1em;
  border-top-style: dashed;
  border-left-style: dashed;
  border-right-style: dashed;
  border-bottom-style: dashed;
  color: #000080;
  display: block;
  font-family: Arial, "Helvetica", sans-serif;
  font-size: 0.8em;
  margin-top: 0.5em;
  margin-right: 2em;
  margin-bottom: 0.5em;
  margin-left: 2em;
  padding-top: 1.5em;
  padding-right: 1.5em;
  padding-bottom: 1.5em;
  padding-left: 1.5em;
  text-align: justify
  }

.closeme {
  color: #0033ff;
  font-family: serif;
  text-align: center
  }

.code {
  background-color: #eeeeee;
  color: #333377;
  display: inline-block;
  font-family: monospace
  }

.content {
  background-color: #fefef8;
  font-family: sans-serif;
  font-weight: 400;
  margin-top: 0.5em;
  margin-right: auto;
  margin-bottom: 0.5em;
  margin-left: auto;
  padding-top: 0.25em;
  padding-right: 0.25em;
  padding-bottom: 0.25em;
  padding-left: 0.25em
  }

.defListTitle {
  border-top-color: currentColor;
  border-left-color: currentColor;
  border-right-color: currentColor;
  border-bottom-color: currentColor;
  border-top-width: medium;
  border-left-width: medium;
  border-right-width: medium;
  border-bottom-width: medium;
  border-top-style: none;
  border-left-style: none;
  border-right-style: none;
  border-bottom-style: none;
  color: #dd0022;
  font-family: serif;
  font-style: italic;
  margin-bottom: 0.3em;
  width: 50%
  }

.error {
  background-color: #0066cc;
  color: #ffffff;
  display: table-cell;
  padding-top: 0.2em;
  padding-right: 0.2em;
  padding-bottom: 0.2em;
  padding-left: 0.2em
  }

.floatLt, .floatleft, .floatLeft, .floatlt {
  float: left;
  position: relative
  }

.floatRt, .floatright, .floatrt, .floatRight {
  float: right;
  position: relative
  }

.hidden, li.hiddenitem, li.hidden {
  visibility: hidden
  }

.italic {
  font-style: italic
  }

.keyTerms {
  background-color: #fafafa;
  display: block;
  font-family: sans-serif;
  margin-top: 0;
  margin-right: 2em;
  margin-bottom: 0;
  margin-left: 2em;
  padding-top: 0.2em;
  padding-right: 1em;
  padding-bottom: 0.2em;
  padding-left: 1em;
  text-align: justify
  }

.keyTerms h4 {
  border-top-color: #aaaaaa;
  border-left-color: #aaaaaa;
  border-right-color: #aaaaaa;
  border-bottom-color: #aaaaaa;
  border-top-width: 0.2em;
  border-left-width: 0.2em;
  border-right-width: 0.2em;
  border-bottom-width: 0.2em;
  border-top-style: outset;
  border-left-style: outset;
  border-right-style: outset;
  border-bottom-style: outset;
  padding-top: 0.3em;
  padding-right: 0.3em;
  padding-bottom: 0.3em;
  padding-left: 0.3em;
  width: 8em
  }

.keyTerms ul li {
  font-size: 0.8em;
  margin-bottom: 2em
  }

.keyTerms ul li pre {
  background-image: none;
  font-size: larger
  }

.keyTerms ul li sup {
  font-size: 1em
  }

.keyTerms ul li sup code {
  font-size: larger
  }
.left {
	text-align:left;
}
.center {
	text-align:center;
	}
.right {
	text-align:right;
}
.parchment {
	background-image: url('parchmentintslightfinegrain-h.jpg');
}

.pseudocode {
  background-color: #f0f0ea;
  color: #008800;
  font-family: "Lucida Console", "DejaVu Sans Mono", "Monaco", monospace;
  font-size: 0.9em;
  margin-top: 0.2em;
  margin-right: 0.2em;
  margin-bottom: 0.2em;
  margin-left: 0.2em
  }

.red {
  color: #ff0000
  }

.sansSerif {
  font-family: Arial, "DejaVu Sans Condensed", "DejaVu Sans", "Helvetica", sans-serif
  }

.sansSerifBold {
  font-family: Arial, "DejaVu Sans", "Helvetica", sans-serif;
  font-weight: 700
  }

.serif {
  font-family: "Palatino Linotype", "Book Antiqua", "DejaVu Serif Condensed", "Palatino", serif
  }

.serifBold {
  font-family: "Palatino Linotype", "Book Antiqua", "DejaVu Serif", "Palatino", serif;
  font-weight: 700
  }

.showMatches {
  background-color: #ddddee;
  border-top-color: #996600;
  border-left-color: #996600;
  border-right-color: #996600;
  border-bottom-color: #996600;
  border-top-width: 0.1em;
  border-left-width: 0.1em;
  border-right-width: 0.1em;
  border-bottom-width: 0.1em;
  border-top-style: double;
  border-left-style: double;
  border-right-style: double;
  border-bottom-style: double;
  font-family: monospace;
  margin-top: 1.5em;
  margin-right: auto;
  margin-bottom: 1.5em;
  margin-left: auto;
  padding-top: 0.2em;
  padding-right: 2em;
  padding-bottom: 0.2em;
  padding-left: 2em;
  width: 80%
  }

.smaller {
  font-size: smaller
  }

.testValue {
  background-color: #ffffdd;
  color: #00dd00;
  font-family: monospace;
  font-size: 0.9em;
  white-space: pre
  }

.target {
  display: none
  }

.toggler, .trigger {
  font-family: "DejaVu Sans Condensed", "Arial Narrow", Arial, Helvetica, sans-serif;
  font-variant: small-caps;
  letter-spacing: 0.1em;
  vertical-align: middle;
  line-height: 2em;
  color:navy;
  cursor:help;
  }

.unfloat {
  display: inline-block
}

.width_40 {
	width: 40px;
}

.width_25 {
	width: 25px;
}

.width_37 {
	width: 37px;
}

.width_200 {
	width: 200px;
}

.width_150 {
	width: 150px;
}

code.codelite {
  background-color: #fffaef;
  color: #339955;
  line-height: 140%;
  padding-top: 0.4em;
  padding-right: 0.4em;
  padding-bottom: 0.4em;
  padding-left: 0.4em
  }

dt.cross {
  color: #008888;
  cursor: crosshair;
  font-family: Arial, "DejaVu Sans Condensed", "Helvetica", sans-serif;
  letter-spacing: 0.02em;
  margin-top: 1em
  }

h4.keyTermsHeading {
  color: #cc3300;
  font-family: Georgia, "DejaVu Serif", "Times", serif;
  font-style: italic
  }

hr.hidden {
  clear: both;
  visibility: hidden
  }

li.bakicon {
  list-style-image: url("bakicon.gif");
  list-style-type: none;
  visibility: hidden
  }

li.cssicon {
  list-style-image: url("css.png")
  }

li.dbicon, #navlist li.dbicon, li.nav.dbicon {
  list-style-image: url("db-icon.gif")
  }

li.htmlicon {
  list-style-image: url("html.png")
  }

li.imgShowItem img {
  color: #555555;
  height: 3em;
  width: 5em
  }

li.iniicon, li.conficon, li.cfgicon {
  list-style-image: url("ini-icon.gif")
  }

li.jsicon {
  list-style-image: url("javascript-icon.png")
  }

li.listhead li, li.listheaditem li, li.listHead li, li.listHeadItem li {
  counter-reset: inherit;
  list-style-image: url("bullet-rightwardarrow.gif")
  }

li.listhead, li.listheader, li.listHeader, li.listheaditem, li.listHead, li.listHeadItem {
  background-color: #ffffff;
  color: #800080;
  font-family: Georgia, "DejaVu Serif", "times", serif;
  font-size: 14pt;
  font-style: normal;
  font-variant: small-caps;
  font-weight: 700;
  list-style-type: none;
  margin-bottom: 1em;
  margin-top: 1.3em;
  padding-left: 0px;
  text-decoration: none
  }

li.logicon {
  list-style-image: url("log-icon.gif")
  }

li.mp3, li.mp3icon {
	list-style-image: url("mp3-icon.gif");
}

li.nav {
  list-style-image: url("bullet_square_grey.png");
  margin-left: -0.5em;
  padding-left: 0px
  }

li.navnobull {
  list-style-image: url("folder.gif")
  }

li.netcomicon {
  list-style-image: url("netcomicon16.gif")
  }

li.new_dirHandArr {
  list-style-image: url("folder-new.gif")
  }

li.pdficon {
  list-style-image: url("pdf.png")
  }

li.phpicon {
  list-style-image: url("page_white_php.png")
  }

li.phticon {
  list-style-image: url("page_white_code_php.png")
  }

li.proj-in-nav, li.projecticon, li.proj-in-nav a, li.projecticon a {
  background-color: #aaaaaa;
  color: #ffffff;
  list-style-image: url("project-files.gif")
  }

li.selicon {
  list-style-image: url("sel-icon.png")
  }

li.shortcutlink {
  list-style-image: url("link-icon.gif")
  }

li.sourceline, li.sourceLine {
  color: #cccccc;
  font-family: monospace;
  font-size: 0.5em;
  vertical-align: middle
  }

li.swficon {
  list-style-image: url("swf-icon.gif")
  }

li.thumbicon {
  list-style-image: url("thumb-icon.gif");
  list-style-type: none
  }

li.txticon {
  list-style-image: url("txt-icon.gif")
  }

li.xmlicon {
  list-style-image: url("xml-icon.gif")
  }

li.zipicon {
  list-style-image: url("zip-icon.gif")
  }

li.gif, li.png, li.psd, li.bmp, li.jpg, li.ico, li.tga, li.tif, li.tiff {
  list-style-image: url("image-icon.gif");
  margin-left: -0.5em;
  padding-left: 0px;
  white-space: pre
  }

p.displaynone {
  background-color: #ffffcc;
  border-top-color: #ff0033;
  border-left-color: #ff0033;
  border-right-color: #ff0033;
  border-bottom-color: #ff0033;
  border-top-width: 0.1em;
  border-left-width: 0.1em;
  border-right-width: 0.1em;
  border-bottom-width: 0.1em;
  border-top-style: ridge;
  border-left-style: ridge;
  border-right-style: ridge;
  border-bottom-style: ridge;
  color: #3333cc;
  float: right;
  font-family: "Bradley Hand ITC", "Staccato222 BT", cursive;
  margin-left: 13em;
  margin-top: -2em;
  padding-top: 1em;
  padding-right: 1em;
  padding-bottom: 1em;
  padding-left: 1em;
  position: absolute
  }

span.keyStyle {
  color: #cc0000;
  font-family: monospace;
  font-weight: 900
  }

span.pointer, span.toggler {
  cursor: pointer;
  font-family: monospace;
  font-size: 0.8em;
  font-variant: small-caps;
  padding-left: 0px
  }

ul.keyTermsList {
  background-color: #f8f8f8;
  color: #000066;
  font-family: "Palatino Linotype", "Book Antiqua", "DejaVu Serif Condensed", "Palatino", serif;
  padding-top: 0.8em;
  padding-right: 0.8em;
  padding-bottom: 0.8em;
  padding-left: 0.8em
  }

ul.keyTermsList li {
  list-style-image: url("info-icon.gif")
  }

ul.keyTermsList li sup {
  background-color: #fafafa;
  border-bottom-color: #aaaaaa;
  border-bottom-width: 0.18em;
  border-bottom-style: groove;
  color: #0000ff;
  letter-spacing: 0.15em;
  margin-top: 0.2em;
  margin-right: 0.2em;
  margin-bottom: 0.2em;
  margin-left: 0.2em;
  padding-top: 0.3em;
  padding-right: 0.3em;
  padding-bottom: 0.3em;
  padding-left: 0.3em
  }

#aboveFooter {
  display: block;
  float: right;
  font-family: sans-serif;
  margin-top: 1em;
  margin-right: 1em;
  margin-bottom: 1em;
  margin-left: 1em;
  padding-top: 1em;
  padding-right: 1em;
  padding-bottom: 1em;
  padding-left: 1em
  }

#accessoryContainer {
	padding:0 0.5em;
	margin:0;
	color:#333;
	line-height:100%;
	font-size:0.99em;
}

#calContainer #calendarIframe {
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto;
  visibility: hidden
  }

#controList li {
  border-top-color: #ffffff;
  border-left-color: #ffffff;
  border-right-color: #ffffff;
  border-bottom-color: #ffffff;
  border-top-width: 0.08em;
  border-left-width: 0.08em;
  border-right-width: 0.08em;
  border-bottom-width: 0.08em;
  border-top-style: solid;
  border-left-style: solid;
  border-right-style: solid;
  border-bottom-style: solid;
  display: block;
  float: left;
  margin-top: 0.5em;
  margin-right: 1em;
  margin-bottom: 0.5em;
  margin-left: 1em;
  padding-top: 0.2em;
  padding-right: 0.3em;
  padding-bottom: 0.2em;
  padding-left: 0.3em;
  vertical-align: middle
  }

#cssBoxContainer {
  margin-top: 1em;
  margin-right: 0.5em;
  margin-bottom: 0.5em;
  margin-left: 0.5em
  }

#cssBoxImg {
  float: right
  }

#cssTips * {
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto;
  width: 85%
  }

#cssTips * dd {
  padding-top: 0.8em;
  padding-right: 0.8em;
  padding-bottom: 0.8em;
  padding-left: 0.8em
  }

#cssTips * dt {
  font-family: serif;
  font-style: oblique;
  margin-top: 0;
  margin-right: 0;
  margin-bottom: 0;
  margin-left: 0;
  padding-top: 0.3em;
  padding-right: 0;
  padding-bottom: 0.2em;
  padding-left: 0;
  text-align: left;
  text-indent: 0px
  }

#cssTips dl {
  background-color: #fafaef;
  font-family: sans-serif
  }

#dbFormContainer {
  text-align: left
  }

#footer {
  background-color: #222266;
  clear: both;
  color: #9ac4d8;
  height: 3em;
  text-align: center
  }

#footer p {
  display: block;
  font-family: sans-serif;
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto;
  padding-top: 1em
  }

#foundDirs {
  background-color: #cc0022;
  color: #ffffaa;
  list-style-type: upper-roman
  }

#header {
  background-color: rgb(63,63,94);
  background-image: url("openmasthead.png");
  background-position: 50% 50%;
  background-repeat: repeat-x;
  clear: both;
  color: #ffffee;
  font-family: impact, charcoal, fantasy, sans-serif;
  height: 10em;
  text-align: center;
  text-shadow: 0.08em 0.08em 0.06em rgba(63,63,63,0.6);
  vertical-align: middle;
  z-index: 20
  }

#headimage {
  background-color: transparent;
  display: block;
  float: left;
  margin-top: 0.5em;
  margin-right: 1em;
  margin-bottom: 0.5em;
  margin-left: 1em;
  overflow-x: visible;
  overflow-y: visible;
  padding-top: 0;
  padding-right: 1em;
  padding-bottom: 0;
  padding-left: 0;
  position: relative;
  vertical-align: middle
  }

#headtext {
  display: block;
  font-weight: 400;
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto;
  padding-top: 1.6em;
  padding-right: 0;
  padding-bottom: 0;
  padding-left: 0;
  text-align: center
  }

#javaScriptletDomi {
  background-color: #ffffff;
  color: #880088;
  font-family: "DejaVu Serif Condensed", "DejaVu Sans", Tahoma, "geneva", sans-serif;
  font-size-adjust: 0.1em;
  font-weight: 600;
  unicode-bidi: normal
  }

#leftcol {
  background-color: transparent;
  display: block;
  float: left;
  font-family: "Trebuchet MS", "Trebuchet", sans-serif;
  font-size: 0.9em;
  position: relative;
  width: 18%;
  z-index: 10;
/*
  border-right-style: outset;
  border-bottom-style: outset;
  border-left-style: outset;
  border-right-color: #aabfff;
  border-bottom-color: #aabfff;
  border-left-color: #aabfff;
  border-right-width: 1em;
  border-top-width: 0.5em;
  border-top-color: #000000;
  border-top-style: solid
*/
  }

#leftcol dl#alpharrayTest {
  z-index: 9
  }

#localScope {
  border-top-color: #cccccc;
  border-left-color: #cccccc;
  border-right-color: #cccccc;
  border-bottom-color: #cccccc;
  border-top-width: 2em;
  border-left-width: 2em;
  border-right-width: 2em;
  border-bottom-width: 2em;
  border-top-style: solid;
  border-left-style: solid;
  border-right-style: solid;
  border-bottom-style: solid;
  font-family: serif;
  margin-top: 0;
  margin-right: 2em;
  margin-bottom: 0;
  margin-left: 2em;
  width: 30em
  }

#localScope li ul li.resetListCount {

  }

#maincol {
  background-color: #fdfdfd;
  display: block;
  float: right;
  font-family: "Trebuchet MS", "Trebuchet", sans-serif;
  position: relative;
  width: 80%;
  z-index: 11
  }


#maincol div,
#maincol p,
#maincol ul,
#maincol ol,
#maincol dl,
#maincol form,
#maincol table,
#maincol h1,
#maincol h2,
#maincol h3,
#localScope li {
  padding-left: 2em
  }



#maincol .centered dl {
  background-color: #f0f0f0;
  background-image: url("parchment-desat-bg.jpg");
  display: block;
  margin-top: 0;
  margin-right: 0;
  margin-bottom: 0;
  margin-left: 0;
  text-align: left
  }

#maincol div > *, #maincol p *, #maincol form > *, #maincol table > * {
  padding-left: 0px
  }

#maincol div.centered {
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto;
  text-align: center
  }

#maincol div.displayNone dl dd {
  background-color: #fffaf5
  }

#maincol div.displaynone, #maincol div.displayNone {
  background-color: transparent;
  margin-top: 1em;
  margin-right: 1em;
  margin-bottom: 0.5em;
  margin-left: 0.5em;
  padding-top: 0;
  padding-right: 0;
  padding-bottom: 0;
  padding-left: 0
  }

#maincol dl {
  background-color: #f5f5ff
  }

#maincol dl dd {
  border-top-color: #cc5555;
  border-left-color: #cc5555;
  border-right-color: #cc5555;
  border-bottom-color: #cc5555;
  border-top-width: 0.08em;
  border-left-width: 0.08em;
  border-right-width: 0.08em;
  border-bottom-width: 0.08em;
  border-top-style: dotted;
  border-left-style: dotted;
  border-right-style: dotted;
  border-bottom-style: dotted
  }

#maincol dl dt {
  font-size: 1.2em;
  margin-top: 1em;
  margin-right: auto;
  margin-bottom: 0.5em;
  margin-left: auto
  }

#mainFrame {
  height: 50em;
  margin-top: 1em;
  margin-right: 5%;
  margin-bottom: 1em;
  margin-left: 5%;
  text-align: center;
  width: 90%
  }

#matchList {
  background-color: #fffffc;
  color: #00aa00;
  font-family: monospace;
  font-size: 0.9em;
  white-space: pre
  }

#navlist {
  background-color: transparent;
  /*
border-top-color: #ffffff;
  border-left-color: #ffffff;
  border-right-color: #ffffff;
  border-bottom-color: #ffffff;
  border-top-width: 1px;
  border-left-width: 1px;
  border-right-width: 1px;
  border-bottom-width: 1px;
  border-top-style: solid;
  border-left-style: solid;
  border-right-style: solid;
  border-bottom-style: solid;
*/
  color: #aaaaaa;
  display: block;
  font-family: serif;
  font-size: 0.9em;
  font-variant: small-caps;
  margin-top: 1em;
  text-align: left
  }

#navlist li {
  background-color: #eaeaef;
  background-image: url("navlistitembg.png");
  background-position: 50% 50%;
  border-bottom-color: #eeeeee;
  border-bottom-width: 0.2em;
  border-bottom-style: solid;
  border-right-color: #efefef;
  border-right-width: 0.1em;
  border-right-style: solid;
  list-style-position: outside;
  margin-top: 0.1em;
  margin-right: 0;
  margin-bottom: 0.2em;
  margin-left: 0;
  padding-top: 0.01em;
  padding-right: 0;
  padding-bottom: 0.2em;
  padding-left: 0.5em;
  text-align: justify;
  vertical-align: middle;
  width:110%;
  list-style-shadow: rgba(127,127,127,0.5);
  }

#navlist li a {
  display: block;
  cursor: pointer;
  width:100%;
  }

#navlist li.unknown {
  list-style-image: url("unknown-icon.png");
  margin-left: -0.5em;
  padding-left: 0px;
  white-space: pre
  }

#pageControls, #pageControl {
  background-color: #f5f5f5;
  display: block;
  font-family: sans-serif;
  font-size: x-small;
  font-size-adjust: none;
  font-style: normal;
  font-variant: small-caps;
  font-weight: 400;
  line-height: normal;
  position: fixed;
  right:5%;
  top: 0.5em;
  outline-color: #e1e6f1;
  outline-width: 0.2em;
  outline-style: outset;
  z-index: 9995
  }

#pageControls ul {
  text-align: center;
  padding-top: 0;
  padding-right: 0;
  padding-bottom: 0;
  padding-left: 0;
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto
  }

#pageControls ul li a {
  text-decoration: none
  }

#pagewidth {
  /*
background-color: #ffffff;
  background-image: url("anyothersidewalk.png");
  background-repeat: repeat-y;
*/
  background-color: rgba(255,255,255,0.3);
  display: block;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  width: 90%
  }

#printrPost  {
	border: 0.3em double #A55;
	margin: 0.7em;
	padding: 1em;
	font: 0.9em #222 serif;
	background-color:#EFFAEF;
	font-family: monospace;
}
#printrGet {
	border: 0.3em double #55A;
	margin: 0.7em;
	padding: 1em;
	font: 0.9em #222 serif;
	background-color:#EFFAEF;
	font-family: monospace;
}
#printrRequest {
	border: 0.3em double #5A5;
	margin: 0.7em;
	padding: 1em;
	font: 0.9em #222 serif;
	background-color:#EFFAEF;
	font-family: monospace;
}

#testStringSplit {
  color: #cc2200;
  font-family: sans-serif;
  font-size: 14px
  }

#toBottom {
  clear: right;
  margin-top: 0.2em;
  margin-right: 0.2em;
  margin-bottom: 0.2em;
  margin-left: 0.2em
  }

#toTop {
  float: right;
  margin-top: 0.2em;
  margin-right: 0.2em;
  margin-bottom: 0.2em;
  margin-left: 0.2em
  }

#urlSplit li {
  font-family: "Lucida Sans Unicode", "Lucida Grande", "lucida", sans-serif;
  font-size: 0.8em;
  margin-top: 0.4em;
  margin-right: 0.5em;
  margin-bottom: 0.4em;
  margin-left: 0.5em
  }

#wrapper {
  width: 100%
  }

div.centered, #calContainer {
  display: block;
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto;
  text-align: center
  }

dl p, #maincol div.displaynone dl, #maincol div.displayNone dl {
  background-color: transparent
  }

hr#clearImgShow {
  clear: both
  }

li#goUpItem {
  list-style-image: url("folder-up.gif")
  }

li.forbidden, li.forbiddenitem, li.db .nav, li.exeicon, li.hiddenitem, .displaynone, .displayNone, .collapsableDd, #collapser-0 {
  display: none
  }

li.imgShowItem a, .intraNav, #controList li * {
  border-top-color: currentColor;
  border-left-color: currentColor;
  border-right-color: currentColor;
  border-bottom-color: currentColor;
  border-top-width: medium;
  border-left-width: medium;
  border-right-width: medium;
  border-bottom-width: medium;
  border-top-style: none;
  border-left-style: none;
  border-right-style: none;
  border-bottom-style: none
  }

ol#pathItems {
  font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
  font-size: small
  }

ol#readyStateList {
  background-color: #eeffee
  }

p#collapser {
  clear: right;
  float: right;
  font-size: x-small;
  font-variant: small-caps;
  letter-spacing: 0.3em
  }

p#collapser img {
  vertical-align: middle
  }

p#jumpBack {
  float: right;
  margin-top: 0;
  margin-right: auto;
  margin-bottom: 0;
  margin-left: auto
  }

p#jumpBack img {
  display: table-cell
  }

ul#imgShow {
  display: inline
  }

ul#imgShow li.imgShowItem {
  background-color: #ccddff;
  display: table-cell;
  float: left;
  list-style-type: none;
  margin-top: 0.1em;
  margin-right: 0.3em;
  margin-bottom: 0.1em;
  margin-left: 0.3em;
  outline-color: #cccccc;
  outline-width: 0.05em;
  outline-style: solid;
  padding-top: 0.1em;
  padding-right: 0.1em;
  padding-bottom: 0.2em;
  padding-left: 0.4em;
  text-indent: 0px
  }

ul.nobull li, li.nobull, li.nobull, ul.nobull li, #controList, #urlSplit {
  list-style-type: none
  }

#footer p a:hover {
  color: #aaffff
  }

#footer p a:link {
  color: #ffffaa
  }

#footer p a:visited {
  color: #ddddff
  }

#matchList:before {
  background-color: #fafafa;
  color: #3300ff;
  content: "Showing:($matches as $matchKey->matchVal):";
  font-family: monospace;
  font-weight: 800;
  padding-top: 0.2em;
  padding-right: 0.2em;
  padding-bottom: 0.2em;
  padding-left: 0.2em
  }

#navlist li a:first-letter {
  font-size: 1.5em;
  color: #3434ee
  }

dl dd dl dt:first-letter, .bottomsmaller:first-letter {
  font-weight: 800;
  vertical-align: baseline
  }

#urlSplit:before {
  background-color: #fafafa;
  color: #ff0033;
  content: "Showing:splitKey-splitVal[preg_split(matches[0])]:";
  font-family: monospace;
  font-size-adjust: 0.63;
  font-weight: 800;
  padding-top: 0.2em;
  padding-right: 0.2em;
  padding-bottom: 0.2em;
  padding-left: 0.2em
  }

.bottomsmaller:first-line {
  font-variant: small-caps
  }

.closeme:hover {
  color: #cc2222;
  font-weight: 700;
  text-align: center
  }

.toggler:hover {
  background-color: #ffffff;
  color: #ff0000;
  display: inline;
  padding-top: 0.2em;
  padding-right: 0;
  padding-bottom: 0.3em;
  padding-left: 0;
  visibility: visible
  }

.unfloat:after {
  clear: both;
  content: ".";
  display: block;
  height: 0px;
  visibility: hidden
  }

div.hiddenPath:before {
  content: "\a\d"
  }

li.netcomicon:before {
  content: "www"
  }

li.sourceLine:after {
  content: "	"
  }

ol#navlist li a:hover, ul#navlist li a:hover {
  background-color: #ffffff;
  color: #cc3300;
  }

ol#navlist li a:hover, ul#navlist li a:hover {
	list-style-image: url("load_to_top.png");
}

ol#navlist li:hover, ul#navlist li:hover {
  background-color: #ffffff;
  background-image: none;
  border-bottom-color: #cccccc;
  border-bottom-width: 0.2em;
  border-bottom-style: solid;
  border-right-color: #cfcfcf;
  border-right-width: 0.1em;
  border-right-style: solid;
  color: #aaF;
  }
</body>
</html>