<?php




/** class Person{ function _construct( $title = "", $firstName = "", $lastName = "", $email, $dateOfBirth = new DateTime(), $overlayPath = "", $textPathImage = "" ) { $this->$title = $title; $this->$firstName = $firstName; $this->$lastName = $lastName; $this->$email = $email; $this->$dateOfBirth = $dateOfBirth; $this->$overlayPath = $overlayPath; $this->$textPathImage = $textPathImage; }} */

// we have 2 pictures; personal is BIG, family is SMALL

$lastname = "Chukwukere-Osinachi";

$personalPicFileName = "personal.png";
$personalImg = confirmExtension($personalPicFileName);

$familyPicFileName = "family.png";
$familyImg = confirmExtension($familyPicFileName);

/** @var array list of templates that can contain long surnames */
$templateForLongNames = [1, 3, 5, 6, 7];

/** @var string selects a random template */
$template = (strlen($lastname >= 16)) ? $templateForLongNames[array_rand($templateForLongNames)] : rand(1, 10); /// long surname case study 1,3,5,6,7


$textImage = confirmExtension(positionText($template)[1]);

/** @var string template 4 big image is a bit bigger than the others */
$personalDim = $template === 4 ? 600 : 550;
$familyDim = 255;

// creates a black square image
$personalImgResized = imagecreatetruecolor($personalDim, $personalDim); // 550 × 550
$familyImgResized = imagecreatetruecolor($familyDim, $familyDim); // 250 × 250

list($widthPersonal, $heightPersonal, $typePersonal) = getimagesize("personal.png");
// list($widthPersonal, $heightPersonal, $typePersonal) = getimagesize("$personalPicFileName");

list($widthFamily, $heightFamily, $typeFamily) = getimagesize("family.png");
// list($widthFamily, $heightFamily, $typeFamily) = getimagesize("$familyPicFileName");

list($widthTextImg, $heightTextImg, $typeTextImg) = getimagesize('text.png');

list($smallCircleX, $smallCircleY, $bigCircleX, $bigCircleY, $textImgX, $textImgY) = array(0, 0, 0, 0, 0, 0);

switch ($template) {
    case 1:
        [$smallCircleX, $smallCircleY, $bigCircleX, $bigCircleY] = array(90, 390, 360, 90);
        break;
    case 2:
        [$smallCircleX, $smallCircleY, $bigCircleX, $bigCircleY] = array(675, 307, 80, 157);
        break;
    case 3:
        [$smallCircleX, $smallCircleY, $bigCircleX, $bigCircleY] = array(630, 335, 40, 170);
        break;
    case 4:
        [$smallCircleX, $smallCircleY, $bigCircleX, $bigCircleY] = array(640, 325, 10, 175);
        break;
    case 5:
        [$smallCircleX, $smallCircleY, $bigCircleX, $bigCircleY] = array(680, 375, 72, 144);
        break;
    case 6:

    case 7:
        [$smallCircleX, $smallCircleY, $bigCircleX, $bigCircleY] = array(666, 286, 75, 135);
        break;
    case 8:

    case 9:

    case 10:
        [$smallCircleX, $smallCircleY, $bigCircleX, $bigCircleY] = array(705, 350, 110, 200);
        break;

    default:
        # code...
        break;
}

/**
 * This function basically confirms the exact extention of the image file supplied by reading it from its encoding, even if the file extension is manually changed
 * @param string $images link to image file
 */
function confirmExtension($images)
{
    if (exif_imagetype($images) == IMAGETYPE_JPEG) {
        return imagecreatefromjpeg($images);
    } else if (exif_imagetype($images) == IMAGETYPE_PNG) {
        return imagecreatefrompng($images);
    } else if (exif_imagetype($images) == IMAGETYPE_GIF) {
        return imagecreatefromgif($images);
    } else {
        die("Image is of unsupported type");
    }
}


imagecopyresized($familyImgResized, $familyImg, 0, 0, 0, 0, $familyDim, $familyDim, $widthFamily, $heightFamily);
imagecopyresized($personalImgResized, $personalImg, 0, 0, 0, 0, $personalDim, $personalDim, $widthPersonal, $heightPersonal);


list($widthPersonal, $heightPersonal, $typePersonal) = getimagesize($personalPicFileName);
list($widthFamily, $heightFamily, $typeFamily) = getimagesize($familyPicFileName);

// $personalImg = imagecreatefrompng('255.png');
// $familyImg = imagecreatefrompng('550.png');

$overlay = imagecreatefrompng("birthday-stamp-template-$template.png");

$dest = imagecreatetruecolor(1000, 1000);

// first copy personal image on black canvas
imagecopy($dest, $personalImgResized, $bigCircleX, $bigCircleY, 0, 0, $personalDim, $personalDim);


// then copy family image on previous image with the personal image already in place
imagecopy($dest, $familyImgResized, $smallCircleX, $smallCircleY, 0, 0, $familyDim, $familyDim);

// then overlay template on image
imagecopy($dest, $overlay, 0, 0, 0, 0, 1000, 1000);

// then copy text image file over the final eCard
imagecopy($dest, $textImage, $textImgX, $textImgY, 0, 0, $widthTextImg, $heightTextImg);

header('Content-Type: image/png');

$final = time() . ".png";
imagepng($dest);


imagedestroy($dest);

imagedestroy($personalImgResized);
imagedestroy($familyImgResized);

imagedestroy($personalImg);
imagedestroy($familyImg);

// deleteTextDir();


function deleteTextDir()
{
    $dir =        __DIR__ . '\\text\\';
    if (file_exists($dir)) {

        $di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
        $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($ri as $file) {
            $file->isDir() ? rmdir($file) : unlink($file);
        }
    };
}



function getWidthOfText($text = 'Chukwukere Noble', $font_size = 20, $font_file = 'Arial.ttf')
{
    // Retrieve bounding box:
    $type_space = imagettfbbox($font_size, 0, $font_file, $text);

    return abs($type_space[4] - $type_space[0]);
}


function positionText($template = 1)
{
    $textbaseDir = __DIR__ . "\\text\\";

    // $font = 28;
    list($fontFileTitle, $fontFileFirstName, $fontFileLastName, $fontFileDate) = array("Signatie.ttf", "Mont-HeavyDEMO.ttf", "MYRIADPRO-BOLD.OTF", "MYRIADPRO-BOLD.OTF");

    list($fontSizeTitle, $fontSizeLastName, $fontSizeFirstName, $fontSizeDate) = array(28, 28, 45, 55);
    // [$fontSizeTitle, $fontSizeLastName, $fontSizeFirstName, $fontSizeDate] = array(28, 28, 28, 28);



    [$textImgX, $textImgY] = array(0, 0);
    switch ($template) {
        case 1:
            [$textImgX, $textImgY] = array(420, 680);
            break;
        case 2:
            [$textImgX, $textImgY] = array(550, 650);
            break;
        case 3:
            [$textImgX, $textImgY] = array(550, 600);
            break;
        case 4:
            [$textImgX, $textImgY] = array(625, 610);
            break;
        case 5:
            [$textImgX, $textImgY] = array(550, 680);
            break;
        case 6:

        case 7:
            [$textImgX, $textImgY] = array(550, 630);
            break;
        case 8:

        case 9:

        case 10:
            [$textImgX, $textImgY] = array(600, 650);
            break;

        default:
            # code...
            break;
    }





    $title = "Brother";
    $fullName = "Chukwukere Noble"; //$template . 
    $fullName = $fullName;
    list($lastname, $firstname) = explode(" ", $fullName);
    $lastname = strtoupper($lastname);
    $day = "25";
    $month = "03";

    // $autoLength = strlen($lastname) * 302 / 17; $width = ($autoLength <= 350) ? 350 : $autoLength; $autoLength = strlen($fullName) * $font / 1.5; $im = @imagecreatetruecolor(strlen($fullName) * $font / 1.5, $font); $im = imagecreatetruecolor(350, 150);

    // crrate square image to overlay on final ecard
    $im = @imagecreatetruecolor(1000, 1000);

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
    imagettftext($im, $fontSizeFirstName, 0, $textImgX, $textImgY + 85, $firstNameFontColor, $fontFileFirstName, $firstname);
    imagettftext($im, $fontSizeLastName, 0, $textImgX, $textImgY + 135, $lastNameFontColor, $fontFileLastName, $lastname);


    header("Content-type: image/png");
    $textFileName = $textbaseDir . '\\images\\' . time() . '.png';
    imagepng($im, $textFileName);
    imagedestroy($im);
    return [$im, $textFileName];
}
?>
<!-- End of code -->