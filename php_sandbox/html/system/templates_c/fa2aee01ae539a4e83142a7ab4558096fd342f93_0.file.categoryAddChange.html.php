<?php
/* Smarty version 3.1.48, created on 2025-04-11 08:36:47
  from '/var/www/html/system/templates/categoryAddChange.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67f8d49f81ba96_20753004',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa2aee01ae539a4e83142a7ab4558096fd342f93' => 
    array (
      0 => '/var/www/html/system/templates/categoryAddChange.html',
      1 => 1538111977,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/meta.html' => 1,
    'file:./common/head.html' => 1,
    'file:./common/menu.html' => 1,
    'file:./common/footer.html' => 1,
  ),
),false)) {
function content_67f8d49f81ba96_20753004 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./common/meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 type="text/javascript" src="./js/setForm.js"><?php echo '</script'; ?>
>

<link rel="stylesheet" href="./js/css/jquery.ui.all.css">
<link rel="stylesheet" href="./css/sort.table.css">

<?php echo '<script'; ?>
 src="./js/ui/jquery.ui.core.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./js/ui/jquery.ui.widget.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./js/ui/jquery.ui.mouse.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./js/ui/jquery.ui.sortable.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./js/ui/jquery.ui.droppable.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./js/queserser.sort.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8">
<!--

// 確認ウィンドウを表示する
function chk( title )
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



</head>
 <body id="two-left-w">
  <div id="wrapper">
   <div id="header">
    <div>
     <?php $_smarty_tpl->_subTemplateRender("file:./common/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div id="logo">
     <img src="../../cmn_img/logo.jpg" />
    </div>
   </div><!-- /#header -->
   <div id="container">
    <div id="contents">
     <div id="pan">
      <a href="./login.php"><?php echo (defined('TITLE') ? constant('TITLE') : null);?>
</a> / <?php echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);
if ($_GET['id']) {?>更新<?php } else { ?>編集<?php }?>     </div>


     <div id="data">
<div style="width:90%;">
        <div class="patternPan">
        <?php echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
を<?php if ($_REQUEST['kindId']) {?>編集<?php } else { ?>登録<?php }?>します。<br />
        <span style="color:#ff0000;">＊の項目は必ず入力・選択してください</span>
        </div>


        <?php if ($_GET['r'] || $_GET['d']) {?>
        <div style="margin:12px 0 20px 0;padding:10px;border:1px solid #ff99ff;background-color:#ffffff;color:#ff33ff;">
        <?php if ($_GET['d'] == 1) {?><b><?php echo $_GET['t'];?>
</b>を削除しました。<?php }?>
        <?php if ($_GET['d'] == 2) {?><b><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</b>を<?php if ($_GET['dispFlg']) {?>公開<?php } else { ?>非公開に<?php }?>しました。<?php }?>
        <?php if ($_GET['d'] == 3) {?>順番を更新しました。<?php }?>
        <?php if ($_GET['r']) {
echo $_smarty_tpl->tpl_vars['title']->value;?>
を<?php if ($_GET['r'] == 1) {?>登録<?php } else { ?>修正<?php }?>しました。<?php }?>
        </div>
        <?php }?>



<form<?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>

        <?php if ($_REQUEST['id']) {?>
        <p style="margin-bottom:8px;text-align:right;"><a href="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php" style="padding:6px 16px;line-height:1.8em;display:inline-brock;width:70px;height:24px;text-align:center;background-color:#eeeeee;border:1px solid #999999;">新規登録</a></p>
        <?php }?>

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

       <table cellpadding="0" cellspacing="0" style="margin:0 0 10px 0;width:100%;">
          <tr class="caption"><th colspan="2" class="center" class="threg">概要</th></tr>
          <tr>
            <th width="22%" style="text-align:right;" class="threg">大カテゴリ<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['bigCategoryId']['html'];?>
</td>
          </tr>
          <tr>
            <th style="text-align:right;" class="threg">カテゴリ名<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['name']['html'];?>
</td>
          </tr>
          <tr><th width="16%" style="text-align:right;" class="threg">公開状態</th>
          <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['dispFlg']['html'];?>
</td></tr>
       </table>


       <div id="naviBt03">
        <ul>
                  <li><?php echo $_smarty_tpl->tpl_vars['form']->value['submitReg']['html'];?>
</li>
         <?php echo $_smarty_tpl->tpl_vars['form']->value['hidden'];?>

        </ul>
       </div>
       <div class="clear" style="margin-bottom:20px;"></div>
</form>


<form<?php echo $_smarty_tpl->tpl_vars['categoryform']->value['attributes'];?>
>
       <div class="patternPan">
       <?php if (!$_REQUEST['bigCategoryId']) {?><p style="color:#ff0000;line-height:1.8em;">大カテゴリを選択してください。</p><?php }?>
       <p><?php echo $_smarty_tpl->tpl_vars['categoryform']->value['bigCategoryId']['html'];
if ($_REQUEST['bigCategoryId']) {?>のカテゴリ一覧を表示しています。<?php }?></p>
       <input type="submit" name="creg" value="選択" style="margin:6px 0 0 4px;" />
       </div>
</form>


<div class="clear" style="margin-bottom:20px;"></div>

<?php if ($_GET['bigCategoryId']) {?>
<table id="sort" class="datasheet" cellpadding="0" cellspacing="0" style="margin:10px 0 0 0;width:100%;">
<tr>
<th style="text-align:center;" class="threg" colspan="3">名前</th>
<th style="text-align:center; width:100px;" class="threg">公開設定</th>
<th style="text-align:center; width:50px;" class="threg">削除</th>
</tr>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'value', false, 'key', 'result', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
<tr>
<td class="tdreg sortThis" data-idnum="<?php echo $_smarty_tpl->tpl_vars['value']->value['categoryId'];?>
"></td>
<td class="tdreg" style="width:28px;text-align:right;"><?php echo $_smarty_tpl->tpl_vars['value']->value['categoryId'];?>
</td>
<td class="tdreg" style="padding:0 0 0 10px;">
    <a href="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php?categoryId=<?php echo $_smarty_tpl->tpl_vars['value']->value['categoryId'];?>
&bigCategoryId=<?php echo $_smarty_tpl->tpl_vars['value']->value['bigCategoryId'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
を編集する"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</a>
</td>
<td style="text-align:center;" class="tdreg"><form action="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php<?php echo $_smarty_tpl->tpl_vars['sortLink']->value['all'];?>
" method="post" style="display:inline;">
    <input type="image" src="./cmn_img/<?php if (!$_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>eye_close.png<?php } else { ?>eye_open.png<?php }?>" name="dispButton" 
           alt="<?php if ($_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>公開中<?php } else { ?>非公開<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>公開中<?php } else { ?>非公開<?php }?>" style="text-align:center;" />
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['categoryId'];?>
" name="categoryId" />
    <input type="hidden" name="mode" value="<?php if (!$_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>open<?php } else { ?>close<?php }?>" />
    <input type="hidden" name="dispFlg" value="<?php if (!$_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>1<?php } else { ?>0<?php }?>" />
</form></td>
<td class="tdreg center"><form action="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php<?php echo $_smarty_tpl->tpl_vars['getLink']->value['all'];?>
" method="post" style="display:inline;">
    <input type="image" src="./cmn_img/dustbox.png" alt="削除する" title="削除する" name="del" onclick="return chk( '<?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
' )" style="text-align:center;" />
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['categoryId'];?>
" name="categoryId" />
    <?php if ($_smarty_tpl->tpl_vars['value']->value['fileName1']) {?><input type="hidden" name="fileName" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['fileName1'];?>
" /><?php }?>
</form></td>
</tr>
<?php
}
if ($_smarty_tpl->tpl_vars['value']->do_else) {
?>
<tr>
<td colspan="13" style="text-align:center;" class="tdreg">
<font><?php if (!$_GET['bigCategoryId']) {?>大カテゴリを選択してください。<?php } else { ?>現在登録はございません。。。<?php }?></font>
</td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>

<?php if ($_smarty_tpl->tpl_vars['list']->value) {?>
<div style="margin-top:16px;">
  <form action="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php<?php echo $_smarty_tpl->tpl_vars['getLink']->value['all'];
if ($_smarty_tpl->tpl_vars['getLink']->value['all']) {?>&<?php } else { ?>?<?php }?>s=1" method="post" enctype="multipart/form-data" name="sort" id="sortSubmit" style="margin-bottom:40px;text-align:center;">
    <input onmouseover="this.style.backgroundColor='#4097ff'" style="font-size:10pt;color:#ffffff;background-color:#026aff;width:200px;line-height:20px;height:30px;margin:0 auto;" onmouseout="this.style.backgroundColor='#026aff'" type="button" value="並び替え" onclick="sortSave( '.sortThis' )">
  </form>
</div>
<?php }?>


<?php }?>
<div class="pager">
<?php echo $_smarty_tpl->tpl_vars['pagerLinks']->value['all'];?>

</div>
<div class="clear"></div>
</div>


     </div>
     <div class="clear"></div>
    </div>
   </div>

   <?php $_smarty_tpl->_subTemplateRender("file:./common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
   <div class="clear"></div>
   <?php $_smarty_tpl->_subTemplateRender("file:./common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 </body>
</html>

<?php }
}
