	<!-- Begin footerTop -->
	<div id="footerTop">
		<div class="footerBlock">
			<div id="directoryNavi">
				<table summary="navigation" border="0" cellpadding="0" cellspacing="0" class="directoryNaviInner">
						<tr>
							<td><img src="/images/directories_navi_left.gif" width="8" height="28" alt="bg"></td>
							<?php
							foreach($directories as $key => $value){
								echo '<td><span class="st"><a href="'.$key.'">'.$value.'</a></span></td>';
								echo '<td><img src="/images/directories_partition.gif" width="13" height="28" alt="bg"></td>';
							}
							echo '<td class="current"><span class="st">'.$currentitle.'</span></td>';
							echo '<td><img src="/images/directories_navi_right.gif" width="8" height="28" alt="bg"></td>';
							?>
						</tr>
				</table>
			</div>

			<div id="footerNavi">
				<div class="productBlock">
					<div class="title"><img src="/images/title_p_1.gif" width="60" height="26" alt="インテリア"></div>
					<div class="footerNaviBlock">
<?php
//現在の日付
$todayArray = array( date("Y"), date("m"), date("d") );
$todayTime = mktime(0,0,0,$todayArray[1], $todayArray[2], $todayArray[0]);
$month = 3;
$viewDate = 30*$month;
if ( $productByCategory != null )
{
	foreach( $productByCategory as $byCategoryKey => $byCategoryValue )
	{
		if($byCategoryKey % 2 == 0)
		{
			//echo $byCategoryKey;
			if($byCategoryValue != null)
			{
				echo '<ul class="product">';

				foreach( $byCategoryValue as $productKey => $productValue ){
					$date = $productValue->custom_product_dt;
					//対象日と今日の日付をそれぞれ配列に格納
					$dateArray = split("/", $date);
					//日付を計算用にタイムスタンプへ変換
					$dateTime = mktime(0,0,0,$dateArray[1] , $dateArray[2] , $dateArray[0]);
					//２つの日付間の差(ミリ秒)を計算
					$diffTime = $todayTime - $dateTime;
					$diffD = $diffTime /(60*60*24);
					if($productValue->product_ex_attribute1){

						echo'<li><a href="/product/'. $productValue->category_name .'/archives/' . $productValue->filename .'.php"><span class="title1"><span class="rt">'. $productValue->product_name_japanese;
						if($diffD <= $viewDate){
							echo'<img class="newIcon" src="/images/icon_new.gif" width="21" height="10" alt="new">';
						}
						echo'</span></span><span class="subTitle"><span class="st">'.$productValue->product_ex_attribute1.'</span></span></a></li>';
					}
					else
					{
						echo'<li><a href="/product/'. $productValue->category_name .'/archives/' . $productValue->filename .'.php"><span class="title2"><span class="rt">'. $productValue->product_name_japanese;
						if($diffD <= $viewDate){
							echo'<img class="newIcon" src="/images/icon_new.gif" width="18" height="9" alt="new">';
						}
						echo '</span></span></a></li>';
					}
				}
				echo '</ul>';
			}
		}		
	}
}
else
{
	echo '<div class="title"><span class="rt"><strong>登録されている製品情報はありません。</strong></span></div>';
}
?>


					</div><!-- End footerNaviBlock -->
				</div>
				<div class="productBlock">
					<div class="title"><img src="/images/title_p_2.gif" width="70" height="26" alt="インテリア"></div>
					<div class="footerNaviBlock">

<?php
if ( $productByCategory != null )
{
	foreach( $productByCategory as $byCategoryKey => $byCategoryValue )
	{
		if($byCategoryKey % 2 == 1)
		{
			//echo $byCategoryKey;
			if($byCategoryValue != null)
			{
				echo '<ul class="product">';

				foreach( $byCategoryValue as $productKey => $productValue ){
					$date = $productValue->custom_product_dt;
					//対象日と今日の日付をそれぞれ配列に格納
					$dateArray = split("/", $date);
					//日付を計算用にタイムスタンプへ変換
					$dateTime = mktime(0,0,0,$dateArray[1] , $dateArray[2] , $dateArray[0]);
					//２つの日付間の差(ミリ秒)を計算
					$diffTime = $todayTime - $dateTime;
					$diffD = $diffTime /(60*60*24);
					if($productValue->product_ex_attribute1){

						echo'<li><a href="/product/'. $productValue->category_name .'/archives/' . $productValue->filename .'.php"><span class="title1"><span class="rt">'. $productValue->product_name_japanese;
						if($diffD <= $viewDate){
							echo'<img class="newIcon" src="/images/icon_new.gif" width="21" height="10" alt="new">';
						}
						echo'</span></span><span class="subTitle"><span class="st">'.$productValue->product_ex_attribute1.'</span></span></a></li>';
					}
					else
					{
						echo'<li><a href="/product/'. $productValue->category_name .'/archives/' . $productValue->filename .'.php"><span class="title2"><span class="rt">'. $productValue->product_name_japanese;
						if($diffD <= $viewDate){
							echo'<img class="newIcon" src="/images/icon_new.gif" width="21" height="10" alt="new">';
						}
						echo '</span></span></a></li>';
					}
				}
				echo '</ul>';
			}
		}		
	}
}
else
{
	echo '<div class="title"><span class="rt"><strong>登録されている製品情報はありません。</strong></span></div>';
}
?>

					</div><!-- End footerNaviBlock -->
				</div>
				<div class="newsBlock">
					<div class="title"><img src="/images/footer_title_news.gif" width="51" height="26" alt="お知らせ"></div>
					<div class="footerNaviBlock">
						<ul class="other">
						<?php
							/*Begin include news file */
							require_once($_SERVER['DOCUMENT_ROOT']. '/gdCMS/conf/gd.conf');
							require_once($_SERVER['DOCUMENT_ROOT']. '/gdCMS/gdF/gdF.conf');
							require_once($_SERVER['DOCUMENT_ROOT']. '/lib/CategoryNewsCollection.inc');
							/*End include news file */
							$viewNewsDate = 12;
							$fcnc = new CategoryNewsCollection();
							$footerNewsCategory = array(2,1,3,4);//entry_id
							foreach( $footerNewsCategory as $fnkey => $fnvalue ){
								$fcnc->setCategoryID( $fnvalue );
								$fcnc->getNews( 1 );
								$date = $fcnc->newsCollection[$fnkey]->entry_dt;
								$dateArray = split("/", $date);
								$dateTime = mktime(0,0,0,$dateArray[1] , $dateArray[2] , $dateArray[0]);
								$diffTime = $todayTime - $dateTime;
								$diffD = $diffTime /(60*60*24);
								$footerNewsDates[] = $diffD;
							}
							echo'<li><a href="/news/year.php?CATEGORY=2"><span class="title1"><span class="st">トピックス</span>';
							if($footerNewsDates[0] <= $viewNewsDate){echo'<img class="newIcon" src="/images/icon_new.gif" width="21" height="10" alt="new">';};echo'</span></a></li>';
							echo'<li><a href="/news/year.php?CATEGORY=1"><span class="title1"><span class="st">プレスリリース</span>';
							if($footerNewsDates[1] <= $viewNewsDate){echo'<img class="newIcon" src="/images/icon_new.gif" width="21" height="10" alt="new">';};echo'</span></a></li>';
							echo'<li><a href="/news/year.php?CATEGORY=3"><span class="title1"><span class="st">メディア</span>';
							if($footerNewsDates[2] <= $viewNewsDate){echo'<img class="newIcon" src="/images/icon_new.gif" width="21" height="10" alt="new">';};echo'</span></a></li>';
							echo'<li><a href="/news/year.php?CATEGORY=4"><span class="title1"><span class="st">展示会</span>';
							if($footerNewsDates[3] <= $viewNewsDate){echo'<img class="newIcon" src="/images/icon_new.gif" width="21" height="10" alt="new">';};echo'</span></a></li>';
						?>
						</ul>
					</div><!-- End footerNaviBlock -->
				</div>
				<div class="corporateBlock">
					<div class="title"><img src="/images/footer_title_corporate.gif" width="52" height="26" alt="企業情報"></div>
					<div class="footerNaviBlock">
						<ul class="other">
							<li><a href="/corporate/message.php"><span class="title1"><span class="st">ご挨拶</span></span></a></li>
							<li><a href="/corporate/profile.php"><span class="title1"><span class="st">会社概要・沿革</span></span></a></li>
							<li><a href="/corporate/sales.php"><span class="title1"><span class="st">販売店・施工業者募集</span></span></a></li>
							<li><a href="/corporate/recruit.php"><span class="title1"><span class="st">求人情報</span></span></a></li>
							<li><a href="/corporate/accessmap.php"><span class="title1"><span class="st">アクセスマップ</span></span></a></li>
						</ul>
					</div><!-- End footerNaviBlock -->
				</div>
				<div class="otherBlock">
					<div class="title"><img src="/images/footer_title_request.gif" width="135" height="26" alt="資料請求・お問い合わせ"></div>
					<div class="footerNaviBlock">
						<ul class="other">
							<li><a href="https://f.msgs.jp/webapp/hear/org/showEnquete.do?enqueteid=2&clientid=11230&databaseid=ypq" target="_blank"><span class="title1"><span class="st">資料請求</span></span></a></li>
							<li><a href="https://f.msgs.jp/webapp/hear/org/showEnquete.do?enqueteid=3&clientid=11230&databaseid=ypq" target="_blank"><span class="title1"><span class="st">お問い合わせ</span></span></a></li>
							<li><a href="/privacy/"><span class="title1"><span class="st">個人情報保護方針</span></span></a></li>
						</ul>
					</div><!-- End footerNaviBlock -->
					<div class="title"><img src="/images/footer_title_link.gif" width="135" height="26" alt="関連リンク"></div>
					<div class="footerNaviBlock">
						<ul class="other">
							<li><a href="http://moritaalum.exblog.jp/" target="_blank"><span class="title1"><span class="st">森田アルミのブログ</span></span></a></li>
						</ul>
					</div><!-- End footerNaviBlock -->
				</div>
			</div><!-- End footerNavi -->
		</div>
	</div>
	<!-- End footerTop -->
	<!-- Begin footer -->
	<div id="footer">
		<div class="footerSecondBlock">
			<div class="footerMenu">
				<div class="logoBlock">
					<div class="footerLogo"><a href="/"><img src="/images/footer_logo.gif" width="132" height="12" alt="森田アルミ工業株式会社"></a></div>
					<div class="copyright"><img src="/images/copyright.gif" width="218" height="8" alt="Copyright &copy; morita aluminum industry ,inc. All rights reserved."></div>
				</div>
				<div class="footerMenuBlock">
					<ul>
						<li class="privacy"><a href="/privacy/">個人情報保護方針</a></li>
						<li class="contact"><a href="https://f.msgs.jp/webapp/hear/org/showEnquete.do?enqueteid=3&clientid=11230&databaseid=ypq">お問い合わせ</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- End footer -->
</div><!-- End CT -->
<div id="PAGETOP"><a href="#CT" title="pagetop" onclick="scrTar(0,0); return false;">PAGETOP</a></div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6735201-1");
 pageTracker._setLocalRemoteServerMode();
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>