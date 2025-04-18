<?php /* Smarty version 2.6.19, created on 2015-01-20 11:56:44
         compiled from itemSave.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script type="text/javascript" src="js/jquery.tablehover.js" charset="utf-8"></script>
<script type="text/javascript" src="./js/setForm.js"></script>
<script type="text/javascript" charset="utf-8">
<!--
jQuery(function($){
 $(\'.datasheet\').tableHover();
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

function copyChk( title )
{
    if( confirm( \'『\' + title + \'』をコピーしますか？\' ) )
    {
        return true;
    }
    return false;
}
// -->
</script>
'; ?>

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
    <div id="logo"><img src="../../cmn_img/logo.jpg" /></div>
   </div><!-- /#header -->

   <div id="container">
    <div id="contents">
     <div id="pan"><a href="login.php"><?php echo @TITLE; ?>
</a> / <?php echo @PAGE_TITLE; ?>
管理 /</div>



    <div class="patternPan" style="margin-top:10px;<?php if ($_GET['r'] || $_GET['d']): ?>border-color:#0066ff;<?php endif; ?>">
     <?php if (! $_GET['r'] && ! $_GET['d']): ?>
         <?php echo @PAGE_TITLE; ?>
インポートするCSVを選択してください。
     <?php elseif ($_GET['d'] == 1): ?>
         インポートに失敗しました。CSVの列とDBの列が一致しません。
     <?php elseif ($_GET['r'] == 2): ?>
         インポートが成功しました。
     <?php endif; ?>
    </div>



<form<?php echo $this->_tpl_vars['form']['attributes']; ?>
>
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
<table cellpadding="0" cellspacing="0" style="width:100%;">
    <tr class="caption">
      <th colspan="3" class="center threg"><?php echo @PAGE_TITLE; ?>
CSV</th>
    </tr>
    <tr>
      <th class="threg">CSVインポート</th>
      <td class="tdreg"><?php echo $this->_tpl_vars['form']['csvImport']['html']; ?>
　　<?php echo $this->_tpl_vars['form']['submitCsv']['html']; ?>
</td>
    </tr>
</table>
</form>
     <div id="data">


<div class="clear"></div>


</form>
<div class="pager">
<?php echo $this->_tpl_vars['pagerLinks']['all']; ?>

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
 ?>   <div class="clear"></div>
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>
 </body>
</html>