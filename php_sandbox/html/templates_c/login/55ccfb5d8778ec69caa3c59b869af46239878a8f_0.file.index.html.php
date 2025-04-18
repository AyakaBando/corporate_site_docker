<?php
/* Smarty version 3.1.48, created on 2025-04-11 05:51:24
  from '/var/www/html/templates/login/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67f8addc987723_28665020',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55ccfb5d8778ec69caa3c59b869af46239878a8f' => 
    array (
      0 => '/var/www/html/templates/login/index.html',
      1 => 1719208801,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../common/header.html' => 1,
    'file:../common/footer.html' => 1,
  ),
),false)) {
function content_67f8addc987723_28665020 (Smarty_Internal_Template $_smarty_tpl) {
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
<title>会員ログイン | 森田アルミ工業</title>
<meta name="description" content="森田アルミ工業">
<meta name="Keywords" content="">
<meta property="og:title" content="会員ログイン | 森田アルミ工業">
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
		<h1>会員ログイン</h1>
	</div>
	<!--/md_area_in--> 
</section>
<!--/md_area-->


<article id="contents">
<nav id="pan">
<ul>
<li><a href="/">HOME</a></li>
<li><span>会員ログイン</span></li>
</ul>
<br class="clearfix">
</nav>
<!--/pan-->
	<div class="md002">
		<h2 class="head">ログイン</h2>
	</div>
	<!--/md002-->
	
	<section class="box">
	<p class="txt02 btm40">メールアドレス・パスワードを入力してログインしてください。</p>
	</section>
	<!--/box-->
	<section class="box">

       <?php if ($_smarty_tpl->tpl_vars['form']->value['errors']) {?>
       <div style="border:double 3px #ff0000;margin-bottom:10px;padding:8px;background-color:#ffffff;">
       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['form']->value['errors'], 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
       <span style="color:#000;">★</span><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
<br />
       <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
       </div>
       <?php }?>

<form<?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>
	<div class="ta01 btm30">
	<table class="btm20">
	<tbody>
		<tr>
			<th scope="row" class="w30">メールアドレス</th>
			<td>
<?php echo $_smarty_tpl->tpl_vars['form']->value['account']['html'];?>

								</td>
		</tr>
		<tr>
		<th scope="row">パスワード</th>
			<td>
<?php echo $_smarty_tpl->tpl_vars['form']->value['password']['html'];?>

								</td>
		</tr>
		
		
		
	</tbody>
</table>
<p class="right"><a href="/login/index_forget.php" class="red02">＞ パスワードを忘れた方はこちら</a></p>
	</div>
	<!--/ta01-->
	
		<nav class="btn_area">
			<ul>
			<li><?php echo $_smarty_tpl->tpl_vars['form']->value['submitReg']['html'];?>
</li>
			</ul>
			<ul>
			<li><a href="/member/" class="btn03">会員登録画面へ</a></li>
			</ul>
		</nav>
		<!--/btn_area-->
<?php echo $_smarty_tpl->tpl_vars['form']->value['hidden'];?>

		</form> 
	</section>
	<!--/box--> 
</article>
<!--/contents-->


<?php $_smarty_tpl->_subTemplateRender("file:../common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 src="/common/js/import.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="/common/js/bootstrap.min.js"><?php echo '</script'; ?>
> 
<!--<link rel="stylesheet" type="text/css" href="/common/js/jquery.bxslider.min.css">-->

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
