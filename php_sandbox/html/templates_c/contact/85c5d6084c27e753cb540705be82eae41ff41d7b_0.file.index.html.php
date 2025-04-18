<?php
/* Smarty version 3.1.48, created on 2025-04-15 07:12:55
  from '/var/www/html/templates/contact/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67fe06f70b77e0_03020760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85c5d6084c27e753cb540705be82eae41ff41d7b' => 
    array (
      0 => '/var/www/html/templates/contact/index.html',
      1 => 1719208681,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../common/header.html' => 1,
    'file:../common/footer.html' => 1,
  ),
),false)) {
function content_67fe06f70b77e0_03020760 (Smarty_Internal_Template $_smarty_tpl) {
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
  <title>お問合せ | 森田アルミ工業</title>
  <meta name="description" content="森田アルミ工業">
  <meta name="Keywords" content="">
  <meta property="og:title" content="森田アルミ工業">
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
  <link rel="stylesheet" type="text/css" href="uniq.css">
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
    <h1>お問合せ</h1>
  </div>
  <!--/md_area_in-->
</section>
<!--/md_area-->

<article id="contents" class="privacy">
  <nav id="pan">
    <ul>
      <li><a href="/index.php">HOME</a></li>
      <li><span>お問合せ</span></li>
    </ul>
    <br class="clearfix">
  </nav>
  <!--/pan-->

  <div class="md002">
    <h2 class="head">お問合せフォーム</h2>
  </div>
  <!--/md002-->
  <?php if (!$_POST) {?>
  <section class="box">
    <p class="txt02 btm10">この度は、当ホームページをご覧いただき、誠にありがとうございます。</p>
    <p class="txt02 btm20">製品カタログをご希望の場合は、<a href="/product/" class="link_a001">各製品ページ</a>よりPDF形式でダウンロードしていただくか<br>
      こちらの<a href="/catalog/" class="link_a001">「カタログ請求フォーム」</a>よりお申し込みください。<br>
    </p>
  </section>
  <?php }?>
  <!--/box-->
  <section class="box">
    <form<?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>
    <div class="ta01 btm50">

      <?php if ($_smarty_tpl->tpl_vars['form']->value['errors']) {?>
      <div style="border:double 3px #ff0000;margin-bottom:10px;background-color:#ffffff;padding:6px;">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['form']->value['errors'], 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
        <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
<br />
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
      <?php }?>

      <table>
        <tbody>
          <tr>
            <th style="border: none; background: #fff;">
              <p class="form_required" style="text-align:center;">※は必須項目です。</p>
            </th>
          </tr>
        <tr>
          <th style="border-top: solid 1px #ddd;">ご質問・お問合せ内容<span class="f10">※</span></th>
          <td style="border-top: solid 1px #ddd;">
            <p class="b01 btm5"><?php echo $_smarty_tpl->tpl_vars['form']->value['comment']['html'];?>
</p></td>
        </tr>
        <tr>
          <th scope="row" class="w30">会社名<span class="f10">※</span></th>
          <td><?php echo $_smarty_tpl->tpl_vars['form']->value['companyName']['html'];?>

            <p class=" f10_2">例）森田アルミ工業株式会社 &nbsp;※全角文字でご入力ください</p></td>
        </tr>
        <tr>
          <th scope="row">お名前<span class="f10">※</span></th>
          <td><?php echo $_smarty_tpl->tpl_vars['form']->value['sei']['html'];?>
　<?php echo $_smarty_tpl->tpl_vars['form']->value['mei']['html'];?>

            <p class=" f10_2">例）森田　太郎 &nbsp;※全角文字でご入力ください</p></td>
        </tr>
        <tr>
          <th scope="row">関連業種<span class="f10">※</span></th>
          <td><?php echo $_smarty_tpl->tpl_vars['form']->value['businessCategory']['html'];?>
</td>
        </tr>
        <tr>
          <th scope="row">職種<span class="f10">※</span></th>
          <td><?php echo $_smarty_tpl->tpl_vars['form']->value['jobCategory']['html'];?>
</td>
        </tr>
        <tr>
          <th scope="row">部署名</th>
          <td><?php echo $_smarty_tpl->tpl_vars['form']->value['busyo']['html'];?>
</td>
        </tr>
        <tr>
          <th scope="row">メールアドレス<span class="f10">※</span></th>
          <td><?php echo $_smarty_tpl->tpl_vars['form']->value['month']['html'];?>

            <p class=" f10_2">例）morita@alumi.com &nbsp;※半角文字でご入力ください</p></td>
        </tr>
        <tr>
          <th scope="row">確認用メールアドレス<span class="f10">※</span></th>
          <td><?php echo $_smarty_tpl->tpl_vars['form']->value['monthConf']['html'];?>

            <p class=" f10_2">例）morita@alumi.com &nbsp;※半角文字でご入力ください</p></td>
        </tr>
        <tr>
          <th>郵便番号<span class="f10">※</span></th>
          <td><p class="b01">〒&nbsp;
              <?php echo $_smarty_tpl->tpl_vars['form']->value['zip1']['html'];?>

              &nbsp;-&nbsp;
              <?php echo $_smarty_tpl->tpl_vars['form']->value['zip2']['html'];?>

            </p></td>
        </tr>
        <tr>
          <th>住所<span class="f10">※</span></th>
          <td><p class="btm10">
              <?php echo $_smarty_tpl->tpl_vars['form']->value['pref']['html'];?>

            </p>
            <p>
              <?php echo $_smarty_tpl->tpl_vars['form']->value['address1']['html'];?>

            </p>
            <p class=" f10_2 btm5">市区町村名 (例：千代田区神田神保町)</p>
            <p>
              <?php echo $_smarty_tpl->tpl_vars['form']->value['address2']['html'];?>

            </p>
            <p class=" f10_2">番地・ビル名 (例：1-3-5)</p></td>
        </tr>
        <tr>
          <th>電話番号<span class="f10">※</span></th>
          <td><p class="b01 btm5">
              <?php echo $_smarty_tpl->tpl_vars['form']->value['tel1']['html'];?>

              -
              <?php echo $_smarty_tpl->tpl_vars['form']->value['tel2']['html'];?>

              -
              <?php echo $_smarty_tpl->tpl_vars['form']->value['tel3']['html'];?>

            </p>
            <p class=" f10_2">例）000 000 000 &nbsp;※半角文字でご入力ください</p></td>
        </tr>
        <tr>
          <th>FAX番号</th>
          <td><p class="b01 btm5">
              <?php echo $_smarty_tpl->tpl_vars['form']->value['fax1']['html'];?>

              -
              <?php echo $_smarty_tpl->tpl_vars['form']->value['fax2']['html'];?>

              -
              <?php echo $_smarty_tpl->tpl_vars['form']->value['fax3']['html'];?>

            </p>
            <p class=" f10_2">例）000 000 000 &nbsp;※半角文字でご入力ください</p></td>
        </tr>
        <tr>
          <th scope="row">御社URL</th>
          <td><?php echo $_smarty_tpl->tpl_vars['form']->value['url']['html'];?>

            <p class=" f10_2">例）https://moritaalumi.co.jp/ &nbsp;※半角文字でご入力ください</p></td>
        </tr>

        <tr>
          <th scope="row">弊社ウェブサイトに<br>
            来られたきっかけを<br>
            教えて下さい。</th>
          <td><?php echo $_smarty_tpl->tpl_vars['form']->value['know']['html'];?>
</td>
        </tr>

        </tbody>
      </table>
    </div>
    <!--/ta01-->

    <nav class="btn_area">
      <ul>
        <?php if (!$_smarty_tpl->tpl_vars['flg']->value) {?>
        <!-- <li><?php echo $_smarty_tpl->tpl_vars['form']->value['reset']['html'];?>
</li> -->
        <li><?php echo $_smarty_tpl->tpl_vars['form']->value['submitConf']['html'];?>
</li>
        <?php } else { ?>
        <li><?php echo $_smarty_tpl->tpl_vars['form']->value['submitReturn']['html'];?>
</li>
        <li><?php echo $_smarty_tpl->tpl_vars['form']->value['submitReg']['html'];?>
</li>
        <?php }?>
      </ul>
    </nav>
    <!--/btn_area-->
    </form>

    <div style="align-items: center;">
    <p class="txt02 btm10"><span class="bold">TEL ： 072-480-1400</span><br>
      ＜営業時間　8時30分～17時30分＞</p>
  </div>
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
<?php echo '<script'; ?>
 src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"><?php echo '</script'; ?>
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
</html><?php }
}
