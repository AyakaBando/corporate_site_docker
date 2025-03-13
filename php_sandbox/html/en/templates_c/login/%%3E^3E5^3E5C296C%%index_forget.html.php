<?php /* Smarty version 2.6.19, created on 2015-07-15 18:21:49
         compiled from index_forget.html */ ?>
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
<link rel="stylesheet" type="text/css" href="/common/css/index.css">
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
		<h1>会員ログイン</h1>
	</div>
	<!--/md_area_in--> 
</section>
<!--/md_area-->


<article id="contents">
	<div class="md002">
		<h2 class="head">パスワードを忘れた方</h2>
	</div>
	<!--/md002-->
	
	<section class="box">
	<p class="txt02 btm40">ここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキスト</p>
	</section>
	<!--/box-->
	<section class="box">
<form<?php echo $this->_tpl_vars['form']['attributes']; ?>
>

       <?php if ($this->_tpl_vars['form']['errors']): ?>
       <div style="border:double 3px #ff0000;margin-bottom:10px;padding:8px;background-color:#ffffff;">
       <?php $_from = $this->_tpl_vars['form']['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
       <span style="color:#000;">★</span><?php echo $this->_tpl_vars['value']; ?>
<br />
       <?php endforeach; endif; unset($_from); ?>
       </div>
       <?php endif; ?>

	<div class="ta01 btm50">
	<table>
	<tbody>
		<tr>
			<th scope="row" class="w30">メールアドレス</th>
			<td>
 <?php echo $this->_tpl_vars['form']['eMail']['html']; ?>

								</td>
		</tr>
	</tbody>
</table>
	</div>
	<!--/ta01-->
	
		<nav class="btn_area">
			<ul>
			<li><?php echo $this->_tpl_vars['form']['submitReg']['html']; ?>
</li>
			</ul>
		</nav>
		<!--/btn_area-->
</form>
	</section>
	<!--/box--> 
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
<script>
$(window).on(\'load resize\', function(){
var h001 = $(\'header\').height();
$(\'#sp_menu\').css({
	\'top\':h001 + 10})
});
$(function(){
$(\'#menu\').on(\'click\', function(){
	$(\'#sp_menu\').slideToggle();
	});
	});
	$(function(){
$(\'.c_001 span\').on(\'click\', function(){
	$(this).next(\'ul\').slideToggle();
	$(this).toggleClass(\'c002\');
	});
	});
</script>
'; ?>

</body>
</html>