<?php /* Smarty version 2.6.19, created on 2015-10-23 12:45:55
         compiled from memberAddChange.html */ ?>
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
            <th width="16%" style="text-align:right;" class="threg">会社名<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['companyName']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">お名前<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['name']['html']; ?>
　　<a href="./memberDownLoad2List.php?memberId=<?php echo $this->_tpl_vars['data']['memberId']; ?>
" style="display:inline-block;padding:6px 16px;border:1px solid #666;background-color:#ddd;">製品DL履歴</a></td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">関連業種<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['relationJob']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">職種<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['subJobCategory']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">部署名<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['busyo']['html']; ?>
</td>
          </tr>

          <tr>
            <th width="16%" style="text-align:right;" class="threg">メールアドレス<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['eMail']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">パスワード</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['password']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">郵便番号</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['zip1']['html']; ?>
 - <?php echo $this->_tpl_vars['form']['zip2']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">住所</th>
            <td class="tdreg">
            <?php echo $this->_tpl_vars['form']['pref']['html']; ?>
<br />
            <?php echo $this->_tpl_vars['form']['address1']['html']; ?>
<br />
            <?php echo $this->_tpl_vars['form']['address2']['html']; ?>

            </td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">電話番号<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['tel1']['html']; ?>
 - <?php echo $this->_tpl_vars['form']['tel2']['html']; ?>
 - <?php echo $this->_tpl_vars['form']['tel3']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">FAX番号</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['fax1']['html']; ?>
 - <?php echo $this->_tpl_vars['form']['fax2']['html']; ?>
 - <?php echo $this->_tpl_vars['form']['fax3']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">御社URL</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['siteUrl']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">弊社ウェブサイトに<br />来られたきっかけを<br />教えて下さい。</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['medium']['html']; ?>
</td>
          </tr>
       </table>

</form>
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
