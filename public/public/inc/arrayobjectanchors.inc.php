<?php

namespace Bbadb\public\inc;

// use Bbadb\public\inc\cleanBasename;
 
$cleanThis = $basename;
$cleanBasename = \Bbadb\public\inc\cleanBasename($cleanThis);

 
if (isset($childItems[$objNmbr])) {
	// THIS readdir() item _NOT_ A DIRECTORY  #see nav.inc.php, lines ~70,*,~100

	if (isset($specialExtn[$objNmbr][$extension])) {
		// HANDLE IMAGE OR SPECIAL FILETYPE
		if (isset($dotfilename)) {
			$childItems[$objNmbr] .= '<a title="View ' . $dotfilename . ' in main iFrame" href="#mainFrameContainer" id="navAnchor_' . $dotfilename . '" onclick="loadIframe(\'' . $dotfilename . '\')"><!-- ' . __LINE__ . ' -->' . $extension . '</a> [' . $dotfilename . ' to iframe]</li>' . "\n";
		} else {
			$childItems[$objNmbr] .= '<a href="#mainFrameContainer" id="navAnchor_' . $cleanBasename . '" title="' . $cleanBasename . '" onclick="loadIframe(\'' . $cleanBasename . '\')">' . $filename . '</a><!-- ' . __LINE__ . ' -->[view ' . $extension . ']</li>' . "\n";
		}
	} else {
		if ($thisObject_pathInfo['extension'] == 'php') {
			$childItems[$objNmbr] .= '<a href="' . $cleanBasename . '" title="' . $cleanBasename . '" target="_blank"><!-- ' . __LINE__ . ' -->' . $filename . '</a> [php to top]</li>' . "\n";
		} else {
			// BASENAME INVALID FOR HTML ATTRIBUTES - FIXed WITH @cleanBasename func
			if ($cleanBasename != $basename) {
				// ACCORDING TO cleanBasename(), FILENAME IS "invalid" (e.g. contains spaces, or invalid chars)
				$childItems[$objNmbr] .= '<a title="Invalid Filename cleaned to ' . $cleanBasename . ' using HEX equivalents. This buggy JavaScript will likely not respond. sorry!" id="navAnchor_' . $cleanBasename . '"><!-- ' . __LINE__ . ' -->' . $cleanBasename . '</a> [!badpath]</li>' . "\n";
			}
			// NOT .PHP BUT IS VALID FILENAME
			else {
				$childItems[$objNmbr] .= '<a title="View ' . $cleanBasename . ' in main iFrame" href="#mainFrameContainer" id="navAnchor_' . $cleanBasename . '" onclick="loadIframe(\'' . $cleanBasename . '\')"><!-- ' . __LINE__ . ' -->' . $filename . '</a> [' . $extension . ' to iframe]</li>' . "\n";
			}
		}
	}
} else {
	// OBJECT IS A DIRECTORY
	$switchFilename = strtolower($cleanBasename);
	switch ($switchFilename) {
		case 'inc':
			$childItems[$objNmbr] = '<!-- li class="forbidden" title="' . $cleanBasename . '"><a href="' . $cleanBasename . '" title="' . $cleanBasename . '">' . $cleanBasename . '</a></li -->' . "\n";
			break;
		case 'class':
			$childItems[$objNmbr] = '<!-- li class="forbidden" title="' . $cleanBasename . '"><a href="' . $cleanBasename . '" title="' . $cleanBasename . '">' . $cleanBasename . '</a></li -->' . "\n";
			break;
		case 'error_log':
			$childItems[$objNmbr] = '<!-- li class="forbidden" title="' . $cleanBasename . '"><a href="' . $cleanBasename . '" title="' . $cleanBasename . '">' . $cleanBasename . '</a></li -->' . "\n";
			break;
		case 'css':
			$childItems[$objNmbr] = '<!-- li class="forbidden" title="' . $cleanBasename . '"><a href="' . $cleanBasename . '" title="' . $cleanBasename . '">' . $cleanBasename . '</a></li -->' . "\n";
			break;
		case 'js':
			$childItems[$objNmbr] = '<!-- li class="forbidden" title="' . $cleanBasename . '"><a href="' . $cleanBasename . '" title="' . $cleanBasename . '">' . $cleanBasename . '</a></li -->' . "\n";
			break;
		case '.settings':
			$childItems[$objNmbr] = '<!-- li class="hiddenitem" title="' . $cleanBasename . '"><a href="' . $cleanBasename . '" title="' . $cleanBasename . '">' . $cleanBasename . '</a></li -->' . "\n";
			break;
		case '.svn':
			$childItems[$objNmbr] = '<!-- li class="hiddenitem" title="' . $cleanBasename . '"><a href="' . $cleanBasename . '" title="' . $cleanBasename . '">' . $cleanBasename . '</a></li -->' . "\n";
			break;
		case '.buildpath':
			$childItems[$objNmbr] = '<!-- li class="hiddenitem" title="' . $cleanBasename . '"><a href="' . $cleanBasename . '" title="' . $cleanBasename . '">' . $cleanBasename . '</a></li -->' . "\n";
			break;
		case 'images':
			$childItems[$objNmbr] = '<li class="hiddenitem" title="' . $cleanBasename . '"><a href="' . $cleanBasename . '" title="' . $cleanBasename . '">' . $cleanBasename . '</a></li>' . "\n";
			break;
		case 'resources':
			$childItems[$objNmbr] = '<!-- li class="hiddenitem" title="' . $cleanBasename . '"><a href="' . $cleanBasename . '" title="' . $cleanBasename . '">' . $cleanBasename . '</a></li -->' . "\n";
			break;
		case 'htaccess':
			$childItems[$objNmbr] = '';
		default:
			$childItems[$objNmbr] = '<li class="navnobull" title="' . $cleanBasename . '"><a href="' . $cleanBasename . '"><!-- ' . __LINE__ . ' -->' . $cleanBasename . '</a></li>' . "\n";
	}
}

// back to [ nav.inc.php ] @ Line ~110
?>
