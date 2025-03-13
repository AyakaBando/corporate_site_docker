<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja" dir="ltr">
<head profile="http://purl.org/net/uriprofile/">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="ja-JP">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<title>お問い合わせ</title>
<link rel="stylesheet" type="text/css" href="./css/contact.css">
<link rel="stylesheet" type="text/css" href="./css/base.css">
<link rel="stylesheet" type="text/css" href="./css/dms5.css">
<link rel="stylesheet" type="text/css" href="./css/extends.css">
<script type="text/javascript" src="/shared/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="/shared/js/utils.js"></script>
<script type="text/javascript">
{literal}
 var _gaq = _gaq || [];
 _gaq.push(['_setAccount', 'UA-27940452-1']);
 _gaq.push(['_trackPageview']);

 (function() {
   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
 })();
{/literal}
</script>
</head>
<body id="pagetop">

<div id="CONTAINER" class="layout-container">

{include file="././header.tpl"}
<div class="body-container">
<div class="body">
<!-- Form Container -->
<div class="form-container">
<form method="post" action="{$smarty.server.PHP_SELF}">
<div class="section">
<p>お問い合わせを承りました。</p>
<p>
この度は、お問い合わせ頂き誠にありがとうございました。<br>
お問い合わせ頂きました内容につきまして、出来るだけはやくご返答させていただきます。<br>
返答まで少しお時間を頂く場合があるかもしれませんが、予めご了承いただけましたら幸いです。
</p>
<div class="link">
<ul>
<li><a href="http://www.wakaisangyo.co.jp/">若井産業株式会社</a></li>
<li><a href="http://hi.wakaisangyo.co.jp/">若井産業株式会社 HI営業部</a></li>
</ul>
</div>
</div>
</form>
</div>
<!-- /Form Container -->
</div>
<div class="local-container">

<!-- Module -->

<div class="banner-section">
<ul>
<li><a href="/products/"><img src="/images/bnr_products.png" alt="製品情報" width="230" height="80"></a></li>
<li><a href="http://wakaisangyo-hi.genephics.co.jp" target="_blank"><img src="/images/bnr_hi.png" alt="若井産業HI営業部" width="230" height="80"></a></li>
<li><a href="/electric/"><img src="/images/bnr_electric.png" alt="電設営業部" width="230" height="80"></a></li>
<li><a href="http://www.kanamono-oh.com/" target="_blank"><img src="/images/bnr_reshop.png" alt="金物屋 リショップ事業部" width="230" height="80"></a></li>
<li><a href="http://www.kanamono-oh.com/benrimon/index.php" target="_blank"><img src="/images/bnr_item.png" alt="便利もん" width="230" height="80"></a></li>
<li><a href="/knowledge/"><img src="/images/bnr_trivia.png" alt="知って得する家の仕組み" width="230" height="80"></a></li>
</ul>
</div>
<!-- / Module -->

<!-- Common section -->
<div class="category-common-section">
<div class="cms-wrapper">
</div>
</div>
<div class="cms-wrapper">
</div>
<!-- / Common section -->

</div>

</div>
{include file="./footer.tpl"}

</div>


</body>
</html>
