<?php
header('Content-Type: image/png');
//gia tri
$size= 50;
$angel= 0;
$text= $_GET['text'];
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
$cao= 90;
$bbox= imagettfbbox($size,$angel,$font,$text);
$wtext = $bbox[2]+30;
$snow = imagecreatefrompng('snow.png');
$sao = imagecreatefrompng('sao.png');
$tree = imagecreatefrompng('tree.png');
$santa = imagecreatefrompng('santa.png');
$rong= $bbox[2] + 100;
//tao anh moi
$im = imagecreatetruecolor($rong,$cao);

$white = imagecolorallocate($im,255,255,255);
$red= imagecolorallocate($im,255,0,0);
$trans = imagecolorallocatealpha($im,255,255,255,127);
$xanh = imagecolorallocate($im,50,205,50);
imagealphablending($im, FALSE);
imagesavealpha($im,TRUE);
//in van ban

imagefilledrectangle($im,0,0,$rong,$cao,$trans);
imagecopyresized($im,$tree,-5,4,0,0,87,87,imagesx($tree),imagesy($tree));
imagecopyresized($im,$santa,$wtext/1.5,-35,0,0,100,100,imagesx($santa),imagesy($santa));
imagecopyresized($im,$snow,$wtext,4,0,0,87,87,imagesx($snow),imagesy($snow));


if($_GET['color'] == 1 || !isset($_GET['color']))
$color = $white;
elseif($_GET['color'] == 2)
$color = $red;
elseif($_GET['color'] >= 3)
$color = $xanh;

imagettftext($im,$size,$angel,45,87,$color,$font,$text);
imagecopyresized($im,$sao,$wtext/4,27,0,0,15,15,imagesx($sao),imagesy($sao));
imagecopyresized($im,$sao,$wtext/1.2,36,0,0,15,15,imagesx($sao),imagesy($sao));
imagecopyresized($im,$sao,$wtext/3.5,2,0,0,15,15,imagesx($sao),imagesy($sao));
imagecopyresized($im,$sao,$wtext/
2,5,0,0,15,15,imagesx($sao),imagesy($sao));

//Xuat and pha huy
imagepng($im);
imagedestroy($im);
?>