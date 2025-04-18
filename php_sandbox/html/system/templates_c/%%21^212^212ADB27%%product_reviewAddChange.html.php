<?php /* Smarty version 2.6.19, created on 2015-11-04 19:27:12
         compiled from product_reviewAddChange.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'product_reviewAddChange.html', 73, false),array('modifier', 'date_format', 'product_reviewAddChange.html', 74, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<link rel="stylesheet" type="text/css" href="css/pulldown.css"/>
<script type="text/javascript" src="./js/load.js"></script>
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


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/contentsFileMenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <div class="patternPan" style="margin-top:10px;<?php if ($_GET['r'] || $_GET['d']): ?>border-color:#0066ff;<?php endif; ?>">
     <b>『<?php echo $this->_tpl_vars['itemName']; ?>
』</b>の
     <?php if (! $_GET['r'] && ! $_GET['d']): ?>
         <?php echo @PAGE_TITLE; ?>
一覧を表示しています。
     <?php elseif ($_GET['r']): ?>
         <?php echo @PAGE_TITLE; ?>
を登録しました。
     <?php elseif ($_GET['d'] == 1): ?>
         『<b><?php echo $_GET['t']; ?>
</b>』を未承認にしました。
     <?php elseif ($_GET['d'] == 2): ?>
         『<b><?php echo $_GET['t']; ?>
</b>』を承認しました。
     <?php elseif ($_GET['d'] == 99): ?>
         『<b><?php echo $_GET['t']; ?>
</b>』を削除しました。
     <?php endif; ?>
    </div>


     <div id="data">

<div class="clear"></div>

<table class="" cellpadding="0" cellspacing="0" style="margin-top:10px;width:100%;">
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>

<tr>
    <th class="threg" style="text-align:right;width:100px;">内容</th>
    <td style="" class="tdreg">
    <div>
        <h3 style="font-size:16px;font-weight:bold;float:left;"><?php echo $this->_tpl_vars['value']['title']; ?>
</h3>
        <p style="font-size:14px;color:#ff6600;float:right;"><?php echo $this->_tpl_vars['evaluationArray'][$this->_tpl_vars['value']['evaluation']]; ?>
</p>
    </div>
    <br style="clear:both;" />
    <div style="margin-top:8px;padding:8px;">
        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['comment'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
        <p style="text-align:right;"><span style="font-size:10px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['dateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d %H:%M") : smarty_modifier_date_format($_tmp, "%Y/%m/%d %H:%M")); ?>
</span>　　<span><?php echo $this->_tpl_vars['value']['name']; ?>
</span></p>
    </div>
    </td>
</tr>
<tr>
    <th class="threg" style="border-bottom:double 3px #bbb;text-align:right;">状態・操作</th>
    <td style="border-bottom:double 3px #bbb;<?php if ($this->_tpl_vars['value']['dispFlg'] == 0): ?>background-color:#999;<?php endif; ?>" class="tdreg">
    <div style="<?php if ($this->_tpl_vars['value']['dispFlg'] == 0): ?>color:#fff;<?php endif; ?>font-size:14px;">状態・<?php echo $this->_tpl_vars['reviewStatusArray'][$this->_tpl_vars['value']['dispFlg']]; ?>
</div>
    <div style="float:right;padding-right:30px;">
    <form action="./<?php echo @FILE_CATEGORY; ?>
AddChange.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
&rId=<?php echo $this->_tpl_vars['value']['rId']; ?>
" method="post">
        <input type="submit" name="unDisp" value="未承認"<?php if (! $this->_tpl_vars['value']['dispFlg']): ?> disabled="disabled"<?php endif; ?> />　
        <input type="submit" name="okDisp" value="承認"<?php if ($this->_tpl_vars['value']['dispFlg'] == 1): ?>disabled="disabled"<?php endif; ?> />　
        <input type="submit" name="del" value="削除" onclick="return chk();" />
        <input type="hidden" name="rId" value="<?php echo $this->_tpl_vars['value']['rId']; ?>
" />
        <input type="hidden" name="mode" value="1" />
    </form>
    </div>
    </td>
</tr>
<?php endforeach; else: ?>
<tr>
<td style="width:13px;text-align:center;" class="tdreg" colspan="18">新着情報は登録されていません。</td>
</tr>
<?php endif; unset($_from); ?>
<?php if ($this->_tpl_vars['listCount']): ?>
<tfoot>
<tr>
<td colspan="18" class="hothre">
<font>全<?php echo $this->_tpl_vars['listCount']; ?>
件中<?php echo $this->_tpl_vars['cnt']['start']; ?>
～<?php echo $this->_tpl_vars['cnt']['end']; ?>
件を表示。</font>
</td>
</tr>
</tfoot>
<?php endif; ?>
</table>


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