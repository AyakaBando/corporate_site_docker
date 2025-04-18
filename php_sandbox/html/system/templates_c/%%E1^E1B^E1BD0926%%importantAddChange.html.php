<?php /* Smarty version 2.6.19, created on 2014-03-24 18:30:57
         compiled from importantAddChange.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<link rel="stylesheet" type="text/css" href="./css/ui.all.css"/>
<link rel="stylesheet" type="text/css" href="./css/ui.datepicker.css"/>
<link rel="stylesheet" type="text/css" href="./css/mdp.css" />
<script type="text/javascript" src="./js/ui.core.js"></script>
<script type="text/javascript" src="./js/ui.datepicker.js"></script>
<script type="text/javascript" src="./js/ui.datepicker-ja.js"></script>
<script type="text/javascript" src="./js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="./js/ckfinder/ckfinder.js"></script>
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
</a> / <a href="./<?php echo @FILE_CATEGORY; ?>
List.php"><?php echo @PAGE_TITLE; ?>
一覧</a> / <?php echo @PAGE_TITLE; ?>
<?php if ($_GET['id']): ?>更新<?php else: ?>編集<?php endif; ?>     </div>

     <div id="navi">
      <div id="naviBt">
       <ul>
        <li><a href="./<?php echo @FILE_CATEGORY; ?>
List.php"><?php echo @PAGE_TITLE; ?>
一覧</a></li>
        <li class="active"><font><?php echo @PAGE_TITLE; ?>
詳細</font></li>
       </ul>
      </div>
      <div class="clear"></div>
     </div>

     <div id="data">

       <div class="patternPan">
       <?php echo @PAGE_TITLE; ?>
を<?php if ($_REQUEST['whatsNewId']): ?>編集<?php else: ?>登録<?php endif; ?>します。<br />
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
         <tr class="caption"><th colspan="2" class="center" class="threg">概要</th></tr>
          <tr><th width="16%" style="text-align:right;" class="threg">日時</th>
          <td class="tdreg"><?php echo $this->_tpl_vars['form']['dateTime']['html']; ?>
</td></tr>
          <tr><th width="16%" style="text-align:right;" class="threg">タイトル<span style="color:#ff0000;">＊</span></th>
          <td class="tdreg"><?php echo $this->_tpl_vars['form']['title']['html']; ?>
<br /><span style="font-size:10px;color:#ff0000;">※登録できる文字数は100文字です</span></td></tr>

          <tr>
            <th width="16%" style="text-align:right;" class="threg">内容</th>
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
                  CKFinder.setupCKEditor( news_text, './js/ckfinder/' );
                </script>
            <?php endif; ?>
            </td>
          </tr>
          <tr><th width="16%" style="text-align:right;" class="threg">公開設定</th>
          <td class="tdreg"><?php echo $this->_tpl_vars['form']['dispFlg']['html']; ?>
</td></tr>
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
