<?php
/* Smarty version 3.1.48, created on 2025-04-11 08:55:55
  from '/var/www/html/system/templates/memberList.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67f8d91b3a8784_98967344',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31477403226ac92366d5d3778d262616f084c14c' => 
    array (
      0 => '/var/www/html/system/templates/memberList.html',
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
function content_67f8d91b3a8784_98967344 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
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

<?php $_smarty_tpl->_subTemplateRender("file:./common/contentsMenu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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

<table cellpadding="0" cellspacing="0" style="width:100%;">
	     <tr class="caption">
		  <th class="center threg" colspan="2">
		   <?php echo (defined('PAGE_TITLE') ? constant('PAGE_TITLE') : null);?>
検索
		   <form action="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php" method="get" style="float:right;"><input class="submits minisubmit" type="submit" name="byall" value="検索条件を解除する" style="width:200px;" /></form>
		  </th>
         </tr>
<form<?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>

         <tr>
          <th width="16%" class="threg">会社名</th>
          <td class="tdreg" style="line-height:2em;"><?php echo $_smarty_tpl->tpl_vars['form']->value['companyName']['html'];?>
</td>
         </tr>
         <tr>
          <th class="threg">名前</th>
          <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['name']['html'];?>
</td>
         </tr>

         <tr>
          <th class="threg">住所</th>
          <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['pref']['html'];
echo $_smarty_tpl->tpl_vars['form']->value['address']['html'];?>
</td>
         </tr>
         <tr>
          <th class="threg">製品名</th>
          <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['puroductId']['html'];?>
</td>
         </tr>

         <tr>
          <th class="threg">関連業種</th>
          <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['relationJob']['html'];?>
</td>
         </tr>
         <tr>
          <th class="threg">職種</th>
          <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['subJobCategory']['html'];?>
</td>
         </tr>
         <tr>
          <th class="threg">ブランク</th>
          <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['blank']['html'];?>
</td>
         </tr>
         <tr>
           <td colspan="4" class="tdreg center">
           <div style="width:100%;height:26px;text-align:center;">
            <input type="submit" name="spotlight" value="この条件で検索する" style="width:200px;text-align:center;" />
           </div>
          </td>
         </tr>
</form>
       </table>

<div class="clear"></div>
<?php if ($_smarty_tpl->tpl_vars['listCount']->value) {?>
<div class="pager">
<?php echo $_smarty_tpl->tpl_vars['pagerLinks']->value['all'];?>

</div>
<div class="clear"></div>
<?php }?>
<table class="datasheet" cellpadding="0" cellspacing="0" style="margin-top:10px;width:100%;">
<col width="160px" />
<col width="160px" />

<col />
<col />
<col width="70px" />
<col width="40px" />
<tr>
<th style="text-align:center;" class="threg">
<a href="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php?sort=regDateTime&cond=<?php if ($_GET['sort'] == "regDateTime" && $_GET['cond'] == "DESC") {?>ASC<?php } else { ?>DESC<?php }
echo $_smarty_tpl->tpl_vars['sortLink']->value['addition'];?>
">
登録日時
<img src="cmn_img/<?php if ($_GET['sort'] == "regDateTime" && $_GET['cond'] == "DESC") {?>down<?php } else { ?>up<?php }?>.gif"/>
</a>
</th>
<th style="text-align:center;" class="threg">
<a href="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php?sort=maxDate&cond=<?php if ($_GET['sort'] == "maxDate" && $_GET['cond'] == "DESC") {?>ASC<?php } else { ?>DESC<?php }
echo $_smarty_tpl->tpl_vars['sortLink']->value['addition'];?>
">
最新DL日時
<img src="cmn_img/<?php if ($_GET['sort'] == "maxDate" && $_GET['cond'] == "DESC") {?>down<?php } else { ?>up<?php }?>.gif"/>
</a>
</th>
<th style="text-align:center;" class="threg">
名前
</th>
<th style="text-align:center;" class="threg">
会社名
</th>
<th style="text-align:center;" class="threg">
DL履歴
</th>
<th style="text-align:center; width:50px;" class="threg">削除</th>
</tr>


<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value', false, 'key', 'result', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
<tr>
<td class="tdreg"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['regDateTime'],"%Y/%m/%d %H:%M");?>
</td>
<td class="tdreg"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['maxDate'],"%Y/%m/%d %H:%M");?>
</td>
<td class="tdreg"><a href="./<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
AddChange.php?memberId=<?php echo $_smarty_tpl->tpl_vars['value']->value['memberId'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</a></td>
<td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['value']->value['companyName'];?>
</td>
<td class="tdreg" style="text-align:center;"><a href="./memberDownLoad2List.php?memberId=<?php echo $_smarty_tpl->tpl_vars['value']->value['memberId'];?>
&productId=<?php echo $_GET['productId'];?>
">履歴</a></td>
<td class="tdreg center"><form action="./<?php echo (defined('THE_FILE_NAME') ? constant('THE_FILE_NAME') : null);?>
.php<?php echo $_smarty_tpl->tpl_vars['getLink']->value['all'];?>
" method="post" style="display:inline;">
    <input type="image" src="./cmn_img/dustbox.png" alt="削除する" title="削除する" name="del" onclick="return chk()" style="text-align:center;" />
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['memberId'];?>
" name="memberId" />
    <?php if ($_smarty_tpl->tpl_vars['value']->value['fileName']) {?><input type="hidden" name="fileName" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['fileName'];?>
" /><?php }?>
</form></td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ($_smarty_tpl->tpl_vars['listCount']->value) {?>
<tr>
<td colspan="13" class="hothre">
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
