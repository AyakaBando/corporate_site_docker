<?php /* Smarty version 2.6.19, created on 2024-01-09 16:56:58
         compiled from detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'detail.html', 119, false),array('modifier', 'date_format', 'detail.html', 348, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
	<?php echo '
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':
new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=
\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,\'script\',\'dataLayer\',\'GTM-WGZ5CQX\');</script>
<!-- End Google Tag Manager -->
	'; ?>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title><?php echo $this->_tpl_vars['data']['subName']; ?>
&nbsp;<?php echo $this->_tpl_vars['data']['name']; ?>
 | Product | Morita Aluminum Industry,inc.</title>
<meta name="description" content="Morita Aluminum Industry,inc.">
<meta name="Keywords" content="">
<meta property="og:title" content="Product | Morita Aluminum Industry,inc.">
<meta property="og:type" content="website">
<meta property="og:description" content="Morita Aluminum Industry,inc.">
<meta property="og:image" content="">
<meta property="og:site_name" content="Morita Aluminum Industry,inc.">
<link rel="shortcut icon" href="/image/icon/favicon.ico">
<link rel="apple-touch-icon" href="/image/icon/ios.png"/>
<link rel="icon" href="/image/icon/ios.png">
<link rel="stylesheet" type="text/css" href="/en/common/css/reset-fonts.css">
<link rel="stylesheet" type="text/css" href="/en/common/css/reset-min.css">
<link rel="stylesheet" type="text/css" href="/en/common/css/comp.css">
<link rel="stylesheet" type="text/css" href="/en/common/css/contents.css">
<!--[if IE]><link rel="stylesheet" href="/en/common/css/fontsize_ie.css" media="all" /><![endif]-->
<!--[if lt IE 9]><script src="/en/common/js/html5shiv.js"></script><![endif]-->
<link href="/en/common/css/bootstrap.min.css" rel="stylesheet">
<link href="/en/common/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Rajdhani:400,300' rel='stylesheet' type='text/css'>
		<?php echo '
	<script>
(function (w, d, s, u) {
  // TAG VERSION 1.00
  if (w._wsq_init_flg) {
    return false;
  }
  w._wsq_init_flg = true;
  _wsq = w._wsq || (_wsq = []);
  _wsq.push([\'init\', u, 2060]);
  _wsq.push([\'domain\', \'www.moritaalumi.co.jp\']);
  var a = d.createElement(s); a.async = 1; a.charset=\'UTF-8\'; a.src = \'https://cdn.\' + u + \'/share/js/tracking.js\';
  var b = d.getElementsByTagName(s)[0]; b.parentNode.insertBefore(a, b);
})(window, document, \'script\', \'tetori.link\');
</script>
	'; ?>

</head>
<body>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../common/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<section id="md_area">
	<div id="md_area_in">
		<h1>Product Information</h1>
	</div>
	<!--/md_area_in--> 
</section>
<!--/md_area-->
<!--<nav id="c_glo">
	<ul id="c_glo_in">
		<li><a href="">同カテゴリ名別ページ名</a></li>
		<li><a href="">同カテゴリ名別ページ名</a></li>
		<li><a href="">同カテゴリ名別ページ名</a></li>
		<li><a href="">同カテゴリ名別ページ名</a></li>
	</ul>
	
</nav>-->
<!--/c_glo-->

<article id="contents">
<nav id="pan">
<ul>
<li><a href="">HOME</a></li>
<li><a href="">Product Information</a></li>
<li><span><?php echo $this->_tpl_vars['data']['subName']; ?>
&nbsp;<?php echo $this->_tpl_vars['data']['name']; ?>
</span></li>
</ul>
<br class="clearfix">
</nav>
<!--/pan-->
	<div class="md002">
		<h2 class="head02 pro"><?php echo $this->_tpl_vars['data']['subName']; ?>
</h2>
		<p class="sub_md"><?php echo $this->_tpl_vars['data']['name']; ?>
</p>
	</div>
	<!--/md002-->
	<nav class="in_list">
	<ul>
	<?php if ($this->_tpl_vars['data']['commentTitle']): ?><li><a href="#T01"><?php echo $this->_tpl_vars['data']['commentTitle']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['data']['otherComment']): ?><li><a href="#T02"><?php if ($this->_tpl_vars['data']['otherTitle']): ?><?php echo $this->_tpl_vars['data']['otherTitle']; ?>
<?php else: ?>その他<?php endif; ?></a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['data']['otherComment2']): ?><li><a href="#T09"><?php if ($this->_tpl_vars['data']['otherTitle2']): ?><?php echo $this->_tpl_vars['data']['otherTitle2']; ?>
<?php else: ?>その他<?php endif; ?></a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['data']['caseImg']): ?><li><a href="#T03">Inspiration</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['data']['catalog'] || $this->_tpl_vars['data']['draw']): ?><li><a href="#T04">ダウンロード</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['data']['faq']): ?><li><a href="#T05">FAQ</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['data']['news']): ?><li><a href="#T06">お知らせ</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['data']['review']): ?><li><a href="#T07">ユーザーレビュー</a></li><?php endif; ?>
	</ul>
	</nav>
	<!--/in_list-->
	<section class="box">
	<div id="slider02" class="flexslider">
  <ul class="slides">
<?php $_from = $this->_tpl_vars['data']['mainImg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
    <li><img src="/upImage/product/<?php echo $this->_tpl_vars['value']['fileName']; ?>
" /></li>
<?php endforeach; endif; unset($_from); ?>


  </ul>
</div>
	</section>
	<!--/box-->
	<section class="box btm50">
	
	<h3 class="head03"><?php echo $this->_tpl_vars['data']['subTitle']; ?>
</h3>
	<p class="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['subComment'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
	</section>
	<!--/box-->

<?php if ($this->_tpl_vars['data']['comment']): ?>
	<section class="box">
	<hr class="kai001" id="T01">
	<div class="md003">
			<h3 class="head"><?php if ($this->_tpl_vars['data']['commentTitle']): ?><?php echo $this->_tpl_vars['data']['commentTitle']; ?>
<?php endif; ?></h3>
		</div>
		<!--/md003-->
	<section class="box gray">
	<?php echo $this->_tpl_vars['data']['comment']; ?>


	</section>
	<!--/box gray-->
	</section>
<?php endif; ?>

<?php if ($this->_tpl_vars['data']['otherComment']): ?>
	<!--/box-->
	<section class="box">
	<hr class="kai001" id="T02">
	<div class="md003">
	
			<h3 class="head"><?php if ($this->_tpl_vars['data']['otherTitle']): ?><?php echo $this->_tpl_vars['data']['otherTitle']; ?>
<?php else: ?>その他<?php endif; ?></h3>
		</div>
		<!--/md003-->
	<section class="box gray">
<?php echo $this->_tpl_vars['data']['otherComment']; ?>

	</section>
	<!--/box gray-->
	</section>
	<!--/box-->
<?php endif; ?>

<?php if ($this->_tpl_vars['data']['otherComment2']): ?>
	<!--/box-->
	<section class="box">
	<hr class="kai001" id="T09">
	<div class="md003">
	
			<?php if ($this->_tpl_vars['data']['otherTitle2']): ?><h3 class="head"><?php echo $this->_tpl_vars['data']['otherTitle2']; ?>
</h3><?php endif; ?>
		</div>
		<!--/md003-->
	<section class="box gray">
<?php echo $this->_tpl_vars['data']['otherComment2']; ?>

	</section>
	<!--/box gray-->
	</section>
	<!--/box-->
<?php endif; ?>

<?php if ($this->_tpl_vars['data']['caseImg']): ?>
	<section class="box">

	<hr class="kai001" id="T03">
	<div class="md003">
			<h3 class="head">Inspiration</h3>
		</div>
		<!--/md003-->
<div id="slider" class="flexslider">

  <ul class="slides">
<?php $_from = $this->_tpl_vars['data']['caseImg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
    <li><img src="/upImage/product/<?php echo $this->_tpl_vars['value']['fileName']; ?>
" /></li>
<?php endforeach; endif; unset($_from); ?>

  </ul>
</div>
<div id="carousel" class="flexslider btm40">
  <ul class="slides">
<?php $_from = $this->_tpl_vars['data']['caseImg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
    <li><img src="/upImage/product/<?php echo $this->_tpl_vars['value']['fileName']; ?>
" /></li>
<?php endforeach; endif; unset($_from); ?>

  </ul>
</div>

	<nav class="btn_area con_dis001" id="im_bb">
<?php if (! $_SESSION['member']['flg']): ?>
	<!--///会員登録がまだの場合.btn_area_inではさむ-->
	<div class="btn_area_in">

	<div id="im_d">
	<div id="im_d02">
	<p class="size19 bold btm20">画像ダウンロードするには会員登録が必要となります。</p>
		<nav class="btn_area">
			<ul>
				<li><a href="/en/member/?id=<?php echo $_GET['id']; ?>
" class="btn03">会員登録画面へ</a></li>
			</ul>
		</nav>
		<!--/btn_area-->
		</div>
		<!--/im_d02-->
	</div>
<?php endif; ?>
	<!--/im_d-->
			<ul>
				<li><a<?php if ($_SESSION['member']['flg']): ?> href="./download.php?id=<?php echo $this->_tpl_vars['data']['id']; ?>
"<?php endif; ?> class="btn01">画像ダウンロード</a></li>
			</ul>
<?php if (! $_SESSION['member']['flg']): ?>
	</div>
<?php endif; ?>



	<!--/btn_areaここまで-->
	</nav>
		<!--/btn_area-->
	</section>
<?php endif; ?>
<?php if ($this->_tpl_vars['data']['catalog'] || $this->_tpl_vars['data']['draw']): ?>
	<!--/box-->
	<section class="box con_dis001">
	<hr class="kai001" id="T04">
		<div class="md003">
			<h3 class="head">ダウンロード</h3>
		</div>
		<!--/md003-->
<?php if (! $_SESSION['member']['flg']): ?>
		<!--///会員登録がまだの場合.m_hではさむ-->
		<div id="m_h">
		
		
		<!--///会員登録がまだの場合以下を追加-->
		<div id="m_h_in">
		<div class="m_h_in02">
		<p class="size19 bold btm20">ダウンロードするには会員登録が必要となります。</p>
		<nav class="btn_area">
			<ul>
				<li><a href="/en/member/?id=<?php echo $_GET['id']; ?>
" class="btn03">会員登録画面へ</a></li>
			</ul>
		</nav>
		<!--/btn_area-->
		</div>
		<!--/m_h_in02--> 
		</div>
		<!--/m_h_in-->
		<!--/////ここまで-->
<?php endif; ?>

	<nav class="d_load">
<?php if ($this->_tpl_vars['data']['catalog']): ?>
		<div class="f_l">
			<h5 class="head">カタログダウンロード</h5>
			<ul class="d_in">
<?php $_from = $this->_tpl_vars['data']['catalog']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
				<li>
					<a <?php if ($_SESSION['member']['flg']): ?> href="./file.php?fileName=<?php echo $this->_tpl_vars['value']['fileName']; ?>
&imgId=<?php echo $this->_tpl_vars['value']['imgId']; ?>
&id=<?php echo $this->_tpl_vars['data']['id']; ?>
&mode=1"<?php endif; ?>>
					<span class="txt_m"><?php if ($this->_tpl_vars['value']['imageAlt']): ?><?php echo $this->_tpl_vars['value']['imageAlt']; ?>
<?php else: ?><?php echo $this->_tpl_vars['value']['fileName']; ?>
<?php endif; ?></span>
					<span class="txt_m02">DOWNLOAD</span>
					<br class="clearfix">
					</a>
				</li>
<?php endforeach; endif; unset($_from); ?>
			</ul>
			<!--/d_in--> 
		</div>
		<!--/f_l-->
<?php endif; ?>
<?php if ($this->_tpl_vars['data']['draw']): ?>
		<div class="f_l">
			<h5 class="head">図面ダウンロード</h5>
			<ul class="d_in">
<?php $_from = $this->_tpl_vars['data']['draw']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
				<li>
					<a<?php if ($_SESSION['member']['flg']): ?> href="./file.php?fileName=<?php echo $this->_tpl_vars['value']['fileName']; ?>
&imgId=<?php echo $this->_tpl_vars['value']['imgId']; ?>
&id=<?php echo $this->_tpl_vars['data']['id']; ?>
&mode=2"<?php endif; ?>>
					<span class="txt_m"><?php if ($this->_tpl_vars['value']['imageAlt']): ?><?php echo $this->_tpl_vars['value']['imageAlt']; ?>
<?php else: ?><?php echo $this->_tpl_vars['value']['fileName']; ?>
<?php endif; ?></span>
					<span class="txt_m02">DOWNLOAD</span>
					<br class="clearfix">
					</a>
				</li>
<?php endforeach; endif; unset($_from); ?>
			</ul>
			<!--/d_in--> 
		</div>
		<!--/f_r-->
<?php endif; ?>
		<br class="clearfix">
	</nav>
	<!--/d_load-->
	
<?php if (! $_SESSION['member']['flg']): ?>
	</div>
<?php endif; ?>
	<!--/m_hここまで-->
	</section> 
<?php endif; ?>	<!--/box-->


<?php if ($this->_tpl_vars['data']['faq']): ?>
	<section class="box">
	<hr class="kai001" id="T05">
		<div class="md003">
			<h3 class="head">FAQ</h3>
		</div>
		<!--/md003-->
		<nav id="q_cat">
		<ul>
<?php $_from = $this->_tpl_vars['data']['faq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
			<li><a href="../faq/detail.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
#T<?php echo $this->_tpl_vars['value']['categoryId']; ?>
"><?php echo $this->_tpl_vars['value']['name']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
		</ul>
		<br class="clearfix">
		</nav>
		<!--/q_cat-->
	</section>
	<!--/box-->
<?php endif; ?>

<?php if ($this->_tpl_vars['data']['news']): ?>
	<section class="box">
	<hr class="kai001" id="T06">
		<div class="md003">
			<h3 class="head">お知らせ</h3>
		</div>
		<!--/md003-->

		<div id="news_list">
<?php if ($this->_tpl_vars['data']['news']['1']): ?>
		<nav class=" n_list01">
		<h5 class="head">受賞歴</h5>
		<ul>
<?php $_from = $this->_tpl_vars['data']['news']['1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
		<li>
		<a href="<?php if ($this->_tpl_vars['value']['type'] == 1): ?><?php echo $this->_tpl_vars['value']['url']; ?>
<?php else: ?>../upImage/product_news/<?php echo $this->_tpl_vars['value']['pdfFileName']; ?>
<?php endif; ?>" target="_blank">
		<span class="n_t"><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['dateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
</span>
		<span class="n_tit"><?php echo $this->_tpl_vars['value']['title']; ?>
</span>
		</a>
		</li>
		<!--/-->
<?php endforeach; endif; unset($_from); ?>
		<!--/-->
		</ul>
		</nav>
		<!--/n_list01-->
<?php endif; ?>
<?php if ($this->_tpl_vars['data']['news']['2']): ?>
		<nav class=" n_list01">
		<h5 class="head">プレスリリース</h5>
		<ul>
<?php $_from = $this->_tpl_vars['data']['news']['2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
		<li>
		<a href="<?php if ($this->_tpl_vars['value']['type'] == 1): ?><?php echo $this->_tpl_vars['value']['url']; ?>
<?php else: ?>../upImage/product_news/<?php echo $this->_tpl_vars['value']['pdfFileName']; ?>
<?php endif; ?>" target="_blank">
		<span class="n_t"><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['dateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
</span>
		<span class="n_tit"><?php echo $this->_tpl_vars['value']['title']; ?>
</span>
		</a>
		</li>
		<!--/-->
<?php endforeach; endif; unset($_from); ?>
		</ul>
		</nav>
		<!--/n_list01-->
<?php endif; ?>
<?php if ($this->_tpl_vars['data']['news']['3']): ?>
		<nav class=" n_list01 last">
		<h5 class="head">関連情報</h5>
		<ul>
<?php $_from = $this->_tpl_vars['data']['news']['3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
		<li>
		<a href="<?php if ($this->_tpl_vars['value']['type'] == 1): ?><?php echo $this->_tpl_vars['value']['url']; ?>
<?php else: ?>../upImage/product_news/<?php echo $this->_tpl_vars['value']['pdfFileName']; ?>
<?php endif; ?>" target="_blank">
		<span class="n_t"><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['dateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
</span>
		<span class="n_tit"><?php echo $this->_tpl_vars['value']['title']; ?>
</span>
		</a>
		</li>
		<!--/-->
<?php endforeach; endif; unset($_from); ?>
		<!--/-->
		</ul>
		</nav>
		<!--/n_list01-->
<?php endif; ?>
		<br class="clearfix">
		</div>
	</section>
	<!--/box-->
<?php endif; ?>
</article>
<!--/contents-->



<?php if ($this->_tpl_vars['data']['related']): ?>
<article id="contents03">
<div class="md003">
			<h3 class="head">Related Product</h3>
			<nav id="pro_list01">
			<ul>
<?php $_from = $this->_tpl_vars['data']['related']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?><li>
					<a href="./detail.php?id=<?php echo $this->_tpl_vars['key']; ?>
">
						<p class="pl_ph"><img src="/upImage/product/<?php echo $this->_tpl_vars['data']['relatedImd'][$this->_tpl_vars['key']]; ?>
" alt=""/></p>
						<h5><?php echo $this->_tpl_vars['data']['relatedSubName'][$this->_tpl_vars['key']]; ?>
</h5>
						<p class="s_title"><?php echo $this->_tpl_vars['data']['relatedName'][$this->_tpl_vars['key']]; ?>
</p>
					</a>
				</li><?php endforeach; endif; unset($_from); ?>
		</ul>		
				<br class="clearfix">
			</nav>
		</div>
		<!--/md003-->
</article>
<!--/contents03-->
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../common/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="/en/common/js/import.js"></script> 
<script src="/en/common/js/bootstrap.min.js"></script>
<!--product-->
<script src="/en/common/js/jquery.flexslider.js"></script>
<?php echo '
<script>
//uniq
$(window).load(function() {
  // The slider being synced must be initialized first
  $(\'#carousel\').flexslider({
    animation: "slide",
    controlNav: false,

'; ?>
<?php if ($this->_tpl_vars['data']['caseCnt'] <= 7): ?>
    directionNav:false,
<?php endif; ?><?php echo '

    animationLoop: false,
    slideshow: false,
    itemWidth: 128,
    itemMargin: 0,
		maxItems: 7,
		animationLoop: true,
    asNavFor: \'#slider\'
  });
 
  $(\'#slider\').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: true,
    slideshow: true,
		slideshowSpeed: 2000,
    sync: "#carousel"
  });
	 $(\'#slider02\').flexslider({
    animation: "slide",
    controlNav: true,
    animationLoop: true,
    slideshow: true,
		slideshowSpeed: 5000
  });
});
$(window).on(\'load resize\', function(){
			var vo01 = $(\'#voice\').height();
			var vo02 = $(\'#m_h\').height();
			var vo03 = $(\'#im_bb\').height();
			$(\'#voice_in\').css({\'height\':vo01 + 72});
			$(\'#m_h_in\').css({\'height\':vo02 + 40});
			$(\'#im_d\').css({\'height\':vo03});
		});
</script>
<!--/product-->


<link rel="stylesheet" type="text/css" href="/common/js/fancybox/jquery.fancybox.css">
<script src="/en/common/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script src="/en/common/js/fancybox/jquery.fancybox.pack.js"></script>
<script>
$(document).ready(function(){
    $( \'.fancybox_if\' ).fancybox({
        \'width\'         : 950,
        \'height\'        : \'90%\',
        \'autoScale\'     : false,
        \'transitionIn\'  : \'none\',
        \'transitionOut\' : \'none\',
        \'type\'          : \'iframe\'
    });

});
</script>
<script>
$(window).on(\'load resize\', function(){
	if (window.matchMedia(\'screen and (min-width:768px)\').matches) { 
	var h001 = $(\'.in_list ul\').height();
	$(\'.in_list\').css({
		\'height\':h001 + 40
		});
		}else{
			$(\'.in_list\').css({
		\'height\':\'auto\'
		});
			}
	});
	$(window).scroll(function () {
var initial0 = $(this).scrollTop();
var first = $(\'.in_list\').offset().top;

if(initial0 > first) {
$(\'.in_list ul\').addClass(\'fixed\');

}else {
   $(\'.in_list ul\').removeClass(\'fixed\');
  }
});
</script>
	<script type=\'text/javascript\'>
piAId = \'1049092\';
piCId = \'2117\';
piHostname = \'ma.moritaalumi.co.jp\';

(function() {
	function async_load(){
		var s = document.createElement(\'script\'); s.type = \'text/javascript\';
		s.src = (\'https:\' == document.location.protocol ? \'https://\' : \'http://\') + piHostname + \'/pd.js\';
		var c = document.getElementsByTagName(\'script\')[0]; c.parentNode.insertBefore(s, c);
	}
	if(window.attachEvent) { window.attachEvent(\'onload\', async_load); }
	else { window.addEventListener(\'load\', async_load, false); }
})();
</script>
'; ?>

</body>
</html>