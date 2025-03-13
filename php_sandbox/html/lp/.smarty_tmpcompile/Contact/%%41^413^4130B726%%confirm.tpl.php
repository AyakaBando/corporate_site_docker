<?php /* Smarty version 2.6.14, created on 2014-02-06 12:12:09
         compiled from confirm.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja" dir="ltr">
<head profile="http://purl.org/net/uriprofile/">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="ja-JP">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=0" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" type="text/css" href="../shared/css/common.css" media="all">
<link rel="stylesheet" type="text/css" href="../shared/css/pc/reset.css" media="screen and (min-width: 641px)">
<link rel="stylesheet" type="text/css" href="../shared/css/pc/base.css" media="screen and (min-width: 641px)">
<link rel="stylesheet" type="text/css" href="../shared/css/pc/cms.css" media="screen and (min-width: 641px)">
<link rel="stylesheet" type="text/css" href="../shared/css/pc/dms.css" media="screen and (min-width: 641px)">
<link rel="stylesheet" type="text/css" href="../shared/css/pc/news.css" media="screen and (min-width: 641px)">
<link rel="stylesheet" type="text/css" href="../shared/css/pc/extends.css" media="screen and (min-width: 641px)">
<link rel="stylesheet" type="text/css" href="../shared/css/pc/contents.css" media="screen and (min-width: 641px)">
<link rel="stylesheet" type="text/css" href="../shared/css/pc/top.css" media="all">
<link rel="stylesheet" type="text/css" href="../shared/js/lytebox/lytebox.css" media="all">
<title>pid4M 室内物干しワイヤー / 森田アルミ工業</title>
<script type="text/javascript" src="../shared/js/respond.min.js"></script>
<script type="text/javascript" src="../shared/js/plugins.js"></script>
<script type="text/javascript" src="../shared/js/utils.js"></script>

</head>
<body id="pagetop" style="background: #faf8f2;">

<div id="CONTAINER" class="layout-container">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "././header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="body-container">
<div class="body">
<!-- Form Container -->
<div class="form-container">
<h2>ご入力内容確認</h2>
	<div class="section">
<h3>個人のお客様</h3>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
<?php $_from = $this->_tpl_vars['es']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['e']):
?>
<input type="hidden" name="<?php echo $this->_tpl_vars['e']->name; ?>
" value="<?php echo $this->_tpl_vars['e']->value; ?>
">
<?php endforeach; endif; unset($_from); ?>
<dl id="T_NAME">
<dt class="must">お名前</dt>
<dd class="must"><?php echo $this->_tpl_vars['es']['NAME']->value; ?>
</dd>
</dl>

<dl id="T_MAIL">
<dt class="must">メールアドレス</dt>
<dd class="must"><?php echo $this->_tpl_vars['es']['MAIL']->value; ?>
</dd>
</dl>

<div class="submit"><input type="hidden" name="ACTION" value="SEND"><input type="submit" class="prev" onclick="javascript:history.back();return false;"  name="PREV" value="編集画面へもどる" alt="編集画面へもどる"><input type="submit" name="SEND" value="カタログダウンロードへ"></div>
</form>
</div>

<!-- /Form Container -->
</div>
<div class="local-container">


<!-- Common section -->
<div class="category-common-section">
<div class="cms-wrapper">
</div>
</div>
<div class="cms-wrapper">
</div>
<!-- / Common section -->

</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>

</body>
</html>