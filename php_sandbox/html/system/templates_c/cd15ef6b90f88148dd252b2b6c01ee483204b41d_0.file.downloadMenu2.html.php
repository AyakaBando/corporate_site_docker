<?php
/* Smarty version 3.1.48, created on 2025-04-11 08:59:40
  from '/var/www/html/system/templates/common/downloadMenu2.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67f8d9fcdb55c5_85358770',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd15ef6b90f88148dd252b2b6c01ee483204b41d' => 
    array (
      0 => '/var/www/html/system/templates/common/downloadMenu2.html',
      1 => 1538111995,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f8d9fcdb55c5_85358770 (Smarty_Internal_Template $_smarty_tpl) {
?>     <div id="navi" style="margin-bottom:10px;">
      <div id="naviBt">
       <ul>
        <?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 1) {?><li<?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 1) {?> class="active"<?php }?>><?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 1) {?><font><?php } else { ?><a href="./memberDownLoadList.php"><?php }?>製品ダウンロード一覧<?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 1) {?></font><?php } else { ?></a><?php }?></li><?php }?>
        <?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 2) {?>
        <li<?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 2) {?> class="active"<?php }?>><?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 2) {?><font><?php } else { ?><a href="./memberDownLoad2List.php"><?php }?>会員ダウンロード<?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 2) {?></font><?php } else { ?></a><?php }?></li>
        <li><a href="./memberDownLoadList.php">製品ダウンロード一覧</a></li>
        <?php }?>
       </ul>
      </div>
      <div class="clear"></div>
     </div><?php }
}
