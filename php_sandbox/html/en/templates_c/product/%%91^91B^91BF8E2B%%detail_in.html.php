<?php /* Smarty version 2.6.19, created on 2015-07-24 11:13:22
         compiled from detail_in.html */ ?>
<link rel="stylesheet" type="text/css" href="/common/css/reset-fonts.css">
<link rel="stylesheet" type="text/css" href="/common/css/reset-min.css">
<link rel="stylesheet" type="text/css" href="/common/css/comp.css">
<link rel="stylesheet" type="text/css" href="/common/css/contents.css">
<!--[if IE]><link rel="stylesheet" href="/common/css/fontsize_ie.css" media="all" /><![endif]-->
<!--[if lt IE 9]><script src="/common/js/html5shiv.js"></script><![endif]-->
<link href="/common/css/bootstrap.min.css" rel="stylesheet">
<link href="/common/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Rajdhani:400,300' rel='stylesheet' type='text/css'>
<head>
<?php if ($_GET['r'] == 1): ?>
<?php echo '

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script><script>
$(document).ready(function(){
    parent.$.fancybox.close();
});
</script>
'; ?>

<?php endif; ?>
</head>


<div class="pop_up">
<h5 class="head">レビューを編集</h5>

       <?php if ($this->_tpl_vars['form']['errors']): ?>
       <div style="border:double 3px #ff0000;margin-bottom:10px;background-color:#ffffff;padding:6px;">
       <?php $_from = $this->_tpl_vars['form']['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
       <?php echo $this->_tpl_vars['value']; ?>
<br />
       <?php endforeach; endif; unset($_from); ?>
       </div>
       <?php endif; ?>
<form action="./detail_in.php?id=<?php echo $_GET['id']; ?>
&rId=<?php echo $_GET['rId']; ?>
" method="post">

		<p class="btm5">評価</p>
		<p class="star">
		<select name="evaluation">
<option value="5" class="s_area"<?php if ($this->_tpl_vars['data']['evaluation'] == 5): ?> selected="selected"<?php endif; ?>>★★★★★</option>
<option value="4" class="s_area"<?php if ($this->_tpl_vars['data']['evaluation'] == 4): ?> selected="selected"<?php endif; ?>>★★★★</option>
<option value="3" class="s_area"<?php if ($this->_tpl_vars['data']['evaluation'] == 3): ?> selected="selected"<?php endif; ?>>★★★</option>
<option value="2" class="s_area"<?php if ($this->_tpl_vars['data']['evaluation'] == 2): ?> selected="selected"<?php endif; ?>>★★</option>
<option value="1" class="s_area"<?php if ($this->_tpl_vars['data']['evaluation'] == 1): ?> selected="selected"<?php endif; ?>>★</option>

</select>
</p>
<p class="btm5">タイトル</p>
<p class="title btm10">
<?php echo $this->_tpl_vars['form']['title']['html']; ?>

</p>
<p class="btm5">内容</p>
<p class="t_txt btm10">
<?php echo $this->_tpl_vars['form']['comment']['html']; ?>

</p>
<p class="btm15">※弊社で記事を確認するため、「編集するボタン」を押すと非表示になります。
弊社確認後、表示されます。ご了承ください。
</p>
<nav class="btn_area">
			<ul>
				<li><?php echo $this->_tpl_vars['form']['submitReg']['html']; ?>
</li>
			</ul>
		</nav>
		<!--/btn_area--> 
</form>
</div>
<!--/pop_up-->
