<?php
/* Smarty version 3.1.48, created on 2025-04-16 09:13:03
  from '/var/www/html/system/templates/common/head.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67ff749fc274b1_12975400',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23f730359f588527c95b297b627373b68a39f21a' => 
    array (
      0 => '/var/www/html/system/templates/common/head.html',
      1 => 1744794781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67ff749fc274b1_12975400 (Smarty_Internal_Template $_smarty_tpl) {
?>
   <div id="l_h"><?php echo (defined('TITLE') ? constant('TITLE') : null);?>
 </div>

     <div id="r_h" style="text-align:right;">
       <?php echo (defined('TODAY') ? constant('TODAY') : null);?>
(<?php echo (defined('DAY_OF_WEEK') ? constant('DAY_OF_WEEK') : null);?>
)&nbsp;&nbsp;<?php echo (defined('USER_NAME') ? constant('USER_NAME') : null);?>
さんがログインしています&nbsp;
       <span style="display:block;float:right;margin-right:12px;">
           <input type="button" class="submits minisubmit" value="ログアウト" onClick="location.href='/system/logout.php'" style="margin-left:12px;" />
       </span>
     </div>
     <div class="clear"></div>
     <div style="font-size: 50px; color: #fff; text-align: center; background-color: red; width: 20%; margin: 0 auto; padding: 1rem 2rem;">仮想環境</div>
    </div><?php }
}
