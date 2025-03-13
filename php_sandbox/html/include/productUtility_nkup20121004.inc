<?php
/*Begin Casestudy */
require_once( $_SERVER['DOCUMENT_ROOT'] . "/gdCMS/conf/gd.conf");
require_once( _PATH_gdCMS_ROOT . "gdF/gdF.conf");
require_once( _PATH_gdCMS_ROOT . "lib/amfphp/services/CasestudyService.php");
require_once( _PATH_gdCMS_ROOT . "lib/amfphp/dto/jp/co/moritaalumi/cms/dto/CasestudyDTO.php");
/*End Casestudy */
$casestudy = new CasestudyService();
//$casestudy->getContentsCount(0,1);
$dto = new CasestudyDTO();
$dto->productId = $pid;
$cs = $casestudy->getContents($dto,0,1);
if($cs[0]->pictures){
	echo'<div class="casestudy">';
		echo'<div class="title"><span class="rt">設置事例</span></div>';
		echo'<div class="thumb">';
		echo'<ul>';
	foreach ($cs[0]->pictures as $key => $value) {
		$num =  $key + 1;
		$str = '_' . $num;
		$thumb = str_replace ($str, $str.'_40_40', $value);
		if($num%7 == 0){
			echo'<li class="last"><a style="cursor:pointer"  onclick="openFlashContent('."'".'block'."'".')"  title="IMAGEVIEWER"><img src="'. $thumb .'" width="40" height="40" alt="'.$cs[0]->titleJa.'"></a></li>';
		}
		else{
			echo'<li><a style="cursor:pointer"  onclick="openFlashContent('."'".'block'."'".')"  title="IMAGEVIEWER"><img src="'. $thumb .'" width="40" height="40" alt="'.$cs[0]->titleJa.'"></a></li>';
		}
	}
		echo'</ul>';
		echo'</div>';
	echo'</div>';
}
else{

}
?>
