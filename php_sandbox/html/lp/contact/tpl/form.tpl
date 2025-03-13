<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja" dir="ltr">
<head profile="http://purl.org/net/uriprofile/">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="ja-JP">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<title>お問い合わせ</title>
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="./css/contact.css">
<link rel="stylesheet" type="text/css" href="./css/base.css">
<link rel="stylesheet" type="text/css" href="./css/dms5.css">
<link rel="stylesheet" type="text/css" href="./css/extends.css">
<script type="text/javascript" src="/shared/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="/shared/js/utils.js"></script>
<script language="javascript" type="text/javascript">
{literal}
function doTableFocus( idName ){
	var ele = document.getElementById( idName );
	ele.className = 'tr-focus';
	return false;
}
function killTableFocus( idName ){
	var ele = document.getElementById( idName );
	ele.className = '';
	return false;
}
{/literal}
</script>
<script type="text/javascript">
{literal}
 var _gaq = _gaq || [];
 _gaq.push(['_setAccount', 'UA-27940452-1']);
 _gaq.push(['_trackPageview']);

 (function() {
   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
 })();
{/literal}
</script>
</head>
<body id="pagetop">

<div id="CONTAINER" class="layout-container">

{include file="././header.tpl"}

{if $errors|@count > 0}
<div class="error-block">
<ul>
{foreach from=$errors item=error}
<li>{$error->message}</li>
{/foreach}
</ul>
</div>
{/if}
<div class="body-container">
<div class="body">
<!-- Form Container -->
<div class="form-container">
<form method="post" action="{$smarty.server.PHP_SELF}">
<div class="section">
<table summary="お問い合わせ" cellpadding="0" cellspacing="0">
<col width="20%">
<col width="80%">

<tr id="NAME">
<th>{$es.NAME->title}<span class="must">*</span></th>
<td><label for="{$es.NAME->name}"></label><input onfocus="doTableFocus('NAME');" onblur="killTableFocus('NAME');" type="{$es.NAME->type}" name="{$es.NAME->name}" id="{$es.NAME->name}" value="{$es.NAME->value}" size="{$es.NAME->size}" class="{if ! empty($es.NAME->error)}error-form-style{else}form-style{/if}"><br><span class="example">（例：若井 太郎）</span></td>
</tr>

<tr id="COMPANY">
<th>{$es.COMPANY_NAME->title}</th>
<td><input onfocus="doTableFocus('COMPANY');" onblur="killTableFocus('COMPANY');" type="{$es.COMPANY_NAME->type}" name="{$es.COMPANY_NAME->name}" id="{$es.COMPANY_NAME->name}" value="{$es.COMPANY_NAME->value}" size="{$es.COMPANY_NAME->size}" class="{if ! empty($es.COMPANY_NAME->error)}error-form-style{else}form-style{/if}"><br><span class="example">（例：若井産業株式会社）</span></td>
</tr>

<tr id="BUSINESS_CATEGORY">
<th>{$es.BUSINESS_CATEGORY->title}<span class="must">*</span></th>
<td><input onfocus="doTableFocus('BUSINESS_CATEGORY');" onblur="killTableFocus('BUSINESS_CATEGORY');" type="{$es.BUSINESS_CATEGORY->type}" name="{$es.BUSINESS_CATEGORY->name}" id="{$es.BUSINESS_CATEGORY->name}" value="{$es.BUSINESS_CATEGORY->value}" size="{$es.BUSINESS_CATEGORY->size}" class="{if ! empty($es.BUSINESS_CATEGORY->error)}error-form-style{else}form-style{/if}"><br><span class="example">（例：金物店・建材メーカー・工務店・設備工事・一般ユーザーなど）</span></td>
</tr>

<tr id="SHOP_CATEGORY">
<th>{$es.SHOP_CATEGORY->title}<span class="must">*</span><br>(よく購入されるお店)</th>
<td><input onfocus="doTableFocus('SHOP_CATEGORY');" onblur="killTableFocus('SHOP_CATEGORY');" type="{$es.SHOP_CATEGORY->type}" name="{$es.SHOP_CATEGORY->name}" id="{$es.SHOP_CATEGORY->name}" value="{$es.SHOP_CATEGORY->value}" size="{$es.SHOP_CATEGORY->size}" class="{if ! empty($es.SHOP_CATEGORY->error)}error-form-style{else}form-style{/if}"><br><span class="example">（例：金物店・ホームセンター・決まっていないなど）</span></td>
</tr>

<tr id="POSTCODE">
<th>{$es.POSTCODE->title}</th>
<td><input onfocus="doTableFocus('POSTCODE');" onblur="killTableFocus('POSTCODE');" type="{$es.POSTCODE->type}" name="{$es.POSTCODE->name}" id="{$es.POSTCODE->name}" value="{$es.POSTCODE->value}" size="{$es.POSTCODE->size}" class="{if ! empty($es.POSTCODE->error)}error-form-style{else}form-style{/if}"><br><span class="example">（例：577-8503）</span></td>
</tr>

<tr id="ADDRESS">
<th>{$es.ADDRESS->title}<span class="must">*</span></th>
<td><input onfocus="doTableFocus('ADDRESS');" onblur="killTableFocus('ADDRESS');" type="{$es.ADDRESS->type}" name="{$es.ADDRESS->name}" id="{$es.ADDRESS->name}" value="{$es.ADDRESS->value}" size="{$es.ADDRESS->size}" class="{if ! empty($es.ADDRESS->error)}error-form-style{else}form-style{/if}"><br><span class="example">（例：東大阪市森河内西1-6-30）</span></td>
</tr>

<tr id="TEL">
<th>電話番号<span class="must">*</span></th>
<td><input onfocus="doTableFocus('TEL');" onblur="killTableFocus('TEL');" maxlength="5" type="text" name="{$es.TEL1->name}" id="{$es.TEL1->name}" value="{$es.TEL1->value}" size="{$es.TEL1->size}" class="{if ! empty($es.TEL1->error)}error-form-style{else}form-style{/if}"> - <input onfocus="doTableFocus('TEL');" onblur="killTableFocus('TEL');" maxlength="5" type="text" name="{$es.TEL2->name}" id="{$es.TEL2->name}" value="{$es.TEL2->value}" size="{$es.TEL2->size}" class="{if ! empty($es.TEL2->error)}error-form-style{else}form-style{/if}"> - <input onfocus="doTableFocus('TEL');" onblur="killTableFocus('TEL');" maxlength="5" type="text" name="{$es.TEL3->name}" id="{$es.TEL3->name}" value="{$es.TEL3->value}" size="{$es.TEL3->size}" class="{if ! empty($es.TEL3->error)}error-form-style{else}form-style{/if}"><br><span class="example">半角数字でご記入ください。</span></td>
</tr>

<tr id="MAIL">
<th>{$es.MAIL->title}<span class="must">*</span></th>
<td><input onfocus="doTableFocus('MAIL');" onblur="killTableFocus('MAIL');" type="text" name="{$es.MAIL->name}" id="{$es.MAIL->name}" value="{$es.MAIL->value}" size="{$es.MAIL->size}" class="{if ! empty($es.MAIL->error)}error-form-style{else}form-style{/if}"><br><span class="example">（例：wakaitaro@co.jp）</span></td>
</tr>

<tr id="CONTACT_BODY">
<th>{$es.CONTACT_BODY->title}</th>
<td><textarea onfocus="doTableFocus('CONTACT_BODY');" onblur="killTableFocus('CONTACT_BODY');" name="{$es.CONTACT_BODY->name}" id="{$es.CONTACT_BODY->name}" cols="{$es.CONTACT_BODY->size}" rows="{$es.CONTACT_BODY->rows}" wrap="virtual" class="{if ! empty($es.TEL1->error)}error-textarea-style{else}textarea-style{/if}">{$es.CONTACT_BODY->value}</textarea></td>
</tr>

</table>
<div class="announce"><span class="must">*</span> は、必須項目です</div>
<div class="submit-next"><input type="hidden" name="ACTION" value="CHECK"><input type="image" src="./images/btn_next_ja.png" width="112" height="35" name="CHECK" value="確認画面へ" alt="次へ"></div>
</div>
</form>
</div>
<!-- /Form Container -->
</div>

<!-- Local container -->

<div class="local-nav-container">
<!-- / Local nav -->

<div class="banner-section">
<ul>
<li><a href="/products/"><img src="/images/bnr_products.png" alt="製品情報" width="230" height="80"></a></li>
<li><a href="http://hi.wakaisangyo.co.jp/" target="_blank"><img src="/images/bnr_hi.png" alt="若井産業HI営業部" width="230" height="80"></a></li>
<li><a href="/electric/"><img src="/images/bnr_electric.png" alt="電設営業部" width="230" height="80"></a></li>
<li><a href="http://www.kanamono-oh.com/" target="_blank"><img src="/images/bnr_reshop.png" alt="金物屋 リショップ事業部" width="230" height="80"></a></li>
<li><a href="http://www.kanamono-oh.com/benrimon/index.php" target="_blank"><img src="/images/bnr_item.png" alt="便利もん" width="230" height="80"></a></li>
<li><a href="/structure/"><img src="/images/bnr_trivia.png" alt="知って得する家の仕組み" width="230" height="80"></a></li>
</ul>
</div>
</div>
</div>
<!-- / Local container -->

{include file="./footer.tpl"}

</div>


</body>
</html>
