<?php /* Smarty version 2.6.19, created on 2015-01-28 17:51:07
         compiled from contentsList.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'contentsList.html', 130, false),)), $this); ?>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/contentsMenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

     <div id="data">
       <div class="patternPan">
       <?php if (! $_GET['d']): ?><?php echo @PAGE_TITLE; ?>
一覧を表示しています。
       <?php elseif ($_GET['d'] == 1): ?><b><?php echo $_GET['t']; ?>
</b>を削除しました。
       <?php elseif ($_GET['d'] == 2): ?><b><?php echo $_GET['t']; ?>
</b>を<?php if ($_GET['dispFlg']): ?>公開<?php else: ?>非公開に<?php endif; ?>しました。
       <?php elseif ($_GET['d'] == 3): ?><b><?php echo $_GET['t']; ?>
</b>をコピーしました。
       <?php endif; ?>
       </div>
<div class="clear"></div>
<?php if ($this->_tpl_vars['listCount']): ?>
<div class="pager">
<?php echo $this->_tpl_vars['pagerLinks']['all']; ?>

</div>
<div class="clear"></div>
<?php endif; ?>
<table class="datasheet" cellpadding="0" cellspacing="0" style="margin-top:10px;width:100%;">
<col />
<col />
<col width="180px" />
<col width="140px" />

<col width="100px" />
<col width="40px" />
<tr>
<th style="text-align:center;" class="threg">
<a href="./<?php echo @THE_FILE_NAME; ?>
.php?sort=dateTime&cond=<?php if ($_GET['sort'] == 'dateTime' && $_GET['cond'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php echo $this->_tpl_vars['sortLink']['addition']; ?>
">
登録日時
</a>
</th>
<th style="text-align:center;" class="threg">
<a href="./<?php echo @THE_FILE_NAME; ?>
.php?sort=title&cond=<?php if ($_GET['sort'] == 'title' && $_GET['cond'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php echo $this->_tpl_vars['sortLink']['addition']; ?>
">
タイトル
</a>
</th>
<th style="text-align:center;" class="threg">
<a href="./<?php echo @THE_FILE_NAME; ?>
.php?sort=use&cond=<?php if ($_GET['sort'] == 'use' && $_GET['cond'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php echo $this->_tpl_vars['sortLink']['addition']; ?>
">
用途
</a>
</th>
<th style="text-align:center;" class="threg">
<a href="./<?php echo @THE_FILE_NAME; ?>
.php?sort=part&cond=<?php if ($_GET['sort'] == 'part' && $_GET['cond'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php echo $this->_tpl_vars['sortLink']['addition']; ?>
">
部位
</a>
</th>
<th style="text-align:center;" class="threg">
  <a href="./<?php echo @THE_FILE_NAME; ?>
.php?sort=dispFlg&cond=<?php if ($_GET['sort'] == 'dispFlg' && $_GET['cond'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php echo $this->_tpl_vars['sortLink']['addition']; ?>
">公開状態 <img src="cmn_img/<?php if ($_GET['sort'] == 'dispFlg' && $_GET['cond'] == 'DESC'): ?>down<?php else: ?>up<?php endif; ?>.gif"/></a>
</th>
<th style="text-align:center; width:50px;" class="threg">削除</th>
</tr>


<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
<tr>
<td class="tdreg"><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['dateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d %H:%M") : smarty_modifier_date_format($_tmp, "%Y/%m/%d %H:%M")); ?>
</td>
<td class="tdreg"><a href="./<?php echo @FILE_CATEGORY; ?>
AddChange.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
"><?php echo $this->_tpl_vars['value']['title']; ?>
</a></td>
<td class="tdreg"><?php echo $this->_tpl_vars['useArray'][$this->_tpl_vars['value']['use']]; ?>
</td>
<td class="tdreg"><?php echo $this->_tpl_vars['partArray'][$this->_tpl_vars['value']['part']]; ?>
</td>

<td style="text-align:center;" class="tdreg">
  <form action="./<?php echo @THE_FILE_NAME; ?>
.php<?php echo $this->_tpl_vars['getLink']['all']; ?>
" method="post" style="display:inline;">
    <input type="image" src="./cmn_img/<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>eye_close.png<?php else: ?>eye_open.png<?php endif; ?>" name="dispButton" 
           alt="<?php if ($this->_tpl_vars['value']['dispFlg']): ?>公開中<?php else: ?>非公開<?php endif; ?>" title="<?php if ($this->_tpl_vars['value']['dispFlg']): ?>公開中<?php else: ?>非公開<?php endif; ?>" style="text-align:center;" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['value']['id']; ?>
" name="id" />
    <input type="hidden" name="mode" value="<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>open<?php else: ?>close<?php endif; ?>" />
    <input type="hidden" name="dispFlg" value="<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>1<?php else: ?>0<?php endif; ?>" />
  </form>
</td>

<td class="tdreg center"><form action="./<?php echo @THE_FILE_NAME; ?>
.php<?php echo $this->_tpl_vars['getLink']['all']; ?>
" method="post" style="display:inline;">
    <input type="image" src="./cmn_img/dustbox.png" alt="削除する" title="削除する" name="del" onclick="return chk()" style="text-align:center;" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['value']['id']; ?>
" name="id" />
    <?php if ($this->_tpl_vars['value']['fileName']): ?><input type="hidden" name="fileName" value="<?php echo $this->_tpl_vars['value']['fileName']; ?>
" /><?php endif; ?>
</form></td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['listCount']): ?>
<tr>
<td colspan="13" class="hothre">
<font>全<?php echo $this->_tpl_vars['listCount']; ?>
件中<?php echo $this->_tpl_vars['cnt']['start']; ?>
～<?php echo $this->_tpl_vars['cnt']['end']; ?>
件を表示。</font>
</td>
</tr>
<?php endif; ?>
</table>

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