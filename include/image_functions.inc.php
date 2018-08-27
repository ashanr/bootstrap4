<?php
/*This function resizes the image to specified dimentsions and returns the image*/
function resizeJpegImage($originalImage,$toWidth,$toHeight){
	// Get the original geometry and calculate scales
	list($width, $height) = getimagesize($originalImage);
	$xscale=$width/$toWidth;
	$yscale=$height/$toHeight;
	
	// Recalculate new size with default ratio
	if ($yscale>$xscale){
		$new_width = round($width * (1/$yscale));
		$new_height = round($height * (1/$yscale));
	}
	else {
		$new_width = round($width * (1/$xscale));
		$new_height = round($height * (1/$xscale));
	}
	
	// Resize the original image
	$imageResized = imagecreatetruecolor($new_width, $new_height);
	$imageTmp     = imagecreatefromjpeg ($originalImage);
	imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	
	return $imageResized;
}

/*This function resizes the image to specified dimentsions and returns the image*/
function resizeGifImage($originalImage,$toWidth,$toHeight){
	// Get the original geometry and calculate scales
	list($width, $height) = getimagesize($originalImage);
	$xscale=$width/$toWidth;
	$yscale=$height/$toHeight;
	
	// Recalculate new size with default ratio
	if ($yscale>$xscale){
		$new_width = round($width * (1/$yscale));
		$new_height = round($height * (1/$yscale));
	}
	else {
		$new_width = round($width * (1/$xscale));
		$new_height = round($height * (1/$xscale));
	}
	
	// Resize the original image
	$imageResized = imagecreatetruecolor($new_width, $new_height);
	$imageTmp     = imagecreatefromgif($originalImage);
	imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	
	return $imageResized;
}

/*This function resizes the image to specified dimentsions and returns the image*/
function resizePngImage($originalImage,$toWidth,$toHeight){
	// Get the original geometry and calculate scales
	list($width, $height) = getimagesize($originalImage);
	$xscale=$width/$toWidth;
	$yscale=$height/$toHeight;
	
	// Recalculate new size with default ratio
	if ($yscale>$xscale){
		$new_width = round($width * (1/$yscale));
		$new_height = round($height * (1/$yscale));
	}
	else {
		$new_width = round($width * (1/$xscale));
		$new_height = round($height * (1/$xscale));
	}
	
	// Resize the original image
	$imageResized = imagecreatetruecolor($new_width, $new_height);
	$imageTmp     = imagecreatefrompng($originalImage);
	imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	
	return $imageResized;
}

/*This function resizes the image to specified dimentsions and returns the image*/
function resizeBmpImage($originalImage,$toWidth,$toHeight){
	// Get the original geometry and calculate scales
	list($width, $height) = getimagesize($originalImage);
	$xscale=$width/$toWidth;
	$yscale=$height/$toHeight;
	
	// Recalculate new size with default ratio
	if ($yscale>$xscale){
		$new_width = round($width * (1/$yscale));
		$new_height = round($height * (1/$yscale));
	}
	else {
		$new_width = round($width * (1/$xscale));
		$new_height = round($height * (1/$xscale));
	}
	
	// Resize the original image
	$imageResized = imagecreatetruecolor($new_width, $new_height);
	$imageTmp     = imagecreatefromwbmp($originalImage);
	imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	
	return $imageResized;
}

/*This function writes the jpeg image to a new resized file - That is the thumbnail!*/
function writeToJpegImageFile($image,$width,$height,$newFileName){
	imagejpeg(resizeJpegImage($image,$width,$height),$newFileName);
}

/*This function writes the gif image to a new resized file - That is the thumbnail!*/
function writeToGifImageFile($image,$width,$height,$newFileName){
	imagegif(resizeGifImage($image,$width,$height),$newFileName);
}

/*This function writes the png image to a new resized file - That is the thumbnail!*/
function writeToPngImageFile($image,$width,$height,$newFileName){
	imagepng(resizePngImage($image,$width,$height),$newFileName);
}

/*This function writes the bmp image to a new resized file - That is the thumbnail!*/
function writeToBmpImageFile($image,$width,$height,$newFileName){
	imagewbmp(resizeBmpImage($image,$width,$height),$newFileName);
}
?>