<?php
/* Smarty version 3.1.48, created on 2025-04-15 02:27:52
  from '/var/www/html/system/templates/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67fdc4286524b1_57843675',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a6e74e6f285e22ad5b379ef9b46ece9da078edc' => 
    array (
      0 => '/var/www/html/system/templates/index.html',
      1 => 1538111977,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./common/meta.html' => 1,
    'file:./common/footer.html' => 1,
  ),
),false)) {
function content_67fdc4286524b1_57843675 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./common/meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<link rel="stylesheet" type="text/css" href="css/login.css"/>
<?php echo $_smarty_tpl->tpl_vars['form']->value['javascript'];?>

</head>
 <body>
<form<?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>
   <div class="box">

    <div style="margin:0 0 20px 0;">
     <div style="float:left;">
      <div style="margin:0 0 6px 0;">
       <div style="float:left;margin:0 6px 0 0;">
        <span class="t10">USER ACCOUNT</span><br />
        <?php echo $_smarty_tpl->tpl_vars['form']->value['account']['html'];?>

        
        </div>
       <div style="float:left;margin:0 10px 0 0;">
        <span class="t10">PASSWORD</span><br />
        <?php echo $_smarty_tpl->tpl_vars['form']->value['password']['html'];?>

        </div>

       <div style="float:left;margin:16px 0 0 0;">
        <?php echo $_smarty_tpl->tpl_vars['form']->value['submitConf']['html'];?>

       </div>
        <?php if ($_smarty_tpl->tpl_vars['form']->value['errors']['account']) {?>
            <div style="clear:both;"><span class="t10" style="color:#ff0000;"><?php echo $_smarty_tpl->tpl_vars['form']->value['errors']['account'];?>
</span></div>
        <?php }?>
       <div class="clear"></div>
      </div>
      <div class="clear"></div>
      <div>

       <span style="margin:20px 0 0 0;">
        <?php echo $_smarty_tpl->tpl_vars['form']->value['kaniChk']['html'];?>
       </span>
      </div>
     </div>
     <div class="clear"></div>
    </div>
    <div class="clear"></div>

    <div style="margin:0 0 30px 0;line-height:130%;color:#aaa;">
     <ul>
      <?php if ($_GET['r'] == 'logout') {?><li class="t10">・<font class="error">完全にログアウトしました。</font></li><?php }?>
      <li class="t10">・Forgot your password? You can get help retrieving your password here.</li>
      <li class="t10">・Not a member yet? Creating an account is free and easy. Sign up Now !</li>
      <li class="t10">・Having trouble logging in?  Make sure your browser is set to accept cookies.</li>
     </ul>
<div class="clear"></div>
    </div>
    <div class="clear"></div>
    <?php $_smarty_tpl->_subTemplateRender("file:./common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
   </div>
  </form>
 </body>
</html>
<?php }
}
