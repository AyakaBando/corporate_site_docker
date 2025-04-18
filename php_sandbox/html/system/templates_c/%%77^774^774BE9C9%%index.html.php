<?php /* Smarty version 2.6.19, created on 2014-03-18 16:13:48
         compiled from index.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" type="text/css" href="css/login.css"/>
<?php echo $this->_tpl_vars['form']['javascript']; ?>

</head>
 <body>
<form<?php echo $this->_tpl_vars['form']['attributes']; ?>
>
   <div class="box">

    <div style="margin:0 0 20px 0;">
     <div style="float:left;">
      <div style="margin:0 0 6px 0;">
       <div style="float:left;margin:0 6px 0 0;">
        <span class="t10">USER ACCOUNT</span><br />
        <?php echo $this->_tpl_vars['form']['account']['html']; ?>

        
        </div>
       <div style="float:left;margin:0 10px 0 0;">
        <span class="t10">PASSWORD</span><br />
        <?php echo $this->_tpl_vars['form']['password']['html']; ?>

        </div>

       <div style="float:left;margin:16px 0 0 0;">
        <?php echo $this->_tpl_vars['form']['submitConf']['html']; ?>

       </div>
        <?php if ($this->_tpl_vars['form']['errors']['account']): ?>
            <div style="clear:both;"><span class="t10" style="color:#ff0000;"><?php echo $this->_tpl_vars['form']['errors']['account']; ?>
</span></div>
        <?php endif; ?>
       <div class="clear"></div>
      </div>
      <div class="clear"></div>
      <div>

       <span style="margin:20px 0 0 0;">
        <?php echo $this->_tpl_vars['form']['kaniChk']['html']; ?>
       </span>
      </div>
     </div>
     <div class="clear"></div>
    </div>
    <div class="clear"></div>

    <div style="margin:0 0 30px 0;line-height:130%;color:#aaa;">
     <ul>
      <?php if ($_GET['r'] == 'logout'): ?><li class="t10">・<font class="error">完全にログアウトしました。</font></li><?php endif; ?>
      <li class="t10">・Forgot your password? You can get help retrieving your password here.</li>
      <li class="t10">・Not a member yet? Creating an account is free and easy. Sign up Now !</li>
      <li class="t10">・Having trouble logging in?  Make sure your browser is set to accept cookies.</li>
     </ul>
<div class="clear"></div>
    </div>
    <div class="clear"></div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   </div>
  </form>
 </body>
</html>