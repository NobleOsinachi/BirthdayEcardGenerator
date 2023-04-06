<?php

list($fontFileTitle, $fontFileFirstName, $fontFileLastName, $fontFileDate) = array("Signatie.ttf", "Mont-HeavyDEMO.ttf", "MYRIADPRO-BOLD.OTF", "MYRIADPRO-BOLD.OTF");

list($fontSizeTitle, $fontSizeLastName, $fontSizeFirstName, $fontSizeDate) = array(28, 28, 45, 55);

[$textImgX, $textImgY] = array(0, 0);



$title = "Brother"; // $_POST['title'];

$fullname = "Chukwukere Noble"; // $_POST['fullname'];
list($lastName, $firstName) = explode(" ", $fullname);
list($lastName, $firstName) = [strtoupper(trim($lastName)), ucfirst(strtolower(trim($firstName)))];

$dateOfBirth = "1998-03-25"; //   $_POST['birthday'];


$day =  explode("-", $dateOfBirth)[2]; // "1998-03-25";
$month =  explode("-", $dateOfBirth)[1]; // "1998-03-25";



function getWidthOfText($text = 'Chukwukere Noble', $font_size = 20, $font_file = 'Arial.ttf')
{
    // Retrieve bounding box:
    $type_space = imagettfbbox($font_size, 0, $font_file, $text);
    return  abs($type_space[4] - $type_space[0]);
}

$titleWidth = getWidthOfText($title, $fontSizeTitle, $fontFileTitle);

$lastNameWidth = getWidthOfText($lastName, $fontSizeLastName, $fontFileLastName);

$firstNameWidth = getWidthOfText($firstName, $fontSizeFirstName, $fontFileFirstName);

$maxWidth = max(
    $titleWidth,
    $lastNameWidth,
    $firstNameWidth
);

function padding($maxWidth = 0, $textWidth = 0)
{
    // return intval(($maxWidth - $textWidth) / 2);
    return 0;
}

$canvas = imagecreate(200, 100);

$black = imagecolorallocate($canvas, 0, 0, 0);
$white = imagecolorallocate($canvas, 255, 255, 255);

imagefilledrectangle($canvas, 9, 9, 189, 89, $white);

$font = "Mont-HeavyDEMO.ttf";
$text = $lastName;
$size = "30";


// $words is an array of words, each taking up one line
// initialization
$words = [$firstName, $lastName];
list($firstnameFontSize, $lastnameFontSize) = [28, 45];

$firstNameTextWidth = getWidthOfText($firstName, $firstnameFontSize,);
$lastNameTextWidth = imagefontwidth($lastnameFontSize);

$width = 0;
// the height of the image will be the number of items in $words
$height = count($words);

// this gets the length of the longest string, in characters to determine
// the width of the output image
for ($x = 0; $x < count($words); $x++) {
    if (strlen($words[$x]) > $width) {
        $width = strlen($words[$x]);
    }
}





$box = imageftbbox($size, 0, $font, $text);
$x = intval((200 - ($box[2] - $box[0])) / 2);
$y = intval((100 - ($box[1] - $box[7])) / 2);
$y -= $box[7];

imageTTFText($canvas, $size, 0, $x, $y, $black, $font, $text);

imagejpeg($canvas, "flesh." . time() . '.jpg');

ImageDestroy($canvas);






$im = @imagecreatetruecolor(500, 150);

imagesavealpha($im, true);
imagealphablending($im, false);
$white = imagecolorallocatealpha($im, 255, 255, 255, 127);

imagefill($im, 0, 0, $white);
$lime = imagecolorallocate($im, 255, 255, 255);
$titleFontColor = imagecolorallocate($im, 255, 255, 255);
$transparent = imagecolorallocate($im, 255, 0, 0);
$lastNameFontColor = imagecolorallocate($im, 255, 255, 255);
$firstNameFontColor = imagecolorallocate($im, 245, 231, 170);

$dateFontColor = imagecolorallocatealpha($im, 255, 255, 255, 60);

// $lime = imagecolorallocate($im, 204, 255, 51);


imagettftext($im, $fontSizeDate, 0, 850, 70, $dateFontColor, $fontFileDate, $day);
imagettftext($im, $fontSizeDate, 0, 850, 130, $dateFontColor, $fontFileDate, $month);

imagettftext($im, $fontSizeTitle, 0, $textImgX, $textImgY + 35, $titleFontColor, $fontFileTitle, $title);
imagettftext($im, $fontSizeFirstName, 0, $textImgX, $textImgY + 85, $firstNameFontColor, $fontFileFirstName, $firstName);
imagettftext($im, $fontSizeLastName, 0, $textImgX, $textImgY + 135, $lastNameFontColor, $fontFileLastName, $lastName);


header("Content-type: image/png");
$textbaseDir = __DIR__ . "\\text\\";

$textFileName = $textbaseDir . '/' . time() . '.png';
imagepng($im, $textFileName);
imagedestroy($im);


imagedestroy($im);
// return [$im, $textFileName];

?>
<!--  -->