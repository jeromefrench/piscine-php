<?php
$fd = fopen("./monimage.png", 'w+');
$widht = 200;
$height = 200;
$gd = imagecreatetruecolor($widht, $height);  //creer une image noire
$red = imagecolorallocate($gd, 255, 0, 0); 
imagesetpixel($gd, 100, 100, $red);
imagepng($gd, $fd);
?>
