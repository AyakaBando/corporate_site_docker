<?php /* Smarty version 2.6.19, created on 2015-08-20 18:17:44
         compiled from topMainVisualAddChange.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="Thu, 01 Dec 1994 16:00:00 GMT" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="title" content="<?php echo @TITLE; ?>
" />
<meta name="language" content="ja" />
<meta name="robots" content="index,nofollow" />
<meta name="copyright" content="Your company" /> 
<meta name="MSSmartTagsPreventParsing" content="true" />
<title><?php echo @TITLE; ?>
</title>
<link rel="stylesheet" type="text/css" href="../css/import.css"/>
<link rel="stylesheet" href="/system/js/thickbox/thickbox.css" type="text/css" media="all" />
<script type="text/javascript" src="/system/js/jquery-1.6.3.min.js"></script>
<script type="text/javascript" src="/system/js/thickbox/thickbox.js"></script>
<script language="JavaScript" type="text/javascript" src="../sortJs/top.js"></script>
<script language="JavaScript" type="text/javascript" src="../sortJs/core.js"></script>
<script language="JavaScript" type="text/javascript" src="../sortJs/events.js"></script>
<script language="JavaScript" type="text/javascript" src="../sortJs/css.js"></script>
<script language="JavaScript" type="text/javascript" src="../sortJs/coordinates.js"></script>
<script language="JavaScript" type="text/javascript" src="../sortJs/drag.js"></script>
<script language="JavaScript" type="text/javascript" src="../sortJs/dragsort.js"></script>
<script language="JavaScript" type="text/javascript" src="../sortJs/cookies.js"></script>
<link rel="stylesheet" type="text/css" href="../css/pulldown.css"/>
<script type="text/javascript" src="../js/load.js"></script>
<?php echo '
<script type="text/javascript" charset="utf-8">
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
</script>

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
'; ?>

</head>
 <body>
  <div id="wrapper">
   <div id="header">
    <div>
	 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/common/head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div id="logo"><img src="../../cmn_img/logo.jpg" /></div>
   </div><!-- /#header -->

   <div id="container">
    <div id="contents">
     <div id="pan"><a href="../login.php"><?php echo @TITLE; ?>
</a> / <?php echo @PAGE_TITLE; ?>
管理</div>


     <div id="data">
       <div class="patternPan"<?php if ($_GET['r'] || $_GET['d']): ?> style="color:#ff33ff;border-color:#ff99ff;"<?php endif; ?>>
       <?php if (! $_GET['r'] && ! $_GET['d']): ?><?php echo @PAGE_TITLE; ?>
一覧を表示しています。
       <?php elseif ($_GET['r'] == 1): ?><?php echo @PAGE_TITLE; ?>
を登録しました。
       <?php elseif ($_GET['r'] == 2): ?><?php echo @PAGE_TITLE; ?>
順位を更新しました。
       <?php elseif ($_GET['r'] == 3): ?><?php echo @PAGE_TITLE; ?>
の表示を更新しました。
       <?php elseif ($_GET['d'] == 1): ?><?php echo @PAGE_TITLE; ?>
を削除しました。<?php endif; ?>
       </div>


<?php if ($this->_tpl_vars['errors']): ?>
    <div style="border:double 3px #ff0000;margin-bottom:10px;background-color:#ffffff;padding:6px;">
    <?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
    <?php echo $this->_tpl_vars['value']; ?>
<br />
    <?php endforeach; endif; unset($_from); ?>
    </div>
<?php endif; ?>

<div class="clear"></div>

<div class="clear"></div>

<?php if ($_POST['imgId']): ?><p style="padding-top:10px;"><a href="./<?php echo @THE_FILE_NAME; ?>
.php?id=<?php echo $_REQUEST['id']; ?>
" style="font-size:14px;">&gt;&gt;新規登録</a></p><?php endif; ?>
<table cellpadding="0" cellspacing="0" style="margin:10px 0;width:340px;">
  <tr class="caption"><th colspan="4" class="center"<?php if ($_POST['imgId']): ?> style="background-color:#ff6500;color:#ffffff;"<?php endif; ?>>
      画像<?php if ($_POST['imgId']): ?>修正<?php else: ?>新規登録<?php endif; ?></th></tr>
  <tr>
    <td align="center" valign="bottom" class="tdreg" style="line-height:2em;">
    <?php if ($_POST['imgId'] || $this->_tpl_vars['upDateImg']['fileName']): ?>
        <p style="text-align:center;">
        <a href="../../upImage/<?php echo @FILE_CATEGORY; ?>
/<?php echo $this->_tpl_vars['upDateImg']['fileName']; ?>
" class="thickbox"><img src="../../upImage/<?php echo @FILE_CATEGORY; ?>
/<?php echo $this->_tpl_vars['upDateImg']['fileName']; ?>
" width="<?php echo $this->_tpl_vars['upDateImg']['size']['width']; ?>
" height="<?php echo $this->_tpl_vars['upDateImg']['size']['height']; ?>
" /></a>
        </p>
    <?php endif; ?>
      <form enctype="multipart/form-data" action="./<?php echo @THE_FILE_NAME; ?>
.php?id=<?php echo $_REQUEST['id']; ?>
" method="post">
          <p class="center" style="margin-bottom:4px;"><input type="file" name="1" /><br /><span style="color:#ff0000;">【横<?php echo $this->_tpl_vars['maxWidth']['1']; ?>
px × 縦<?php echo $this->_tpl_vars['maxHeight']['1']; ?>
px】</span></p>

          <p class="center" style="margin-bottom:12px;">url : <input type="text" name="imageAlt" value="<?php echo $this->_tpl_vars['upDateImg']['imageAlt']; ?>
" style="width:240px;padding-bottom:4px;" /></p>

          <p style="text-align:center;"><input type="submit" name="reg" value="<?php if ($_POST['imgId']): ?>修正<?php else: ?>登録<?php endif; ?>" /></p>
          <input type="hidden" name="priority" value="<?php echo $this->_sections['cnt']['index']; ?>
" />
          <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>
" />
          <?php if ($_POST['imgId']): ?>
          <input type="hidden" name="imgId" value="<?php echo $this->_tpl_vars['upDateImg']['imgId']; ?>
" />
          <input type="hidden" name="fileName[1]" value="<?php echo $this->_tpl_vars['upDateImg']['fileName']; ?>
" />
          <?php endif; ?>
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
<?php if ($this->_tpl_vars['data']): ?>
            <ul id="boxes">
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
            <li class="box<?php if ($this->_tpl_vars['value']['prtFlg']): ?> gray<?php endif; ?>">
<!--- id=<?php echo $this->_tpl_vars['value']['imgId']; ?>
 title=<?php echo $this->_tpl_vars['value']['title']; ?>
 　No.<?php echo $this->_tpl_vars['key']; ?>
 --->
                <?php if ($this->_tpl_vars['value']['fileName']): ?>
                    <p style="text-align:center;height:120px;border:none;">
                                        <img src="../../upImage/<?php echo @FILE_CATEGORY; ?>
/<?php echo $this->_tpl_vars['value']['fileName']; ?>
" width="<?php echo $this->_tpl_vars['value']['size']['width']; ?>
" height="<?php echo $this->_tpl_vars['value']['size']['height']; ?>
" />
                    </p>
                <?php endif; ?>

                <p class="center" style="margin:0 0 6px 0;overflow:hidden;width:100%;height:34px;"><?php if ($this->_tpl_vars['value']['imageAlt']): ?>url<br /><?php echo $this->_tpl_vars['value']['imageAlt']; ?>
<?php endif; ?></p>
                <form action="./<?php echo @THE_FILE_NAME; ?>
.php?id=<?php echo $_REQUEST['id']; ?>
" method="post">
                    <p style="text-align:center;"><input type="submit" name="imgupdate" value="修正" /></p>
                    <input type="hidden" name="imgId" value="<?php echo $this->_tpl_vars['value']['imgId']; ?>
" />
                </form>
                
                <?php if ($this->_tpl_vars['value']['fileName']): ?>
                <br />
                <form action="./<?php echo @THE_FILE_NAME; ?>
.php?id=<?php echo $_REQUEST['id']; ?>
" method="post" style="text-align:center;">
                    <input type="submit" name="del" value="削除" onclick="return chk();" />
                    <input type="hidden" name="imgId" value="<?php echo $this->_tpl_vars['value']['imgId']; ?>
" />
                    <input type="hidden" name="fileName" value="<?php echo $this->_tpl_vars['value']['fileName']; ?>
" />
                </form>
                <br />

                <form action="./<?php echo @THE_FILE_NAME; ?>
.php?id=<?php echo $_REQUEST['id']; ?>
" method="post" style="text-align:center;">
                    <input type="submit" name="disp" value="<?php if ($this->_tpl_vars['value']['dispFlg']): ?>非表示<?php else: ?>表示<?php endif; ?>" />
                    <input type="hidden" name="imgId" value="<?php echo $this->_tpl_vars['value']['imgId']; ?>
" />
                    <input type="hidden" name="dispFlg" value="<?php if ($this->_tpl_vars['value']['dispFlg']): ?>0<?php else: ?>1<?php endif; ?>" />
                </form>

                <?php endif; ?>
            </li>
<?php endforeach; endif; unset($_from); ?>
            </ul>
<?php else: ?>
現在画像の登録はございません。
<?php endif; ?>
  </td>
</tr>
</table>
<?php if ($this->_tpl_vars['data']): ?>
<div class="sortSubmit" style="margin-top:10px;">
  <form action="./<?php echo @THE_FILE_NAME; ?>
.php?id=<?php echo $_REQUEST['id']; ?>
&s=1" method="post" enctype="multipart/form-data" name="sort" style="margin-bottom:40px;text-align:center;">
    <input onmouseover="this.style.backgroundColor='#ff9900'" style="font-size:10pt;color:#ffffff;background-color:#ff6500;width:200px;line-height:20px;height:30px;margin:0 auto;" onmouseout="this.style.backgroundColor='#ff6500'" type="button" value="並び替え" onclick="func_inspectListOrder('boxes')">
  </form>
</div>
<?php endif; ?>
      <div class="clear"></div>
     </div>
     <div class="clear"></div>
    </div>
   </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/common/menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   <div class="clear"></div>
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/common/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>
<?php echo '
<script type="text/javascript">
<!--
  var openwindow = null;

  var dragsort   = ToolMan.dragsort();
  var junkdrawer = ToolMan.junkdrawer();
'; ?>

  var savelist   = "<?php echo $this->_tpl_vars['data']['jsSavelist']; ?>
";
<?php echo '
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
'; ?>


<?php echo '
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
    func_serializeList2(document.getElementById(\'boxes\'));
    if(savelist != savelist2){
      var flg = window.confirm("並び順を保存しますか？");
      if(flg == true){
        savepost = "a";
        func_serializeList(document.getElementById(\'boxes\'));
        document.sort.submit();
      }
    }
  }

  openwindow = window.open(url,"contentsList.php","dependent=yes,width=627,height=635,scrollbars=yes");
  openwindow.focus();
  return false;
}
// -->
</script>
'; ?>

 </body>
</html>