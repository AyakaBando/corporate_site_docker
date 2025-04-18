<?php /* Smarty version 2.6.19, created on 2015-11-04 19:27:08
         compiled from product_newsAddChange.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" type="text/css" href="css/pulldown.css"/>
<script type="text/javascript" src="./js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="./js/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="./js/load.js"></script>
<script language=javascript>
<?php echo '
function categoryView( flg )
{
    for( var i = 1; i <= 4; i++ )
    {
        if( document.getElementById( \'group\' + i ) )
        {
            if( i == flg )
                document.getElementById( \'group\' + i ).style.display = "table-row-group";
            else
                document.getElementById( \'group\' + i ).style.display = "none";
        }
    }
}

'; ?>

</script>
</head>
 <body id="two-left-w">
  <div id="wrapper">
   <div id="header">
    <div>
     <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div id="logo">
     <img src="../../cmn_img/logo.jpg" />
    </div>
   </div><!-- /#header -->
   <div id="container">
    <div id="contents">
     <div id="pan">
      <a href="./login.php"><?php echo @TITLE; ?>
</a> / <?php echo @PAGE_TITLE; ?>
管理     </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/contentsFileMenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/subMenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
     <div id="data">
<form<?php echo $this->_tpl_vars['form']['attributes']; ?>
>
       <div class="patternPan"><b>『<?php echo $this->_tpl_vars['itemName']; ?>
』</b>の<?php echo @PAGE_TITLE; ?>
情報を<?php if ($_REQUEST['id']): ?>編集<?php else: ?>登録<?php endif; ?>します。<br /><span style="color:#ff0000;">＊の項目は必ず入力・選択してください</span></div>
       <?php if ($this->_tpl_vars['form']['errors']): ?>
       <div style="border:double 3px #ff0000;margin-bottom:10px;padding:8px;background-color:#ffffff;">
       <?php $_from = $this->_tpl_vars['form']['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
       <span style="color:#000;">★</span><?php echo $this->_tpl_vars['value']; ?>
<br />
       <?php endforeach; endif; unset($_from); ?>
       </div>
       <?php endif; ?>

       <table cellpadding="0" cellspacing="0" style="margin-bottom:20px;width:100%;">
         <tr class="caption"><th colspan="5" class="center">概要</th></tr>
          <tr>
            <th style="text-align:right;width:150px;" class="threg">投稿日</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['dateTime']['html']; ?>
</td>
          </tr>
          <tr>
            <th style="text-align:right;" class="threg">記事タイプ<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['contentsCategory']['html']; ?>
</td>
          </tr>
          <tr>
            <th style="text-align:right;" class="threg">カテゴリ<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['type']['html']; ?>
</td>
          </tr>
          <tr>
            <th style="text-align:right;" class="threg">タイトル<span style="color:#ff0000;">＊</span></th>
            <td class="checkBox tdreg"><?php echo $this->_tpl_vars['form']['title']['html']; ?>
</td>
          </tr>

        <tbody id="group1" style="display:<?php if ($_POST['contentsCategory'] == 1 || ( ! $_POST['contentsCategory'] && $this->_tpl_vars['data']['contentsCategory'] == 1 )): ?>table-row-group<?php else: ?>none<?php endif; ?>">
          <tr>
            <th style="text-align:right;" class="threg">URL<span style="color:#ff0000;">＊</span></th>
            <td class="checkBox tdreg"><?php echo $this->_tpl_vars['form']['url']['html']; ?>
</td>
          </tr>
        </tbody>
        <tbody id="group2" style="display:<?php if ($_POST['contentsCategory'] == 2 || ( ! $_POST['contentsCategory'] && $this->_tpl_vars['data']['contentsCategory'] == 2 )): ?>table-row-group<?php else: ?>none<?php endif; ?>">
          <tr>
            <th style="text-align:right;" class="threg">PDF</th>
            <td class="tdreg">
            <?php $this->assign('fileCategory', @FILE_SESSION_KEY); ?>
               <?php if ($this->_tpl_vars['pdfFlg'] == 1): ?>
                   <?php if (! $_POST['pdfDel'] && $_SESSION[$this->_tpl_vars['fileCategory']]): ?>
                       <a href="./temp/<?php echo $_SESSION[$this->_tpl_vars['fileCategory']]['fileName']; ?>
" target="_blank"><img src="./cmn_img/icons/pdf.png" alt="アップ予定PDF" width="50" height="50" /></a><br />
                       <input type="hidden" name="pdfFileName" value="<?php echo $_SESSION[$this->_tpl_vars['fileCategory']]['fileName']; ?>
" />
                   <?php elseif (! $_POST['pdfDel'] && $this->_tpl_vars['data']['pdfFileName'] && ! $_SESSION[$this->_tpl_vars['fileCategory']]['fileName']): ?>
                       <a href="../upImage/<?php echo @FILE_CATEGORY; ?>
/<?php echo $this->_tpl_vars['data']['pdfFileName']; ?>
" target="_blank"><img src="./cmn_img/icons/pdf.png" alt="登録済PDF" width="50" height="50" /></a><br />
                       <input type="hidden" name="pdfFileName" value="<?php echo $this->_tpl_vars['data']['pdfFileName']; ?>
" />
                   <?php endif; ?>
               <?php else: ?>
                   <?php if ($this->_tpl_vars['data']['pdfFileName'] && ! $_SESSION[$this->_tpl_vars['fileCategory']]['fileName']): ?>
                       <a href="../upImage/<?php echo @FILE_CATEGORY; ?>
/<?php echo $this->_tpl_vars['data']['pdfFileName']; ?>
" target="_blank"><img src="./cmn_img/icons/pdf.png" alt="登録PDF" width="50" height="50" /></a><br />
                   <?php elseif ($_SESSION[$this->_tpl_vars['fileCategory']]['fileName']): ?>
                       <a href="./temp/<?php echo $this->_tpl_vars['data']['pdfFileName']; ?>
" target="_blank"><img src="./cmn_img/icons/pdf.png" alt="登録PDF" width="50" height="50" /></a><br />
                   <?php endif; ?>
               <?php endif; ?>
               <?php if (! $this->_tpl_vars['pdfFlg']): ?>
               <?php echo $this->_tpl_vars['form']['userfile']['html']; ?>
<br />
               <?php if ($this->_tpl_vars['data']['pdfFileName']): ?><?php echo $this->_tpl_vars['form']['pdfDel']['html']; ?>
<?php endif; ?>
               <?php endif; ?>
            </td>
          </tr>
        </tbody>
          <tr>
            <th style="text-align:right;" class="threg">公開</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['dispFlg']['html']; ?>
</td>
          </tr>

       </table>
       <div id="naviBt03">
        <ul>
         <li><?php if (! $this->_tpl_vars['flg']): ?><?php echo $this->_tpl_vars['form']['submitConf']['html']; ?>
<?php else: ?><?php echo $this->_tpl_vars['form']['submitReg']['html']; ?>
<?php endif; ?></li>
         <li><?php if (! $this->_tpl_vars['flg']): ?><?php else: ?><?php echo $this->_tpl_vars['form']['submitReturn']['html']; ?>
<?php endif; ?></li>
         <?php echo $this->_tpl_vars['form']['hidden']; ?>
</form>
        </ul>
       </div>
       <div class="clear"></div>
     </div>
     <div class="clear"></div>
    </div>
   </div>
   
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   <div class="clear"></div>
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 </body>
</html>
