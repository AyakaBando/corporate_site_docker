<?php
/* Smarty version 3.1.48, created on 2025-04-11 08:07:54
  from '/var/www/html/system/templates/common/contentsMenu.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67f8cddab88605_54892192',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '667976b2fd0d5340c439df145b84528928540773' => 
    array (
      0 => '/var/www/html/system/templates/common/contentsMenu.html',
      1 => 1538111995,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f8cddab88605_54892192 (Smarty_Internal_Template $_smarty_tpl) {
?>     <div id="navi" style="margin-bottom:10px;">
      <div id="naviBt">
       <ul>
        <li<?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 1) {?> class="active"<?php }?>><?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 1) {?><font><?php } else { ?><a href="./<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
List.php"><?php }
echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
一覧<?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 1) {?></font><?php } else { ?></a><?php }?></li>
        <?php if ((defined('CHENGE_FLG') ? constant('CHENGE_FLG') : null)) {?><li<?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 2) {?> class="active"<?php }?>><?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 2) {?><font><?php } else { ?><a href="./<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
AddChange.php"><?php }
echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);
if ($_GET['id']) {?>詳細<?php } else { ?>登録<?php }
if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 2) {?></font><?php } else { ?></a><?php }?></li><?php }?>
        <?php if ((defined('SORT_FLG') ? constant('SORT_FLG') : null)) {?><li<?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 3) {?> class="active"<?php }?>><?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 3) {?><font><?php } else { ?><a href="./<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
Sort.php"><?php }
echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
カテゴリ並び替え<?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 3) {?></font><?php } else { ?></a><?php }?></li><?php }?>
        <?php if ((defined('SORT_FLG') ? constant('SORT_FLG') : null)) {?><li<?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 4) {?> class="active"<?php }?>><?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 4) {?><font><?php } else { ?><a href="./<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
AllSort.php"><?php }
echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
並び替え<?php if ((defined('PAGE_NUM') ? constant('PAGE_NUM') : null) == 4) {?></font><?php } else { ?></a><?php }?></li><?php }?>

       </ul>
      </div>
      <div class="clear"></div>
     </div><?php }
}
