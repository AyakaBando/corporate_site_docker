<?php require_once($_SERVER['DOCUMENT_ROOT'].'/inc/contentsConfig.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>森田アルミ工業</title>
<meta name="description" content="森田アルミ工業">
<meta name="Keywords" content="">
<meta property="og:title" content="森田アルミ工業">
<meta property="og:type" content="website">
<meta property="og:description" content="森田アルミ工業">
<meta property="og:image" content="">
<meta property="og:site_name" content="森田アルミ工業">
<link rel="shortcut icon" href="/image/icon/favicon.ico">
<link rel="apple-touch-icon" href="/image/icon/ios.png"/>
<link rel="icon" href="/image/icon/ios.png">
<link rel="stylesheet" type="text/css" href="/en/common/css/reset-fonts.css">
<link rel="stylesheet" type="text/css" href="/en/common/css/reset-min.css">
<link rel="stylesheet" type="text/css" href="/en/common/css/comp.css">
<link rel="stylesheet" type="text/css" href="/en/common/css/contents.css">
<link rel="stylesheet" type="text/css" href="/en/common/css/test.css">
<!--[if IE]><link rel="stylesheet" href="/en/common/css/fontsize_ie.css" media="all" /><![endif]-->
<!--[if lt IE 9]><script src="/en/common/js/html5shiv.js"></script><![endif]-->
<link href="/en/common/css/bootstrap.min.css" rel="stylesheet">
<link href="/en/common/css/bootstrap-theme.min.css" rel="stylesheet">

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Quicksand|Source+Sans+Pro:400,200,300' rel='stylesheet' type='text/css'>
</head>
<body>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/en/common/include/header.php'); ?>


<section id="md_area">
	<div id="md_area_in">
		<h1>プライバシーポリシー</h1>
	</div>
	<!--/md_area_in-->
</section>
<!--/md_area-->


<article id="contents" class="privacy">
<nav id="pan">
<ul>
<li><a href="/en/">HOME</a></li>
<li><span>プライバシーポリシー</span></li>
</ul>
<br class="clearfix">
</nav><!--/pan-->


<section class="box non_title_top">
<h5 class="head">個人情報の収集について</h5>
当ウェブサイトのご利用に際し、よりよいサービスのご提供を続けるために、個人情報を収集することがございます。<br>収集する個人情報の範囲は、収集の目的を達成するための必要最低限とし、取り扱いにあたっては、個人情報保護に関する関係法令および社内諸規定などを遵守します。
</section>

<section class="box">
<h5 class="head">個人情報の管理・保護について</h5>
当社が収集したお客様の個人情報につきましては、適切な管理を行い、紛失・破壊・改ざん・不正アクセス・漏洩などの防止に努めます。<br>収集したお客様の個人情報は、お客様の同意なく開示することはございません。<br>また、当ウェブサイトへのアクセスにより、他のお客様が個人情報を閲覧されることはございません。
</section>

<section class="box">
<h5 class="head">個人情報の利用について</h5>
お客様の個人情報は、以下の目的で利用いたします。<br>
・お客様にサービスや商品の情報を的確にお伝えするため<br>
・お客様がサービスをご利用になる際の身分証明のため<br>
・より満足していただけるサイトへと改善するため<br>
・新たなサービスの開発を行うため<br>
・必要に応じてお客様に連絡を行うため
</section>

<section class="box">
<h5 class="head">当ポリシーの改善</h5>
当プライバシーポリシーは、見直しの必要性が発生した場合、適宜改善を行います。
</section>



</article>
<!--/contents-->
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/en/common/include/footer.php'); ?>
<script src="/en/common/js/import.js"></script>
<script src="/en/common/js/bootstrap.min.js"></script>
<!--<link rel="stylesheet" type="text/css" href="/common/js/jquery.bxslider.min.css">-->
<script>
$(window).on('load resize', function(){
var h001 = $('header').height();
$('#sp_menu').css({
	'top':h001 + 10})
});
$(function(){
$('#menu').on('click', function(){
	$('#sp_menu').slideToggle();
	});
	});
	$(function(){
$('.c_001 span').on('click', function(){
	$(this).next('ul').slideToggle();
	$(this).toggleClass('c002');
	});
	});
</script>


</body>
</html>
