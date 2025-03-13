<?php
/*Begin Product */
require_once( $_SERVER['DOCUMENT_ROOT'] . "/gdCMS/conf/gd.conf");
require_once( _PATH_gdCMS_ROOT . "gdF/gdF.conf");
require_once( _PATH_gdCMS_ROOT . "lib/amfphp/services/ProductService.php");
require_once( _PATH_gdCMS_ROOT . "lib/amfphp/dto/jp/co/moritaalumi/cms/dto/ProductDTO.php");

/*End Product */
$product = new ProductService();
$dto = new ProductDTO();
$dto->id = $pid;
$cs = $product->getContents($dto,0,1);
if($cs[0]->pictures){
	echo'<div class="imageViewer">';
		echo'<div class="image">';
		echo'<ul class="gallery clearfix" id="GalleryList">';
		foreach ($cs[0]->pictures as $key => $value) {
			$num =  $key + 1;
			$str = '_' . $num;
			$thumb = str_replace ($str, $str.'_40_40', $value);
			$lthumb = str_replace ($str, $str, $value);
			if($num == 1){
				echo'<li><a href="'. $lthumb .'?lol=lol" rel="prettyPhoto[gallery1]" title=""><img src="'. $lthumb .'" width="732" alt="'.$cs[0]->titleJa.'"></a>';
			}
			else{
				echo'<li style="display:none"><a href="'. $lthumb .'" rel="prettyPhoto[gallery1]" title=""><img src="'. $lthumb .'" width="40" height="40" alt="'.$cs[0]->titleJa.'" /></a></li>';
			}
		}
		echo'</ul>';
		echo'</div>';
		echo'<div class="btnBlock"><ul><li class="imageViewerBtn"><a style="cursor:pointer" title="IMAGEVIEWER" id="GalleryBtn">IMAGEVIEWER</a></li></ul></div>';
	echo'</div>';
}
else{

}


?>