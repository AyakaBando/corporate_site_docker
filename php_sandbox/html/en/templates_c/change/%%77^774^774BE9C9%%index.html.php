<?php /* Smarty version 2.6.19, created on 2015-08-11 16:16:39
         compiled from index.html */ ?>
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
		<h1>会員情報変更</h1>
	</div>
	<!--/md_area_in--> 
</section>
<!--/md_area-->


<article id="contents">
	<div class="md002">
		<h2 class="head">会員情報変更</h2>
	</div>
	<!--/md002-->
	<form<?php echo $this->_tpl_vars['form']['attributes']; ?>
>
	<section class="box">
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
			<th scope="row" class="w30">会社名<span class="f10">※</span></th>
			<td>
<?php echo $this->_tpl_vars['form']['companyName']['html']; ?>

<?php if (! $this->_tpl_vars['flg']): ?>
								<p class=" f10_2">例）株式会社○○ &nbsp;※全角文字でご入力ください</p>
<?php endif; ?>
			</td>
		</tr>
		<tr>
		<th scope="row">お名前<span class="f10">※</span></th>
			<td>
<?php echo $this->_tpl_vars['form']['name']['html']; ?>

<?php if (! $this->_tpl_vars['flg']): ?>
								<p class=" f10_2">例）○○ ○○ &nbsp;※全角文字でご入力ください</p>
<?php endif; ?>
			</td>
		</tr>
		
		<tr>
			<th scope="row">ご担当者ご職業<span class="f10">※</span></th>
			<td>
<?php echo $this->_tpl_vars['form']['job']['html']; ?>

			</td>
		</tr>
		<tr>
			<th scope="row">メールアドレス<span class="f10">※</span></th>
			<td>
<?php echo $this->_tpl_vars['form']['eMail']['html']; ?>

<?php if (! $this->_tpl_vars['flg']): ?>
								<p class=" f10_2">例）○○○ &nbsp;※半角文字でご入力ください</p>
<?php endif; ?>
			</td>
		</tr>
		<tr>
			<th scope="row">確認用メールアドレス<span class="f10">※</span></th>
			<td>
<?php echo $this->_tpl_vars['form']['eMailConf']['html']; ?>

<?php if (! $this->_tpl_vars['flg']): ?>
								<p class=" f10_2">例）○○○ &nbsp;※半角文字でご入力ください</p>
<?php endif; ?>
			</td>
		</tr>
		<tr>
			<th scope="row">パスワード入力<span class="f10">※</span></th>
			<td>
<?php echo $this->_tpl_vars['form']['password']['html']; ?>

<?php if ($this->_tpl_vars['flg']): ?><input type="hidden" name="password" value="<?php echo $_POST['password']; ?>
" ><?php endif; ?>
<?php if (! $this->_tpl_vars['flg']): ?>
								<p class=" f10_2">例）○○○ &nbsp;※半角文字でご入力ください</p>
<?php endif; ?>
			</td>
		</tr>
		<tr>
			<th scope="row">確認用パスワード入力<span class="f10">※</span></th>
			<td>
<?php echo $this->_tpl_vars['form']['passwordConf']['html']; ?>

<?php if ($this->_tpl_vars['flg']): ?><input type="hidden" name="passwordConf" value="<?php echo $_POST['passwordConf']; ?>
" ><?php endif; ?>
<?php if (! $this->_tpl_vars['flg']): ?>
								<p class=" f10_2">例）○○○ &nbsp;※半角文字でご入力ください</p>
<?php endif; ?>
			</td>
		</tr>
		<tr>
              <th>郵便番号<span class="f10">※</span></th>
              <td>
                <p class="b01">〒&nbsp;
                  <?php echo $this->_tpl_vars['form']['zip1']['html']; ?>

                  &nbsp;-&nbsp;
                  <?php echo $this->_tpl_vars['form']['zip2']['html']; ?>

                 </p></td>
            </tr>
						<tr>
              <th>住所<span class="f10">※</span></th>
              <td>
                <p class="btm10">
<?php echo $this->_tpl_vars['form']['pref']['html']; ?>

                </p>
                <p>
<?php echo $this->_tpl_vars['form']['address1']['html']; ?>

                </p>
<?php if (! $this->_tpl_vars['flg']): ?>
                <p class=" f10_2 btm5">市区町村名 (例：千代田区神田神保町)</p>
<?php endif; ?>
                <p>
<?php echo $this->_tpl_vars['form']['address2']['html']; ?>

                </p>
<?php if (! $this->_tpl_vars['flg']): ?>
                <p class=" f10_2">番地・ビル名 (例：1-3-5)</p>
<?php endif; ?>
                </td>
            </tr>
						<tr>
              <th>電話番号<span class="f10">※</span></th>
              <td>
                <p class="b01 btm5"><?php echo $this->_tpl_vars['form']['tel1']['html']; ?>
&nbsp;-&nbsp;<?php echo $this->_tpl_vars['form']['tel2']['html']; ?>
-&nbsp;<?php echo $this->_tpl_vars['form']['tel3']['html']; ?>

                 </p>
<?php if (! $this->_tpl_vars['flg']): ?>
								 <p class=" f10_2">例）○○○ &nbsp;※半角文字でご入力ください</p>
<?php endif; ?>
				</td>
            </tr>
						<tr>
              <th>FAX番号<span class="f10">※</span></th>
              <td>
                <p class="b01 btm5"><?php echo $this->_tpl_vars['form']['fax1']['html']; ?>
&nbsp;-&nbsp;<?php echo $this->_tpl_vars['form']['fax2']['html']; ?>
-&nbsp;<?php echo $this->_tpl_vars['form']['fax3']['html']; ?>

                 </p>
<?php if (! $this->_tpl_vars['flg']): ?>
								 <p class=" f10_2">例）○○○ &nbsp;※半角文字でご入力ください</p>
<?php endif; ?>
			  </td>
            </tr>
						<tr>
			<th scope="row">御社URL<span class="f10">※</span></th>
			<td>
<?php echo $this->_tpl_vars['form']['siteUrl']['html']; ?>

<?php if (! $this->_tpl_vars['flg']): ?>
								<p class=" f10_2">例）○○○ &nbsp;※半角文字でご入力ください</p>
<?php endif; ?>
			</td>
		</tr>
		
		
	</tbody>
</table>
	</div>
	<!--/ta01-->
	
		<nav class="btn_area">
			<ul>
		<?php if (! $this->_tpl_vars['flg']): ?>
			<li><?php echo $this->_tpl_vars['form']['reset']['html']; ?>
</li>
			<li><?php echo $this->_tpl_vars['form']['submitConf']['html']; ?>
</li>
		<?php else: ?>
			<li><?php echo $this->_tpl_vars['form']['submitReturn']['html']; ?>
</li>
			<li><?php echo $this->_tpl_vars['form']['submitReg']['html']; ?>
</li>
		<?php endif; ?>
		<?php echo $this->_tpl_vars['form']['hidden']; ?>

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

'; ?>

</body>
</html>