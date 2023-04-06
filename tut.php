<?php
// Set the content-type
header('Content-Type: image/png');

// Create the image
$img = imagecreatetruecolor(350, 150);

// Create some colors
$lightsky = imagecolorallocate($img, 135, 206, 250);
$blue = imagecolorallocate($img, 25, 25, 112);
imagefilledrectangle($img, 0, 0, 400, 200, $lightsky);

// The text to draw
// $text = 'Welcome to etutorialspoint!\nhf Lorem';
$title = "Pastor";
$fullname = "Chukwukere Noble";
[$lastname, $firstname] = explode(" ", $fullname);
// $title = "Pastor";


imagestring($img, 5, 30, 20, $title, $blue);
imagestring($img, 5, 30, 80, $fullname, $blue);
// imagestring($img, 5, 30, 120, $text, $blue);
imagesetthickness($img, 10);

// Using imagepng() results in clearer text compared with imagejpeg() 
imagepng($img);
imagedestroy($img);
