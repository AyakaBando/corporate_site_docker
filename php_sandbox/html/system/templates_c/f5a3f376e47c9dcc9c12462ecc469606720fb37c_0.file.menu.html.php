<?php
/* Smarty version 3.1.48, created on 2025-04-11 08:07:54
  from '/var/www/html/system/templates/common/menu.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67f8cddac41636_67798777',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5a3f376e47c9dcc9c12462ecc469606720fb37c' => 
    array (
      0 => '/var/www/html/system/templates/common/menu.html',
      1 => 1538111995,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f8cddac41636_67798777 (Smarty_Internal_Template $_smarty_tpl) {
?>  <div id="sidebar">
     <h3 style="text-align:center;margin-bottom:4px;font-size:14px;">製品関連</h3>
     <ul style="margin-bottom:14px;">
        <li><a href="/system/categoryAddChange.php">製品カテゴリ</a></li>
        <li><a href="/system/productList.php">製品管理</a></li>
     </ul>

     <h3 style="text-align:center;margin-bottom:4px;font-size:14px;">会員関連</h3>
     <ul style="margin-bottom:14px;">
        <li><a href="/system/memberList.php">会員管理</a></li>
        <li><a href="/system/memberPageViewList.php">製品ページアクセス数</a></li>
        <li><a href="/system/memberDownLoadList.php">製品DL</a></li>
     </ul>

    <h3 style="text-align:center;margin-bottom:4px;font-size:14px;">その他</h3>
    <ul style="margin-bottom:14px;">
        <li><a href="/system/whatsNewList.php">ニュース管理</a></li>
        <li><a href="/system/topMainVisualAddChange.php">TOPﾒｲﾝﾋﾞｼﾞｭｱﾙ管理</a></li>
        <li><a href="/system/passAddChange.php?id=1">アカウント管理</a></li>
     </ul>
     <h3 style="text-align:center;margin-bottom:4px;font-size:14px;">英語サイト</h3>
     <ul style="margin-bottom:14px;">
        <li><a href="/system/zEng/topMainVisualAddChange.php">TOPﾒｲﾝﾋﾞｼﾞｭｱﾙ管理</a></li>
        <li><a href="/system/zEng/whatsNewList.php">ニュース管理</a></li>
        <li><a href="/system/zEng/categoryAddChange.php">製品カテゴリ</a></li>
        <li><a href="/system/zEng/productList.php">製品管理</a></li>
     </ul>


  </div>
<?php }
}
