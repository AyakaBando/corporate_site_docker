<?php
/* Smarty version 3.1.48, created on 2025-04-11 09:02:00
  from '/var/www/html/system/templates/topMainVisualAddChange.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67f8da888e49e6_18148244',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '816399f17741b6c38a038d991570d88b2eb4bddd' => 
    array (
      0 => '/var/www/html/system/templates/topMainVisualAddChange.html',
      1 => 1538111978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/head.html' => 1,
    'file:./common/menu.html' => 1,
    'file:./common/footer.html' => 1,
  ),
),false)) {
function content_67f8da888e49e6_18148244 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="Thu, 01 Dec 1994 16:00:00 GMT" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="title" content="<?php echo (defined('TITLE') ? constant('TITLE') : null);?>
" />
<meta name="language" content="ja" />
<meta name="robots" content="index,nofollow" />
<meta name="copyright" content="Your company" /> 
<meta name="MSSmartTagsPreventParsing" content="true" />
<title><?php echo (defined('TITLE') ? constant('TITLE') : null);?>
</title>
<link rel="stylesheet" type="text/css" href="css/import.css"/>
<link rel="stylesheet" href="/system/js/thickbox/thickbox.css" type="text/css" media="all" />
<?php echo '<script'; ?>
 type="text/javascript" src="/system/js/jquery-1.6.3.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/system/js/thickbox/thickbox.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="JavaScript" type="text/javascript" src="./sortJs/top.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="JavaScript" type="text/javascript" src="./sortJs/core.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="JavaScript" type="text/javascript" src="./sortJs/events.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="JavaScript" type="text/javascript" src="./sortJs/css.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="JavaScript" type="text/javascript" src="./sortJs/coordinates.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="JavaScript" type="text/javascript" src="./sortJs/drag.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="JavaScript" type="text/javascript" src="./sortJs/dragsort.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="JavaScript" type="text/javascript" src="./sortJs/cookies.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="css/pulldown.css"/>
<?php echo '<script'; ?>
 type="text/javascript" src="./js/load.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8">
<!--

function chk()
{
    if( confirm( "削除してもよろしいですか？" ) )
    {
        return true;
    }
    return false;
}


// -->
<?php echo '</script'; ?>
>

<style type="text/css">
<!--
sortList *{
    margin:0;
    padding:0;
}
form{
	margin:0;
	padding:0;
}
#boxes {
	list-style-type: none;
	margin: 0px;
	padding: 0 0 2px 3px;
	float:left;
}
#boxes li {
	cursor: move;
	position: relative;
	float: left;
	display:inline;
	margin: 2px 2px 0px 0px;
	width: 207px;
	height: 276px;
	border: 1px solid #bbb;
	text-align: center;
	padding:0;
	padding-top: 5px;
	z-index: 1;
	color:#000000;
	background-color:#fff;
}
#boxes li:hover{
    background-color:#ffbbff;
}
#boxes li img{
	margin:2px 0 3px 0;
	border:1px solid #999;
}
p.imgBox{
	margin:0;
	padding:0;
	text-align:center;
}

.gray{
	background-color:#cccccc;
}

.size{
	color:#ff0000;
	margin:4px 0 2px 0;
	padding:0;
	font-size:10px;
	text-align:center;
}
//-->
</style>

</head>
 <body>
  <div id="wrapper">
   <div id="header">
    <div>
	 <?php $_smarty_tpl->_subTemplateRender("file:./common/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div id="logo"><img src="../../cmn_img/logo.jpg" /></div>
   </div><!-- /#header -->

   <div id="container">
    <div id="contents">
     <div id="pan"><a href="login.php"><?php echo (defined('TITLE') ? constant('TITLE') : null);?>
</a> / <?php echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
管理</div>


     <div id="data">
       <div class="patternPan"<?php if ($_GET['r'] || $_GET['d']) {?> style="color:#ff33ff;border-color:#ff99ff;"<?php }?>>
       <?php if (!$_GET['r'] && !$_GET['d']) {
echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
一覧を表示しています。
       <?php } elseif ($_GET['r'] == 1) {
echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
を登録しました。
       <?php } elseif ($_GET['r'] == 2) {
echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
順位を更新しました。
       <?php } elseif ($_GET['r'] == 3) {
echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
の表示を更新しました。
       <?php } elseif ($_GET['d'] == 1) {
echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
を削除しました。<?php }?>
       </div>


<?php if ($_smarty_tpl->tpl_vars['errors']->value) {?>
    <div style="border:double 3px #ff0000;margin-bottom:10px;background-color:#ffffff;padding:6px;">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'value');
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

<div class="clear"></div>

<div class="clear"></div>

<?php if ($_POST['imgId']) {?><p style="padding-top:10px;"><a href="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php?id=<?php echo $_REQUEST['id'];?>
" style="font-size:14px;">&gt;&gt;新規登録</a></p><?php }?>
<table cellpadding="0" cellspacing="0" style="margin:10px 0;width:340px;">
  <tr class="caption"><th colspan="4" class="center"<?php if ($_POST['imgId']) {?> style="background-color:#ff6500;color:#ffffff;"<?php }?>>
      画像<?php if ($_POST['imgId']) {?>修正<?php } else { ?>新規登録<?php }?></th></tr>
  <tr>
    <td align="center" valign="bottom" class="tdreg" style="line-height:2em;">
    <?php if ($_POST['imgId'] || $_smarty_tpl->tpl_vars['upDateImg']->value['fileName']) {?>
        <p style="text-align:center;">
        <a href="../upImage/<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
/<?php echo $_smarty_tpl->tpl_vars['upDateImg']->value['fileName'];?>
" class="thickbox"><img src="../upImage/<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
/<?php echo $_smarty_tpl->tpl_vars['upDateImg']->value['fileName'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['upDateImg']->value['size']['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['upDateImg']->value['size']['height'];?>
" /></a>
        </p>
    <?php }?>
      <form enctype="multipart/form-data" action="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php?id=<?php echo $_REQUEST['id'];?>
" method="post">
          <p class="center" style="margin-bottom:4px;"><input type="file" name="1" /><br /><span style="color:#ff0000;">【横<?php echo $_smarty_tpl->tpl_vars['maxWidth']->value[1];?>
px × 縦<?php echo $_smarty_tpl->tpl_vars['maxHeight']->value[1];?>
px】</span></p>

          <p class="center" style="margin-bottom:12px;">url : <input type="text" name="imageAlt" value="<?php echo $_smarty_tpl->tpl_vars['upDateImg']->value['imageAlt'];?>
" style="width:240px;padding-bottom:4px;" /></p>

          <p style="text-align:center;"><input type="submit" name="reg" value="<?php if ($_POST['imgId']) {?>修正<?php } else { ?>登録<?php }?>" /></p>
          <input type="hidden" name="priority" value="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null);?>
" />
          <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>
" />
          <?php if ($_POST['imgId']) {?>
          <input type="hidden" name="imgId" value="<?php echo $_smarty_tpl->tpl_vars['upDateImg']->value['imgId'];?>
" />
          <input type="hidden" name="fileName[1]" value="<?php echo $_smarty_tpl->tpl_vars['upDateImg']->value['fileName'];?>
" />
          <?php }?>
      </form>
    </td>
  </tr>
</table>


<table border="0" cellpadding="0" cellspacing="0" class="12" bgcolor="#000000" class="sortList" style="width:100%;">
<tr class="caption">
  <th colspan="4" class="center">登録画像一覧</th>
</tr>
<tr>
  <td class="tdreg" style="border:none;">
<?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
            <ul id="boxes">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value', false, 'key', 'result', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
            <li class="box<?php if ($_smarty_tpl->tpl_vars['value']->value['prtFlg']) {?> gray<?php }?>">
<!--- id=<?php echo $_smarty_tpl->tpl_vars['value']->value['imgId'];?>
 title=<?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
 　No.<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 --->
                <?php if ($_smarty_tpl->tpl_vars['value']->value['fileName']) {?>
                    <p style="text-align:center;height:120px;border:none;">
                                        <img src="../upImage/<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value['fileName'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['value']->value['size']['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['value']->value['size']['height'];?>
" />
                    </p>
                <?php }?>

                <p class="center" style="margin:0 0 6px 0;overflow:hidden;width:100%;height:34px;"><?php if ($_smarty_tpl->tpl_vars['value']->value['imageAlt']) {?>url<br /><?php echo $_smarty_tpl->tpl_vars['value']->value['imageAlt'];
}?></p>
                <form action="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php?id=<?php echo $_REQUEST['id'];?>
" method="post">
                    <p style="text-align:center;"><input type="submit" name="imgupdate" value="修正" /></p>
                    <input type="hidden" name="imgId" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['imgId'];?>
" />
                </form>
                
                <?php if ($_smarty_tpl->tpl_vars['value']->value['fileName']) {?>
                <br />
                <form action="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php?id=<?php echo $_REQUEST['id'];?>
" method="post" style="text-align:center;">
                    <input type="submit" name="del" value="削除" onclick="return chk();" />
                    <input type="hidden" name="imgId" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['imgId'];?>
" />
                    <input type="hidden" name="fileName" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['fileName'];?>
" />
                </form>
                <br />

                <form action="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php?id=<?php echo $_REQUEST['id'];?>
" method="post" style="text-align:center;">
                    <input type="submit" name="disp" value="<?php if ($_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>非表示<?php } else { ?>表示<?php }?>" />
                    <input type="hidden" name="imgId" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['imgId'];?>
" />
                    <input type="hidden" name="dispFlg" value="<?php if ($_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>0<?php } else { ?>1<?php }?>" />
                </form>

                <?php }?>
            </li>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
<?php } else { ?>
現在画像の登録はございません。
<?php }?>
  </td>
</tr>
</table>
<?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
<div class="sortSubmit" style="margin-top:10px;">
  <form action="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php?id=<?php echo $_REQUEST['id'];?>
&s=1" method="post" enctype="multipart/form-data" name="sort" style="margin-bottom:40px;text-align:center;">
    <input onmouseover="this.style.backgroundColor='#ff9900'" style="font-size:10pt;color:#ffffff;background-color:#ff6500;width:200px;line-height:20px;height:30px;margin:0 auto;" onmouseout="this.style.backgroundColor='#ff6500'" type="button" value="並び替え" onclick="func_inspectListOrder('boxes')">
  </form>
</div>
<?php }?>
      <div class="clear"></div>
     </div>
     <div class="clear"></div>
    </div>
   </div>

<?php $_smarty_tpl->_subTemplateRender("file:./common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>   <div class="clear"></div>
   <?php $_smarty_tpl->_subTemplateRender("file:./common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </div>

<?php echo '<script'; ?>
 type="text/javascript">
<!--
  var openwindow = null;

  var dragsort   = ToolMan.dragsort();
  var junkdrawer = ToolMan.junkdrawer();

  var savelist   = "<?php echo $_smarty_tpl->tpl_vars['data']->value['jsSavelist'];?>
";

  var savelist2  = "";
  var savenew    = "";
  var savepost   = "";

  window.onload = function() {
    dragsort.makeListSortable(document.getElementById("boxes"));
  }

//アンロード用
function func_serializeList2(list) {
  var items = list.getElementsByTagName("li");
  for (var i=0,n=items.length; i<n; i++) {
    var item = items[i];

    var itemhtml = item.innerHTML.toString();

    var spos1 = itemhtml.indexOf("id=");
    var epos1 = itemhtml.indexOf(" ",spos1);
    var id = itemhtml.substring(spos1+3,epos1);

    var spos2 = itemhtml.indexOf("title=");
    var epos2 = itemhtml.indexOf(" ",spos2);
    var name = itemhtml.substring(spos2+5,epos2);

    savelist2 = savelist2+","+id;
  }
}

//アンロード



//POST用
function func_serializeList(list) {
  var items = list.getElementsByTagName("li");
  for (var i=0,n=items.length; i<n; i++) {
    var item = items[i];

    var itemhtml = item.innerHTML.toString();

    var spos1 = itemhtml.indexOf("id=");
    var epos1 = itemhtml.indexOf(" ",spos1);
    var id = itemhtml.substring(spos1+3,epos1);

    var input = document.createElement("input");
    input.type = "hidden";
    input.name = "reNewId["+i+"]";
    input.value = id;
    document.sort.appendChild(input);

    var spos2 = itemhtml.indexOf("title=");
    var epos2 = itemhtml.indexOf(" ",spos2);
    var name = itemhtml.substring(spos2+5,epos2);

    var input = document.createElement("input");
    input.type = "hidden";
    input.name = "reNewName["+i+"]";
    input.value = name;
    document.sort.appendChild(input);
  }
}

//POSTボタン
function func_inspectListOrder(id) {
  savenew = "1";
  func_serializeList(document.getElementById(id));
  document.sort.submit();
}


function func_submit(url){
  savelist2 = "";
  if(savelist != ""){
    func_serializeList2(document.getElementById('boxes'));
    if(savelist != savelist2){
      var flg = window.confirm("並び順を保存しますか？");
      if(flg == true){
        savepost = "a";
        func_serializeList(document.getElementById('boxes'));
        document.sort.submit();
      }
    }
  }

  openwindow = window.open(url,"contentsList.php","dependent=yes,width=627,height=635,scrollbars=yes");
  openwindow.focus();
  return false;
}
// -->
<?php echo '</script'; ?>
>

 </body>
</html>
<?php }
}
