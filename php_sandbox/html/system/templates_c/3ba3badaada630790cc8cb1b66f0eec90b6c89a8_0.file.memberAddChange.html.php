<?php
/* Smarty version 3.1.48, created on 2025-04-11 08:57:15
  from '/var/www/html/system/templates/memberAddChange.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67f8d96ba42b68_76916615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ba3badaada630790cc8cb1b66f0eec90b6c89a8' => 
    array (
      0 => '/var/www/html/system/templates/memberAddChange.html',
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
function content_67f8d96ba42b68_76916615 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./common/meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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

<form<?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>
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
            <th width="16%" style="text-align:right;" class="threg">会社名<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['companyName']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">お名前<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['name']['html'];?>
　　<a href="./memberDownLoad2List.php?memberId=<?php echo $_smarty_tpl->tpl_vars['data']->value['memberId'];?>
" style="display:inline-block;padding:6px 16px;border:1px solid #666;background-color:#ddd;">製品DL履歴</a></td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">関連業種<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['relationJob']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">職種<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['subJobCategory']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">部署名<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['busyo']['html'];?>
</td>
          </tr>

          <tr>
            <th width="16%" style="text-align:right;" class="threg">メールアドレス<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['eMail']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">パスワード</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['password']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">郵便番号</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['zip1']['html'];?>
 - <?php echo $_smarty_tpl->tpl_vars['form']->value['zip2']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">住所</th>
            <td class="tdreg">
            <?php echo $_smarty_tpl->tpl_vars['form']->value['pref']['html'];?>
<br />
            <?php echo $_smarty_tpl->tpl_vars['form']->value['address1']['html'];?>
<br />
            <?php echo $_smarty_tpl->tpl_vars['form']->value['address2']['html'];?>

            </td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">電話番号<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['tel1']['html'];?>
 - <?php echo $_smarty_tpl->tpl_vars['form']->value['tel2']['html'];?>
 - <?php echo $_smarty_tpl->tpl_vars['form']->value['tel3']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">FAX番号</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['fax1']['html'];?>
 - <?php echo $_smarty_tpl->tpl_vars['form']->value['fax2']['html'];?>
 - <?php echo $_smarty_tpl->tpl_vars['form']->value['fax3']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">御社URL</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['siteUrl']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">弊社ウェブサイトに<br />来られたきっかけを<br />教えて下さい。</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['medium']['html'];?>
</td>
          </tr>
       </table>

</form>
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
