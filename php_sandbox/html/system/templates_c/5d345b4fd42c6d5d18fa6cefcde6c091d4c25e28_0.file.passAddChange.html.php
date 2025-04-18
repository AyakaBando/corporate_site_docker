<?php
/* Smarty version 3.1.48, created on 2025-04-11 09:01:58
  from '/var/www/html/system/templates/passAddChange.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67f8da8676f4a2_75837252',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d345b4fd42c6d5d18fa6cefcde6c091d4c25e28' => 
    array (
      0 => '/var/www/html/system/templates/passAddChange.html',
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
function content_67f8da8676f4a2_75837252 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./common/meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>
 <body id="two-left-w">
  <div id="wrapper">
   <div id="header">
    <div>
<?php $_smarty_tpl->_subTemplateRender("file:./common/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div id="logo">
     <img src="cmn_img/logo.jpg" />
    </div>
   </div><!-- /#header -->

   <div id="container">
    <div id="contents">
     <div id="pan">
      <a href="./login.php"><?php echo (defined('TITLE') ? constant('TITLE') : null);?>
</a> / アカウント設定
     </div>



     <div id="data">
<form<?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>
       <div class="patternPan"<?php if ($_GET['r']) {?> style="border-color:#6666ff;"<?php }?>>
           <?php if ($_GET['r']) {?>
           アカウントを更新しました。
           <?php } else { ?>
           アカウントを<?php if ($_GET['id']) {?>更新<?php } else { ?>登録<?php }?>します。
           <?php }?>
       </div>

       <table cellpadding="0" cellspacing="0" style="width:100%;">
         <tr>
           <th width="16%" class="threg">管理者氏名</th>
           <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['name']['html'];?>
</td>
         </tr>
         <tr>
           <th class="threg">アカウント名</th>
           <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['account']['html'];?>
</td>
         </tr>
         <tr>
           <th class="threg">パスワード</th>
           <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['password']['html'];?>
<input type="hidden" name="dispFlg" value="1" /><?php echo $_smarty_tpl->tpl_vars['form']->value['hidden'];?>
</td>
         </tr>
                </table>
       <div id="naviBt03">
         <ul>
           <li><?php if (!$_smarty_tpl->tpl_vars['flg']->value) {
echo $_smarty_tpl->tpl_vars['form']->value['submitConf']['html'];
} else {
echo $_smarty_tpl->tpl_vars['form']->value['submitReg']['html'];
}?></li>
           <li><?php if (!$_smarty_tpl->tpl_vars['flg']->value) {
echo $_smarty_tpl->tpl_vars['form']->value['reset']['html'];
} else {
echo $_smarty_tpl->tpl_vars['form']->value['submitReturn']['html'];
}?></li>
         </ul>
       </div>

      </form>
      <div class="clear">&nbsp;</div>

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
</html><?php }
}
