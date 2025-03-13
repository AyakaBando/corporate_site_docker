<?php /* Smarty version 2.6.19, created on 2024-01-09 16:56:56
         compiled from index.html */ ?>
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
<title>Product | Morita Aluminum Industry,inc.</title>
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
		<h1>Product Search</h1>
	</div>
	<!--/md_area_in--> 
</section>
<!--/md_area-->


<article id="contents">
<nav id="pan">
<ul>
<li><a href="">HOME</a></li>
<li><a href="">Product</a></li>
<li><span>Product Search</span></li>
</ul>
<br class="clearfix">
</nav>
<!--/pan-->
	<div class="md002">
		<h2 class="head">Product Search</h2>
	</div>
	<!--/md002-->
	<section id="search">
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
<ul>
	<?php $_from = $this->_tpl_vars['puroductData'][$this->_tpl_vars['ckey']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
	<li>
	<a href="./detail.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
">
		<?php if ($this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']): ?>
		<p class="pl_ph"><img src="/upImage/product/<?php echo $this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']; ?>
" alt="<?php echo $this->_tpl_vars['value']['name']; ?>
Image"/></p>
		<?php endif; ?>		<h5><?php echo $this->_tpl_vars['value']['subName']; ?>
</h5>
		<p class="s_title"><?php echo $this->_tpl_vars['value']['name']; ?>
</p>
	</a>
	</li>
	<?php endforeach; endif; unset($_from); ?>
</ul>
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
<?php $_from = $this->_tpl_vars['middleCategory']['2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cresult'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cresult']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ckey'] => $this->_tpl_vars['cvalue']):
        $this->_foreach['cresult']['iteration']++;
?>
<?php if ($this->_tpl_vars['puroductData'][$this->_tpl_vars['ckey']]): ?>
<div class="s_box s02<?php if ($this->_tpl_vars['i'] != 1): ?> disnon<?php endif; ?>">
<ul>
	<?php $_from = $this->_tpl_vars['puroductData'][$this->_tpl_vars['ckey']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
	<li>
	<a href="./detail.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
">
		<?php if ($this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']): ?>
		<p class="pl_ph"><img src="/upImage/product/<?php echo $this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']; ?>
" alt="<?php echo $this->_tpl_vars['value']['name']; ?>
Image"/></p>
		<?php endif; ?>		<h5><?php echo $this->_tpl_vars['value']['subName']; ?>
</h5>
		<p class="s_title"><?php echo $this->_tpl_vars['value']['name']; ?>
</p>
	</a>
	</li>
	<?php endforeach; endif; unset($_from); ?>
</ul>
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
<?php $_from = $this->_tpl_vars['middleCategory']['3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cresult'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cresult']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ckey'] => $this->_tpl_vars['cvalue']):
        $this->_foreach['cresult']['iteration']++;
?>
<?php if ($this->_tpl_vars['puroductData'][$this->_tpl_vars['ckey']]): ?>
<div class="s_box s03<?php if ($this->_tpl_vars['i'] != 1): ?> disnon<?php endif; ?>">
<ul>
	<?php $_from = $this->_tpl_vars['puroductData'][$this->_tpl_vars['ckey']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
	<li>
	<a href="./detail.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
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
	<a href="./detail.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
">
		<?php if ($this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']): ?>
		<p class="pl_ph"><img src="/upImage/product/<?php echo $this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']; ?>
" alt="<?php echo $this->_tpl_vars['value']['name']; ?>
Image"/></p>
		<?php endif; ?>		<h5><?php echo $this->_tpl_vars['value']['subName']; ?>
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

<style>
/*.select {
	  background: yellow;
	}*/
	
</style>
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