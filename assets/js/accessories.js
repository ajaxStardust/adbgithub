/**
 * @overview:
 *	javascript for powering the html in ./inc/accessories.inc.php
 */

function cloneAttributes(element, sourceNode) {
  let attr;
  let attributes = Array.prototype.slice.call(sourceNode.attributes);
  while(attr = attributes.pop()) {
    element.setAttribute(attr.nodeName, attr.nodeValue);
  }
}

function octalchange() {
	var chmodForm = document.getElementById("chmod");
	var val = document.chmod.t_total.value;
	var ownerbin = parseInt(val.charAt(0)).toString(2);
	while (ownerbin.length < 3) {
		ownerbin = "0" + ownerbin;
	};
	var groupbin = parseInt(val.charAt(1)).toString(2);
	while (groupbin.length < 3) {
		groupbin = "0" + groupbin;
	};
	var otherbin = parseInt(val.charAt(2)).toString(2);
	while (otherbin.length < 3) {
		otherbin = "0" + otherbin;
	};
	document.chmod.owner4.checked = parseInt(ownerbin.charAt(0));
	document.chmod.owner2.checked = parseInt(ownerbin.charAt(1));
	document.chmod.owner1.checked = parseInt(ownerbin.charAt(2));
	document.chmod.group4.checked = parseInt(groupbin.charAt(0));
	document.chmod.group2.checked = parseInt(groupbin.charAt(1));
	document.chmod.group1.checked = parseInt(groupbin.charAt(2));
	document.chmod.other4.checked = parseInt(otherbin.charAt(0));
	document.chmod.other2.checked = parseInt(otherbin.charAt(1));
	document.chmod.other1.checked = parseInt(otherbin.charAt(2));
	calc_chmod(1);
};

function calc_chmod(nototals) {
	var users = new Array("owner", "group", "other");
	var totals = new Array("", "", "");
	var syms = new Array("", "", "");

	for (var i = 0; i < users.length; i++) {
		var user = users[i];
		var field4 = user + "4";
		var field2 = user + "2";
		var field1 = user + "1";
		//var total = "t_" + user;
		var symbolic = "sym_" + user;
		var number = 0;
		var sym_string = "";

		if (document.chmod[field4].checked == true) {
			number += 4;
		}
		if (document.chmod[field2].checked == true) {
			number += 2;
		}
		if (document.chmod[field1].checked == true) {
			number += 1;
		}

		if (document.chmod[field4].checked == true) {
			sym_string += "r";
		} else {
			sym_string += "-";
		}
		if (document.chmod[field2].checked == true) {
			sym_string += "w";
		} else {
			sym_string += "-";
		}
		if (document.chmod[field1].checked == true) {
			sym_string += "x";
		} else {
			sym_string += "-";
		}

		//if (number == 0) { number = ""; }
		//document.chmod[total].value =
		totals[i] = totals[i] + number;
		syms[i] = syms[i] + sym_string;

	};
	if (!nototals) document.chmod.t_total.value = totals[0] + totals[1] + totals[2];
	document.chmod.sym_total.value = "-" + syms[0] + syms[1] + syms[2];
}

function font_props(elementId, property) {
	let element = {};
	element = document.getElementById(elementId);
	var element2 = document.getElementById(elementId);
	var write_here = document.getElementById('js_return_serif');
	var this_return = window.getComputedStyle(element2).getPropertyValue('font-family');

	if (this_return) {
		return element2.innerHTML += this_return;
	} else {
		console.log("font_props: " + property + "=" + element.style["font-" + property]);
		alert('font_props: ' + property + '=' + element.style['font-' + property]);
		return write_here.innerHTML += "font: " + style["font-" + property];
	}
}

function onloadLoop(getFunky) {

	var onloadPartial = window.onload;

	if (typeof onloadPartial === "function") {
		window.onload = function () {

			if (onloadPartial) {
				onloadPartial();
			}
			getFunky();
		};
	} else {
		window.onload = getFunky;
	}
}


// window.onload=octalchange
onloadLoop(octalchange);
onloadLoop(font_props);