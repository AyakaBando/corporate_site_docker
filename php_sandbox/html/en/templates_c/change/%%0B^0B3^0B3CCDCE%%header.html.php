<?php /* Smarty version 2.6.19, created on 2015-08-11 16:16:39
         compiled from ../common/header.html */ ?>
<!--<div id="op">
	<div id="progressBar"></div>
</div>-->
<nav id="sns_c">
<ul>
<li><a href=""><img src="/common/image/sub_icon01.gif" alt=""/></a></li>
<li><a href=""><img src="/common/image/sub_icon02.gif" alt=""/></a></li>
<li><a href=""><img src="/common/image/sub_icon03.gif" alt=""/></a></li>
</ul>
</nav>
<!--/sns_b-->
<header>
<form>
	<div id="header_in">
		<p id="logo"><a href="/"><img src="/common/image/h_logo.gif" width="124" height="41" alt=""/></a></p>
		<nav id="glo">
			<ul id="glo_in">
				<li><a href="/product/">製品情報</a></li>
				<li><a href="">こだわり</a></li>
				<li><a href="/company/">企業情報</a></li>
				<li><a href="/recruit/">採用情報</a></li>
				<li><a href="">お問合せ</a></li>
			</ul>
			<br class="clearfix">
		</nav>
		<!--/glo_in-->
		<nav id="h_list">
			<ul id="h_list_in">
				<li class="list01"><a href="">プライバシーポリシー</a></li>
				
				<li class="list02"><a href="/">JP</a></li>
				<li class="list02"><a href="/en/">EN</a></li>
			</ul>
			<br class="clearfix">
		</nav>
		<!--/h_list-->
		<p id="log_in">
				<?php if (! $_SESSION['member']['flg']): ?>
		<a href="/login/"><img src="/common/image/log_btn01.gif" width="156" height="26" alt=""/></a>
				<?php else: ?>
				<span class="txt03"><?php echo $_SESSION['member']['name']; ?>
様</span><span class="btn_c"><a href="/change/" class="change">会員情報変更</a></span><span><a href="/logout.php" class="out">ログアウト</a></span>
				<?php endif; ?>
		</p>
		<br class="clearfix">
	</div>
	<!--/header_in-->
	<div id="h_sp">
	<!--<p id="menu"><img src="/common/image/h_menu.gif" alt=""/></p>-->
	<p id="menu"><span id="panel-btn-icon"></span></p>
	<p id="s_logo"><img src="/common/image/h_logo.gif" width="124" height="41" alt=""/></p>
	
	<br class="clearfix">
	</div>
	<!--/h_sp-->
	</form>
</header>
<!--/header--><nav id="sp_menu">
<ul id="sp_in">
<li class="sp_in01 c_001"><span>製品情報</span>
<ul>
<li><a href="/product/">製品検索</a></li>

</ul>
</li>
<li class="sp_in01"><a href="">こだわり</a></li>
<li class="sp_in01 c_001"><span>企業情報</span>
<ul>
<li><a href="">ここにページ名</a></li>
<li><a href="">ここにページ名</a></li>
<li><a href="">ここにページ名</a></li>
<li><a href="">ここにページ名</a></li>
</ul></li>
<li class="sp_in01"><a href="/recruit/">採用情報</a></li>
<li class="sp_in01"><a href="">お問合せ</a></li>
<li class="sp_in01"><a href="/login/">メンバーページログイン</a></li>
<li class="sp_in01"><a href="/en/">ENGLISH SITE</a></li>
</ul>
<div id="icon_li" class="clear_fix">
<div><a href=""><img src="/common/image/sp_icon01.png" alt=""/></a></div>
<div><a href=""><img src="/common/image/sp_icon02.png" alt=""/></a></div>
<div><a href=""><img src="/common/image/sp_icon03.png" alt=""/></a></div>
<div class="last"><a href=""><img src="/common/image/sp_icon04.png" alt=""/></a></div>
</div>
<!--/icon_li-->
	</nav>
	<!--/sp_menu--> 