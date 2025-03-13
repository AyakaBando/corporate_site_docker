<?php /* Smarty version 2.6.19, created on 2015-08-11 08:11:03
         compiled from detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'detail.html', 81, false),)), $this); ?>
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
<link rel="stylesheet" type="text/css" href="/common/css/reset-fonts.css">
<link rel="stylesheet" type="text/css" href="/common/css/reset-min.css">
<link rel="stylesheet" type="text/css" href="/common/css/comp.css">
<!--[if IE]><link rel="stylesheet" href="/common/css/fontsize_ie.css" media="all" /><![endif]-->
<!--[if lt IE 9]><script src="/common/js/html5shiv.js"></script><![endif]-->
<link href="/common/css/bootstrap.min.css" rel="stylesheet">
<link href="/common/css/bootstrap-theme.min.css" rel="stylesheet">
<!--<link href='http://fonts.googleapis.com/css?family=Vollkorn:400,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Amiri:400,400italic,700,700italic' rel='stylesheet' type='text/css'>-->
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Quicksand|Source+Sans+Pro:400,200,300' rel='stylesheet' type='text/css'>
</head>
<body>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../common/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<section id="md_area">
	<div id="md_area_in">
		<h1>FAQ</h1>
	</div>
	<!--/md_area_in--> 
</section>
<!--/md_area-->


<article id="contents">
<nav id="pan">
<ul>
<li><a href="">HOME</a></li>
<li><a href="">FAQ</a></li>
<li><span><?php echo $this->_tpl_vars['productData']['name']; ?>
</span></li>
</ul>
<br class="clearfix">
</nav>
<!--/pan-->
	<div class="md002">
		<h2 class="head"><?php echo $this->_tpl_vars['productData']['name']; ?>
</h2>
	</div>
	<!--/md002-->
	<nav id="q_cat">
		<ul>
<?php $_from = $this->_tpl_vars['data']['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
	<?php if ($this->_tpl_vars['data']['detail'][$this->_tpl_vars['key']]): ?>
			<li><a href="#T<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['value']['name']; ?>
</a></li>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
		</ul>
		<br class="clearfix">
		</nav>
		<!--/q_cat-->
<?php $_from = $this->_tpl_vars['data']['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cresult'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cresult']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ckey'] => $this->_tpl_vars['cvalue']):
        $this->_foreach['cresult']['iteration']++;
?>
<?php if ($this->_tpl_vars['data']['detail'][$this->_tpl_vars['ckey']]): ?>
	<section class="box">
		<hr class="kai001" id="T<?php echo $this->_tpl_vars['ckey']; ?>
">
		<div class="md003">
			<h3 class="head"><?php echo $this->_tpl_vars['cvalue']['name']; ?>
</h3>
		</div>
		<!--/md003-->

	<nav class="faq_list">
		<ul class="f_box faq_in">
	<?php $_from = $this->_tpl_vars['data']['detail'][$this->_tpl_vars['ckey']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
			<li class="f_in01">
				<div class="f_md">
					<h4><?php echo $this->_tpl_vars['value']['title']; ?>
</h4>
					<span class="f_icon"></span>
					<time><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['dateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</time>
				</div>
				<!--/f_md-->
				<div class="a_box">
					<div class="a_box_in">
						<?php echo $this->_tpl_vars['value']['comment']; ?>

						
					</div>
					<!--a_box_in--> 
				</div>
				<!--/a_box--> 
			</li>
	<?php endforeach; endif; unset($_from); ?>

			<!--/f_in01-->
		</ul>
	</nav>
	<!--/faq_list-->
	</section>
<?php endif; ?>
	<!--/faq-->
<?php endforeach; endif; unset($_from); ?>
	<!--/faq-->
</article>
<!--/contents-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../common/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="/common/js/import.js"></script> 
<script src="/common/js/bootstrap.min.js"></script> 
<!--<link rel="stylesheet" type="text/css" href="/common/js/jquery.bxslider.min.css">-->
<?php echo '

'; ?>


</body>
</html>