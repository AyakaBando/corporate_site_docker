<?php /* Smarty version 2.6.19, created on 2015-08-31 13:00:11
         compiled from memberPageViewAddChange.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="./js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="./js/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="./js/setForm.js"></script>


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


   </div><!-- /#header -->
   <div id="container">
    <div id="contents">
     <div id="pan">
      <a href="./login.php"><?php echo @TITLE; ?>
</a> / <a href="./<?php echo @FILE_CATEGORY; ?>
List.php"><?php echo @PAGE_TITLE; ?>
一覧</a> / <?php echo @PAGE_TITLE; ?>
<?php if ($_GET['id']): ?>更新<?php else: ?>編集<?php endif; ?>     </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/contentsMenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

     <div id="data">

       <div class="patternPan">
       <?php echo @PAGE_TITLE; ?>
を<?php if ($_REQUEST['id']): ?>編集<?php else: ?>登録<?php endif; ?>します。<br />
       <span style="color:#ff0000;">＊の項目は必ず入力・選択してください</span>
       </div>

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
            <th width="16%" style="text-align:right;" class="threg">ブランド名</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['data']['subName']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">製品名</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['data']['name']; ?>
</td>
          </tr>
<form<?php echo $this->_tpl_vars['form']['attributes']; ?>
>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">集計月選択</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['year']['html']; ?>
 年　<?php echo $this->_tpl_vars['form']['month']['html']; ?>
 月　　　<?php echo $this->_tpl_vars['form']['submitSearch']['html']; ?>
<?php echo $this->_tpl_vars['form']['hidden']; ?>

            <?php if ($_GET['submitSearch']): ?><input type="button" onclick="location.href='./<?php echo @THE_FILE_NAME; ?>
.php?id=<?php echo $_REQUEST['id']; ?>
'" value="リセット" /><?php endif; ?>
            </td>
          </tr>
</form>
       </table>


       <table cellpadding="0" cellspacing="0" style="margin:0 0 20px 0;width:40%;">
         <tr class="caption"><th colspan="2" class="center threg">アクセス概要</th></tr>
         <tr class="caption"><th class="center threg">名前</th><th class="center threg">アクセス数</th></tr>
<?php $_from = $this->_tpl_vars['dataMember']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
    <?php if ($this->_tpl_vars['dataCnt'][$this->_tpl_vars['value']['memberId']]['cnt']): ?>
          <tr>
            <th width="30%" style="text-align:right;" class="threg"><?php echo $this->_tpl_vars['value']['name']; ?>
</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['dataCnt'][$this->_tpl_vars['value']['memberId']]['cnt']; ?>
</td>
          </tr>
    <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
       </table>

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
