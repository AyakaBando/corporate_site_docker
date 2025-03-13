<?php
/*Begin works */
require_once( $_SERVER['DOCUMENT_ROOT'] . "/gdCMS/conf/gd.conf");
require_once( _PATH_gdCMS_ROOT . "gdF/gdF.conf");
require_once( $_SERVER['DOCUMENT_ROOT'] . "/lib/ProductNewsCollection.class.inc");
/*End works */
?>
		<div id="navi">
			<div class="naviBlock">
				<div id="logo"><a href="/"><img src="/images/morita_logo.gif" width="164" height="55" alt="森田アルミ工業"></a></div>
				<!--<div><img src="/images/morita_copy.gif" width="205" height="10" alt="アルミ階段・エクステリア製品の製造メーカー"></div>-->
				<?php require_once( $_SERVER['DOCUMENT_ROOT'] ."/include/globalnavi.inc");?>
				<div class="sideNaviBlock">
<?php
$pnc = new ProductNewsCollection();
$allCategory = $pnc ->getCategory( );

foreach( $allCategory as $categoryKey => $categoryValue )
{
	$pnc->setCategoryID(  $categoryValue->category_id );
	$productByCategory[] = $pnc->getNews( 0 , 0 , 0 );
}

if ( $productByCategory != null )
{
	foreach( $productByCategory as $byCategoryKey => $byCategoryValue )
	{
		if($byCategoryValue != null)
		{
			echo'<div class="title"><span class="rt"><strong>'. $allCategory[$byCategoryKey]->category_name .'</strong></span></div>';
			echo '<ul class="product">';
			foreach( $byCategoryValue as $productKey => $productValue )
			{
				if($productValue->product_ex_attribute1)
				{
					echo'<li><a href="/product/'. $productValue->category_name .'/archives/' . $productValue->filename .'.php"><span class="title1"><span class="rt">'. $productValue->product_name_japanese .'</span></span><span class="subTitle"><span class="st">'.$productValue->product_ex_attribute1.'</span></span></a></li>';
				}
				else
				{
					echo'<li><a href="/product/'. $productValue->category_name .'/archives/' . $productValue->filename .'.php"><span class="title2"><span class="rt">'. $productValue->product_name_japanese .'</span></span></a></li>';
				}
			}
			echo '</ul>';
		}
	}
}
else
{
	echo '<div class="title"><span class="rt"><strong>登録されている製品情報はありません。</strong></span></div>';
}
?>
				</div><!-- End productNaviBlock -->
			</div><!-- End naviBlock -->
		</div><!-- End navi -->