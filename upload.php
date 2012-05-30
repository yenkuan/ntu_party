<?php
session_start();
if (!isset($_SESSION['qrcode']))
	exit;
$message = '';
$img = load($_FILES["uploadfile"]['tmp_name']);

$img = resizeToWidth(450, $img);
if (($_FILES["uploadfile"]["size"] > 10485760)  || !$img){
	$message = '上傳檔案必須是jpg, png或gif檔，並且小於10mb';
	echo $message;
	exit;
}
if (imagejpeg($img, './uploads/'.$_SESSION['qrcode'].".jpg")) { 
	imagedestroy($img);
	$message = '1';
	echo $message; 
} else {
	imagedestroy($img);
    $message = 上傳失敗;
	echo $message; 
}  

function load($filename) {

  $image_info = getimagesize($filename);
  $image_type = $image_info[2];
  if( $image_type == IMAGETYPE_JPEG ) {
     return imagecreatefromjpeg($filename);
  } elseif( $image_type == IMAGETYPE_GIF ) {
     return imagecreatefromgif($filename);
  } elseif( $image_type == IMAGETYPE_PNG ) {
	return imagecreatefrompng($filename);
  }
  else 
  	return false;
}

function getWidth($img) {

	return imagesx($img);
}
function getHeight($img) {
	return imagesy($img);
}
function resizeToWidth($width, $img) {
	$ratio = $width / getWidth($img);
	$height = getheight($img) * $ratio;
	
	$new_image = imagecreatetruecolor($width, $height);
	imagecopyresampled($new_image, $img, 0, 0, 0, 0, $width, $height, getWidth($img), getheight($img));
	
	return $new_image;
}
?>