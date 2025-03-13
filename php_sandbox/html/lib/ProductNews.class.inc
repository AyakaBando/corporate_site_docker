<?php
require_once('News.class.inc');

class ProductNews extends News
{
	function ProductNews( $initValue )
	{
		foreach( $initValue as $key => $value )
		{
			$this->$key = $value;
		}
		$this->filename = $initValue["product_cre_dt"] . $initValue["product_id"];
	}

	function getEntry_dt()
	{
		return $this->custom_product_dt;
	}
	
	// サムネイルファイル名をスモールサイズのサムネイルファイル名に変換したものを返す
	function getProductPictureSmallThumbnailURL()
	{
		if ( $this->product_picture1 != "" )
		{
			$productpicture_ext = substr( $this->product_picture1, strrpos( $this->product_picture1, ".") + 1 );
			$productpicture_name = substr( $this->product_picture1, 0, strrpos( $this->product_picture1, ".") );
			$productPictureSmallThumbnailURL = $productpicture_name . "_" . _PRODUCT_SMALL_THUMBNAILS_WIDTH . "_" . _PRODUCT_SMALL_THUMBNAILS_HEIGHT . "." . $productpicture_ext;
		}
		else
		{
			$productPictureSmallThumbnailURL = "";
		}
		
		return $productPictureSmallThumbnailURL;
	}
	// サムネイルファイル名をミドルサイズのサムネイルファイル名に変換したものを返す
	function getProductPictureMiddleThumbnailURL()
	{
		if ( $this->product_picture1 != "" )
		{
			$productpicture_ext = substr( $this->product_picture1, strrpos( $this->product_picture1, ".") + 1 );
			$productpicture_name = substr( $this->product_picture1, 0, strrpos( $this->product_picture1, ".") );
			$productPictureSmallThumbnailURL = $productpicture_name . "_" . _PRODUCT_MIDDLE_THUMBNAILS_WIDTH . "_" . _PRODUCT_MIDDLE_THUMBNAILS_HEIGHT . "." . $productpicture_ext;
		}
		else
		{
			$productPictureSmallThumbnailURL = "";
		}
		
		return $productPictureSmallThumbnailURL;
	}

	// サムネイルファイル名をラージサイズのサムネイルファイル名に変換したものを返す
	function getProductPictureLargeThumbnailURL()
	{
		if ( $this->product_picture1 != "" )
		{
			$productpicture_ext = substr( $this->product_picture1, strrpos( $this->product_picture1, ".") + 1 );
			$productpicture_name = substr( $this->product_picture1, 0, strrpos( $this->product_picture1, ".") );
			$productPictureLargeThumbnailURL = $productpicture_name . "_" . _PRODUCT_LARGE_THUMBNAILS_WIDTH . "_" . _PRODUCT_LARGE_THUMBNAILS_HEIGHT . "." . $productpicture_ext;
		}
		else
		{
			$productPictureLargeThumbnailURL = "";
		}
		
		return $productPictureLargeThumbnailURL;
	}
}
?>
