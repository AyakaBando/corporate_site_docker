<?php /* Smarty version 2.6.19, created on 2015-10-19 15:08:17
         compiled from memberDownLoadAddChange.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'memberDownLoadAddChange.html', 84, false),)), $this); ?>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/downloadMenu2.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

     <div id="data">

       <div class="patternPan">
       <?php echo @PAGE_TITLE; ?>
を<?php if ($_REQUEST['id']): ?>編集<?php else: ?>登録<?php endif; ?>します。<br />
       <span style="color:#ff0000;">＊の項目は必ず入力・選択してください</span>
       </div>


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
       </table>

<table class="datasheet" cellpadding="0" cellspacing="0" style="margin-top:10px;width:100%;">

<th style="text-align:center;" class="threg" colspan="2">
会員名
</th>
<th style="text-align:center;" class="threg">
最新ダウンロード日時
</th>
<th style="text-align:center;width:100px;" class="threg">ダウンロード数</th>

<?php $_from = $this->_tpl_vars['dataProduct']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>

    <?php $_from = $this->_tpl_vars['value']['catalog']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cresult'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cresult']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ckey'] => $this->_tpl_vars['cvalue']):
        $this->_foreach['cresult']['iteration']++;
?>
<tr>
    <td class="tdreg" width="50px" style="font-size:10px;text-align:right;">カタログ</td>
    <td class="tdreg"><?php if ($this->_tpl_vars['cvalue']['imageAlt']): ?><?php echo $this->_tpl_vars['cvalue']['imageAlt']; ?>
<?php else: ?><?php echo $this->_tpl_vars['cvalue']['fileName']; ?>
<?php endif; ?></td>
    <td class="tdreg" style="text-align:center;"></td>
    <td class="tdreg" style="text-align:center;"></td>
</tr>
       <?php $_from = $this->_tpl_vars['value']['memberArrayCatalog'][$this->_tpl_vars['cvalue']['imgId']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['zresult'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['zresult']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['zkey'] => $this->_tpl_vars['zvalue']):
        $this->_foreach['zresult']['iteration']++;
?>
  <tr>
      <td class="tdreg"></td>
      <td class="tdreg"><a href="./memberAddChange.php?memberId=<?php echo $this->_tpl_vars['dataMember'][$this->_tpl_vars['zkey']]['memberId']; ?>
" target="_blank"><?php echo $this->_tpl_vars['dataMember'][$this->_tpl_vars['zkey']]['name']; ?>
</a></td>
      <td class="tdreg"><?php echo ((is_array($_tmp=$this->_tpl_vars['zvalue']['latestDateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y年%m月%d日 %H時%M分") : smarty_modifier_date_format($_tmp, "%Y年%m月%d日 %H時%M分")); ?>
</td>
      <td class="tdreg" style="text-align:center;"><?php echo $this->_tpl_vars['zvalue']['cnt']; ?>
</td>
  </tr>
       <?php endforeach; endif; unset($_from); ?>
    <?php endforeach; endif; unset($_from); ?>
    <?php $_from = $this->_tpl_vars['value']['draw']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cresult'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cresult']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ckey'] => $this->_tpl_vars['cvalue']):
        $this->_foreach['cresult']['iteration']++;
?>
<tr>
    <td class="tdreg" width="50px" style="font-size:10px;text-align:right;">図面</td>
    <td class="tdreg"><?php if ($this->_tpl_vars['cvalue']['imageAlt']): ?><?php echo $this->_tpl_vars['cvalue']['imageAlt']; ?>
<?php else: ?><?php echo $this->_tpl_vars['cvalue']['fileName']; ?>
<?php endif; ?></td>
    <td class="tdreg" style="text-align:center;"></td>
    <td class="tdreg" style="text-align:center;"></td>
</tr>
       <?php $_from = $this->_tpl_vars['value']['memberArrayDrow'][$this->_tpl_vars['cvalue']['imgId']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['zresult'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['zresult']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['zkey'] => $this->_tpl_vars['zvalue']):
        $this->_foreach['zresult']['iteration']++;
?>
  <tr>
      <td class="tdreg"></td>
      <td class="tdreg"><a href="./memberAddChange.php?memberId=<?php echo $this->_tpl_vars['dataMember'][$this->_tpl_vars['zkey']]['memberId']; ?>
" target="_blank"><?php echo $this->_tpl_vars['dataMember'][$this->_tpl_vars['zkey']]['name']; ?>
</a></td>
      <td class="tdreg"><?php echo ((is_array($_tmp=$this->_tpl_vars['zvalue']['latestDateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y年%m月%d日 %H時%M分") : smarty_modifier_date_format($_tmp, "%Y年%m月%d日 %H時%M分")); ?>
</td>
      <td class="tdreg" style="text-align:center;"><?php echo $this->_tpl_vars['zvalue']['cnt']; ?>
</td>
  </tr>
       <?php endforeach; endif; unset($_from); ?>
    <?php endforeach; endif; unset($_from); ?>
<tr>
    <td class="tdreg" width="50px" style="font-size:10px;text-align:right;">zip</td>
    <td class="tdreg"></td>
    <td class="tdreg" style="text-align:center;"></td>
    <td class="tdreg" style="text-align:center;"></td>
</tr>
     <?php $_from = $this->_tpl_vars['value']['memberArrayZip']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['zresult'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['zresult']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['zkey'] => $this->_tpl_vars['zvalue']):
        $this->_foreach['zresult']['iteration']++;
?>
  <tr>
      <td class="tdreg"></td>
      <td class="tdreg"><a href="./memberAddChange.php?memberId=<?php echo $this->_tpl_vars['dataMember'][$this->_tpl_vars['zkey']]['memberId']; ?>
" target="_blank"><?php echo $this->_tpl_vars['dataMember'][$this->_tpl_vars['zkey']]['name']; ?>
</a></td>
      <td class="tdreg"><?php echo ((is_array($_tmp=$this->_tpl_vars['zvalue']['latestDateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y年%m月%d日 %H時%M分") : smarty_modifier_date_format($_tmp, "%Y年%m月%d日 %H時%M分")); ?>
</td>
      <td class="tdreg" style="text-align:center;"><?php echo $this->_tpl_vars['zvalue']['cnt']; ?>
</td>
  </tr>
     <?php endforeach; endif; unset($_from); ?>
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
