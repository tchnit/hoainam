<?php
header('Content-Type: image/png');
//gia tri


$size= 40;
$angel= 0;
$text = 'CHRISTMAST';
$f = $_GET['font'];
if($f == 1 || !isset($f))
$font = 'snow2.ttf';
if($f == 2)
$font = 'snow.ttf';
if($f == 3)
$font = 'ModiusFrigid.ttf';
if($f == 4)
$font = 'christmabet.ttf';
if($f >= 5)
$font = 'kr.TTF';


$cao= 48;
$bbox= imagettfbbox($size,$angel,$font,$text);
$wtext = $bbox[2] + 2;
$rong= $bbox[2];

$im = imagecreatetruecolor($rong,$cao);

$color= imagecolorallocate($im,255,0,0);
$trans = imagecolorallocatealpha($im,255,255,255,127);
imagealphablending($im, FALSE);
imagesavealpha($im,TRUE);
imagefilledrectangle($im,0,0,$rong,$cao,$trans);



imagettftext($im,$size,$angel,2,45,$color,$font,$text);
//Xuat and pha huy
imagepng($im);
imagedestroy($im);
?>