<?php
/* Smarty version 3.1.48, created on 2025-04-15 02:27:54
  from '/var/www/html/system/templates/login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67fdc42ad2a9b5_73887981',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e97845adce49d0e98e7c21fd598eb4b3e90ba9d' => 
    array (
      0 => '/var/www/html/system/templates/login.html',
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
function content_67fdc42ad2a9b5_73887981 (Smarty_Internal_Template $_smarty_tpl) {
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
    <div id="contents" style="height:400px;">
     <div id="pan"><?php echo (defined('TITLE') ? constant('TITLE') : null);?>
</div>

     <div id="data">
      <!-- / -->
     </div>
     <div class="clear"></div>
    </div>
   </div>
   <?php $_smarty_tpl->_subTemplateRender("file:./common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

   <div class="clear"></div>
    <?php $_smarty_tpl->_subTemplateRender("file:./common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  </div>

 </body>
</html><?php }
}
