<?php /* Smarty version 2.6.19, created on 2015-08-10 14:41:42
         compiled from thanks.html */ ?>
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
		<h1>会員ログイン</h1>
	</div>
	<!--/md_area_in--> 
</section>
<!--/md_area-->


<article id="contents">
	<div class="md002">
		<h2 class="head">会員登録完了</h2>
	</div>
	<!--/md002-->
	
	<section class="box">
	<p class="txt02 btm40">会員登録が完了しました。登録いただいたメールアドレスに会員登録完了のメールを送信しました。<br>
ご登録ありがとうございました。 </p>
	
	
		<nav class="btn_area">
			<ul>
			<!--<li><a href="/" class="btn02">TOPページへ</a></li>-->
			<?php if ($_GET['id']): ?><li><a href="/product/detail.php?id=<?php echo $_GET['id']; ?>
" class="btn02">製品ダウンロード箇所へ</a></li><?php endif; ?>
			<li><a href="/login/" class="btn01">ログインページへ</a></li>
			</ul>
		</nav>
		<!--/btn_area-->
	
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

'; ?>

</body>
</html>