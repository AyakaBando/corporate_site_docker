<?php /* Smarty version 2.6.19, created on 2014-01-20 12:18:40
         compiled from planEventList.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'planEventList.html', 58, false),)), $this); ?>
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

     <div id="data">
       <div class="patternPan">
       <?php if (! $_GET['d']): ?><?php echo @PAGE_TITLE; ?>
一覧を表示しています。<?php elseif ($_GET['d'] == 1): ?><b><?php echo $_GET['t']; ?>
</b>を削除しました。<?php elseif ($_GET['d'] == 2): ?><b><?php echo $_GET['t']; ?>
</b>を<?php if ($_GET['dispFlg']): ?>公開<?php else: ?>非公開に<?php endif; ?>しました。<?php endif; ?>
       </div>
<div class="clear"></div>


<div class="pager">
<?php echo $this->_tpl_vars['pagerLinks']['all']; ?>

</div>
<div class="clear"></div>
<table class="datasheet" cellpadding="0" cellspacing="0" style="margin-top:10px;width:100%;">
<thead>
  <tr>
    <th style="text-align:center;width:130px;" class="threg">更新日</th>
    <th style="text-align:center;width:130px;" class="threg">フェア日時</th>
    <th style="text-align:center;width:160px" class="threg">おすすめ</th>
    <th style="text-align:center;" class="threg">タイトル</th>
    <th style="text-align:center;width:80px;" class="threg">公開設定</th>
    <th style="text-align:center;width:50px;" class="threg">処理</th>
  </tr>
</thead>
<tbody>
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
<tr>
<td style="text-align:center;" class="tdreg"><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['upDateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y年%m月%d日") : smarty_modifier_date_format($_tmp, "%Y年%m月%d日")); ?>
</td>
<td style="text-align:center;" class="tdreg"><?php echo $this->_tpl_vars['value']['dateTime']; ?>
</td>
<td class="tdreg">
<?php $_from = $this->_tpl_vars['value']['osusumeIcon']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oresult'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oresult']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['okey'] => $this->_tpl_vars['ovalue']):
        $this->_foreach['oresult']['iteration']++;
?>
<?php echo $this->_tpl_vars['osusumeIconArray'][$this->_tpl_vars['okey']]; ?>
<br />
<?php endforeach; endif; unset($_from); ?>
</td>
<td class="tdreg"><a href="./planEventAddChange.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
"><?php echo $this->_tpl_vars['value']['title']; ?>
</a></td>

<td style="text-align:center;" class="tdreg"><form action="./planEventList.php<?php echo $this->_tpl_vars['getLink']; ?>
" method="post" style="display:inline;">
    <input type="image" src="./cmn_img/<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>eye_close.png<?php else: ?>eye_open.png<?php endif; ?>" name="dispButton" 
           alt="<?php if ($this->_tpl_vars['value']['dispFlg']): ?>公開中<?php else: ?>非公開<?php endif; ?>" title="<?php if ($this->_tpl_vars['value']['dispFlg']): ?>公開中<?php else: ?>非公開<?php endif; ?>" style="text-align:center;" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['value']['id']; ?>
" name="id" />
    <input type="hidden" name="mode" value="<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>open<?php else: ?>close<?php endif; ?>" />
    <input type="hidden" name="dispFlg" value="<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>1<?php else: ?>0<?php endif; ?>" />
</form></td>

<td class="tdreg"><form action="./planEventList.php<?php echo $this->_tpl_vars['getLink']; ?>
" method="post">
    <input type="image" src="./cmn_img/dustbox.png" alt="削除する" title="削除する" name="del" onclick="return chk()" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['value']['id']; ?>
" name="id" />
    <?php if ($this->_tpl_vars['value']['pdfFileName']): ?><input type="hidden" name="pdfFileName" value="<?php echo $this->_tpl_vars['value']['pdfFileName']; ?>
" /><?php endif; ?>
    <?php if ($this->_tpl_vars['value']['fileName']): ?><input type="hidden" name="fileName" value="<?php echo $this->_tpl_vars['value']['fileName']; ?>
" /><?php endif; ?>
</form></td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</tbody>
<?php if ($this->_tpl_vars['listCount']): ?>
<tfoot>
<tr>
<td colspan="13">
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