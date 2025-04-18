<?php
/* Smarty version 3.1.48, created on 2025-04-11 09:01:48
  from '/var/www/html/system/templates/whatsNewList.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67f8da7c334fc5_49570582',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '158ee8db5f18bb42bdd1e4e256dc28524db6fa87' => 
    array (
      0 => '/var/www/html/system/templates/whatsNewList.html',
      1 => 1538111978,
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
function content_67f8da7c334fc5_49570582 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender("file:./common/meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" type="text/css" href="css/pulldown.css"/>
<?php echo '<script'; ?>
 type="text/javascript" src="./js/load.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="./js/setForm.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8">
<!--
jQuery(function($){
 $('.datasheet').tableHover();
 });
// 確認ウィンドウを表示する
function chk()
{
    if( confirm( "削除してもよろしいですか？" ) )
    {
        return true;
    }
    return false;
}


// -->
<?php echo '</script'; ?>
>

</head>
 <body id="two-left-w">
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


<?php $_smarty_tpl->_subTemplateRender("file:./common/contentsMenu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <div class="patternPan" style="margin-top:10px;<?php if ($_GET['r'] || $_GET['d']) {?>border-color:#0066ff;<?php }?>">
     <?php if (!$_GET['r'] && !$_GET['d']) {?>
         <?php echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
一覧を表示しています。
     <?php } elseif ($_GET['r']) {?>
         <?php echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
を登録しました。
     <?php } elseif ($_GET['d'] == 1) {?>
         『<b><?php echo $_GET['t'];?>
</b>』を<?php if ($_GET['disp']) {?>表示<?php } else { ?>非表示に<?php }?>しました。
     <?php } elseif ($_GET['d'] == 2) {?>
         『<b><?php echo $_GET['t'];?>
</b>』を削除しました。
     <?php }?>
    </div>


     <div id="data">

<div class="clear"></div>

<table class="datasheet" cellpadding="0" cellspacing="0" style="margin-top:10px;width:100%;">
<tr>
    <th style="width:140px;text-align:center;" class="threg">
      <a href="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php?sort=dateTime&cond=<?php if ($_GET['sort'] == "dateTime" && $_GET['cond'] == "DESC") {?>ASC<?php } else { ?>DESC<?php }
echo $_smarty_tpl->tpl_vars['sortLink']->value['addition'];?>
">
        投稿日
        <img src="cmn_img/<?php if ($_GET['sort'] == "dateTime" && $_GET['cond'] == "DESC") {?>down<?php } else { ?>up<?php }?>.gif"/></a>
    </th>
    <th style="width:80px;text-align:center;" class="threg">
        タイプ
    </th>
    <th style="width:80px;text-align:center;" class="threg">
        カテゴリ
    </th>

    <th style="text-align:center;" class="threg">
        タイトル
    </th>

    <th style="width:80px;text-align:center;" class="threg">
        <a href="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php?sort=dispFlg&cond=<?php if ($_GET['sort'] == "dispFlg" && $_GET['cond'] == "DESC") {?>ASC<?php } else { ?>DESC<?php }
echo $_smarty_tpl->tpl_vars['sortLink']->value['addition'];?>
">
        公開
        <img src="cmn_img/<?php if ($_GET['sort'] == "dispFlg" && $_GET['cond'] == "DESC") {?>down<?php } else { ?>up<?php }?>.gif"/></a>
    </th>
    <th style="width:30px;text-align:center;" class="threg">処理</th>
</tr>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value', false, 'key', 'result', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
<tr>
<td class="tdreg"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['dateTime'],"%Y/%m/%d %H:%M");?>
</td>
<td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['whatsNewContentsCategory']->value[$_smarty_tpl->tpl_vars['value']->value['contentsCategory']];?>
<br /></td>
<td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['whatsNewCategory']->value[$_smarty_tpl->tpl_vars['value']->value['category']];?>
</td>
<td class="tdreg"><a href="./<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
AddChange.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</a><br />url:　<?php echo (defined('DOMAIN') ? constant('DOMAIN') : null);?>
/news/detail.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
</td>
<td style="width:13px;text-align:center;" class="tdreg">
    <a href="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
&mode=disp&dispFlg=<?php if (!$_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>1<?php } else { ?>0<?php }
echo $_smarty_tpl->tpl_vars['getLink']->value['addition'];?>
">
                    <img src="./cmn_img/<?php if (!$_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>eye_close.png<?php } else { ?>eye_open.png<?php }?>" 
                 alt="<?php if (!$_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>非表示<?php } else { ?>表示中<?php }?>" 
                 title="<?php if (!$_smarty_tpl->tpl_vars['value']->value['dispFlg']) {?>非表示<?php } else { ?>表示中<?php }?>" />
    </a>
</td>
<td style="width:13px;text-align:center;" class="tdreg">
    <a href="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
&mode=del<?php echo $_smarty_tpl->tpl_vars['getLink']->value['addition'];?>
" onclick="return chk()">
    <img src="./cmn_img/dustbox.png" alt="削除する" title="削除する" name="del" />
    </a></td>
</tr>
<?php
}
if ($_smarty_tpl->tpl_vars['value']->do_else) {
?>
<tr>
<td style="width:13px;text-align:center;" class="tdreg" colspan="18"><?php echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
は登録されていません。</td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ($_smarty_tpl->tpl_vars['listCount']->value) {?>
<tfoot>
<tr>
<td colspan="18" class="hothre">
<font>全<?php echo $_smarty_tpl->tpl_vars['listCount']->value;?>
件中<?php echo $_smarty_tpl->tpl_vars['cnt']->value['start'];?>
～<?php echo $_smarty_tpl->tpl_vars['cnt']->value['end'];?>
件を表示。</font>
</td>
</tr>
</tfoot>
<?php }?>
</table>


<div class="pager">
<?php echo $_smarty_tpl->tpl_vars['pagerLinks']->value['all'];?>

</div>
      <div class="clear"></div>
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
