<?php /* Smarty version 2.6.19, created on 2015-01-09 16:04:04
         compiled from partAddChange.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript" src="./js/setForm.js"></script>
<link rel="stylesheet" href="./js/css/jquery.ui.all.css">

<script src="./js/ui/jquery.ui.core.min.js"></script>
<script src="./js/ui/jquery.ui.widget.min.js"></script>
<script src="./js/ui/jquery.ui.mouse.min.js"></script>
<script src="./js/ui/jquery.ui.sortable.min.js"></script>
<script src="./js/ui/jquery.ui.droppable.min.js"></script>
<script src="./js/queserser.sort.js"></script>

<?php echo '
<script type="text/javascript" charset="utf-8">
<!--
// 確認ウィンドウを表示する
function chk( title )
{
    if( confirm( "削除してもよろしいですか？" ) )
    {
        return true;
    }
    return false;
}
// -->
</script>
<style type="text/css"> 
.sortThis{
    padding:0;
    color:#fff;
    cursor:move;
    font-size:18px;
    font-weight:bold;
    text-align:center;
    width:40px;
    display:table-cell;
    background:url( \'./cmn_img/arrow.gif\' ) no-repeat center center;
    /*filter: progid:DXImageTransform.Microsoft.gradient( GradientType=0,startColorstr=\'#d1e1f1\', endColorstr=\'#2f73ba\' );
    background:-moz-linear-gradient(
        top, 
        #d1e1f1,  
        #d1e1f1 4%, 
        #d1e1f1 5%, 
        #d1e1f1 50%, 
        #2f73ba 60%, 
        #2f73ba 90%, 
        #2f73ba );
    background: 
        -webkit-gradient(
        linear,
        left top,left bottom,
        from(#d1e1f1),
        color-stop(0.04, #d1e1f1),
        color-stop(0.05, #d1e1f1),
        color-stop(0.45, #d1e1f1),
        color-stop(0.50, #2f73ba),
        color-stop(0.90, #2f73ba),
        to(#2f73ba));*/
}
</style>
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
    <div id="logo">
     <img src="../../cmn_img/logo.jpg" />
    </div>
   </div><!-- /#header -->
   <div id="container">
    <div id="contents">
     <div id="pan">
      <a href="./login.php"><?php echo @TITLE; ?>
</a> / <?php echo @PAGE_TITLE; ?>
<?php if ($_GET['id']): ?>更新<?php else: ?>編集<?php endif; ?>     </div>
     <div id="data">
<div style="width:80%;">
       <div class="patternPan">
       <?php echo @PAGE_TITLE; ?>
を<?php if ($_REQUEST['partId']): ?>編集<?php else: ?>登録<?php endif; ?>します。<br />
       <span style="color:#ff0000;">＊の項目は必ず入力・選択してください</span>
       </div>

        <?php if ($_GET['r'] || $_GET['d']): ?>
        <div style="margin:12px 0 20px 0;padding:10px;border:1px solid #ff99ff;background-color:#ffffff;color:#ff33ff;">
        <?php if ($_GET['d'] == 1): ?><?php echo $_GET['t']; ?>
を削除しました。<?php endif; ?>
        <?php if ($_GET['d'] == 2): ?><?php echo $_GET['t']; ?>
を<?php if ($_GET['dispFlg']): ?>公開<?php else: ?>非公開に<?php endif; ?>しました。<?php endif; ?>
        <?php if ($_GET['d'] == 3): ?>順番を更新しました。<?php endif; ?>
        <?php if ($_GET['r']): ?><?php echo $this->_tpl_vars['title']; ?>
を<?php if ($_GET['r'] == 1): ?>登録<?php else: ?>修正<?php endif; ?>しました。<?php endif; ?>
        </div>
        <?php endif; ?>



<form<?php echo $this->_tpl_vars['form']['attributes']; ?>
>

        <?php if ($_REQUEST['partId']): ?>
        <p style="margin-bottom:8px;text-align:right;"><a href="./<?php echo @THE_FILE_NAME; ?>
.php" style="padding:6px 16px;line-height:1.8em;display:inline-brock;width:70px;height:24px;text-align:center;background-color:#eeeeee;border:1px solid #999999;">新規登録</a></p>
        <?php endif; ?>

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

       <table cellpadding="0" cellspacing="0" style="margin:0 0 10px 0;width:100%;">
          <tr class="caption"><th colspan="2" class="center" class="threg">概要</th></tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">部位名<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['name']['html']; ?>
</td>
          <tr><th width="16%" style="text-align:right;" class="threg">公開状態</th>
          <td class="tdreg"><?php echo $this->_tpl_vars['form']['dispFlg']['html']; ?>
</td></tr>
       </table>

       <div id="naviBt03">
        <ul>
                  <li><?php echo $this->_tpl_vars['form']['submitReg']['html']; ?>
</li>
         <?php echo $this->_tpl_vars['form']['hidden']; ?>
</form>
        </ul>
       </div>
       <div class="clear"></div>


<div class="clear" style="margin-bottom:20px;"></div>

<table id="sort" class="datasheet" cellpadding="0" cellspacing="0" style="margin:10px 0 0 0;width:100%;">
<tr>
<th style="text-align:center;" class="threg" colspan="2">
  <a href="./<?php echo @THE_FILE_NAME; ?>
.php?sort=name&cond=<?php if ($_GET['sort'] == 'name' && $_GET['cond'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php echo $this->_tpl_vars['sortLink']['all']; ?>
">名前 <img src="cmn_img/<?php if ($_GET['sort'] == 'name' && $_GET['cond'] == 'DESC'): ?>down<?php else: ?>up<?php endif; ?>.gif"/></a></th>
<th style="text-align:center; width:100px;" class="threg">
  <a href="./<?php echo @THE_FILE_NAME; ?>
.php?sort=dispFlg&cond=<?php if ($_GET['sort'] == 'dispFlg' && $_GET['cond'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php echo $this->_tpl_vars['sortLink']['all']; ?>
">公開設定 <img src="cmn_img/<?php if ($_GET['sort'] == 'dispFlg' && $_GET['cond'] == 'DESC'): ?>down<?php else: ?>up<?php endif; ?>.gif"/></a></th>
<th style="text-align:center; width:50px;" class="threg">削除</th>
</tr>

<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
<tr>
<td class="tdreg sortThis" data-idnum="<?php echo $this->_tpl_vars['value']['partId']; ?>
"></td>
<td class="tdreg"><a href="./<?php echo @THE_FILE_NAME; ?>
.php?partId=<?php echo $this->_tpl_vars['value']['partId']; ?>
" title="<?php echo $this->_tpl_vars['value']['name']; ?>
を編集する"><?php echo $this->_tpl_vars['value']['name']; ?>
</a></td>
<td style="text-align:center;" class="tdreg"><form action="./<?php echo @THE_FILE_NAME; ?>
.php<?php echo $this->_tpl_vars['sortLink']['all']; ?>
" method="post" style="display:inline;">
    <input type="image" src="./cmn_img/<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>eye_close.png<?php else: ?>eye_open.png<?php endif; ?>" name="dispButton" 
           alt="<?php if ($this->_tpl_vars['value']['dispFlg']): ?>公開中<?php else: ?>非公開<?php endif; ?>" title="<?php if ($this->_tpl_vars['value']['dispFlg']): ?>公開中<?php else: ?>非公開<?php endif; ?>" style="text-align:center;" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['value']['partId']; ?>
" name="partId" />
    <input type="hidden" name="mode" value="<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>open<?php else: ?>close<?php endif; ?>" />
    <input type="hidden" name="dispFlg" value="<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>1<?php else: ?>0<?php endif; ?>" />
</form></td>
<td class="tdreg center"><form action="./<?php echo @THE_FILE_NAME; ?>
.php<?php echo $this->_tpl_vars['getLink']['all']; ?>
" method="post" style="display:inline;">
    <input type="image" src="./cmn_img/dustbox.png" alt="削除する" title="削除する" name="del" onclick="return chk( '<?php echo $this->_tpl_vars['value']['name']; ?>
' )" style="text-align:center;" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['value']['partId']; ?>
" name="partId" />
    <?php if ($this->_tpl_vars['value']['fileName1']): ?><input type="hidden" name="fileName" value="<?php echo $this->_tpl_vars['value']['fileName1']; ?>
" /><?php endif; ?>
</form></td>
</tr>
<?php endforeach; else: ?>
<tr>
<td colspan="13" style="text-align:center;" class="tdreg">
<font>現在登録はございません。。。</font>
</td>
</tr>
<?php endif; unset($_from); ?>
</table>

<?php if ($this->_tpl_vars['list']): ?>
<div style="margin-top:16px;">
  <form action="./<?php echo @THE_FILE_NAME; ?>
.php<?php echo $this->_tpl_vars['getLink']['all']; ?>
<?php if ($this->_tpl_vars['getLink']['all']): ?>&<?php else: ?>?<?php endif; ?>s=1" method="post" enctype="multipart/form-data" name="sort" id="sortSubmit" style="margin-bottom:40px;text-align:center;">
    <input onmouseover="this.style.backgroundColor='#4097ff'" style="font-size:10pt;color:#ffffff;background-color:#026aff;width:200px;line-height:20px;height:30px;margin:0 auto;" onmouseout="this.style.backgroundColor='#026aff'" type="button" value="並び替え" onclick="sortSave( '.sortThis' )">
  </form>
</div>
<?php endif; ?>
<div class="clear"></div>
</div>


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
