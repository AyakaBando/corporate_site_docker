<?php
/* Smarty version 3.1.48, created on 2025-04-16 08:22:47
  from '/var/www/html/templates/news/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67ff68d7e423e2_92152474',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbebaa26e0fe66a65c605607d44e4aad98a9e0c3' => 
    array (
      0 => '/var/www/html/templates/news/index.html',
      1 => 1744791765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../common/header.html' => 1,
    'file:../common/footer.html' => 1,
  ),
),false)) {
function content_67ff68d7e423e2_92152474 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html>
<head>
		
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5LB964JX"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	
	
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>ニュース | 森田アルミ工業</title>
<meta name="description" content="森田アルミ工業">
<meta name="Keywords" content="">
<meta property="og:title" content="ニュース | 森田アルミ工業">
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
<link rel="stylesheet" type="text/css" href="/common/css/contents.css">
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
		<h1>ニュース</h1>
	</div>
	<!--/md_area_in--> 
</section>
<!--/md_area-->


<article id="contents">
<nav id="pan">
<ul>
<li><a href="/">HOME</a></li>
<li><span>ニュース</span></li>
</ul>
<br class="clearfix">
</nav>
<!--/pan-->
	<div class="md002 n_md001">
		<h2 class="head">ニュース</h2>
	</div>
	<!--/md002-->
	
	<section class="box">
	<ul id="n_tab">
<li<?php if ($_GET['c'] == 1) {?> class="select"<?php }?>><a href="./?c=1">ニュース</a></li>
<li<?php if ($_GET['c'] == 2) {?> class="select"<?php }?>><a href="./?c=2">イベント</a></li>
<li<?php if ($_GET['c'] == 3) {?> class="select"<?php }?>><a href="./?c=3">製品情報</a></li>
<li<?php if ($_GET['c'] == 4) {?> class="select"<?php }?>><a href="./?c=4">採用情報</a></li>
</ul>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['whatsNewCategory']->value, 'cvalue', false, 'ckey', 'cresult', array (
  'first' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['cvalue']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ckey']->value => $_smarty_tpl->tpl_vars['cvalue']->value) {
$_smarty_tpl->tpl_vars['cvalue']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_cresult']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_cresult']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_cresult']->value['index'];
?>
<nav class="n_box001<?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_cresult']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_cresult']->value['first'] : null)) {?> disnon<?php }?>">
	<ul class="n_box001_in btm40">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'value', false, 'key', 'result', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
	<li><a href="<?php if ($_smarty_tpl->tpl_vars['value']->value['contentsCategory'] == 1) {
echo $_smarty_tpl->tpl_vars['value']->value['url'];
} elseif ($_smarty_tpl->tpl_vars['value']->value['contentsCategory'] == 2) {?>/upImage/whatsNew/<?php echo $_smarty_tpl->tpl_vars['value']->value['pdfFileName'];
} else { ?>./detail.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];
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
<div class="navi"><?php echo $_smarty_tpl->tpl_vars['pagerLinks']->value['pages'];?>
</div>
</nav>
<!--/-->
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

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
