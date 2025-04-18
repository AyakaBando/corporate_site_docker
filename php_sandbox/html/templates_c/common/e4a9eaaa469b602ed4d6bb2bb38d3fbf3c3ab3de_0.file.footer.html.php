<?php
/* Smarty version 3.1.48, created on 2025-04-11 05:39:42
  from '/var/www/html/templates/common/footer.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67f8ab1ecadd10_68461621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4a9eaaa469b602ed4d6bb2bb38d3fbf3c3ab3de' => 
    array (
      0 => '/var/www/html/templates/common/footer.html',
      1 => 1713141300,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f8ab1ecadd10_68461621 (Smarty_Internal_Template $_smarty_tpl) {
?><footer>
<div id="footer_in">
<p id="f_logo"><img src="/common/image/h_logo.gif" alt=""/></p>
	
	<nav id="f_list">
		<ul>
			<li><a href="/product/">製品情報</a></li>
			<li><a href="/mind/">こだわり</a></li>
			<li><a href="/company/">企業情報</a></li>
			<li><a href="/recruit/">採用情報</a></li>
			<li><a href="/contact/">お問合せ</a></li>
			<li><a href="/catalog/">カタログ請求</a></li>
		</ul>
		
	</nav>
	<nav id="sns_b">
		<ul>
			<li><a href="//www.facebook.com/moritaalumi" target="_blank"><img src="/common/image/f_icon01.gif" width="32" height="32" alt=""/></a></li>
			<li><a href="//instagram.com/moritaalumi" target="_blank"><img src="/common/image/f_icon02.gif" width="33" height="32" alt=""/></a></li>
			<li><a href="//jp.pinterest.com/moritaaluminum/" target="_blank"><img src="/common/image/f_icon03.gif" width="32" height="32" alt=""/></a></li>
			<li><a href="//twitter.com/moritaalumi" target="_blank"><img src="/common/image/f_icon05.gif" alt=""/></a></li>
		</ul>
		<br class="clearfix">
	</nav>
	<br class="clearfix dis001">
	<?php if (!$_SESSION['member']['flg']) {?><p id="log001"><a href="/login/">会員ログイン</a></p><?php }?>
	<nav id="f_list02">
		
		<ul id="f_link">
			<li><a href="/privacy/">プライバシーポリシー</a></li>
			<li><a href="/sitemap/">サイトマップ</a></li>
			
			<li class="list02"><a href="/">JP</a></li>
			<li class="list02"><a href="/en/">EN</a></li>
		</ul>
		<br class="clearfix">
	</nav>
		<br class="clearfix dis001">
		</div>
	<p id="copy">Copyright © morita aluminum industry ,inc. <br class="dis01">
		All rights reserved.</p>
		
</footer>
<!--/footer--> <?php }
}
