<?php /* Smarty version 2.6.19, created on 2015-08-21 10:08:25
         compiled from productAddChange.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../js/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="../js/setForm.js"></script>


<script type="text/javascript">
var prtJson<?php if ($this->_tpl_vars['prtJson']): ?> = <?php echo $this->_tpl_vars['prtJson']; ?>
<?php endif; ?>;

var category<?php if ($this->_tpl_vars['data']['category']): ?> = <?php echo $this->_tpl_vars['data']['category']; ?>
<?php endif; ?>;
<?php echo '
$(function(){
    if( category )setSelectBox( category );
});

'; ?>



</script>
<?php echo '
<style type="text/css">
<!--
.checkBox h3{
    font-size:16px;
    margin-bottom:8px;
}
.checkBox div{
    margin-bottom:18px;
}
-->
</style>

'; ?>


</head>
 <body id="two-left-w">
  <div id="wrapper">
   <div id="header">
    <div>
     <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/common/head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


   </div><!-- /#header -->
   <div id="container">
    <div id="contents">
     <div id="pan">
      <a href="../login.php"><?php echo @TITLE; ?>
</a> / <a href="./<?php echo @FILE_CATEGORY; ?>
List.php"><?php echo @PAGE_TITLE; ?>
一覧</a> / <?php echo @PAGE_TITLE; ?>
<?php if ($_GET['id']): ?>更新<?php else: ?>編集<?php endif; ?>     </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/common/contentsMenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

     <div id="data">

       <div class="patternPan">
       <?php echo @PAGE_TITLE; ?>
を<?php if ($_REQUEST['id']): ?>編集<?php else: ?>登録<?php endif; ?>します。<br />
       <span style="color:#ff0000;">＊の項目は必ず入力・選択してください</span>
       </div>

<form<?php echo $this->_tpl_vars['form']['attributes']; ?>
>
       <?php if ($this->_tpl_vars['form']['errors']): ?>
       <div style="border:double 3px #ff0000;margin-bottom:10px;background-color:#ffffff;padding:6px;">
       <?php $_from = $this->_tpl_vars['form']['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
       <?php echo $this->_tpl_vars['value']; ?>
<br />
       <?php endforeach; endif; unset($_from); ?>
       </div>
       <?php endif; ?>

       <table cellpadding="0" cellspacing="0" style="margin-bottom:20px;width:100%;">
         <tr class="caption"><th colspan="2" class="center threg">概要</th></tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">絞込み用カテゴリ<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg checkBox">
            <?php $_from = $this->_tpl_vars['productCategoryArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
                <?php if ($this->_tpl_vars['categoryArray'][$this->_tpl_vars['key']]): ?>
                <div>
                    <h3 style="font-size:18px;font-weight:bold;margin-bottom:4px;color:#333">■<?php echo $this->_tpl_vars['value']; ?>
 <span style="font-size:14px;font-weight:normal;color:#000;"><?php echo $this->_tpl_vars['mvalue']; ?>
</span></h3>
                    <div style="margin-bottom:12px;padding-left:16px;">
                    <?php $_from = $this->_tpl_vars['categoryArray'][$this->_tpl_vars['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sresult'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sresult']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['skey'] => $this->_tpl_vars['svalue']):
        $this->_foreach['sresult']['iteration']++;
?>
                    <p style="width:25%;"><?php echo $this->_tpl_vars['form']['subCategory'][$this->_tpl_vars['skey']]['html']; ?>
</p><?php if ($this->_foreach['sresult']['iteration'] % 4 == 0): ?><br style="clear:both;" /><?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    </div>
                    <br style="clear:both;" />
                </div>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
            </td>
          </tr>

          <tr>
            <th width="16%" style="text-align:right;" class="threg">ブランド名<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['subName']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">製品名<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['name']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">製品簡易説明用タイトル</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['subTitle']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">製品簡易説明</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['subComment']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">フリーコンテンツタイトル1</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['commentTitle']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">フリーコンテンツ1</th>
            <td class="tdreg">
            <?php if ($this->_tpl_vars['flg'] == 1): ?>
                <div class="confFCK">
                    <?php echo $this->_tpl_vars['confComment']; ?>

                </div>
                <input type="hidden" name="comment" value="<?php echo $this->_tpl_vars['hiddenValue']; ?>
" />
            <?php else: ?>
                <?php echo $this->_tpl_vars['form']['comment']['html']; ?>

                <script type="text/javascript">
                  var news_text = CKEDITOR.replace( 'comment' );
                  CKEDITOR.config.height = '600px';
                  CKFinder.setupCKEditor( news_text, '../js/ckfinder/' );
                </script>
            <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">フリーコンテンツタイトル2</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['otherTitle']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">フリーコンテンツ2</th>
            <td class="tdreg">
            <?php if ($this->_tpl_vars['flg'] == 1): ?>
                <div class="confFCK">
                    <?php echo $this->_tpl_vars['confOtherComment']; ?>

                </div>
                <input type="hidden" name="otherComment" value="<?php echo $this->_tpl_vars['hiddenOtherValue']; ?>
" />
            <?php else: ?>
                <?php echo $this->_tpl_vars['form']['otherComment']['html']; ?>

                <script type="text/javascript">
                  var news_text = CKEDITOR.replace( 'otherComment' );
                  CKEDITOR.config.height = '600px';
                  CKFinder.setupCKEditor( news_text, '../js/ckfinder/' );
                </script>
            <?php endif; ?>
            </td>
          </tr>

          <tr>
            <th width="16%" style="text-align:right;" class="threg">フリーコンテンツタイトル3</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['otherTitle2']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">フリーコンテンツ3</th>
            <td class="tdreg">
            <?php if ($this->_tpl_vars['flg'] == 1): ?>
                <div class="confFCK">
                    <?php echo $this->_tpl_vars['confOtherComment2']; ?>

                </div>
                <input type="hidden" name="otherComment2" value="<?php echo $this->_tpl_vars['hiddenOtherValue2']; ?>
" />
            <?php else: ?>
                <?php echo $this->_tpl_vars['form']['otherComment2']['html']; ?>

                <script type="text/javascript">
                  var news_text = CKEDITOR.replace( 'otherComment2' );
                  CKEDITOR.config.height = '600px';
                  CKFinder.setupCKEditor( news_text, '../js/ckfinder/' );
                </script>
            <?php endif; ?>
            </td>
          </tr>

<?php $this->assign('sessionKey', @FILE_SESSION_KEY); ?>
<?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['start'] = (int)1;
$this->_sections['cnt']['loop'] = is_array($_loop=$this->_tpl_vars['maxImageCnt']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cnt']['show'] = true;
$this->_sections['cnt']['max'] = $this->_sections['cnt']['loop'];
$this->_sections['cnt']['step'] = 1;
if ($this->_sections['cnt']['start'] < 0)
    $this->_sections['cnt']['start'] = max($this->_sections['cnt']['step'] > 0 ? 0 : -1, $this->_sections['cnt']['loop'] + $this->_sections['cnt']['start']);
else
    $this->_sections['cnt']['start'] = min($this->_sections['cnt']['start'], $this->_sections['cnt']['step'] > 0 ? $this->_sections['cnt']['loop'] : $this->_sections['cnt']['loop']-1);
if ($this->_sections['cnt']['show']) {
    $this->_sections['cnt']['total'] = min(ceil(($this->_sections['cnt']['step'] > 0 ? $this->_sections['cnt']['loop'] - $this->_sections['cnt']['start'] : $this->_sections['cnt']['start']+1)/abs($this->_sections['cnt']['step'])), $this->_sections['cnt']['max']);
    if ($this->_sections['cnt']['total'] == 0)
        $this->_sections['cnt']['show'] = false;
} else
    $this->_sections['cnt']['total'] = 0;
if ($this->_sections['cnt']['show']):

            for ($this->_sections['cnt']['index'] = $this->_sections['cnt']['start'], $this->_sections['cnt']['iteration'] = 1;
                 $this->_sections['cnt']['iteration'] <= $this->_sections['cnt']['total'];
                 $this->_sections['cnt']['index'] += $this->_sections['cnt']['step'], $this->_sections['cnt']['iteration']++):
$this->_sections['cnt']['rownum'] = $this->_sections['cnt']['iteration'];
$this->_sections['cnt']['index_prev'] = $this->_sections['cnt']['index'] - $this->_sections['cnt']['step'];
$this->_sections['cnt']['index_next'] = $this->_sections['cnt']['index'] + $this->_sections['cnt']['step'];
$this->_sections['cnt']['first']      = ($this->_sections['cnt']['iteration'] == 1);
$this->_sections['cnt']['last']       = ($this->_sections['cnt']['iteration'] == $this->_sections['cnt']['total']);
?>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">詳細画像<?php echo $this->_sections['cnt']['index']; ?>
<?php if ($this->_sections['cnt']['index'] == 1): ?><span style="color:#ff0000;">＊</span><?php endif; ?></th>
            <td class="tdreg" style="padding-bottom:10px;">


               <?php if ($this->_tpl_vars['fileFlg'][$this->_sections['cnt']['index']] == 1): ?>
                   <?php if (! $_POST['imageDel'][$this->_sections['cnt']['index']] && $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="../temp/<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="アップ予定ファイル" width="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['img']['width']; ?>
" height="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['img']['height']; ?>
" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']; ?>
" />

                   <?php elseif (! $_POST['imageDel'][$this->_sections['cnt']['index']] && $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['fileName'] && ! $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="../../upImage/<?php echo @FILE_CATEGORY; ?>
/<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="登録画像" width="<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['size']['width']; ?>
" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['fileName']; ?>
" />

                   <?php endif; ?>
               <?php else: ?>
                   <?php if ($this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['fileName'] && ! $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="../../upImage/<?php echo @FILE_CATEGORY; ?>
/<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="登録画像" width="<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['size']['width']; ?>
" height="<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['size']['height']; ?>
" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['fileName']; ?>
" />

                   <?php elseif ($_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="../temp/<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="登録画像" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']; ?>
" width="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['img']['width']; ?>
" height="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['img']['height']; ?>
" />
                   <?php endif; ?>
               <?php endif; ?>
                   <?php if (! $this->_tpl_vars['flg']): ?>
                   <?php echo $this->_tpl_vars['form'][$this->_sections['cnt']['index']]['html']; ?>

                   <br /><span style="font-size:10px;color:#ff0000;">登録画像サイズ 横<?php echo $this->_tpl_vars['maxWidth'][$this->_sections['cnt']['index']]; ?>
px×縦<?php echo $this->_tpl_vars['maxHeight'][$this->_sections['cnt']['index']]; ?>
px</span>
                   <?php endif; ?>
                   <br /><?php echo $this->_tpl_vars['form']['imageDel'][$this->_sections['cnt']['index']]['html']; ?>

            </td>
          </tr>
<?php endfor; endif; ?>

          <tr>
            <th width="16%" style="text-align:right;" class="threg">関連製品</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['related']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">公開設定</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['dispFlg']['html']; ?>
</td>
          </tr>

       </table>

       <div id="naviBt03">
        <ul>
         <li><?php if (! $this->_tpl_vars['flg']): ?><?php echo $this->_tpl_vars['form']['submitConf']['html']; ?>
<?php else: ?><?php echo $this->_tpl_vars['form']['submitReg']['html']; ?>
<?php endif; ?></li>
         <li><?php if (! $this->_tpl_vars['flg']): ?><?php echo $this->_tpl_vars['form']['reset']['html']; ?>
<?php else: ?><?php echo $this->_tpl_vars['form']['submitReturn']['html']; ?>
<?php endif; ?></li>
         <?php echo $this->_tpl_vars['form']['hidden']; ?>

        </ul>
       </div>
</form>
       <div class="clear"></div>
     </div>
     <div class="clear"></div>
    </div>
   </div>

   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/common/menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   <div class="clear"></div>
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/common/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 </body>
</html>
