<?php

$source = "source";

$destination = "destination";

$watermark = imagecreatefromjpg("watermark.png");

$margin_right = 10;
$margin_bottom = 10;

$sx = imagesx($watermark);
$sy = imagesy($watermark);

$images = array_diff(scandir($source), array('..','.'));

foreach ($images as $image) {
	$img = imagecreatefromjpg($source.'/'. $image);

	imagecopy($img, $watermark, imagesx($img) - $sx - $margin_right, imagesy($img) - $sy - $margin_bottom, 0, 0, $sx, $sy);

	$i = imagejpeg($img, $destination.'/'.$image, 100);

	imagedestroy($img);



}


