<?php /* Smarty version 2.6.19, created on 2024-01-09 16:46:32
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'index.html', 288, false),)), $this); ?>
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
<title>HOME | Morita Aluminum Industry,inc.</title>
<meta name="description" content="Morita Aluminum Industry,inc.">
<meta name="Keywords" content="">
<meta property="og:title" content="HOME | Morita Aluminum Industry,inc.">
<meta property="og:type" content="website">
<meta property="og:description" content="Morita Aluminum Industry,inc.">
<meta property="og:image" content="">
<meta property="og:site_name" content="Morita Aluminum Industry,inc.">
<link rel="shortcut icon" href="/image/icon/favicon.ico">
<link rel="apple-touch-icon" href="/image/icon/ios.png"/>
<link rel="icon" href="/image/icon/ios.png">
<link rel="stylesheet" type="text/css" href="common/css/reset-fonts.css">
<link rel="stylesheet" type="text/css" href="common/css/reset-min.css">
<link rel="stylesheet" type="text/css" href="common/css/comp.css">
<link rel="stylesheet" type="text/css" href="common/css/index.css">
<!--[if IE]><link rel="stylesheet" href="/en/common/css/fontsize_ie.css" media="all" /><![endif]-->
<!--[if lt IE 9]><script src="/en/common/js/html5shiv.js"></script><![endif]-->
<link href="common/css/bootstrap.min.css" rel="stylesheet">
<link href="common/css/bootstrap-theme.min.css" rel="stylesheet">
<!--<link href='//fonts.googleapis.com/css?family=Vollkorn:400,400italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Amiri:400,400italic,700,700italic' rel='stylesheet' type='text/css'>-->
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Quicksand|Source+Sans+Pro:400,200,300' rel='stylesheet' type='text/css'>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="container">
	<div class="slide_all">
		<div class="slide_wrap">
			<div class="slide_body">
<?php $_from = $this->_tpl_vars['imgData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
				<div class="slide"><?php if ($this->_tpl_vars['value']['imageAlt']): ?><a href="<?php echo $this->_tpl_vars['value']['imageAlt']; ?>
"><?php endif; ?><img src="/upImage/topMainVisual/<?php echo $this->_tpl_vars['value']['fileName']; ?>
"><?php if ($this->_tpl_vars['value']['imageAlt']): ?></a><?php endif; ?></div>
<?php endforeach; endif; unset($_from); ?>
			</div>
		</div>
	</div>
	<!--sp-->
	<div class="slide_all02">
		<div class="slide_wrap">
			<div class="slide_body02">
<?php $_from = $this->_tpl_vars['imgData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
				<div class="slide"><?php if ($this->_tpl_vars['value']['imageAlt']): ?><a href="<?php echo $this->_tpl_vars['value']['imageAlt']; ?>
"><?php endif; ?><img src="/upImage/topMainVisual/<?php echo $this->_tpl_vars['value']['fileName']; ?>
"><?php if ($this->_tpl_vars['value']['imageAlt']): ?></a><?php endif; ?></div>
<?php endforeach; endif; unset($_from); ?>
			</div>
		</div>
	</div>
	<!--/spここまで-->
</div>
<article id="contents" class="tp">
<div class="md003">
<h3 class="head">Product Search</h3>
</div>
<section id="search" class="btm40">
	<ul id="tab">
<?php $_from = $this->_tpl_vars['productCategoryArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
<li<?php if (($this->_foreach['result']['iteration'] <= 1)): ?> class="select"<?php endif; ?>><?php echo $this->_tpl_vars['value']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
<li class="all">All</li>
</ul>
<nav class="content_wrap">
<ul class="nn_list" id="nn01">
<?php $this->assign('i', 1); ?>
<?php $_from = $this->_tpl_vars['middleCategory']['1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>

<?php if ($this->_tpl_vars['puroductData'][$this->_tpl_vars['key']]): ?>
<li class="nn_in<?php if ($this->_tpl_vars['i'] == 1): ?> select<?php endif; ?>"><?php echo $this->_tpl_vars['value']; ?>
</li>
<?php $this->assign('i', $this->_tpl_vars['i']+1); ?>

<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

</ul>
<br class="clearfix">
<?php $this->assign('i', 1); ?>
<?php $_from = $this->_tpl_vars['middleCategory']['1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ckey'] => $this->_tpl_vars['cvalue']):
        $this->_foreach['result']['iteration']++;
?>
<?php if ($this->_tpl_vars['puroductData'][$this->_tpl_vars['ckey']]): ?>
<div class="s_box s01<?php if ($this->_tpl_vars['i'] != 1): ?> disnon<?php endif; ?>">
<ul id="productBox<?php echo $this->_tpl_vars['ckey']; ?>
">
	<?php $_from = $this->_tpl_vars['puroductData'][$this->_tpl_vars['ckey']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
	<?php if ($this->_foreach['result']['iteration'] <= 6): ?>
	<li>
	<a href="./product/detail.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
">
		<?php if ($this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']): ?>
		<p class="pl_ph"><img src="/upImage/product/<?php echo $this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']; ?>
" alt="<?php echo $this->_tpl_vars['value']['name']; ?>
Image"/></p>
		<?php endif; ?>
		<h5><?php echo $this->_tpl_vars['value']['subName']; ?>
</h5>
		<p class="s_title"><?php echo $this->_tpl_vars['value']['name']; ?>
</p>
	</a>
	</li>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
</ul>
	<!--more-->
<?php if (count ( $this->_tpl_vars['puroductData'][$this->_tpl_vars['ckey']] ) > 6): ?>
	<form>
	<div class="more">
	<input type="button" value="More" class="more_b" onclick="loadHtml( <?php echo $this->_tpl_vars['ckey']; ?>
, this );">
	</div>
	</form>
	<!--/moreここまで-->
<?php endif; ?>
</div>
<!--/-->
<?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>


<br class="clearfix">
</nav>
<nav class="content_wrap disnon">
<ul class="nn_list" id="nn02">
<?php $this->assign('i', 1); ?>
<?php $_from = $this->_tpl_vars['middleCategory']['2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>

<?php if ($this->_tpl_vars['puroductData'][$this->_tpl_vars['key']]): ?>
<li class="nn_in<?php if ($this->_tpl_vars['i'] == 1): ?> select<?php endif; ?>"><?php echo $this->_tpl_vars['value']; ?>
</li>
<?php $this->assign('i', $this->_tpl_vars['i']+1); ?>

<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</ul>
<br class="clearfix">

<?php $this->assign('i', 1); ?>
<?php $_from = $this->_tpl_vars['middleCategory']['2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ckey'] => $this->_tpl_vars['cvalue']):
        $this->_foreach['result']['iteration']++;
?>
<?php if ($this->_tpl_vars['puroductData'][$this->_tpl_vars['ckey']]): ?>
<div class="s_box s02<?php if ($this->_tpl_vars['i'] != 1): ?> disnon<?php endif; ?>">
<ul id="productBox<?php echo $this->_tpl_vars['ckey']; ?>
">
	<?php $_from = $this->_tpl_vars['puroductData'][$this->_tpl_vars['ckey']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
	<?php if ($this->_foreach['result']['iteration'] <= 6): ?>
	<li>
	<a href="./product/detail.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
">
		<?php if ($this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']): ?>
		<p class="pl_ph"><img src="/upImage/product/<?php echo $this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']; ?>
" alt="<?php echo $this->_tpl_vars['value']['name']; ?>
Image"/></p>
		<?php endif; ?>
		<h5><?php echo $this->_tpl_vars['value']['subName']; ?>
</h5>
		<p class="s_title"><?php echo $this->_tpl_vars['value']['name']; ?>
</p>
	</a>
	</li>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
</ul>
<?php if (count ( $this->_tpl_vars['puroductData'][$this->_tpl_vars['ckey']] ) > 6): ?>
	<form>
	<div class="more">
	<input type="button" value="More" class="more_b" onclick="loadHtml( <?php echo $this->_tpl_vars['ckey']; ?>
 );">
	</div>
	</form>
	<!--/moreここまで-->
<?php endif; ?>
</div>
<!--/-->
<?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<br class="clearfix">
</nav>


<nav class="content_wrap disnon">
<ul class="nn_list" id="nn03">
<?php $this->assign('i', 1); ?>
<?php $_from = $this->_tpl_vars['middleCategory']['3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>

<?php if ($this->_tpl_vars['puroductData'][$this->_tpl_vars['key']]): ?>
<li class="nn_in<?php if ($this->_tpl_vars['i'] == 1): ?> select<?php endif; ?>"><?php echo $this->_tpl_vars['value']; ?>
</li>
<?php $this->assign('i', $this->_tpl_vars['i']+1); ?>

<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</ul>
<br class="clearfix">

<?php $this->assign('i', 1); ?>
<?php $_from = $this->_tpl_vars['middleCategory']['3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ckey'] => $this->_tpl_vars['cvalue']):
        $this->_foreach['result']['iteration']++;
?>
<?php if ($this->_tpl_vars['puroductData'][$this->_tpl_vars['ckey']]): ?>
<div class="s_box s03<?php if ($this->_tpl_vars['i'] != 1): ?> disnon<?php endif; ?>">
<ul id="productBox<?php echo $this->_tpl_vars['ckey']; ?>
">
	<?php $_from = $this->_tpl_vars['puroductData'][$this->_tpl_vars['ckey']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
	<?php if ($this->_foreach['result']['iteration'] <= 6): ?>
	<li>
	<a href="./product/detail.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
">
		<?php if ($this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']): ?>
		<p class="pl_ph"><img src="/upImage/product/<?php echo $this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']; ?>
" alt="<?php echo $this->_tpl_vars['value']['name']; ?>
Image"/></p>
		<?php endif; ?>
		<h5><?php echo $this->_tpl_vars['value']['subName']; ?>
</h5>
		<p class="s_title"><?php echo $this->_tpl_vars['value']['name']; ?>
</p>
	</a>
	</li>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
</ul>
<?php if (count ( $this->_tpl_vars['puroductData'][$this->_tpl_vars['ckey']] ) > 6): ?>
	<form>
	<div class="more">
	<input type="button" value="More" class="more_b" onclick="loadHtml( <?php echo $this->_tpl_vars['ckey']; ?>
 );">
	</div>
	</form>
	<!--/moreここまで-->
<?php endif; ?>
</div>
<!--/-->
<?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<br class="clearfix">
</nav>

<nav class="content_wrap disnon">
<div class="s_box s04">
<ul>
	<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
	<li>
	<a href="./product/detail.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
">
		<?php if ($this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']): ?>
		<p class="pl_ph"><img src="/upImage/product/<?php echo $this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']; ?>
" alt="<?php echo $this->_tpl_vars['value']['name']; ?>
Image"/></p>
		<?php endif; ?>
		<h5><?php echo $this->_tpl_vars['value']['subName']; ?>
</h5>
		<p class="s_title"><?php echo $this->_tpl_vars['value']['name']; ?>
</p>
	</a>
	</li>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
</div>
<!--/-->



<br class="clearfix">
</nav>

	</section>
	<!--/search-->
	<section id="news_a">
	<div class="md003">
<h3 class="head">News</h3>
</div>
<ul id="n_tab">
<li class="select">News</li>
<li>Events</li>
<li>Product Information</li>
<!--<li>採用情報</li>-->
</ul>


<?php $_from = $this->_tpl_vars['whatsNewCategory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nresult'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nresult']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['nkey'] => $this->_tpl_vars['nvalue']):
        $this->_foreach['nresult']['iteration']++;
?>
<nav class="n_box001<?php if (! ($this->_foreach['nresult']['iteration'] <= 1)): ?> disnon<?php endif; ?>">
	<ul class="n_box001_in">
	<?php $_from = $this->_tpl_vars['newsData'][$this->_tpl_vars['nkey']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
	<li><a href="<?php if ($this->_tpl_vars['value']['contentsCategory'] == 1): ?><?php echo $this->_tpl_vars['value']['url']; ?>
<?php elseif ($this->_tpl_vars['value']['contentsCategory'] == 2): ?>/upImage/whatsNew/<?php echo $this->_tpl_vars['value']['pdfFileName']; ?>
<?php else: ?>./news/detail.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
<?php endif; ?>"<?php if ($this->_tpl_vars['value']['contentsCategory'] <= 2): ?> target="_blank"<?php endif; ?>>
	<time><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['dateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</time>
	<p><?php echo $this->_tpl_vars['value']['title']; ?>
</p>
	</a></li>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
	<!--/n_box_in-->
</nav>
<!--/-->
<?php endforeach; endif; unset($_from); ?>



	</section>
	<!--/news_a-->
	<p id="news_btn01"><a href="/en/news/">Show All</a></p>

</article>
<!--/contents-->
<section id="co_area">
<div class="md003">
<h3 class="head">Our Principles</h3>
</div>
<div class="c_left">
<p><img src="/en/common/image/co_image01.jpg" alt=""/></p>
</div>
<!--/c_left-->
<div class="co_area_in">
<h4>
IT CREATES<br>
WHAT IS NOT IN THE WORLD</h4>
<p class="co_txt001">Bringing Forth Novelty.<br>
Our company is founded on the simple principle of creating timeless products that do not yet exist. Items of new, undiscovered worth that will bring happiness to the lives of our customers for decades, and even centuries to come. Pushing toward this grand vision is the obsession we are proud of bearing at Morita Aluminium Industry. </p>
<p class="right"><a href="/en/mind/"><img src="/common/image/read01.png" alt=""/></a></p>
</div>
<!--/co_area_in-->

</section>
<!--/co_area-->
<nav id="cate_list">
<ul class="clearfix">
<li><a href="/en/company/"><span class="name_ca">Corporate Data</span></a></li>
<!--<li><a href="/en/recruit/"><span class="name_ca">採用情報</span><span class="name_ca02">Recruit</span></a></li>-->
</ul>
</nav>
<!--/cate_list-->
<section id="other_area">
<div class="md003">
<h3 class="head">Links</h3>
</div>
<nav id="o_list01">
<ul id="o_list01_in">
<li><a href="http://www.architonic.com/pmfam/morita-aluminum/3104116/1" target="_blank"><img src="/common/image/architonic_en.jpg" alt=""/></a></li>
<li><a href="//www.facebook.com/moritaalumi" target="_blank"><img src="/common/image/top_bnr02.jpg" alt=""/></a></li>
<li><a href="//moritaalum.exblog.jp/" target="_blank"><img src="/common/image/top_bnr03.jpg" alt=""/></a></li>
<!--<li><a href="/faq/"><img src="/common/image/top_bnr04.jpg" alt=""/></a></li>
<li><a href="/login/"><img src="/common/image/top_bnr05.jpg" alt=""/></a></li>-->
</ul>
<!--/o_list01_in-->
<br class="clearfix">
</nav>
<!--/o_list01-->
</section>
<!--/other_area-->
<!--<section id="re_area">
<div class="md004">
<h3 class="head">採用情報</h3>
<p class="re_txt01">- プロジェクト紹介 -</p>
</div>
<ul class="bxslider">
  <li class="hover01 column"><a href="/en/recruit/sales/detail.php" class="first">
		<figure><img src="/en/common/image/re_sli01.jpg" alt=""/></figure>
		<span><i>REPORT 001</i>未界夢創</span> </a></li>
		<li class="hover01 column"><a href="/en/recruit/sales/detail02.php" class="first">
		<figure><img src="/en/common/image/re_sli02.jpg" alt=""/></figure>
		<span><i>REPORT 002</i>m / 現場リーダープロジェクト</span> </a></li>
		<li class="hover01 column"><a href="/en/recruit/sales/detail03.php" class="first">
		<figure><img src="/en/common/image/re_sli03.jpg" alt=""/></figure>
		<span><i>REPORT 003</i>m / ライン化プロジェクト</span> </a></li>
		
	
</ul>
</section>-->
<!--/re_area--> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="/en/common/js/import.js"></script>
<script src="/en/common/js/bootstrap.min.js"></script> 
<script src="/en/common/js/loadHtml.js"></script> 
<!--<link rel="stylesheet" type="text/css" href="/common/js/jquery.bxslider.min.css">-->
<?php echo '

<script src="/en/common/js/jquery.bxslider.min.js"></script>
<script>
$(function(){
	$(\'.slide_body\').bxSlider({
		slideWidth: 985,
		minSlides: 3,
		maxSlides: 3,
		moveSlides: 1,
		//startSlide: -1,
		slideMargin: 4
	});
	$(\'.slide_body02\').bxSlider({
		//slideWidth: 985,
		minSlides: 1,
		maxSlides: 1,
		moveSlides: 1,
		slideMargin:0
		});
	
		$(\'.bxslider\').bxSlider({
  mode: \'horizontal\',
	infiniteLoop: true,
	hideControlOnEnd: true,
	pager: false,
	auto: true,
	speed: 2000,
  captions:false
});
	});
$(window).on(\'load resize\', function(){
	var h001 = $(".slide_all .slide img").height();
	$(\'.slide_all\').css({
	\'height\':h001 + 6});

});
</script>
<script>
$(function() {
    $("#tab li").click(function() {
        var num = $("#tab li").index(this);
        $(".content_wrap").hide();
        $(".content_wrap").eq(num).fadeIn(500);
        $("#tab li").removeClass(\'select\');
        $(this).addClass(\'select\');
    });
});
$(function() {
    $("#nn01 li.nn_in").click(function() {
        var num = $("#nn01 li.nn_in").index(this);
				
				$(".s01").hide();
        $(".s01").eq(num).fadeIn(500);
        $("#nn01 li.nn_in").removeClass(\'select\');
        $(this).addClass(\'select\');
    });
		$("#nn02 li.nn_in").click(function() {
        var num = $("#nn02 li.nn_in").index(this);
				
				$(".s02").hide();
        $(".s02").eq(num).fadeIn(500);
        $("#nn02 li.nn_in").removeClass(\'select\');
        $(this).addClass(\'select\');
    });
		$("#nn03 li.nn_in").click(function() {
        var num = $("#nn03 li.nn_in").index(this);
				
				$(".s03").hide();
        $(".s03").eq(num).fadeIn(500);
        $("#nn03 li.nn_in").removeClass(\'select\');
        $(this).addClass(\'select\');
    });
		$("#nn04 li.nn_in").click(function() {
        var num = $("#nn04 li.nn_in").index(this);
				
				$(".s04").hide();
        $(".s04").eq(num).fadeIn(500);
        $("#nn04 li.nn_in").removeClass(\'select\');
        $(this).addClass(\'select\');
    });
});

</script>
<script>
$(function() {
    $("#n_tab li").click(function() {
        var num = $("#n_tab li").index(this);
        $(".n_box001").hide();
        $(".n_box001").eq(num).fadeIn(500);
        $("#n_tab li").removeClass(\'select\');
        $(this).addClass(\'select\')
    });
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