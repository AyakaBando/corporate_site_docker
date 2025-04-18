<?php
/* Smarty version 3.1.48, created on 2025-04-15 02:41:10
  from '/var/www/html/templates/product/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67fdc7461fe508_43576811',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f343b5817981fa50d83c74d675219a3609bbb2a5' => 
    array (
      0 => '/var/www/html/templates/product/index.html',
      1 => 1740960059,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../common/header.html' => 1,
    'file:../common/footer.html' => 1,
  ),
),false)) {
function content_67fdc7461fe508_43576811 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
		
<!-- Google Tag Manager -->
<?php echo '<script'; ?>
>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5LB964JX');<?php echo '</script'; ?>
>
	<!-- End Google Tag Manager -->
	
	
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>製品情報 | 森田アルミ工業</title>
<meta name="description" content="森田アルミ工業">
<meta name="Keywords" content="">
<meta property="og:title" content="製品情報 | 森田アルミ工業">
<meta property="og:type" content="website">
<meta property="og:description" content="森田アルミ工業">
<meta property="og:image" content="">
<meta property="og:site_name" content="森田アルミ工業">
<link rel="shortcut icon" href="/image/icon/favicon.ico">
<link rel="apple-touch-icon" href="/image/icon/ios.png"/>
<link rel="icon" href="/image/icon/ios.png">
<link rel="stylesheet" type="text/css" href="/common/css/reset-fonts.css">
<link rel="stylesheet" type="text/css" href="/common/css/reset-min.css">
<link rel="stylesheet" type="text/css" href="/common/css/comp.css">
<link rel="stylesheet" type="text/css" href="/common/css/index.css">
<!--[if IE]><link rel="stylesheet" href="/common/css/fontsize_ie.css" media="all" /><![endif]-->
<!--[if lt IE 9]><?php echo '<script'; ?>
 src="/common/js/html5shiv.js"><?php echo '</script'; ?>
><![endif]-->
<link href="/common/css/bootstrap.min.css" rel="stylesheet">
<link href="/common/css/bootstrap-theme.min.css" rel="stylesheet">

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Quicksand|Source+Sans+Pro:400,200,300' rel='stylesheet' type='text/css'>
		
	<?php echo '<script'; ?>
>
(function (w, d, s, u) {
  // TAG VERSION 1.00
  if (w._wsq_init_flg) {
    return false;
  }
  w._wsq_init_flg = true;
  _wsq = w._wsq || (_wsq = []);
  _wsq.push(['init', u, 2060]);
  _wsq.push(['domain', 'www.moritaalumi.co.jp']);
  var a = d.createElement(s); a.async = 1; a.charset='UTF-8'; a.src = 'https://cdn.' + u + '/share/js/tracking.js';
  var b = d.getElementsByTagName(s)[0]; b.parentNode.insertBefore(a, b);
})(window, document, 'script', 'tetori.link');
<?php echo '</script'; ?>
>
	
</head>
<body>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5LB964JX"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	
<?php $_smarty_tpl->_subTemplateRender("file:../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<section id="md_area">
	<div id="md_area_in">
		<h1>製品情報</h1>
	</div>
	<!--/md_area_in--> 
</section>
<!--/md_area-->


<article id="contents">
<nav id="pan">
<ul>
<li><a href="/">HOME</a></li>
<li><a href="/product/">製品情報</a></li>
<li><span>製品検索</span></li>
</ul>
<br class="clearfix">
</nav>
<!--/pan-->
	<div class="md002">
		<h2 class="head">製品検索</h2>
	</div>

	<!--/md002-->
	<section id="search" class="btm40">
		<ul id="tab">
			<li class="all select">すべて表示</li>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productCategoryArray']->value, 'value', false, 'key', 'result', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index'];
?>
	<!--<li<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['first'] : null)) {?> class="select"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</li>-->
			<li><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
	
		<nav class="content_wrap">
	<div class="s_box s04">
	<ul style="display:flex; flex-wrap:wrap;">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value', false, 'key', 'result', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index'];
?>
				<!-- Not displaying id=61 -->
				<?php if ($_smarty_tpl->tpl_vars['value']->value['id'] != 61) {?>
		<li>
		<a href="./detail.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
			<?php if ($_smarty_tpl->tpl_vars['imgArray']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['fileName']) {?>
			<p class="pl_ph"><img src="/upImage/product/<?php echo $_smarty_tpl->tpl_vars['imgArray']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['fileName'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
Image"/></p>
			<?php }?>
			<h5><?php echo $_smarty_tpl->tpl_vars['value']->value['subName'];?>
</h5>
			<p class="s_title"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</p>
		</a>
		</li>
		<?php }?>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
	</div>
	<!--/-->
	
	
	
	<br class="clearfix">
	</nav>
	<nav class="content_wrap disnon">
		<ul class="nn_list" id="nn01">
			<?php $_smarty_tpl->_assignInScope('i', 1);?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['middleCategory']->value[1], 'value', false, 'key', 'result', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index'];
?>
	
			<?php if ($_smarty_tpl->tpl_vars['puroductData']->value[$_smarty_tpl->tpl_vars['key']->value]) {?>
			<li class="nn_in<?php if ($_smarty_tpl->tpl_vars['i']->value == 1) {?> select<?php }?>"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</li>
			<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
	
			<?php }?>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	
		</ul>
		<br class="clearfix">
		<?php $_smarty_tpl->_assignInScope('i', 1);?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['middleCategory']->value[1], 'cvalue', false, 'ckey', 'result', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['cvalue']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ckey']->value => $_smarty_tpl->tpl_vars['cvalue']->value) {
$_smarty_tpl->tpl_vars['cvalue']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index'];
?>
		<?php if ($_smarty_tpl->tpl_vars['puroductData']->value[$_smarty_tpl->tpl_vars['ckey']->value]) {?>
		<div class="s_box s01<?php if ($_smarty_tpl->tpl_vars['i']->value != 1) {?> disnon<?php }?>">
			<ul id="productBox<?php echo $_smarty_tpl->tpl_vars['ckey']->value;?>
" style="display: flex; flex-wrap: wrap;">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['puroductData']->value[$_smarty_tpl->tpl_vars['ckey']->value], 'value', false, 'key', 'result', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index'];
?>
					<!-- Not displaying id=61 -->
					<?php if ($_smarty_tpl->tpl_vars['value']->value['id'] != 61) {?>
						<li>
							<a href="./detail.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
								<?php if ($_smarty_tpl->tpl_vars['imgArray']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['fileName']) {?>
								<p class="pl_ph"><img src="/upImage/product/<?php echo $_smarty_tpl->tpl_vars['imgArray']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['fileName'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
Image"/></p>
								<?php }?>
								<h5><?php echo $_smarty_tpl->tpl_vars['value']->value['subName'];?>
</h5>
								<p class="s_title"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</p>
							</a>
						</li>
					<?php }?>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ul>
		</div>
		<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
		<?php }?>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		<br class="clearfix">
	</nav>


	<nav class="content_wrap disnon content_exterior">
	<ul class="nn_list" id="nn02" style="display: none;">
	<?php $_smarty_tpl->_assignInScope('i', 1);?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['middleCategory']->value[2], 'value', false, 'key', 'result', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index'];
?>
	
	<?php if ($_smarty_tpl->tpl_vars['puroductData']->value[$_smarty_tpl->tpl_vars['key']->value]) {?>
	<li class="nn_in<?php if ($_smarty_tpl->tpl_vars['i']->value == 1) {?> select<?php }?>"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</li>
	<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
	
	<?php }?>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
	<br class="clearfix">
	
	<?php $_smarty_tpl->_assignInScope('i', 1);?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['middleCategory']->value[2], 'cvalue', false, 'ckey', 'result', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['cvalue']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ckey']->value => $_smarty_tpl->tpl_vars['cvalue']->value) {
$_smarty_tpl->tpl_vars['cvalue']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index'];
?>
	<?php if ($_smarty_tpl->tpl_vars['puroductData']->value[$_smarty_tpl->tpl_vars['ckey']->value]) {?>
	<div class="s_box s02<?php if ($_smarty_tpl->tpl_vars['i']->value != 1) {?> disnon<?php }?>">
	<ul id="productBox<?php echo $_smarty_tpl->tpl_vars['ckey']->value;?>
">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['puroductData']->value[$_smarty_tpl->tpl_vars['ckey']->value], 'value', false, 'key', 'result', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index'];
?>
		<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['iteration'] : null) <= 6) {?>
				<!-- Not displaying id=61 -->
				<?php if ($_smarty_tpl->tpl_vars['value']->value['id'] != 61) {?>
		<li>
		<a href="./detail.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
			<?php if ($_smarty_tpl->tpl_vars['imgArray']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['fileName']) {?>
			<p class="pl_ph"><img src="/upImage/product/<?php echo $_smarty_tpl->tpl_vars['imgArray']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['fileName'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
Image"/></p>
			<?php }?>
			<h5><?php echo $_smarty_tpl->tpl_vars['value']->value['subName'];?>
</h5>
			<p class="s_title"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</p>
		</a>
		</li>
		<?php }?>
		<?php }?>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
	</div>

	<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
	<?php }?>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

	<br class="clearfix">
	
			<!-- Banner -->
			<section id="other_area_ex">
				<nav id="o_list01">
					<ul id="o_list01_in">
						<li class="first">
						<a href="https://ma.moritaalumi.co.jp/exterior-distributor-list">
							<img src="/common/image/exterior-distributor-list.jpg">
						</a>
						</li>
			
						<li class="even">
							<a href="https://www.instagram.com/moritaalumi_ex/?igshid=OGQ5ZDc2ODk2ZA%3D%3D">
								<img src="/common/image/insta_bnr001.jpg">
							</a>
							</li>	
					</ul>
				</nav>
			</section>
			<!-- Banner -->
	</nav>


	
	
	<nav class="content_wrap disnon">
	<ul class="nn_list" id="nn03">
	<?php $_smarty_tpl->_assignInScope('i', 1);?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['middleCategory']->value[3], 'value', false, 'key', 'result', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index'];
?>
	
	<?php if ($_smarty_tpl->tpl_vars['puroductData']->value[$_smarty_tpl->tpl_vars['key']->value]) {?>
	<li class="nn_in<?php if ($_smarty_tpl->tpl_vars['i']->value == 1) {?> select<?php }?>"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</li>
	<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
	
	<?php }?>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
	<br class="clearfix">
	
	<?php $_smarty_tpl->_assignInScope('i', 1);?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['middleCategory']->value[3], 'cvalue', false, 'ckey', 'result', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['cvalue']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ckey']->value => $_smarty_tpl->tpl_vars['cvalue']->value) {
$_smarty_tpl->tpl_vars['cvalue']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index'];
?>
	<?php if ($_smarty_tpl->tpl_vars['puroductData']->value[$_smarty_tpl->tpl_vars['ckey']->value]) {?>
	<div class="s_box s03<?php if ($_smarty_tpl->tpl_vars['i']->value != 1) {?> disnon<?php }?>">
	<ul id="productBox<?php echo $_smarty_tpl->tpl_vars['ckey']->value;?>
" style="display: flex; flex-wrap: wrap;">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['puroductData']->value[$_smarty_tpl->tpl_vars['ckey']->value], 'value', false, 'key', 'result', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_result']->value['index'];
?>
				<!-- Not displaying id=61 -->
				<?php if ($_smarty_tpl->tpl_vars['value']->value['id'] != 61) {?>
		<li>
		<a href="./detail.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
			<?php if ($_smarty_tpl->tpl_vars['imgArray']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['fileName']) {?>
			<p class="pl_ph"><img src="/upImage/product/<?php echo $_smarty_tpl->tpl_vars['imgArray']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['fileName'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
Image"/></p>
			<?php }?>
			<h5><?php echo $_smarty_tpl->tpl_vars['value']->value['subName'];?>
</h5>
			<p class="s_title"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</p>
		</a>
		</li>
		<?php }?>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
	</div>
	<!--/-->
	<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>

	<?php }?>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	
	<br class="clearfix">
	</nav>
	<!--/search-->
</article>
<!--/contents-->

<?php $_smarty_tpl->_subTemplateRender("file:../common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 src="/common/js/import.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="/common/js/bootstrap.min.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="/common/js/loadHtml.js"><?php echo '</script'; ?>
> 
<!--<link rel="stylesheet" type="text/css" href="/common/js/jquery.bxslider.min.css">-->



<?php echo '<script'; ?>
>
$(function() {
    $("#tab li").click(function() {
        var num = $("#tab li").index(this);
        $(".content_wrap").hide();
        $(".content_wrap").eq(num).fadeIn(500);
        $("#tab li").removeClass('select');
        $(this).addClass('select');
    });
});
$(function() {
	
    $("#nn01 li.nn_in").click(function() {
        var num = $("#nn01 li.nn_in").index(this);
				
				$(".s01").hide();
        $(".s01").eq(num).fadeIn(500);
        $("#nn01 li.nn_in").removeClass('select');
        $(this).addClass('select');
    });
		$("#nn02 li.nn_in").click(function() {
        var num = $("#nn02 li.nn_in").index(this);
				
				$(".s02").hide();
        $(".s02").eq(num).fadeIn(500);
        $("#nn02 li.nn_in").removeClass('select');
        $(this).addClass('select');
    });
		$("#nn03 li.nn_in").click(function() {
        var num = $("#nn03 li.nn_in").index(this);
				
				$(".s03").hide();
        $(".s03").eq(num).fadeIn(500);
        $("#nn03 li.nn_in").removeClass('select');
        $(this).addClass('select');
    });
		$("#nn04 li.nn_in").click(function() {
        var num = $("#nn04 li.nn_in").index(this);
				
				$(".s04").hide();
        $(".s04").eq(num).fadeIn(500);
        $("#nn04 li.nn_in").removeClass('select');
        $(this).addClass('select');
    });
});

<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type='text/javascript'>
piAId = '1049092';
piCId = '2117';
piHostname = 'ma.moritaalumi.co.jp';

(function() {
	function async_load(){
		var s = document.createElement('script'); s.type = 'text/javascript';
		s.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + piHostname + '/pd.js';
		var c = document.getElementsByTagName('script')[0]; c.parentNode.insertBefore(s, c);
	}
	if(window.attachEvent) { window.attachEvent('onload', async_load); }
	else { window.addEventListener('load', async_load, false); }
})();
<?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
