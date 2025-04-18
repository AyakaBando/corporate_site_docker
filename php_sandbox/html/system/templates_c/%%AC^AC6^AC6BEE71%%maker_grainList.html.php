<?php /* Smarty version 2.6.19, created on 2015-06-08 13:16:38
         compiled from maker_grainList.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" type="text/css" href="css/pulldown.css"/>

<script type="text/javascript" src="./js/setForm.js"></script>
<script type="text/javascript" src="./js/load.js"></script>
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
</a> / <a href="makerAddChange.php">メーカー管理</a> / <?php if ($this->_tpl_vars['makerTitle']): ?><?php echo $this->_tpl_vars['makerTitle']; ?>
:<?php endif; ?><?php echo @PAGE_TITLE; ?>
管理 /</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/makerMenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

     <div id="data">
       <div class="patternPan">
       <b><?php echo $this->_tpl_vars['makerTitle']; ?>
</b>
       <?php if (! $_GET['d']): ?><?php echo @PAGE_TITLE; ?>
一覧を表示しています。
       <?php elseif ($_GET['d'] == 1): ?><b><?php echo $_GET['t']; ?>
</b>を削除しました。
       <?php elseif ($_GET['d'] == 2): ?><b><?php echo $this->_tpl_vars['title']; ?>
</b>を<?php if ($_GET['dispFlg']): ?>公開<?php else: ?>非公開に<?php endif; ?>しました。
       <?php elseif ($_GET['d'] == 3): ?><b><?php echo $_GET['t']; ?>
</b>をコピーしました。
       <?php elseif ($_GET['d'] == 4): ?>選択した製品を<b><?php if ($_GET['t'] == 1): ?>表示<?php elseif ($_GET['t'] == 2): ?>非表示に<?php elseif ($_GET['t'] == 3): ?>削除<?php endif; ?></b>しました。
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
<col width="30px" />
<col width="160px" />
<col />

<col width="140px" />
<col width="100px" />
<col width="40px" />
<tr>
<th style="text-align:center;" class="threg"><input type="checkbox" name="allCheck" value="1" class="allopt" onclick="allChk( this.checked, null, '.opt' );allChk( this.checked, null, '.allopt' );" /></th>
<th style="text-align:center;" class="threg">画像</th>
<th style="text-align:center;" class="threg">
<a href="./<?php echo @THE_FILE_NAME; ?>
.php?sort=name&cond=<?php if ($_GET['sort'] == 'name' && $_GET['cond'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php echo $this->_tpl_vars['sortLink']['addition']; ?>
">
品名
</a>
</th>
<th style="text-align:center;" class="threg">
<a href="./<?php echo @THE_FILE_NAME; ?>
.php?sort=price&cond=<?php if ($_GET['sort'] == 'price' && $_GET['cond'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php echo $this->_tpl_vars['sortLink']['addition']; ?>
">
加算額
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
<td class="tdreg" style="text-align:center;"><input type="checkbox" name="operation[<?php echo $this->_tpl_vars['value']['id']; ?>
]" value="1" class="opt" data-idnum="<?php echo $this->_tpl_vars['value']['id']; ?>
" /></td>
<td class="tdreg" style="text-align:center;"><?php if ($this->_tpl_vars['value']['fileName1']): ?><img src="../upImage/<?php echo @FILE_CATEGORY; ?>
/<?php echo $this->_tpl_vars['value']['fileName1']; ?>
" alt="<?php echo $this->_tpl_vars['value']['name']; ?>
" width="100" /><?php endif; ?></td>
<td class="tdreg"><a href="./<?php echo @SQL_TABLE_NAME; ?>
AddChange.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
&makerId=<?php echo $this->_tpl_vars['value']['makerId']; ?>
"><?php echo $this->_tpl_vars['value']['name']; ?>
</a></td>
<td class="tdreg"><?php if ($this->_tpl_vars['value']['price']): ?><?php echo $this->_tpl_vars['value']['price']; ?>
<?php else: ?>-<?php endif; ?></td>
<td style="text-align:center;" class="tdreg">
  <form action="./<?php echo @THE_FILE_NAME; ?>
.php<?php echo $this->_tpl_vars['getLink']['all']; ?>
" method="post" style="display:inline;">
    <input type="image" src="./cmn_img/<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>eye_close.png<?php else: ?>eye_open.png<?php endif; ?>" name="dispButton" 
           alt="<?php if ($this->_tpl_vars['value']['dispFlg']): ?>公開中<?php else: ?>非公開<?php endif; ?>" title="<?php if ($this->_tpl_vars['value']['dispFlg']): ?>公開中<?php else: ?>非公開<?php endif; ?>" style="text-align:center;" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['value']['id']; ?>
" name="id" />
    <input type="hidden" name="mode" value="<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>open<?php else: ?>close<?php endif; ?>" />
    <input type="hidden" name="makerId" value="<?php echo $this->_tpl_vars['value']['makerId']; ?>
" />
    <input type="hidden" name="dispFlg" value="<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>1<?php else: ?>0<?php endif; ?>" />
  </form>
</td>

<td class="tdreg center"><form action="./<?php echo @THE_FILE_NAME; ?>
.php<?php echo $this->_tpl_vars['getLink']['all']; ?>
" method="post" style="display:inline;">
    <input type="image" src="./cmn_img/dustbox.png" alt="削除する" title="削除する" name="del" onclick="return chk()" style="text-align:center;" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['value']['id']; ?>
" name="id" />
    <input type="hidden" name="makerId" value="<?php echo $this->_tpl_vars['value']['makerId']; ?>
" />
    <?php if ($this->_tpl_vars['value']['fileName']): ?><input type="hidden" name="fileName" value="<?php echo $this->_tpl_vars['value']['fileName']; ?>
" /><?php endif; ?>
</form></td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['listCount']): ?>
<tr>
<td class="center hothre"><input type="checkbox" name="allCheck" value="1" class="allopt" onclick="allChk( this.checked, null, '.opt' );allChk( this.checked, null, '.allopt' );" /></td>
<td colspan="5" class="hothre">
<font>全<?php echo $this->_tpl_vars['listCount']; ?>
件中<?php echo $this->_tpl_vars['cnt']['start']; ?>
～<?php echo $this->_tpl_vars['cnt']['end']; ?>
件を表示。</font>
</td>
</tr>
<?php endif; ?>
</table>

<div>
<form action="./<?php echo @THE_FILE_NAME; ?>
.php<?php echo $this->_tpl_vars['getLink']['all']; ?>
" name="sort" method="post" id="optSubmit">
<table class="datasheet" cellpadding="0" cellspacing="0" style="margin:10px 0 0 0;width:60%;">
<tr>
<td class="tdreg center"><input type="submit" name="alldisp" value="チェックしたものを表示する" onclick="return optChk( 1 );optSave( '.opt' )" /></td>
<td class="tdreg center"><input type="submit" name="allundisp" value="チェックしたものを非表示にする" onclick="return optChk( 2 );optSave( '.opt' )" /></td>
<td class="tdreg center"><input type="submit" name="allundell" value="チェックしたものを削除する" onclick="return optChk( 3 );optSave( '.opt' )" /></td>
</tr>
</table>
<input type="hidden" name="optFlg" value="1" />
<input type="hidden" name="makerId" value="<?php echo $_REQUEST['makerId']; ?>
" />
</form>
</div>

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