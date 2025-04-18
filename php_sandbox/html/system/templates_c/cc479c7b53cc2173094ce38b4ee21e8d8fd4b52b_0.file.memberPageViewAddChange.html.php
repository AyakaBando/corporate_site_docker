<?php
/* Smarty version 3.1.48, created on 2025-04-16 08:51:09
  from '/var/www/html/system/templates/memberPageViewAddChange.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67ff6f7de20d35_92873907',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc479c7b53cc2173094ce38b4ee21e8d8fd4b52b' => 
    array (
      0 => '/var/www/html/system/templates/memberPageViewAddChange.html',
      1 => 1538111977,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/meta.html' => 1,
    'file:./common/head.html' => 1,
    'file:./common/contentsMenu.html' => 1,
    'file:./common/menu.html' => 1,
    'file:./common/footer.html' => 1,
  ),
),false)) {
function content_67ff6f7de20d35_92873907 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./common/meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 type="text/javascript" src="./js/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="./js/ckfinder/ckfinder.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="./js/setForm.js"><?php echo '</script'; ?>
>


</head>
 <body id="two-left-w">
  <div id="wrapper">
   <div id="header">
    <div>
     <?php $_smarty_tpl->_subTemplateRender("file:./common/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


   </div><!-- /#header -->
   <div id="container">
    <div id="contents">
     <div id="pan">
      <a href="./login.php"><?php echo (defined('TITLE') ? constant('TITLE') : null);?>
</a> / <a href="./<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
List.php"><?php echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
一覧</a> / <?php echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);
if ($_GET['id']) {?>更新<?php } else { ?>編集<?php }?>     </div>

<?php $_smarty_tpl->_subTemplateRender("file:./common/contentsMenu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

     <div id="data">

       <div class="patternPan">
       <?php echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
を<?php if ($_REQUEST['id']) {?>編集<?php } else { ?>登録<?php }?>します。<br />
       <span style="color:#ff0000;">＊の項目は必ず入力・選択してください</span>
       </div>

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

       <table cellpadding="0" cellspacing="0" style="margin-bottom:20px;width:100%;">
         <tr class="caption"><th colspan="2" class="center threg">概要</th></tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">ブランド名</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['data']->value['subName'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">製品名</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</td>
          </tr>
<form<?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">集計月選択</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['year']['html'];?>
 年　<?php echo $_smarty_tpl->tpl_vars['form']->value['month']['html'];?>
 月　　　<?php echo $_smarty_tpl->tpl_vars['form']->value['submitSearch']['html'];
echo $_smarty_tpl->tpl_vars['form']->value['hidden'];?>

            <?php if ($_GET['submitSearch']) {?><input type="button" onclick="location.href='./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php?id=<?php echo $_REQUEST['id'];?>
'" value="リセット" /><?php }?>
            </td>
          </tr>
</form>
       </table>


       <table cellpadding="0" cellspacing="0" style="margin:0 0 20px 0;width:40%;">
         <tr class="caption"><th colspan="2" class="center threg">アクセス概要</th></tr>
         <tr class="caption"><th class="center threg">名前</th><th class="center threg">アクセス数</th></tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dataMember']->value, 'value', false, 'key', 'result', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
    <?php if ($_smarty_tpl->tpl_vars['dataCnt']->value[$_smarty_tpl->tpl_vars['value']->value['memberId']]['cnt']) {?>
          <tr>
            <th width="30%" style="text-align:right;" class="threg"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['dataCnt']->value[$_smarty_tpl->tpl_vars['value']->value['memberId']]['cnt'];?>
</td>
          </tr>
    <?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
       </table>

       <div class="clear"></div>
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
