<?php
/* Smarty version 3.1.48, created on 2025-04-11 08:59:40
  from '/var/www/html/system/templates/memberDownLoadList.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67f8d9fcd085f3_03417992',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9a6589d4ac6c02a0c1c1d99291aaeba3ffe3b48' => 
    array (
      0 => '/var/www/html/system/templates/memberDownLoadList.html',
      1 => 1538111977,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/meta.html' => 1,
    'file:./common/head.html' => 1,
    'file:./common/downloadMenu2.html' => 1,
    'file:./common/menu.html' => 1,
    'file:./common/footer.html' => 1,
  ),
),false)) {
function content_67f8d9fcd085f3_03417992 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./common/meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
	 <?php $_smarty_tpl->_subTemplateRender("file:./common/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div id="logo"><img src="../../cmn_img/logo.jpg" /></div>
   </div><!-- /#header -->

   <div id="container">
    <div id="contents">
     <div id="pan"><a href="login.php"><?php echo (defined('TITLE') ? constant('TITLE') : null);?>
</a> / <?php echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
管理 /</div>

<?php $_smarty_tpl->_subTemplateRender("file:./common/downloadMenu2.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
<col width="100px" />

<th style="text-align:center;" class="threg">
製品名
</th>
<th style="text-align:center;" class="threg">ダウンロード数</th>

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
<td class="tdreg" style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['dataCnt']->value['zip'][$_smarty_tpl->tpl_vars['value']->value['id']]['cnt']+$_smarty_tpl->tpl_vars['dataCnt']->value['file'][$_smarty_tpl->tpl_vars['value']->value['id']];?>
</td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ($_smarty_tpl->tpl_vars['listCount']->value) {?>
<tr>
<td colspan="2" class="hothre">
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

<?php $_smarty_tpl->_subTemplateRender("file:./common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>   <div class="clear"></div>
   <?php $_smarty_tpl->_subTemplateRender("file:./common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </div>
 </body>
</html>
<?php }
}
