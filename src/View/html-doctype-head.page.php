<?php
namespace Adb\View;

use Adb\Model\Adbsoc as Adbsoc;
use Adb\Model\Htmldochead as Htmldochead;
use Adb\Model\Iframe as Iframe;
use Adb\Model\Localsites as Localsites;

if (!isset($pathOps)) {
    $pathOps = dirname(dirname(__DIR__));
}

$Adbsoc = new Adbsoc($pathOps);
$Iframe = new Iframe;

$Htmldochead = new Htmldochead($pathOps);

$Localsites = new Localsites;

$bodyid = $Adbsoc->bodyid;
$favtype = $Htmldochead->favtype;
$favicon = $Htmldochead->favicon;
$defaultIframe = $Iframe->mainFrame();
$css = 'assets/css/style.css';
// Example usage:
$config = $Adbsoc->getConfig();
$json_urls = $config['home_urls'];  // Assuming $config contains the parsed JSON data
$build_local_urls = $Localsites->getSites($json_urls);  // Call the function and output the result

function checkVal($var)
{
    if ($var == null) {
        return '0';
    }
    return $var;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>NONE</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="<?= $favtype; ?>" href="<?= $favicon; ?>">
    <link rel="shortcut icon" type="<?= $favtype; ?>" href="<?= $favicon; ?>">

    <!-- Bootstrap Css v5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <!-- SPECTRE CSS -->
    <!-- link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css" -->
    <!-- SPECTRE CSS may be a lightweight tailwind -->

    <link id="meyerreset" rel="stylesheet" type="text/css" href="assets/css/emeyereset.css" media="all">
    <link id="unlockFrame" rel="stylesheet" type="text/css" href="assets/css/unlockframe.css" media="all">
    <link id="style_main" rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
    <link id="bstheme" rel="stylesheet" type="text/css" href="assets/css/theme.css" media="all">
    <style>
    #sytebuild_htmlbuild * {
        display: inline-block;
        font-size: 14px;
        /* font-family: --bs-font-sans-serif; */
        font-family: sans-serif;
    }
    </style>




</head>