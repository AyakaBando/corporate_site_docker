<?php
function smarty_modifier_gd_thumbnail( $imagePath, $imageWidth, $imageHeight )
{
	$ext = substr( $imagePath, strrpos( $imagePath, ".") + 1 );
	$baseName = substr( $imagePath, 0, strrpos( $imagePath, ".") );
	$thumbnailPath = $baseName . "_" . $imageWidth . "_" . $imageHeight . "." . $ext;
	
	return $thumbnailPath;
}
?>
