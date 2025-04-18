<?php
/* Smarty version 3.1.48, created on 2025-04-16 01:44:37
  from '/var/www/html/system/templates/productAddChange.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_67ff0b85026886_91168322',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec7f1207b917650711b0b260266233c2952a3e5d' => 
    array (
      0 => '/var/www/html/system/templates/productAddChange.html',
      1 => 1744767649,
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
function content_67ff0b85026886_91168322 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./common/meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- <link rel="stylesheet" type="text/css" href="./css/ui.all.css"/>
<link rel="stylesheet" type="text/css" href="./css/ui.datepicker.css"/>
<link rel="stylesheet" type="text/css" href="./css/mdp.css" />
<?php echo '<script'; ?>
 type="text/javascript" src="./js/ui.core.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="./js/ui.datepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="./js/ui.datepicker-ja.js"><?php echo '</script'; ?>
> -->

<?php echo '<script'; ?>
 type="text/javascript" src="./js/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="./js/ckfinder/ckfinder.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="./js/setForm.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript">
var prtJson<?php if ($_smarty_tpl->tpl_vars['prtJson']->value) {?> = <?php echo $_smarty_tpl->tpl_vars['prtJson']->value;
}?>;

var category<?php if ($_smarty_tpl->tpl_vars['data']->value['category']) {?> = <?php echo $_smarty_tpl->tpl_vars['data']->value['category'];
}?>;


$(function(){
    if( category )setSelectBox( category );
});




<?php echo '</script'; ?>
>

<!-- <style type="text/css">
.checkBox h3{
    font-size:16px;
    margin-bottom:8px;
}
.checkBox div{
    margin-bottom:18px;
}
</style> -->



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
            <th width="16%" style="text-align:right;" class="threg">絞込み用カテゴリ<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg checkBox">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productCategoryArray']->value, 'value', false, 'key', 'result', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['categoryArray']->value[$_smarty_tpl->tpl_vars['key']->value]) {?>
                <div>
                    <h3 style="font-size:18px;font-weight:bold;margin-bottom:4px;color:#333">■<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
 <span style="font-size:14px;font-weight:normal;color:#000;"><?php echo $_smarty_tpl->tpl_vars['mvalue']->value;?>
</span></h3>
                    <div style="margin-bottom:12px;padding-left:16px;">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoryArray']->value[$_smarty_tpl->tpl_vars['key']->value], 'svalue', false, 'skey', 'sresult', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['svalue']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['skey']->value => $_smarty_tpl->tpl_vars['svalue']->value) {
$_smarty_tpl->tpl_vars['svalue']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_sresult']->value['iteration']++;
?>
                    <p style="width:25%;"><?php echo $_smarty_tpl->tpl_vars['form']->value['subCategory'][$_smarty_tpl->tpl_vars['skey']->value]['html'];?>
</p><?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_sresult']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_sresult']->value['iteration'] : null)%4 == 0) {?><br style="clear:both;" /><?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                    <br style="clear:both;" />
                </div>
                <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </td>
          </tr>

          <tr>
            <th width="16%" style="text-align:right;" class="threg">ブランド名<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['subName']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">製品名<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['name']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">製品簡易説明用タイトル</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['subTitle']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">製品簡易説明</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['subComment']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">DLファイル名</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['dlfileName']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">フリーコンテンツタイトル1</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['commentTitle']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">フリーコンテンツ1</th>
            <td class="tdreg">
            <?php if ($_smarty_tpl->tpl_vars['flg']->value == 1) {?>
                <div class="confFCK">
                    <?php echo $_smarty_tpl->tpl_vars['confComment']->value;?>

                </div>
                <input type="hidden" name="comment" value="<?php echo $_smarty_tpl->tpl_vars['hiddenValue']->value;?>
" />
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['form']->value['comment']['html'];?>

                <?php echo '<script'; ?>
 type="text/javascript">
                  var news_text = CKEDITOR.replace( 'comment' );
                  CKEDITOR.config.height = '600px';
                  CKFinder.setupCKEditor( news_text, './js/ckfinder/' );
                <?php echo '</script'; ?>
>
            <?php }?>
            </td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">フリーコンテンツタイトル2</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['otherTitle']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">フリーコンテンツ2</th>
            <td class="tdreg">
            <?php if ($_smarty_tpl->tpl_vars['flg']->value == 1) {?>
                <div class="confFCK">
                    <?php echo $_smarty_tpl->tpl_vars['confOtherComment']->value;?>

                </div>
                <input type="hidden" name="otherComment" value="<?php echo $_smarty_tpl->tpl_vars['hiddenOtherValue']->value;?>
" />
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['form']->value['otherComment']['html'];?>

                <?php echo '<script'; ?>
 type="text/javascript">
                  var news_text = CKEDITOR.replace( 'otherComment' );
                  CKEDITOR.config.height = '600px';
                  CKFinder.setupCKEditor( news_text, './js/ckfinder/' );
                <?php echo '</script'; ?>
>
            <?php }?>
            </td>
          </tr>

          <tr>
            <th width="16%" style="text-align:right;" class="threg">フリーコンテンツタイトル3</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['otherTitle2']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">フリーコンテンツ3</th>
            <td class="tdreg">
            <?php if ($_smarty_tpl->tpl_vars['flg']->value == 1) {?>
                <div class="confFCK">
                    <?php echo $_smarty_tpl->tpl_vars['confOtherComment2']->value;?>

                </div>
                <input type="hidden" name="otherComment2" value="<?php echo $_smarty_tpl->tpl_vars['hiddenOtherValue2']->value;?>
" />
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['form']->value['otherComment2']['html'];?>

                <?php echo '<script'; ?>
 type="text/javascript">
                  var news_text = CKEDITOR.replace( 'otherComment2' );
                  CKEDITOR.config.height = '600px';
                  CKFinder.setupCKEditor( news_text, './js/ckfinder/' );
                <?php echo '</script'; ?>
>
            <?php }?>
            </td>
          </tr>

<?php $_smarty_tpl->_assignInScope('sessionKey', (defined('FILE_SESSION_KEY') ? constant('FILE_SESSION_KEY') : null));
$__section_cnt_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['maxImageCnt']->value+1) ? count($_loop) : max(0, (int) $_loop));
$__section_cnt_0_start = min(1, $__section_cnt_0_loop);
$__section_cnt_0_total = min(($__section_cnt_0_loop - $__section_cnt_0_start), $__section_cnt_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_cnt'] = new Smarty_Variable(array());
if ($__section_cnt_0_total !== 0) {
for ($__section_cnt_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] = $__section_cnt_0_start; $__section_cnt_0_iteration <= $__section_cnt_0_total; $__section_cnt_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']++){
?>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">詳細画像<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null);
if ((isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null) == 1) {?><span style="color:#ff0000;">＊</span><?php }?></th>
            <td class="tdreg" style="padding-bottom:10px;">


               <?php if ($_smarty_tpl->tpl_vars['fileFlg']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)] == 1) {?>
                   <?php if (!$_POST['imageDel'][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)] && $_SESSION[$_smarty_tpl->tpl_vars['sessionKey']->value][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['fileName']) {?>
                       <img src="./temp/<?php echo $_SESSION[$_smarty_tpl->tpl_vars['sessionKey']->value][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['fileName'];?>
" alt="アップ予定ファイル" width="<?php echo $_SESSION[$_smarty_tpl->tpl_vars['sessionKey']->value][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['img']['width'];?>
" height="<?php echo $_SESSION[$_smarty_tpl->tpl_vars['sessionKey']->value][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['img']['height'];?>
" /><br />
                       <input type="hidden" name="fileName[<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null);?>
]" value="<?php echo $_SESSION[$_smarty_tpl->tpl_vars['sessionKey']->value][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['fileName'];?>
" />

                   <?php } elseif (!$_POST['imageDel'][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)] && $_smarty_tpl->tpl_vars['data']->value['image'][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['fileName'] && !$_SESSION[$_smarty_tpl->tpl_vars['sessionKey']->value][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['fileName']) {?>
                       <img src="../upImage/<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['image'][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['fileName'];?>
" alt="登録画像" width="<?php echo $_smarty_tpl->tpl_vars['data']->value['image'][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['size']['width'];?>
" /><br />
                       <input type="hidden" name="fileName[<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null);?>
]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['image'][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['fileName'];?>
" />

                   <?php }?>
               <?php } else { ?>
                   <?php if ($_smarty_tpl->tpl_vars['data']->value['image'][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['fileName'] && !$_SESSION[$_smarty_tpl->tpl_vars['sessionKey']->value][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['fileName']) {?>
                       <img src="../upImage/<?php echo (defined('FILE_CATEGORY') ? constant('FILE_CATEGORY') : null);?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['image'][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['fileName'];?>
" alt="登録画像" width="<?php echo $_smarty_tpl->tpl_vars['data']->value['image'][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['size']['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['data']->value['image'][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['size']['height'];?>
" /><br />
                       <input type="hidden" name="fileName[<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null);?>
]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['image'][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['fileName'];?>
" />

                   <?php } elseif ($_SESSION[$_smarty_tpl->tpl_vars['sessionKey']->value][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['fileName']) {?>
                       <img src="./temp/<?php echo $_SESSION[$_smarty_tpl->tpl_vars['sessionKey']->value][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['fileName'];?>
" alt="登録画像" /><br />
                       <input type="hidden" name="fileName[<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null);?>
]" value="<?php echo $_SESSION[$_smarty_tpl->tpl_vars['sessionKey']->value][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['fileName'];?>
" width="<?php echo $_SESSION[$_smarty_tpl->tpl_vars['sessionKey']->value][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['img']['width'];?>
" height="<?php echo $_SESSION[$_smarty_tpl->tpl_vars['sessionKey']->value][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['img']['height'];?>
" />
                   <?php }?>
               <?php }?>
                   <?php if (!$_smarty_tpl->tpl_vars['flg']->value) {?>
                   <?php echo $_smarty_tpl->tpl_vars['form']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['html'];?>

                   <br /><span style="font-size:10px;color:#ff0000;">登録画像サイズ 横<?php echo $_smarty_tpl->tpl_vars['maxWidth']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)];?>
px×縦<?php echo $_smarty_tpl->tpl_vars['maxHeight']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)];?>
px</span>
                   <?php }?>
                   <br /><?php echo $_smarty_tpl->tpl_vars['form']->value['imageDel'][(isset($_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_cnt']->value['index'] : null)]['html'];?>

            </td>
          </tr>
<?php
}
}
?>

          <tr>
            <th width="16%" style="text-align:right;" class="threg">関連製品</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['related']['html'];?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">公開設定</th>
            <td class="tdreg"><?php echo $_smarty_tpl->tpl_vars['form']->value['dispFlg']['html'];?>
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
         <?php echo $_smarty_tpl->tpl_vars['form']->value['hidden'];?>

        </ul>
       </div>
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
