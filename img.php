<?php
$width = 400;
$height = 400;
$image = imagecreatetruecolor($width, $height);

$gray = imagecolorallocate($image, 220, 220, 220);
imagefill($image, 0, 0, $gray);

$text = "Texto";
$fontsize = 40;
$textcolor = imagecolorallocate($image, 255, 255, 255);
$textbox = imagettfbbox($fontsize, 0, $font, $text);
$textwidth = $textbox[2] - $textbox[0];
$textheight = $textbox[1] - $textbox[7];
$x = ($width - $textwidth) / 2;
$y = ($height - $textheight) / 2;
imagettftext($image, $fontsize, 0, $x, $y, $textcolor, $font, $text);

header('Content-Type: image/png');
imagepng($image);

imagedestroy($image);
?>
