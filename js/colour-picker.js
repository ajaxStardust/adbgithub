/*
 * This script is writen by Michael Buckley.
 * Home page: http://codefisher.org/web_applications/color_picker/

 * The code contained in these files are licensed under the
 * Attribution-ShareAlike 3.0 Unported.
 * http://creativecommons.org/licenses/by-sa/3.0/ 

 * Furthermore;
 * You may not claim the works as your own.
 * You must provide a link back to codefisher.org when using on a website.
 * You may not redistribute these as a package as-is..
 * You must seek approval for commercial purposes, and for applications. 
 * 
 * Please don't remove this from this file.
 * if you want to contact me please use my contact page
 * http://codefisher.org/email 
 *
 * If you modify this script please give me credit for the original script.
 *
 * Linking back to me should you use this script is appreicated and required
 */

var hexChars = "0123456789ABCDEF";
var hs;
var brightnessBox;
var colours = new objColour();
var tmpColor = new objColour();
var mouseX = 0;
var mouseY = 0;
var colourBox;

var red;
var blue;
var green;
var hue;
var saturation;
var brightness;
var hexColour;
var nameColour;
var nameColourSelect;
var brightnessPoint;
var hsPoint;
var colorTable;
var currentPaletteItem;
var tableHoverBox;

var redUp;
var redDown;
var greenUp;
var greenDown;
var blueUp;
var blueDown;
var hueUp;
var hueDown;
var saturationUp;
var saturationDown;
var brightnessUp;
var brightnessDown;

var currentColor = 'FF0000';
var lastEvent;

var SBmax = 100;

var colorNames = new objColorName();
var colorPalette = new  objColorPalette();

// Returns the decimal value of a hex character
function hex2dec(hex)
{
   return hexChars.indexOf(hex);
}

// return the hexidecimal value of a decimal digit from 1-16
function dec2hex(dec)
{
   return hexChars.charAt(dec);
}

// turn a rgb value to a hex value 
function getHex(r,g,b)
{
   var c = new Array();
   c[0] = dec2hex(Math.floor(r / 16));
   c[1] = dec2hex(this.r % 16);
   c[2] = dec2hex(Math.floor(g / 16));
   c[3] = dec2hex(this.g % 16);
   c[4] = dec2hex(Math.floor(b / 16));
   c[5] = dec2hex(this.b % 16);
   return c.join("");
 }

// cross broser event setter
function setEventListener(item,event,func,bool)
{
 if(item.addEventListener)
 {
	item.addEventListener(event,func,bool);
 } else
 {
	item.attachEvent('on'+event,func,bool);
 }
}

// set the colour picker running
function init_color_picker()
{
  hs               = document.getElementById('hueAndSaturationImg');
  brightnessBox    = document.getElementById('brightnessImg');
  colourBox 	   = document.getElementById('colour-box');
  red              = document.getElementById("red");
  blue             = document.getElementById("blue");
  green            = document.getElementById("green");
  hue              = document.getElementById("hue");
  saturation       = document.getElementById("saturation");
  brightness       = document.getElementById("brightness");
  hexColour        = document.getElementById("hexColour");
  nameColour       = document.getElementById("nameColour");
  nameColourSelect = document.getElementById("nameColourSelect");
  brightnessPoint  = document.getElementById("brightnessPoint");
  hsPoint          = document.getElementById("hueAndSaturationPoint");
  colorTable       = document.getElementById("colorTable");
  tableHoverBox    = document.getElementById("tableHoverBox");

  blueUp           = document.getElementById('blue-up');
  blueDown         = document.getElementById('blue-down');
  greenUp          = document.getElementById('green-up');
  greenDown        = document.getElementById('green-down');
  redUp            = document.getElementById('red-up');
  redDown          = document.getElementById('red-down');
  brightnessUp     = document.getElementById('brightness-up');
  brightnessDown   = document.getElementById('brightness-down');
  saturationUp     = document.getElementById('saturation-up');
  saturationDown   = document.getElementById('saturation-down');
  hueUp            = document.getElementById('hue-up');
  hueDown          = document.getElementById('hue-down');

  setEventListener(hs,'mousemove',mouseColorBoxMove,true);
  setEventListener(brightnessBox,'mousemove',mouseColorBoxMove,true);

  setEventListener(hs,'click',mouseColorBoxMove,true);
  setEventListener(brightnessBox,'click',mouseColorBoxMove,true);

  setEventListener(hs,'mouseout',mouseOutColorBox,true);
  setEventListener(brightnessBox,'mouseout',mouseOutColorBox,true);

  var colourPicker = document.getElementById('colour-picker');
  var inputs =  colourPicker.getElementsByTagName('input');
  var i = 0;
  while(inputs[i])
  {
   setEventListener(inputs[i],'input',textBoxChange,true);
   // input only works in FF these three should cover it for IE
   setEventListener(inputs[i],'keyup',textBoxKeyUp,true);
   setEventListener(inputs[i],'paste',textBoxChange,true);
   setEventListener(inputs[i],'change',textBoxChange,true);
   i++;
  }

  var options = nameColourSelect.options;
  var bgColor = document.body.bgColor;
  var i = 0;
  while(options[i])
  {
   document.body.bgColor = options[i].value;
   var hexColor = document.body.bgColor.toUpperCase();
   colorNames.set(hexColor,options[i]);
   i++;
  }

  var tds = colorTable.getElementsByTagName('td');
  var i = 0;
  while( tds[i] )
  {
   setEventListener(tds[i],'click',paletteClick,true);
   colorPalette.set(tds[i].className,tds[i]);
   i++;
  }
  if(brightnessBox.style.filter != null)
  {
	brightnessBox.src = '/images/dot.gif';
  }
  for(i = 1;i < 9; i++)
  {
   var item = document.getElementById('current-m'+i);
   setEventListener(item,'click',setValueToBox,true);
  }
  for(i = 0;i < 12; i++)
  {
   var item = document.getElementById('hue-'+i);
   setEventListener(item,'click',setValueToBox,true);
  }
  for(i = 1;i < 5; i++)
  {
   var item = document.getElementById('hue-m'+i);
   setEventListener(item,'click',setValueToBox,true);
  }
  document.body.bgColor = bgColor;
  redrawEverything();
}

function textBoxKeyUp(aEvent)
{
 if(65 <= aEvent.keyCode && aEvent.keyCode <= 90)
 {
  textBoxChange(aEvent);
 } else if(48 <= aEvent.keyCode && aEvent.keyCode <= 57)
 {
  textBoxChange(aEvent);
 }
}

function setValueToBox(aEvent)
{
  target = getBox(aEvent);
  colours.setHex(target.value);
  currentColor = colours.getHex();
  redrawEverything(); 
}

function lighten(amount)
{
   var b = colours.getBrightness();
   var s = colours.getSaturation();
   var h = colours.getHue();
   colours.setHSB(h,s-(0.1*amount),b+(0.1*amount));
   currentColor = colours.getHex();
   redrawEverything();  
}

function darken(amount)
{
   var b = colours.getBrightness();
   var s = colours.getSaturation();
   var h = colours.getHue();
   colours.setHSB(h,s+(0.1*amount),b-(0.1*amount));
   currentColor = colours.getHex();
   redrawEverything();  
}

function paletteClick(aEvent)
{
 target = getBox(aEvent);
 var hex = target.className.replace('#','');;
 colours.setHex(hex);
 currentColor = colours.getHex();
 redrawEverything();
}

function mouseOutColorBox()
{
 colours.setHex(currentColor);
  hsPoint.style.display = 'block';
 redrawEverything();
}

// handles changes to any of the text boces 
function textBoxChange(aEvent)
{
 if(aEvent.type == 'keyup' && aEvent.ctrlKey || aEvent.altKey)
 {
  return;
 }

 var h = colours.getHue();
 var s = colours.getSaturation();
 var v = colours.getBrightness();

 var r = colours.getRed();
 var g = colours.getGreen();
 var b = colours.getBlue();

 var input = getBox(aEvent);
 if(input.id != 'hexColour' && input.id != 'nameColour')
 {
  var value = parseInt(input.value);
  if(isNaN(value))
  {
   value = 0;
  }
 } else
 {
  var value = input.value;
 }
  switch(input.id)
  {
   case 'red' :
    r = min_max(value,0,255);
    colours.setRGB(r, g, b);
   break;
   case 'green' :
    g = min_max(value,0,255);
    colours.setRGB(r, g, b);
   break;
   case 'blue' :
    b = min_max(value,0,255);
    colours.setRGB(r, g, b);
   break;
   case 'hue' :
    h = min_max(value,0,359);
    colours.setHSB(h, s, v);
   break;
   case 'saturation' :
    s = min_max((value/SBmax),0,1);
    colours.setHSB(h, s, v);
   break;
   case 'brightness' :
    v = min_max((value/SBmax),0,1);
    colours.setHSB(h, s, v);
   break;
   case 'hexColour' :
    value = value.replace('#','');
    value = value.toUpperCase();
    if(!value.match(/[^0-9A-F]/) && value.length == 6)
    {
     colours.setHex(value);
    } else
    {
     return;
    }
   break; 
   case 'nameColour' :
    value = value.toLowerCase();
    value = value.replace(/[^a-z]/,'');
    color = colorNames[value]
    if(color)
    {
     color = color.replace('#','');
     colours.setHex(color);
    } else
    {
     return;
    }
   break; 
  }
 lastEvent = 'input'
 currentColor = colours.getHex();
 redrawEverything();
}

// get the target image from an event
function getBox(aEvent)
{
 if(aEvent.srcElement)
 {
  var target = aEvent.srcElement;
 } else
 {
  var target = aEvent.target;
 }
 if(target)
 {
  return target;
 }
 return null;
}

// function to handel the spinners
function spin(type,up)
{
 var h = colours.getHue();
 var s = colours.getSaturation();
 var v = colours.getBrightness();

 var r = colours.getRed();
 var g = colours.getGreen();
 var b = colours.getBlue();
 switch(type)
{
  case 'hue':
   if(up){
    h = h + 10;
   } else {
    h = h - 10;
   }
   s = min_max(s,1/SBmax,1);
   h = min_max(h,0,359);
   colours.setHSB(h, s, v);
  break;
  case 'saturation':
   if(up){
    s = s + 0.1;
   } else {
    s = s - 0.1;
   }
   s = min_max(s,1/SBmax,1);
   colours.setHSB(h, s, v);
  break;
  case 'brightness' :
   if(up){
    v = v + 0.1;
   } else {
    v = v - 0.1;
   }
   v = min_max(v,0,1);
   colours.setHSB(h, s, v);
  break;
  case 'red':
    if(up){
    r = r + 10;
   } else {
    r = r - 10;
   }
   r = min_max(r,0,255);
   colours.setRGB(r, g, b);
  break;
  case 'green':
    if(up){
    g = g + 10;
   } else {
    g = g - 10;
   }
   g = min_max(g,0,255);
   colours.setRGB(r, g, b);
  break;
  case 'blue':
    if(up){
    b = b + 10;
   } else {
    b = b - 10;
   }
   b = min_max(b,0,255);
   colours.setRGB(r, g, b);
  break;
 }
 currentColor = colours.getHex();
 redrawEverything();
}

// test if the value is in the allowed range and correct it if not
function min_max(value,min,max)
{
 if(value > max)
  return max;
 if(value < min)
  return min;
 return value;
}

// get the point of a mouse move and update as needed.
function mouseColorBoxMove(aEvent)
{
 var obj = getBox(aEvent);
 var pos = find_real_pos(obj);
 mouseY = aEvent.clientY + document.documentElement.scrollTop - pos[1];
 mouseX = aEvent.clientX + document.documentElement.scrollLeft - pos[0];
 var changeCurrent = false;
 hsPoint.style.display = 'none';
 if(aEvent.type == 'click')
 {
  changeCurrent = true;
 }
 handleValueChange(obj,changeCurrent);
}

function find_real_pos(obj)
{
 var curtop;
 var curleft = curtop = 0;
  if(obj.offsetParent)
  {
   curleft = obj.offsetLeft
   curtop = obj.offsetTop
   while(obj = obj.offsetParent)
   {
    curleft += obj.offsetLeft
    curtop += obj.offsetTop
   }
  }
 return [curleft,curtop];
}

// update to refelect a movment on the hsl images.
function handleValueChange(obj,change)
{
   var sWidth = hs.offsetWidth;
   var sHeight = brightnessBox.offsetHeight;

   if (obj.id == "brightnessImg")
   { 
         var bVal = (sHeight - mouseY) / sHeight;
	 bVal = min_max(bVal,1/SBmax,1);
         var h = colours.getHue();
         var s = colours.getSaturation();
         colours.setHSB(h, s, bVal);
         redrawEverything();
   }
   else if (obj.id == "hueAndSaturationImg")
   {
         hVal = mouseX * 360 / sWidth;
         sVal = (sWidth - mouseY) / sWidth;
         b = colours.getBrightness();
         if (!b)
           b = 1;
         colours.setHSB(hVal, sVal, b);
         redrawEverything();
   }
   if(change)
   {
     currentColor = colours.getHex();
   }
}

function selectChange(aEvent){
   var color = colorNames[nameColourSelect.value]
   if(color)
   {
    color = color.replace('#','');
    colours.setHex(color);
    currentColor = color;
   }
   redrawEverything()
}

// something changed so we need to update everything else
function redrawEverything()
{
 var sHeight = 200;
 var sWidth = 200;

 var hex = colours.getHex();
 colourBox.style.background = '#' + hex;

 var start = hexColour.selectionStart;
 hexColour.value = '#' + hex;
 hexColour.selectionStart = start;
 hexColour.selectionEnd = start;

 var h = colours.getHue();
 var hPoint = ( (h * sHeight) / 360 ) - 5;

 var s = colours.getSaturation();
 var sPoint = ( sWidth - ((s * sWidth )) ) - 5;

 hsPoint.style.top = sPoint + 'px';;
 hsPoint.style.left = hPoint + 'px';;

 var h2 = Math.round(h);
 h2 = (h2 == 0 && lastEvent == 'input') ? '' : h2;

 var start = hue.selectionStart;
 hue.value = h2;
 hue.selectionStart = start;
 hue.selectionEnd = start;

 hueDown.removeAttribute('disabled');
 hueUp.removeAttribute('disabled');
 if(h2 == 0 || h2 == '')
 {
  hueDown.setAttribute('disabled',true);
 } else if(h2 == 359)
 {
  hueUp.setAttribute('disabled',true);
 } 

 var s2 = Math.round(s*SBmax);
 s2 = (s2 == 0 && lastEvent == 'input') ? '' : s2;

 var start = saturation.selectionStart;
 saturation.value  = s2;
 saturation.selectionStart = start;
 saturation.selectionEnd = start;

 saturationDown.removeAttribute('disabled');
 saturationUp.removeAttribute('disabled');
 if(s2 == 0 || s2 == '')
 {
  saturationDown.setAttribute('disabled',true);
 } else if(s2 == SBmax)
 {
  saturationUp.setAttribute('disabled',true);
 }

 var b = colours.getBrightness()*SBmax;
 var bPoint = (sHeight - (b * sHeight) / SBmax) - 5;
 brightnessPoint.style.top = bPoint + 'px';

 var b2 = Math.round(b);
 b2 = (b2 == 0 && lastEvent == 'input') ? '' : b2;

 var start = brightness.selectionStart;
 brightness.value  = b2;
 brightness.selectionStart = start;
 brightness.selectionEnd = start;

 brightnessDown.removeAttribute('disabled');
 brightnessUp.removeAttribute('disabled');
 if(b2 == 0 || b2 == '')
 {
  brightnessDown.setAttribute('disabled',true);
 } else if(b2 == SBmax)
 {
  brightnessUp.setAttribute('disabled',true);
 }

 tmpColor.setHSB(h, s, 1);
 brightnessBox.style.background = '#' + tmpColor.getHex();

 var r2 = Math.round(colours.getRed());
 r2 = (r2 == 0 && lastEvent == 'input') ? '' : r2;

 var start = red.selectionStart;
 red.value  = r2;
 red.selectionStart = start;
 red.selectionEnd = start;

 redDown.removeAttribute('disabled');
 redUp.removeAttribute('disabled');
 if(r2 == 0 || r2 == '')
 {
  redDown.setAttribute('disabled',true);
 } else if(r2 == 255)
 {
  redUp.setAttribute('disabled',true);
 }

 var g2 = Math.round(colours.getGreen());
 g2 = (g2 == 0 && lastEvent == 'input') ? '' : g2;

 var start = green.selectionStart;
 green.value  = g2;
 green.selectionStart = start;
 green.selectionEnd = start;

 greenDown.removeAttribute('disabled');
 greenUp.removeAttribute('disabled');
 if(g2 == 0 || g2 == '')
 {
  greenDown.setAttribute('disabled',true);
 } else if(g2 == 255)
 {
  greenUp.setAttribute('disabled',true);
 }

 var b2 = Math.round(colours.getBlue());
 b2 = (b2 == 0 && lastEvent == 'input') ? '' : b2;

 var start = blue.selectionStart;
 blue.value  = b2;
 blue.selectionStart = start;
 blue.selectionEnd = start;

 blueDown.removeAttribute('disabled');
 blueUp.removeAttribute('disabled');
 if(b2 == 0 || b2 == '')
 {
  blueDown.setAttribute('disabled',true);
 } else if(b2 == 255)
 {
  blueUp.setAttribute('disabled',true);
 }

 hex = '#' + hex; 
 if(colorNames[hex])
 {
  var start = nameColour.selectionStart;
  nameColour.value  = colorNames[hex].value;
  nameColour.selectionStart = start;
  nameColour.selectionEnd = start;

  nameColourSelect.options.selectedIndex = colorNames[hex].index;
 } else
 {
  nameColour.value  = '';
  nameColourSelect.options.selectedIndex = 0;
 }

 if(!colorPalette[hex])
 {
  if(currentPaletteItem)
  {
   currentPaletteItem.id = '';
   tableHoverBox.style.display = 'none';
  }
 } else
 {
   if(currentPaletteItem)
   {
    currentPaletteItem.id = '';
   }
   var pos = find_real_pos(colorPalette[hex]);
   var hoverPos = find_real_pos(tableHoverBox.parentNode);
   tableHoverBox.style.top = (pos[1] - 3 - hoverPos[1]) + 'px';
   tableHoverBox.style.left = (pos[0] - 3 - hoverPos[0]) + 'px';
   tableHoverBox.style.display = 'block';
   tableHoverBox.style.background = hex;
   currentPaletteItem = colorPalette[hex];
   currentPaletteItem.id = 'slectedPaletteItem';
 }
 var f = 0.1;
 for(i = 1;i < 9; i++)
{
  var item = document.getElementById('current-m'+i);
  var colour = new objColour();
   colour.r = colours.r
   colour.g = colours.g
   colour.b = colours.b
   var b = colour.getBrightness();
   var s = colour.getSaturation();
   var h = colour.getHue();
   switch(i)
   {
    case 1:
     colour.setHSB(h,s-f,b+f);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
    case 2:
     colour.setHSB(h,s-f,b);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 3:
     colour.setHSB(h,s-f,b-f);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 4:
     colour.setHSB(h,s,b+f);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 5:
     colour.setHSB(h,s,b-f);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 6:
     colour.setHSB(h,s+f,b+f);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 7:
     colour.setHSB(h,s+f,b);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 8:
     colour.setHSB(h,s+f,b-f);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
   }
 }
 for(i = 0;i < 12; i++)
 {
  var item = document.getElementById('hue-'+i);
  var colour = new objColour();
   colour.r = colours.r
   colour.g = colours.g
   colour.b = colours.b
   var b = colour.getBrightness();
   var s = colour.getSaturation();
   var h = colour.getHue()+(30*i);
   h = (h > 359) ? h-360 : h;
   colour.setHSB(h,s,b);
   item.style.backgroundColor = '#' + colour.getHex();
   item.value = colour.getHex();
 }
 for(i = 1;i < 5; i++)
 {
  var item = document.getElementById('hue-m'+i);
  var colour = new objColour();
   colour.r = colours.r
   colour.g = colours.g
   colour.b = colours.b
   var b = colour.getBrightness();
   var s = colour.getSaturation();
   var h = colour.getHue();
   switch(i)
   {
    case 1:
     s = (s < 0.5) ? s+0.25 : s-0.25;
     colour.setHSB(h,s,b);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 2:
     s = (s < 0.5) ? s+0.5 : s-0.5;
     colour.setHSB(h,s,b);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 3:
     s = (s < 0.5) ? s+0.5 : s-0.5;
     h += 180;
     h = (h > 359) ? h-360 : h;
     colour.setHSB(h,s,b);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 4:
     s = (s < 0.5) ? s+0.25 : s-0.25;
     h += 180;
     h = (h > 359) ? h-360 : h;
     colour.setHSB(h,s,b);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
   }
 }
 lastEvent = null;
}

// used to store and access refs to the color name selct box, so hex to color conversions can take place.
function objColorName()
{
 this.set = function(hex,value)
 {
  this[hex] = value;
  this[value.value] = hex;
 }
 this.get = function(hex)
 {
  return this[hex];
 }
}

// maps hex codes to the palette
function objColorPalette()
{
 this.set = function(hex,value)
 {
  this[hex] = value;
 }
}

// lets the page appear to finish loading.
function do_color_picker()
{
 setTimeout(init_color_picker,50);
}

// The object that stores the colours in ram - based on Nvu
function objColour()
{

 this.r = 255;
 this.g = 0;
 this.b = 0;

 // Returns the hex value
 this.getHex = function()
 {
   var c = new Array();
   c[0] = dec2hex(Math.floor(this.r / 16));
   c[1] = dec2hex(this.r % 16);
   c[2] = dec2hex(Math.floor(this.g / 16));
   c[3] = dec2hex(this.g % 16);
   c[4] = dec2hex(Math.floor(this.b / 16));
   c[5] = dec2hex(this.b % 16);
   return c.join("");
 }
 this.getRed = function()
 {
   return this.r;
 }
 this.getGreen = function()
 {
   return this.g;
 }
 this.getBlue = function()
 {
   return this.b;
 }
 this.getBrightness = function()
 {
   // find the min and max rgb values
   var max1 = Math.max(this.r, this.g);
   var max2 = Math.max(max1, this.b);
   return max2/255;
 }
 this.getSaturation = function()
 {
   // find the min and max rgb values
   var min1 = Math.min(this.r, this.g);
   var min2 = Math.min(min1, this.b);
   var max1 = Math.max(this.r, this.g);
   var max2 = Math.max(max1, this.b); // v

   var delta = max2 - min2;
   var sat = 0;
   if (max2 != 0)
   {
      sat = delta / max2;
   }
   return sat;
 }

 this.getHue = function()
 {
   var hue = 0;
   // If all the values are the same, there is no hue, just brightness
   if (this.r == this.g && this.g == this.b)
   {
      hue = 0;
      return hue;
   }

   // find the min and max rgb values
   var min1 = Math.min(this.r, this.g);
   var min2 = Math.min(min1, this.b);
   var max1 = Math.max(this.r, this.g);
   var max2 = Math.max(max1, this.b); // v

   var delta = max2 - min2;

   if (max2 == 0)
   {
      hue = 0;
      return hue; // Saturation is undefined, so there is no hue
   }

   if (this.r == max2)
   {
      hue = (this.g - this.b) / delta; // It's between yellow and magenta
   }
   else if (this.g == max2)
   {
      hue = 2 + (this.b - this.r) / delta; // It's between cyan and yellow
   }
   else
   {
      hue = 4 + (this.r - this.g) / delta; // It's between magenta and cyan
   }

   hue *= 60; // Get it in degrees
   if (hue < 0)
   {
      hue += 360;
   }
   if (!hue)
   {
      hue = 0;
   }
   return hue;
 }

 this.setRGB = function(r, g, b)
 {
    this.r = r;
    this.g = g;
    this.b = b;
 }

 this.setHSB = function(h, s, b)
 {

    s = Math.max(0,Math.min(s,1));
    b = Math.max(0,Math.min(b,1))*255;
    if (s == 0)
    {
       // Set it to a grey based on the brightness
       this.r = b;
       this.g = b;
       this.b = b;
       return;
    }

    h /= 60; // Get it out of degrees

    var i = Math.floor(h);
    var f = h - i; // Grab the decimal part
    var p = b * (1 - s);
    var q = b * (1 - s * f);
    var t = b * (1 - s * (1 - f));

    switch (i)
    {
       case 0:
          this.r = b;
          this.g = t;
          this.b = p;
          break;
       case 1:
          this.r = q;
          this.g = b;
          this.b = p;
          break;
       case 2:
          this.r = p;
          this.g = b;
          this.b = t;
          break;
       case 3:
          this.r = p;
          this.g = q;
          this.b = b;
          break;
       case 4:
          this.r = t;
          this.g = p;
          this.b = b;
          break;
       default:
          this.r = b;
          this.g = p;
          this.b = q;
          break;
    }
 }

 this.setHex = function(hex)
 {
    var c = hex.split("");
    var red = hex2dec(c[0]) * 16 + hex2dec(c[1]);
    var green = hex2dec(c[2]) * 16 + hex2dec(c[3]);
    var blue = hex2dec(c[4]) * 16 + hex2dec(c[5]);
    this.r = red;
    this.g = green;
    this.b = blue;
 }
}

function selectTab(item)
{
 nodes = document.getElementById('color-panels').childNodes;
 var i = 0;
 while(nodes[i])
 {
  if(nodes[i].style)
  {
   nodes[i].style.zIndex = 1;
  }
  i++;
 }
 document.getElementById(item.className).style.zIndex = 10;
}

//setEventListener(window,'load',do_color_picker,true);

http://codefisher.org/web_applications/color_picker/color.js

/*
 * This script is writen by Michael Buckley.
 * Home page: http://codefisher.org/web_applications/color_picker/

 * The code contained in these files are licensed under the
 * Attribution-ShareAlike 3.0 Unported.
 * http://creativecommons.org/licenses/by-sa/3.0/ 

 * Furthermore;
 * You may not claim the works as your own.
 * You must provide a link back to codefisher.org when using on a website.
 * You may not redistribute these as a package as-is..
 * You must seek approval for commercial purposes, and for applications. 
 * 
 * Please don't remove this from this file.
 * if you want to contact me please use my contact page
 * http://codefisher.org/email 
 *
 * If you modify this script please give me credit for the original script.
 *
 * Linking back to me should you use this script is appreicated and required
 */

var hexChars = "0123456789ABCDEF";
var hs;
var brightnessBox;
var colours = new objColour();
var tmpColor = new objColour();
var mouseX = 0;
var mouseY = 0;
var colourBox;

var red;
var blue;
var green;
var hue;
var saturation;
var brightness;
var hexColour;
var nameColour;
var nameColourSelect;
var brightnessPoint;
var hsPoint;
var colorTable;
var currentPaletteItem;
var tableHoverBox;

var redUp;
var redDown;
var greenUp;
var greenDown;
var blueUp;
var blueDown;
var hueUp;
var hueDown;
var saturationUp;
var saturationDown;
var brightnessUp;
var brightnessDown;

var currentColor = 'FF0000';
var lastEvent;

var SBmax = 100;

var colorNames = new objColorName();
var colorPalette = new  objColorPalette();

// Returns the decimal value of a hex character
function hex2dec(hex)
{
   return hexChars.indexOf(hex);
}

// return the hexidecimal value of a decimal digit from 1-16
function dec2hex(dec)
{
   return hexChars.charAt(dec);
}

// turn a rgb value to a hex value 
function getHex(r,g,b)
{
   var c = new Array();
   c[0] = dec2hex(Math.floor(r / 16));
   c[1] = dec2hex(this.r % 16);
   c[2] = dec2hex(Math.floor(g / 16));
   c[3] = dec2hex(this.g % 16);
   c[4] = dec2hex(Math.floor(b / 16));
   c[5] = dec2hex(this.b % 16);
   return c.join("");
 }

// cross broser event setter
function setEventListener(item,event,func,bool)
{
 if(item.addEventListener)
 {
	item.addEventListener(event,func,bool);
 } else
 {
	item.attachEvent('on'+event,func,bool);
 }
}

// set the colour picker running
function init_color_picker()
{
  hs               = document.getElementById('hueAndSaturationImg');
  brightnessBox    = document.getElementById('brightnessImg');
  colourBox 	   = document.getElementById('colour-box');
  red              = document.getElementById("red");
  blue             = document.getElementById("blue");
  green            = document.getElementById("green");
  hue              = document.getElementById("hue");
  saturation       = document.getElementById("saturation");
  brightness       = document.getElementById("brightness");
  hexColour        = document.getElementById("hexColour");
  nameColour       = document.getElementById("nameColour");
  nameColourSelect = document.getElementById("nameColourSelect");
  brightnessPoint  = document.getElementById("brightnessPoint");
  hsPoint          = document.getElementById("hueAndSaturationPoint");
  colorTable       = document.getElementById("colorTable");
  tableHoverBox    = document.getElementById("tableHoverBox");

  blueUp           = document.getElementById('blue-up');
  blueDown         = document.getElementById('blue-down');
  greenUp          = document.getElementById('green-up');
  greenDown        = document.getElementById('green-down');
  redUp            = document.getElementById('red-up');
  redDown          = document.getElementById('red-down');
  brightnessUp     = document.getElementById('brightness-up');
  brightnessDown   = document.getElementById('brightness-down');
  saturationUp     = document.getElementById('saturation-up');
  saturationDown   = document.getElementById('saturation-down');
  hueUp            = document.getElementById('hue-up');
  hueDown          = document.getElementById('hue-down');

  setEventListener(hs,'mousemove',mouseColorBoxMove,true);
  setEventListener(brightnessBox,'mousemove',mouseColorBoxMove,true);

  setEventListener(hs,'click',mouseColorBoxMove,true);
  setEventListener(brightnessBox,'click',mouseColorBoxMove,true);

  setEventListener(hs,'mouseout',mouseOutColorBox,true);
  setEventListener(brightnessBox,'mouseout',mouseOutColorBox,true);

  var colourPicker = document.getElementById('colour-picker');
  var inputs =  colourPicker.getElementsByTagName('input');
  var i = 0;
  while(inputs[i])
  {
   setEventListener(inputs[i],'input',textBoxChange,true);
   // input only works in FF these three should cover it for IE
   setEventListener(inputs[i],'keyup',textBoxKeyUp,true);
   setEventListener(inputs[i],'paste',textBoxChange,true);
   setEventListener(inputs[i],'change',textBoxChange,true);
   i++;
  }

  var options = nameColourSelect.options;
  var bgColor = document.body.bgColor;
  var i = 0;
  while(options[i])
  {
   document.body.bgColor = options[i].value;
   var hexColor = document.body.bgColor.toUpperCase();
   colorNames.set(hexColor,options[i]);
   i++;
  }

  var tds = colorTable.getElementsByTagName('td');
  var i = 0;
  while( tds[i] )
  {
   setEventListener(tds[i],'click',paletteClick,true);
   colorPalette.set(tds[i].className,tds[i]);
   i++;
  }
  if(brightnessBox.style.filter != null)
  {
	brightnessBox.src = '/images/dot.gif';
  }
  for(i = 1;i < 9; i++)
  {
   var item = document.getElementById('current-m'+i);
   setEventListener(item,'click',setValueToBox,true);
  }
  for(i = 0;i < 12; i++)
  {
   var item = document.getElementById('hue-'+i);
   setEventListener(item,'click',setValueToBox,true);
  }
  for(i = 1;i < 5; i++)
  {
   var item = document.getElementById('hue-m'+i);
   setEventListener(item,'click',setValueToBox,true);
  }
  document.body.bgColor = bgColor;
  redrawEverything();
}

function textBoxKeyUp(aEvent)
{
 if(65 <= aEvent.keyCode && aEvent.keyCode <= 90)
 {
  textBoxChange(aEvent);
 } else if(48 <= aEvent.keyCode && aEvent.keyCode <= 57)
 {
  textBoxChange(aEvent);
 }
}

function setValueToBox(aEvent)
{
  target = getBox(aEvent);
  colours.setHex(target.value);
  currentColor = colours.getHex();
  redrawEverything(); 
}

function lighten(amount)
{
   var b = colours.getBrightness();
   var s = colours.getSaturation();
   var h = colours.getHue();
   colours.setHSB(h,s-(0.1*amount),b+(0.1*amount));
   currentColor = colours.getHex();
   redrawEverything();  
}

function darken(amount)
{
   var b = colours.getBrightness();
   var s = colours.getSaturation();
   var h = colours.getHue();
   colours.setHSB(h,s+(0.1*amount),b-(0.1*amount));
   currentColor = colours.getHex();
   redrawEverything();  
}

function paletteClick(aEvent)
{
 target = getBox(aEvent);
 var hex = target.className.replace('#','');;
 colours.setHex(hex);
 currentColor = colours.getHex();
 redrawEverything();
}

function mouseOutColorBox()
{
 colours.setHex(currentColor);
  hsPoint.style.display = 'block';
 redrawEverything();
}

// handles changes to any of the text boces 
function textBoxChange(aEvent)
{
 if(aEvent.type == 'keyup' && aEvent.ctrlKey || aEvent.altKey)
 {
  return;
 }

 var h = colours.getHue();
 var s = colours.getSaturation();
 var v = colours.getBrightness();

 var r = colours.getRed();
 var g = colours.getGreen();
 var b = colours.getBlue();

 var input = getBox(aEvent);
 if(input.id != 'hexColour' && input.id != 'nameColour')
 {
  var value = parseInt(input.value);
  if(isNaN(value))
  {
   value = 0;
  }
 } else
 {
  var value = input.value;
 }
  switch(input.id)
  {
   case 'red' :
    r = min_max(value,0,255);
    colours.setRGB(r, g, b);
   break;
   case 'green' :
    g = min_max(value,0,255);
    colours.setRGB(r, g, b);
   break;
   case 'blue' :
    b = min_max(value,0,255);
    colours.setRGB(r, g, b);
   break;
   case 'hue' :
    h = min_max(value,0,359);
    colours.setHSB(h, s, v);
   break;
   case 'saturation' :
    s = min_max((value/SBmax),0,1);
    colours.setHSB(h, s, v);
   break;
   case 'brightness' :
    v = min_max((value/SBmax),0,1);
    colours.setHSB(h, s, v);
   break;
   case 'hexColour' :
    value = value.replace('#','');
    value = value.toUpperCase();
    if(!value.match(/[^0-9A-F]/) && value.length == 6)
    {
     colours.setHex(value);
    } else
    {
     return;
    }
   break; 
   case 'nameColour' :
    value = value.toLowerCase();
    value = value.replace(/[^a-z]/,'');
    color = colorNames[value]
    if(color)
    {
     color = color.replace('#','');
     colours.setHex(color);
    } else
    {
     return;
    }
   break; 
  }
 lastEvent = 'input'
 currentColor = colours.getHex();
 redrawEverything();
}

// get the target image from an event
function getBox(aEvent)
{
 if(aEvent.srcElement)
 {
  var target = aEvent.srcElement;
 } else
 {
  var target = aEvent.target;
 }
 if(target)
 {
  return target;
 }
 return null;
}

// function to handel the spinners
function spin(type,up)
{
 var h = colours.getHue();
 var s = colours.getSaturation();
 var v = colours.getBrightness();

 var r = colours.getRed();
 var g = colours.getGreen();
 var b = colours.getBlue();
 switch(type)
{
  case 'hue':
   if(up){
    h = h + 10;
   } else {
    h = h - 10;
   }
   s = min_max(s,1/SBmax,1);
   h = min_max(h,0,359);
   colours.setHSB(h, s, v);
  break;
  case 'saturation':
   if(up){
    s = s + 0.1;
   } else {
    s = s - 0.1;
   }
   s = min_max(s,1/SBmax,1);
   colours.setHSB(h, s, v);
  break;
  case 'brightness' :
   if(up){
    v = v + 0.1;
   } else {
    v = v - 0.1;
   }
   v = min_max(v,0,1);
   colours.setHSB(h, s, v);
  break;
  case 'red':
    if(up){
    r = r + 10;
   } else {
    r = r - 10;
   }
   r = min_max(r,0,255);
   colours.setRGB(r, g, b);
  break;
  case 'green':
    if(up){
    g = g + 10;
   } else {
    g = g - 10;
   }
   g = min_max(g,0,255);
   colours.setRGB(r, g, b);
  break;
  case 'blue':
    if(up){
    b = b + 10;
   } else {
    b = b - 10;
   }
   b = min_max(b,0,255);
   colours.setRGB(r, g, b);
  break;
 }
 currentColor = colours.getHex();
 redrawEverything();
}

// test if the value is in the allowed range and correct it if not
function min_max(value,min,max)
{
 if(value > max)
  return max;
 if(value < min)
  return min;
 return value;
}

// get the point of a mouse move and update as needed.
function mouseColorBoxMove(aEvent)
{
 var obj = getBox(aEvent);
 var pos = find_real_pos(obj);
 mouseY = aEvent.clientY + document.documentElement.scrollTop - pos[1];
 mouseX = aEvent.clientX + document.documentElement.scrollLeft - pos[0];
 var changeCurrent = false;
 hsPoint.style.display = 'none';
 if(aEvent.type == 'click')
 {
  changeCurrent = true;
 }
 handleValueChange(obj,changeCurrent);
}

function find_real_pos(obj)
{
 var curtop;
 var curleft = curtop = 0;
  if(obj.offsetParent)
  {
   curleft = obj.offsetLeft
   curtop = obj.offsetTop
   while(obj = obj.offsetParent)
   {
    curleft += obj.offsetLeft
    curtop += obj.offsetTop
   }
  }
 return [curleft,curtop];
}

// update to refelect a movment on the hsl images.
function handleValueChange(obj,change)
{
   var sWidth = hs.offsetWidth;
   var sHeight = brightnessBox.offsetHeight;

   if (obj.id == "brightnessImg")
   { 
         var bVal = (sHeight - mouseY) / sHeight;
	 bVal = min_max(bVal,1/SBmax,1);
         var h = colours.getHue();
         var s = colours.getSaturation();
         colours.setHSB(h, s, bVal);
         redrawEverything();
   }
   else if (obj.id == "hueAndSaturationImg")
   {
         hVal = mouseX * 360 / sWidth;
         sVal = (sWidth - mouseY) / sWidth;
         b = colours.getBrightness();
         if (!b)
           b = 1;
         colours.setHSB(hVal, sVal, b);
         redrawEverything();
   }
   if(change)
   {
     currentColor = colours.getHex();
   }
}

function selectChange(aEvent){
   var color = colorNames[nameColourSelect.value]
   if(color)
   {
    color = color.replace('#','');
    colours.setHex(color);
    currentColor = color;
   }
   redrawEverything()
}

// something changed so we need to update everything else
function redrawEverything()
{
 var sHeight = 200;
 var sWidth = 200;

 var hex = colours.getHex();
 colourBox.style.background = '#' + hex;

 var start = hexColour.selectionStart;
 hexColour.value = '#' + hex;
 hexColour.selectionStart = start;
 hexColour.selectionEnd = start;

 var h = colours.getHue();
 var hPoint = ( (h * sHeight) / 360 ) - 5;

 var s = colours.getSaturation();
 var sPoint = ( sWidth - ((s * sWidth )) ) - 5;

 hsPoint.style.top = sPoint + 'px';;
 hsPoint.style.left = hPoint + 'px';;

 var h2 = Math.round(h);
 h2 = (h2 == 0 && lastEvent == 'input') ? '' : h2;

 var start = hue.selectionStart;
 hue.value = h2;
 hue.selectionStart = start;
 hue.selectionEnd = start;

 hueDown.removeAttribute('disabled');
 hueUp.removeAttribute('disabled');
 if(h2 == 0 || h2 == '')
 {
  hueDown.setAttribute('disabled',true);
 } else if(h2 == 359)
 {
  hueUp.setAttribute('disabled',true);
 } 

 var s2 = Math.round(s*SBmax);
 s2 = (s2 == 0 && lastEvent == 'input') ? '' : s2;

 var start = saturation.selectionStart;
 saturation.value  = s2;
 saturation.selectionStart = start;
 saturation.selectionEnd = start;

 saturationDown.removeAttribute('disabled');
 saturationUp.removeAttribute('disabled');
 if(s2 == 0 || s2 == '')
 {
  saturationDown.setAttribute('disabled',true);
 } else if(s2 == SBmax)
 {
  saturationUp.setAttribute('disabled',true);
 }

 var b = colours.getBrightness()*SBmax;
 var bPoint = (sHeight - (b * sHeight) / SBmax) - 5;
 brightnessPoint.style.top = bPoint + 'px';

 var b2 = Math.round(b);
 b2 = (b2 == 0 && lastEvent == 'input') ? '' : b2;

 var start = brightness.selectionStart;
 brightness.value  = b2;
 brightness.selectionStart = start;
 brightness.selectionEnd = start;

 brightnessDown.removeAttribute('disabled');
 brightnessUp.removeAttribute('disabled');
 if(b2 == 0 || b2 == '')
 {
  brightnessDown.setAttribute('disabled',true);
 } else if(b2 == SBmax)
 {
  brightnessUp.setAttribute('disabled',true);
 }

 tmpColor.setHSB(h, s, 1);
 brightnessBox.style.background = '#' + tmpColor.getHex();

 var r2 = Math.round(colours.getRed());
 r2 = (r2 == 0 && lastEvent == 'input') ? '' : r2;

 var start = red.selectionStart;
 red.value  = r2;
 red.selectionStart = start;
 red.selectionEnd = start;

 redDown.removeAttribute('disabled');
 redUp.removeAttribute('disabled');
 if(r2 == 0 || r2 == '')
 {
  redDown.setAttribute('disabled',true);
 } else if(r2 == 255)
 {
  redUp.setAttribute('disabled',true);
 }

 var g2 = Math.round(colours.getGreen());
 g2 = (g2 == 0 && lastEvent == 'input') ? '' : g2;

 var start = green.selectionStart;
 green.value  = g2;
 green.selectionStart = start;
 green.selectionEnd = start;

 greenDown.removeAttribute('disabled');
 greenUp.removeAttribute('disabled');
 if(g2 == 0 || g2 == '')
 {
  greenDown.setAttribute('disabled',true);
 } else if(g2 == 255)
 {
  greenUp.setAttribute('disabled',true);
 }

 var b2 = Math.round(colours.getBlue());
 b2 = (b2 == 0 && lastEvent == 'input') ? '' : b2;

 var start = blue.selectionStart;
 blue.value  = b2;
 blue.selectionStart = start;
 blue.selectionEnd = start;

 blueDown.removeAttribute('disabled');
 blueUp.removeAttribute('disabled');
 if(b2 == 0 || b2 == '')
 {
  blueDown.setAttribute('disabled',true);
 } else if(b2 == 255)
 {
  blueUp.setAttribute('disabled',true);
 }

 hex = '#' + hex; 
 if(colorNames[hex])
 {
  var start = nameColour.selectionStart;
  nameColour.value  = colorNames[hex].value;
  nameColour.selectionStart = start;
  nameColour.selectionEnd = start;

  nameColourSelect.options.selectedIndex = colorNames[hex].index;
 } else
 {
  nameColour.value  = '';
  nameColourSelect.options.selectedIndex = 0;
 }

 if(!colorPalette[hex])
 {
  if(currentPaletteItem)
  {
   currentPaletteItem.id = '';
   tableHoverBox.style.display = 'none';
  }
 } else
 {
   if(currentPaletteItem)
   {
    currentPaletteItem.id = '';
   }
   var pos = find_real_pos(colorPalette[hex]);
   var hoverPos = find_real_pos(tableHoverBox.parentNode);
   tableHoverBox.style.top = (pos[1] - 3 - hoverPos[1]) + 'px';
   tableHoverBox.style.left = (pos[0] - 3 - hoverPos[0]) + 'px';
   tableHoverBox.style.display = 'block';
   tableHoverBox.style.background = hex;
   currentPaletteItem = colorPalette[hex];
   currentPaletteItem.id = 'slectedPaletteItem';
 }
 var f = 0.1;
 for(i = 1;i < 9; i++)
{
  var item = document.getElementById('current-m'+i);
  var colour = new objColour();
   colour.r = colours.r
   colour.g = colours.g
   colour.b = colours.b
   var b = colour.getBrightness();
   var s = colour.getSaturation();
   var h = colour.getHue();
   switch(i)
   {
    case 1:
     colour.setHSB(h,s-f,b+f);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
    case 2:
     colour.setHSB(h,s-f,b);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 3:
     colour.setHSB(h,s-f,b-f);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 4:
     colour.setHSB(h,s,b+f);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 5:
     colour.setHSB(h,s,b-f);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 6:
     colour.setHSB(h,s+f,b+f);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 7:
     colour.setHSB(h,s+f,b);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 8:
     colour.setHSB(h,s+f,b-f);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
   }
 }
 for(i = 0;i < 12; i++)
 {
  var item = document.getElementById('hue-'+i);
  var colour = new objColour();
   colour.r = colours.r
   colour.g = colours.g
   colour.b = colours.b
   var b = colour.getBrightness();
   var s = colour.getSaturation();
   var h = colour.getHue()+(30*i);
   h = (h > 359) ? h-360 : h;
   colour.setHSB(h,s,b);
   item.style.backgroundColor = '#' + colour.getHex();
   item.value = colour.getHex();
 }
 for(i = 1;i < 5; i++)
 {
  var item = document.getElementById('hue-m'+i);
  var colour = new objColour();
   colour.r = colours.r
   colour.g = colours.g
   colour.b = colours.b
   var b = colour.getBrightness();
   var s = colour.getSaturation();
   var h = colour.getHue();
   switch(i)
   {
    case 1:
     s = (s < 0.5) ? s+0.25 : s-0.25;
     colour.setHSB(h,s,b);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 2:
     s = (s < 0.5) ? s+0.5 : s-0.5;
     colour.setHSB(h,s,b);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 3:
     s = (s < 0.5) ? s+0.5 : s-0.5;
     h += 180;
     h = (h > 359) ? h-360 : h;
     colour.setHSB(h,s,b);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
    case 4:
     s = (s < 0.5) ? s+0.25 : s-0.25;
     h += 180;
     h = (h > 359) ? h-360 : h;
     colour.setHSB(h,s,b);
     item.style.backgroundColor = '#' + colour.getHex();
     item.value = colour.getHex();
     break;
   }
 }
 lastEvent = null;
}

// used to store and access refs to the color name selct box, so hex to color conversions can take place.
function objColorName()
{
 this.set = function(hex,value)
 {
  this[hex] = value;
  this[value.value] = hex;
 }
 this.get = function(hex)
 {
  return this[hex];
 }
}

// maps hex codes to the palette
function objColorPalette()
{
 this.set = function(hex,value)
 {
  this[hex] = value;
 }
}

// lets the page appear to finish loading.
function do_color_picker()
{
 setTimeout(init_color_picker,50);
}

// The object that stores the colours in ram - based on Nvu
function objColour()
{

 this.r = 255;
 this.g = 0;
 this.b = 0;

 // Returns the hex value
 this.getHex = function()
 {
   var c = new Array();
   c[0] = dec2hex(Math.floor(this.r / 16));
   c[1] = dec2hex(this.r % 16);
   c[2] = dec2hex(Math.floor(this.g / 16));
   c[3] = dec2hex(this.g % 16);
   c[4] = dec2hex(Math.floor(this.b / 16));
   c[5] = dec2hex(this.b % 16);
   return c.join("");
 }
 this.getRed = function()
 {
   return this.r;
 }
 this.getGreen = function()
 {
   return this.g;
 }
 this.getBlue = function()
 {
   return this.b;
 }
 this.getBrightness = function()
 {
   // find the min and max rgb values
   var max1 = Math.max(this.r, this.g);
   var max2 = Math.max(max1, this.b);
   return max2/255;
 }
 this.getSaturation = function()
 {
   // find the min and max rgb values
   var min1 = Math.min(this.r, this.g);
   var min2 = Math.min(min1, this.b);
   var max1 = Math.max(this.r, this.g);
   var max2 = Math.max(max1, this.b); // v

   var delta = max2 - min2;
   var sat = 0;
   if (max2 != 0)
   {
      sat = delta / max2;
   }
   return sat;
 }

 this.getHue = function()
 {
   var hue = 0;
   // If all the values are the same, there is no hue, just brightness
   if (this.r == this.g && this.g == this.b)
   {
      hue = 0;
      return hue;
   }

   // find the min and max rgb values
   var min1 = Math.min(this.r, this.g);
   var min2 = Math.min(min1, this.b);
   var max1 = Math.max(this.r, this.g);
   var max2 = Math.max(max1, this.b); // v

   var delta = max2 - min2;

   if (max2 == 0)
   {
      hue = 0;
      return hue; // Saturation is undefined, so there is no hue
   }

   if (this.r == max2)
   {
      hue = (this.g - this.b) / delta; // It's between yellow and magenta
   }
   else if (this.g == max2)
   {
      hue = 2 + (this.b - this.r) / delta; // It's between cyan and yellow
   }
   else
   {
      hue = 4 + (this.r - this.g) / delta; // It's between magenta and cyan
   }

   hue *= 60; // Get it in degrees
   if (hue < 0)
   {
      hue += 360;
   }
   if (!hue)
   {
      hue = 0;
   }
   return hue;
 }

 this.setRGB = function(r, g, b)
 {
    this.r = r;
    this.g = g;
    this.b = b;
 }

 this.setHSB = function(h, s, b)
 {

    s = Math.max(0,Math.min(s,1));
    b = Math.max(0,Math.min(b,1))*255;
    if (s == 0)
    {
       // Set it to a grey based on the brightness
       this.r = b;
       this.g = b;
       this.b = b;
       return;
    }

    h /= 60; // Get it out of degrees

    var i = Math.floor(h);
    var f = h - i; // Grab the decimal part
    var p = b * (1 - s);
    var q = b * (1 - s * f);
    var t = b * (1 - s * (1 - f));

    switch (i)
    {
       case 0:
          this.r = b;
          this.g = t;
          this.b = p;
          break;
       case 1:
          this.r = q;
          this.g = b;
          this.b = p;
          break;
       case 2:
          this.r = p;
          this.g = b;
          this.b = t;
          break;
       case 3:
          this.r = p;
          this.g = q;
          this.b = b;
          break;
       case 4:
          this.r = t;
          this.g = p;
          this.b = b;
          break;
       default:
          this.r = b;
          this.g = p;
          this.b = q;
          break;
    }
 }

 this.setHex = function(hex)
 {
    var c = hex.split("");
    var red = hex2dec(c[0]) * 16 + hex2dec(c[1]);
    var green = hex2dec(c[2]) * 16 + hex2dec(c[3]);
    var blue = hex2dec(c[4]) * 16 + hex2dec(c[5]);
    this.r = red;
    this.g = green;
    this.b = blue;
 }
}

function selectTab(item)
{
 nodes = document.getElementById('color-panels').childNodes;
 var i = 0;
 while(nodes[i])
 {
  if(nodes[i].style)
  {
   nodes[i].style.zIndex = 1;
  }
  i++;
 }
 document.getElementById(item.className).style.zIndex = 10;
}

//setEventListener(window,'load',do_color_picker,true);