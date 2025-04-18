<?php /* Smarty version 2.6.19, created on 2015-08-20 11:43:51
         compiled from passAddChange.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
     <img src="cmn_img/logo.jpg" />
    </div>
   </div><!-- /#header -->

   <div id="container">
    <div id="contents">
     <div id="pan">
      <a href="./login.php"><?php echo @TITLE; ?>
</a> / アカウント設定
     </div>



     <div id="data">
<form<?php echo $this->_tpl_vars['form']['attributes']; ?>
>
       <div class="patternPan"<?php if ($_GET['r']): ?> style="border-color:#6666ff;"<?php endif; ?>>
           <?php if ($_GET['r']): ?>
           アカウントを更新しました。
           <?php else: ?>
           アカウントを<?php if ($_GET['id']): ?>更新<?php else: ?>登録<?php endif; ?>します。
           <?php endif; ?>
       </div>

       <table cellpadding="0" cellspacing="0" style="width:100%;">
         <tr>
           <th width="16%" class="threg">管理者氏名</th>
           <td class="tdreg"><?php echo $this->_tpl_vars['form']['name']['html']; ?>
</td>
         </tr>
         <tr>
           <th class="threg">アカウント名</th>
           <td class="tdreg"><?php echo $this->_tpl_vars['form']['account']['html']; ?>
</td>
         </tr>
         <tr>
           <th class="threg">パスワード</th>
           <td class="tdreg"><?php echo $this->_tpl_vars['form']['password']['html']; ?>
<input type="hidden" name="dispFlg" value="1" /><?php echo $this->_tpl_vars['form']['hidden']; ?>
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
         </ul>
       </div>

      </form>
      <div class="clear">&nbsp;</div>

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