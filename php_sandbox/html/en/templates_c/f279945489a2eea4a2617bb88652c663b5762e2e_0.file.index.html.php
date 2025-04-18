<?php
/* Smarty version 3.1.48, created on 2025-04-15 02:03:44
  from '/var/www/html/en/templates/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67fdbe80e53269_72675264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f279945489a2eea4a2617bb88652c663b5762e2e' => 
    array (
      0 => '/var/www/html/en/templates/index.html',
      1 => 1718758790,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/header.html' => 1,
    'file:./common/footer.html' => 1,
  ),
),false)) {
function content_67fdbe80e53269_72675264 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html>
<head>
	
		<!-- Google Tag Manager -->
<?php echo '<script'; ?>
>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WGZ5CQX');<?php echo '</script'; ?>
>
<!-- End Google Tag Manager -->
	
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
<!--[if lt IE 9]><?php echo '<script'; ?>
 src="/en/common/js/html5shiv.js"><?php echo '</script'; ?>
><![endif]-->
<link href="common/css/bootstrap.min.css" rel="stylesheet">
<link href="common/css/bootstrap-theme.min.css" rel="stylesheet">
<!--<link href='//fonts.googleapis.com/css?family=Vollkorn:400,400italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Amiri:400,400italic,700,700italic' rel='stylesheet' type='text/css'>-->
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

<?php $_smarty_tpl->_subTemplateRender("file:./common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container">
	<div class="slide_all">
		<div class="slide_wrap">
			<div class="slide_body">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['imgData']->value, 'value', false, 'key', 'result', array (
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
				<div class="slide"><?php if ($_smarty_tpl->tpl_vars['value']->value['imageAlt']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['value']->value['imageAlt'];?>
"><?php }?><img src="/upImage/topMainVisual/<?php echo $_smarty_tpl->tpl_vars['value']->value['fileName'];?>
"><?php if ($_smarty_tpl->tpl_vars['value']->value['imageAlt']) {?></a><?php }?></div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</div>
	</div>
	<!--sp-->
	<div class="slide_all02">
		<div class="slide_wrap">
			<div class="slide_body02">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['imgData']->value, 'value', false, 'key', 'result', array (
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
				<div class="slide"><?php if ($_smarty_tpl->tpl_vars['value']->value['imageAlt']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['value']->value['imageAlt'];?>
"><?php }?><img src="/upImage/topMainVisual/<?php echo $_smarty_tpl->tpl_vars['value']->value['fileName'];?>
"><?php if ($_smarty_tpl->tpl_vars['value']->value['imageAlt']) {?></a><?php }?></div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
		<li class="all select">All</li>
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
	<li>
	<a href="./product/detail.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
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
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
		<!-- moreボタン
		<?php if ($_smarty_tpl->tpl_vars['key']->value > 6) {?>
			<form>
				<div class="more">
					<input type="button" value="More" class="more_b" onclick="loadHtml( <?php echo $_smarty_tpl->tpl_vars['ckey']->value;?>
, this );">
				</div>
			</form>
			<?php }?>
		/moreここまで -->
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
<?php $_smarty_tpl->_assignInScope('i', 1);
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
if ($_smarty_tpl->tpl_vars['puroductData']->value[$_smarty_tpl->tpl_vars['ckey']->value]) {?>
<div class="s_box s01<?php if ($_smarty_tpl->tpl_vars['i']->value != 1) {?> disnon<?php }?>">
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
			<li>
				<a href="./product/detail.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
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
	<!--more-->
<?php if (count($_smarty_tpl->tpl_vars['puroductData']->value[$_smarty_tpl->tpl_vars['ckey']->value]) > 6) {?>
	<form>
	<div class="more">
	<input type="button" value="More" class="more_b" onclick="loadHtml( <?php echo $_smarty_tpl->tpl_vars['ckey']->value;?>
, this );">
	</div>
	</form>
	<!--/moreここまで-->
<?php }?>
</div>
<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<br class="clearfix">
</nav>

<nav class="content_wrap disnon">
<ul class="nn_list" id="nn03">
<?php $_smarty_tpl->_assignInScope('i', 1);
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

<?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
<br class="clearfix">

<?php $_smarty_tpl->_assignInScope('i', 1);
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
if ($_smarty_tpl->tpl_vars['puroductData']->value[$_smarty_tpl->tpl_vars['ckey']->value]) {?>
<div class="s_box s03<?php if ($_smarty_tpl->tpl_vars['i']->value != 1) {?> disnon<?php }?>">
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
	<li>
	<a href="./product/detail.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
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
<?php if (count($_smarty_tpl->tpl_vars['puroductData']->value[$_smarty_tpl->tpl_vars['ckey']->value]) > 6) {?>
	<form>
	<div class="more">
	<input type="button" value="More" class="more_b" onclick="loadHtml( <?php echo $_smarty_tpl->tpl_vars['ckey']->value;?>
, this );">
	</div>
	</form>
	<!--/moreここまで-->
<?php }?>
</div>
<!--/-->
<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

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


<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['whatsNewCategory']->value, 'nvalue', false, 'nkey', 'nresult', array (
  'first' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['nvalue']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['nkey']->value => $_smarty_tpl->tpl_vars['nvalue']->value) {
$_smarty_tpl->tpl_vars['nvalue']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_nresult']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_nresult']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_nresult']->value['index'];
?>
<nav class="n_box001<?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_nresult']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_nresult']->value['first'] : null)) {?> disnon<?php }?>">
	<ul class="n_box001_in">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['newsData']->value[$_smarty_tpl->tpl_vars['nkey']->value], 'value', false, 'key', 'result', array (
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
	<li><a href="<?php if ($_smarty_tpl->tpl_vars['value']->value['contentsCategory'] == 1) {
echo $_smarty_tpl->tpl_vars['value']->value['url'];
} elseif ($_smarty_tpl->tpl_vars['value']->value['contentsCategory'] == 2) {?>/upImage/whatsNew/<?php echo $_smarty_tpl->tpl_vars['value']->value['pdfFileName'];
} else { ?>./news/detail.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];
}?>"<?php if ($_smarty_tpl->tpl_vars['value']->value['contentsCategory'] <= 2) {?> target="_blank"<?php }?>>
	<time><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['dateTime'],"%Y/%m/%d");?>
</time>
	<p><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</p>
	</a></li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
	<!--/n_box_in-->
</nav>
<!--/-->
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



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
<p><img src="/en/common/image/co_image01+.jpg" alt=""/></p>
</div>
<!--/c_left-->
<div class="co_area_in">
<h4>
WE CREATE<br>
WHAT IS NOT IN THE WORLD</h4>
<p class="co_txt001">Bringing Forth Novelty.<br>
Our company is founded on the simple principle of creating timeless products that do not yet exist. Items of new, undiscovered worth that will bring happiness to the lives of our customers for decades, and even centuries to come. Pushing toward this grand vision is the obsession we are proud of bearing at Morita Aluminium Industry. </p>
<p class="right"><a href="/en/mind/"><img src="/common/image/read01.png" alt=""/></a></p>
</div>
<!--/co_area_in-->

</section>
<!--/co_area-->
<!-- <nav id="cate_list">
<ul class="clearfix">
<li><a href="/en/company/"><span class="name_ca">Corporate Data</span></a></li> -->
<!--<li><a href="/en/recruit/"><span class="name_ca">採用情報</span><span class="name_ca02">Recruit</span></a></li>-->
<!-- </ul>
</nav> -->
<!--/cate_list-->

<!------------- Links Section ------------->
<!-- <section id="other_area">
<div class="md003">
<h3 class="head">Links</h3>
</div>
<nav id="o_list01">
<ul id="o_list01_in">
<li><a href="http://www.architonic.com/pmfam/morita-aluminum/3104116/1" target="_blank"><img src="/common/image/architonic_en.jpg" alt=""/></a></li>
<li><a href="//www.facebook.com/moritaalumi" target="_blank"><img src="/common/image/top_bnr02.jpg" alt=""/></a></li>
<li><a href="//moritaalum.exblog.jp/" target="_blank"><img src="/common/image/top_bnr03.jpg" alt=""/></a></li>
!-----<li><a href="/faq/"><img src="/common/image/top_bnr04.jpg" alt=""/></a></li>
<li><a href="/login/"><img src="/common/image/top_bnr05.jpg" alt=""/></a></li>------
</ul>
!--/o_list01_in--
<br class="clearfix">
</nav>
--/o_list01--
</section> -->


<!-------------/other_area------------->
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
<?php $_smarty_tpl->_subTemplateRender("file:./common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 src="/en/common/js/import.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/en/common/js/bootstrap.min.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="/en/common/js/loadHtml.js"><?php echo '</script'; ?>
> 
<!--<link rel="stylesheet" type="text/css" href="/common/js/jquery.bxslider.min.css">-->


<?php echo '<script'; ?>
 src="/en/common/js/jquery.bxslider.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
$(function(){
	$('.slide_body').bxSlider({
		slideWidth: 985,
		minSlides: 3,
		maxSlides: 3,
		moveSlides: 1,
		//startSlide: -1,
		slideMargin: 4
	});
	$('.slide_body02').bxSlider({
		//slideWidth: 985,
		minSlides: 1,
		maxSlides: 1,
		moveSlides: 1,
		slideMargin:0
		});
	
		$('.bxslider').bxSlider({
  mode: 'horizontal',
	infiniteLoop: true,
	hideControlOnEnd: true,
	pager: false,
	auto: true,
	speed: 2000,
  captions:false
});
	});
$(window).on('load resize', function(){
	var h001 = $(".slide_all .slide img").height();
	$('.slide_all').css({
	'height':h001 + 6});

});
<?php echo '</script'; ?>
>
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
>
$(function() {
    $("#n_tab li").click(function() {
        var num = $("#n_tab li").index(this);
        $(".n_box001").hide();
        $(".n_box001").eq(num).fadeIn(500);
        $("#n_tab li").removeClass('select');
        $(this).addClass('select')
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
