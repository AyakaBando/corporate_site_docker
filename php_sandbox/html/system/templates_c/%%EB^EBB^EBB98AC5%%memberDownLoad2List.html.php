<?php /* Smarty version 2.6.19, created on 2015-11-04 19:39:27
         compiled from memberDownLoad2List.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'memberDownLoad2List.html', 112, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="text/javascript" charset="utf-8">
<!--
// 確認ウィンドウを表示する
function chk()
{
    if( confirm( "削除してもよろしいですか？" ) )
    {
        return true;
    }
    return false;
}

// 確認ウィンドウを表示する
function cpChk( title )
{
    if( confirm( "『" + title + "』コピーしてもよろしいですか？" ) )
    {
        return true;
    }
    return false;
}
// -->
</script>
'; ?>

</head>
 <body>
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

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/downloadMenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

     <div id="data">
       <div class="patternPan">
       <?php if (! $_GET['d']): ?><?php echo @PAGE_TITLE; ?>
一覧を表示しています。
       <?php elseif ($_GET['d'] == 1): ?><b><?php echo $_GET['t']; ?>
</b>を削除しました。
       <?php elseif ($_GET['d'] == 2): ?><b><?php echo $this->_tpl_vars['title']; ?>
</b>を<?php if ($_GET['dispFlg']): ?>公開<?php else: ?>非公開に<?php endif; ?>しました。
       <?php elseif ($_GET['d'] == 3): ?><b><?php echo $_GET['t']; ?>
</b>をコピーしました。
       <?php endif; ?>
       </div>

<table cellpadding="0" cellspacing="0" style="width:100%;">
	     <tr class="caption">
		  <th class="center threg" colspan="2">
		   会社名　/　会員名
		   		  </th>
         </tr>
<form<?php echo $this->_tpl_vars['form']['attributes']; ?>
>
         <tr>
          <th width="16%" class="threg">会員</th>
          <td class="tdreg" style="line-height:2em;"><a href="./memberAddChange.php?memberId=<?php echo $_GET['memberId']; ?>
"><?php echo $this->_tpl_vars['memberArray'][$_GET['memberId']]; ?>
</a></td>
         </tr>
</form>
       </table>

<div class="clear"></div>
<?php if ($this->_tpl_vars['listCount']): ?>
<div class="pager">
<?php echo $this->_tpl_vars['pagerLinks']['all']; ?>

</div>
<div class="clear"></div>
<?php endif; ?>


<?php if ($_GET['memberId']): ?>
<table class="datasheet" cellpadding="0" cellspacing="0" style="margin-top:10px;width:100%;">

<th style="text-align:center;" class="threg" colspan="2">
製品名
</th>
<th style="text-align:center;width:180px;" class="threg">最新ダウンロード日時</th>
<th style="text-align:center;width:100px;" class="threg">ダウンロード数</th>

<?php $_from = $this->_tpl_vars['dataProduct']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
<?php if ($this->_tpl_vars['dataCnt']['cntFlg'][$this->_tpl_vars['value']['id']]): ?>
<tr>
<td class="tdreg" colspan="4" style="background-color:#eee;"><?php echo $this->_tpl_vars['value']['name']; ?>
 / <?php echo $this->_tpl_vars['value']['subName']; ?>
 <?php echo $this->_tpl_vars['value']['cntFlg']; ?>
</td>
</tr>
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
    <td class="tdreg"><?php echo ((is_array($_tmp=$this->_tpl_vars['dataCnt']['file']['1'][$this->_tpl_vars['cvalue']['id']][$this->_tpl_vars['cvalue']['imgId']]['latestDateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y年%m月%d日 %H時%M分") : smarty_modifier_date_format($_tmp, "%Y年%m月%d日 %H時%M分")); ?>
</td>
    <td class="tdreg" style="text-align:center;"><?php echo $this->_tpl_vars['dataCnt']['file']['1'][$this->_tpl_vars['cvalue']['id']][$this->_tpl_vars['cvalue']['imgId']]['cnt']; ?>
</td>
</tr>
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
    <td class="tdreg"><?php echo ((is_array($_tmp=$this->_tpl_vars['dataCnt']['file']['2'][$this->_tpl_vars['cvalue']['id']][$this->_tpl_vars['cvalue']['imgId']]['latestDateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y年%m月%d日 %H時%M分") : smarty_modifier_date_format($_tmp, "%Y年%m月%d日 %H時%M分")); ?>
</td>
    <td class="tdreg" style="text-align:center;"><?php echo $this->_tpl_vars['dataCnt']['file']['2'][$this->_tpl_vars['cvalue']['id']][$this->_tpl_vars['cvalue']['imgId']]['cnt']; ?>
</td>
</tr>
    <?php endforeach; endif; unset($_from); ?>
<tr>
    <td class="tdreg" width="50px" style="font-size:10px;text-align:right;">zip</td>
    <td class="tdreg"></td>
    <td class="tdreg"><?php echo ((is_array($_tmp=$this->_tpl_vars['dataCnt']['zip'][$this->_tpl_vars['value']['id']]['latestDateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y年%m月%d日 %H時%M分") : smarty_modifier_date_format($_tmp, "%Y年%m月%d日 %H時%M分")); ?>
</td>
    <td class="tdreg" style="text-align:center;"><?php echo $this->_tpl_vars['dataCnt']['zip'][$this->_tpl_vars['value']['id']]['cnt']; ?>
</td>
</tr>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

</table>
<?php endif; ?>
<div class="pager">
<?php echo $this->_tpl_vars['pagerLinks']['all']; ?>

</div>      <div class="clear"></div>
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