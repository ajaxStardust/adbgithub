<?php
// ENABLE CORS (Cross-Origin Request) policy allow all
header('Access-Control-Allow-Origin: *');

if (isset($_POST['font'])) {
  $selectedFont = $_POST['font'];

  // Generate @font-face rule for the selected font
  $fontUrl = "https://fonts.googleapis.com/css2?family=" . urlencode($selectedFont);
  $fontFaceRule = "@font-face {
    font-family: '$selectedFont';
    src: url('$fontUrl')  format('woff2');
  }";

  // Generate CSS rule to apply the selected font
  $fontStyle = "#targetElement {
    font-family: '$selectedFont', Arial, sans-serif;
  }";

  // Output both @font-face rule and font-family CSS rule
  echo $fontFaceRule . "\n" . $fontStyle;
}
?>