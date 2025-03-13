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

{include file="././header.tpl"}
<div class="body-container">
<div class="body">
<!-- Form Container -->
<div class="form-container">
<h2>ご入力内容確認</h2>
	<div class="section">
<h3>個人のお客様</h3>
<form method="post" action="{$smarty.server.PHP_SELF}">
{foreach from=$es item=e}
<input type="hidden" name="{$e->name}" value="{$e->value}">
{/foreach}
<dl id="T_NAME">
<dt class="must">お名前</dt>
<dd class="must">{$es.NAME->value}</dd>
</dl>

<dl id="T_MAIL">
<dt class="must">メールアドレス</dt>
<dd class="must">{$es.MAIL->value}</dd>
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
{include file="./footer.tpl"}

</div>

</body>
</html>
