<?php /* Smarty version 2.6.19, created on 2015-08-18 14:09:15
         compiled from whatsNewList.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'whatsNewList.html', 93, false),)), $this); ?>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/contentsMenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


    <div class="patternPan" style="margin-top:10px;<?php if ($_GET['r'] || $_GET['d']): ?>border-color:#0066ff;<?php endif; ?>">
     <?php if (! $_GET['r'] && ! $_GET['d']): ?>
         <?php echo @PAGE_TITLE; ?>
一覧を表示しています。
     <?php elseif ($_GET['r']): ?>
         <?php echo @PAGE_TITLE; ?>
を登録しました。
     <?php elseif ($_GET['d'] == 1): ?>
         『<b><?php echo $_GET['t']; ?>
</b>』を<?php if ($_GET['disp']): ?>表示<?php else: ?>非表示に<?php endif; ?>しました。
     <?php elseif ($_GET['d'] == 2): ?>
         『<b><?php echo $_GET['t']; ?>
</b>』を削除しました。
     <?php endif; ?>
    </div>


     <div id="data">

<div class="clear"></div>

<table class="datasheet" cellpadding="0" cellspacing="0" style="margin-top:10px;width:100%;">
<tr>
    <th style="width:140px;text-align:center;" class="threg">
      <a href="./<?php echo @THE_FILE_NAME; ?>
.php?sort=dateTime&cond=<?php if ($_GET['sort'] == 'dateTime' && $_GET['cond'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php echo $this->_tpl_vars['sortLink']['addition']; ?>
">
        投稿日
        <img src="cmn_img/<?php if ($_GET['sort'] == 'dateTime' && $_GET['cond'] == 'DESC'): ?>down<?php else: ?>up<?php endif; ?>.gif"/></a>
    </th>
    <th style="width:80px;text-align:center;" class="threg">
        タイプ
    </th>
    <th style="width:80px;text-align:center;" class="threg">
        カテゴリ
    </th>

    <th style="text-align:center;" class="threg">
        タイトル
    </th>

    <th style="width:80px;text-align:center;" class="threg">
        <a href="./<?php echo @THE_FILE_NAME; ?>
.php?sort=dispFlg&cond=<?php if ($_GET['sort'] == 'dispFlg' && $_GET['cond'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php echo $this->_tpl_vars['sortLink']['addition']; ?>
">
        公開
        <img src="cmn_img/<?php if ($_GET['sort'] == 'dispFlg' && $_GET['cond'] == 'DESC'): ?>down<?php else: ?>up<?php endif; ?>.gif"/></a>
    </th>
    <th style="width:30px;text-align:center;" class="threg">処理</th>
</tr>

<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
<tr>
<td class="tdreg"><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['dateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d %H:%M") : smarty_modifier_date_format($_tmp, "%Y/%m/%d %H:%M")); ?>
</td>
<td class="tdreg"><?php echo $this->_tpl_vars['whatsNewContentsCategory'][$this->_tpl_vars['value']['contentsCategory']]; ?>
<br /></td>
<td class="tdreg"><?php echo $this->_tpl_vars['whatsNewCategory'][$this->_tpl_vars['value']['category']]; ?>
</td>
<td class="tdreg"><a href="./<?php echo @FILE_CATEGORY; ?>
AddChange.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
"><?php echo $this->_tpl_vars['value']['title']; ?>
</a><br />url:　<?php echo @DOMAIN; ?>
/news/detail.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
</td>
<td style="width:13px;text-align:center;" class="tdreg">
    <a href="./<?php echo @THE_FILE_NAME; ?>
.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
&mode=disp&dispFlg=<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>1<?php else: ?>0<?php endif; ?><?php echo $this->_tpl_vars['getLink']['addition']; ?>
">
                    <img src="./cmn_img/<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>eye_close.png<?php else: ?>eye_open.png<?php endif; ?>" 
                 alt="<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>非表示<?php else: ?>表示中<?php endif; ?>" 
                 title="<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>非表示<?php else: ?>表示中<?php endif; ?>" />
    </a>
</td>
<td style="width:13px;text-align:center;" class="tdreg">
    <a href="./<?php echo @THE_FILE_NAME; ?>
.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
&mode=del<?php echo $this->_tpl_vars['getLink']['addition']; ?>
" onclick="return chk()">
    <img src="./cmn_img/dustbox.png" alt="削除する" title="削除する" name="del" />
    </a></td>
</tr>
<?php endforeach; else: ?>
<tr>
<td style="width:13px;text-align:center;" class="tdreg" colspan="18"><?php echo @PAGE_TITLE; ?>
は登録されていません。</td>
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