<?php /* Smarty version 2.6.19, created on 2024-01-13 10:45:34
         compiled from detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'detail.html', 72, false),)), $this); ?>
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
<title><?php echo $this->_tpl_vars['data']['title']; ?>
 | News | Morita Aluminum Industry,inc.</title>
<meta name="description" content="Morita Aluminum Industry,inc.">
<meta name="Keywords" content="">
<meta property="og:title" content="<?php echo $this->_tpl_vars['data']['title']; ?>
 | News | Morita Aluminum Industry,inc.">
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
$this->_smarty_include(array('smarty_include_tpl_file' => "../common/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<section id="md_area">
	<div id="md_area_in">
		<h1>News</h1>
	</div>
	<!--/md_area_in--> 
</section>
<!--/md_area-->


<article id="contents">
	<div class="md002 btm50">
		<h2 class="head btm20"><?php echo $this->_tpl_vars['data']['title']; ?>
</h2>
		<p><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['dateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
<span class="n_cat"><?php echo $this->_tpl_vars['whatsNewCategory'][$this->_tpl_vars['data']['category']]; ?>
</span></p>
	</div>
	<!--/md002-->
	
	<section class="box">
	<div id="txt_area">
	<?php echo $this->_tpl_vars['data']['comment']; ?>

		</div>
		<!--/txt_area--> 
	<nav id="b_list002">
		<ul>
		<?php if ($this->_tpl_vars['page']['bageID']): ?><li class="bef"><a href="./detail.php?id=<?php echo $this->_tpl_vars['page']['bageID']; ?>
">前の記事を見る</a></li><?php endif; ?><li class="r_list"><a href="./?c=<?php echo $this->_tpl_vars['data']['category']; ?>
">一覧へ戻る</a></li><?php if ($this->_tpl_vars['page']['nextID']): ?><li class="next"><a href="./detail.php?id=<?php echo $this->_tpl_vars['page']['nextID']; ?>
">次の記事を見る</a></li><?php endif; ?>
		</ul>
	</nav>
	<!--/b_list002--> 
	</section>
	<!--/box-->
</article>
<!--/contents-->



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../common/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="/en/common/js/import.js"></script> 
<script src="/en/common/js/bootstrap.min.js"></script> 
<!--<link rel="stylesheet" type="text/css" href="/common/js/jquery.bxslider.min.css">-->
<?php echo '

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