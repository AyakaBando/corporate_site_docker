<?php
/* Smarty version 3.1.48, created on 2025-04-11 09:04:25
  from '/var/www/html/system/zEng/templates/productList.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67f8db19c7c638_85842853',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a111a3c76aa0f3dc2e65cc5d5d7a34a416e3d05' => 
    array (
      0 => '/var/www/html/system/zEng/templates/productList.html',
      1 => 1538111996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../templates/common/meta.html' => 1,
    'file:../../templates/common/head.html' => 1,
    'file:../../templates/common/contentsMenu.html' => 1,
    'file:../../templates/common/menu.html' => 1,
    'file:../../templates/common/footer.html' => 1,
  ),
),false)) {
function content_67f8db19c7c638_85842853 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../templates/common/meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8">
<!--
// 確認ウィンドウを表示する
function chk()
{
    if( confirm( "削除してもよろしいですか？" ) )
    {
        return true;
    }
    return false;
}

// 確認ウィンドウを表示する
function cpChk( title )
{
    if( confirm( "『" + title + "』コピーしてもよろしいですか？" ) )
    {
        return true;
    }
    return false;
}
// -->
<?php echo '</script'; ?>
>

</head>
 <body>
  <div id="wrapper">
   <div id="header">
    <div>
	 <?php $_smarty_tpl->_subTemplateRender("file:../../templates/common/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div id="logo"><img src="../../cmn_img/logo.jpg" /></div>
   </div><!-- /#header -->

   <div id="container">
    <div id="contents">
     <div id="pan"><a href="../login.php"><?php echo (defined('TITLE') ? constant('TITLE') : null);?>
</a> / <?php echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
管理 /</div>

<?php $_smarty_tpl->_subTemplateRender("file:../../templates/common/contentsMenu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

     <div id="data">
       <div class="patternPan">
       <?php if (!$_GET['d']) {
echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
一覧を表示しています。
       <?php } elseif ($_GET['d'] == 1) {?><b><?php echo $_GET['t'];?>
</b>を削除しました。
       <?php } elseif ($_GET['d'] == 2) {?><b><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</b>を<?php if ($_GET['dispFlg']) {?>公開<?php } else { ?>非公開に<?php }?>しました。
       <?php } elseif ($_GET['d'] == 3) {?><b><?php echo $_GET['t'];?>
</b>をコピーしました。
       <?php }?>
       </div>
<div class="clear"></div>
<?php if ($_smarty_tpl->tpl_vars['listCount']->value) {?>
<div class="pager">
<?php echo $_smarty_tpl->tpl_vars['pagerLinks']->value['all'];?>

</div>
<div class="clear"></div>
<?php }?>
<table class="datasheet" cellpadding="0" cellspacing="0" style="margin-top:10px;width:100%;">
<col />
<col width="200px" />
<col width="140px" />
<col width="100px" />
<col width="40px" />
<th style="text-align:center;" class="threg">
製品名
</th>
<th style="text-align:center;" class="threg">
絞込みカテゴリ
</th>
<th style="text-align:center;" class="threg">
その他登録
</th>
<th style="text-align:center;" class="threg">
公開状態
</th>
<th style="text-align:center; width:50px;" class="threg">削除</th>
</tr>


<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value', false, 'key', 'result', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
<tr>
<td class="tdreg"><a href="./<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
AddChange.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
 / <?php echo $_smarty_tpl->tpl_vars['value']->value['subName'];?>
</a></td>
<td class="tdreg" style="vertical-align:top;">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productCategoryArray']->value, 'bvalue', false, 'bkey', 'bresult', array (
));
$_smarty_tpl->tpl_vars['bvalue']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['bkey']->value => $_smarty_tpl->tpl_vars['bvalue']->value) {
$_smarty_tpl->tpl_vars['bvalue']->do_else = false;
$_smarty_tpl->_assignInScope('flg', 0);?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoryArray']->value[$_smarty_tpl->tpl_vars['bkey']->value], 'cvalue', false, 'ckey', 'cresult', array (
));
$_smarty_tpl->tpl_vars['cvalue']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ckey']->value => $_smarty_tpl->tpl_vars['cvalue']->value) {
$_smarty_tpl->tpl_vars['cvalue']->do_else = false;
?>
	<?php if ($_smarty_tpl->tpl_vars['value']->value['subCategory'][$_smarty_tpl->tpl_vars['ckey']->value]) {?>
	<?php $_smarty_tpl->_assignInScope('flg', 1);?>
	<?php }?>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php if ($_smarty_tpl->tpl_vars['flg']->value) {?><b><?php echo $_smarty_tpl->tpl_vars['bvalue']->value;?>
</b><br /><?php }?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoryArray']->value[$_smarty_tpl->tpl_vars['bkey']->value], 'cvalue', false, 'ckey', 'cresult', array (
));
$_smarty_tpl->tpl_vars['cvalue']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ckey']->value => $_smarty_tpl->tpl_vars['cvalue']->value) {
$_smarty_tpl->tpl_vars['cvalue']->do_else = false;
?>
		<?php if ($_smarty_tpl->tpl_vars['value']->value['subCategory'][$_smarty_tpl->tpl_vars['ckey']->value]) {?>
			　<?php echo $_smarty_tpl->tpl_vars['cvalue']->value;?>
<br />
		<?php }?>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</td>
<td class="tdreg">
<a href="<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
_imgAddChange.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">設置事例</a><br />
<a href="<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
_newsList.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">お知らせ</a><br />
</td>

<td style="text-align:center;" class="tdreg">
  <form action="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php<?php echo $_smarty_tpl->tpl_vars['getLink']->value['all'];?>
" method="post" style="display:inline;">
    <input type="image" src="../cmn_img/<?php if (!$_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>eye_close.png<?php } else { ?>eye_open.png<?php }?>" name="dispButton" 
           alt="<?php if ($_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>公開中<?php } else { ?>非公開<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>公開中<?php } else { ?>非公開<?php }?>" style="text-align:center;" />
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" name="id" />
    <input type="hidden" name="mode" value="<?php if (!$_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>open<?php } else { ?>close<?php }?>" />
    <input type="hidden" name="dispFlg" value="<?php if (!$_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>1<?php } else { ?>0<?php }?>" />
  </form>
</td>

<td class="tdreg center"><form action="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php<?php echo $_smarty_tpl->tpl_vars['getLink']->value['all'];?>
" method="post" style="display:inline;">
    <input type="image" src="../cmn_img/dustbox.png" alt="削除する" title="削除する" name="del" onclick="return chk()" style="text-align:center;" />
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" name="id" />
</form></td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ($_smarty_tpl->tpl_vars['listCount']->value) {?>
<tr>
<td colspan="13" class="hothre">
<font>全<?php echo $_smarty_tpl->tpl_vars['listCount']->value;?>
件中<?php echo $_smarty_tpl->tpl_vars['cnt']->value['start'];?>
～<?php echo $_smarty_tpl->tpl_vars['cnt']->value['end'];?>
件を表示。</font>
</td>
</tr>
<?php }?>
</table>

<div class="pager">
<?php echo $_smarty_tpl->tpl_vars['pagerLinks']->value['all'];?>

</div>      <div class="clear"></div>
     </div>
     <div class="clear"></div>
    </div>
   </div>

<?php $_smarty_tpl->_subTemplateRender("file:../../templates/common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>   <div class="clear"></div>
   <?php $_smarty_tpl->_subTemplateRender("file:../../templates/common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </div>
 </body>
</html>
<?php }
}
