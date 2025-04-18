<?php /* Smarty version 2.6.19, created on 2015-06-10 12:56:03
         compiled from makerAddChange.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript" src="./js/setForm.js"></script>
<link rel="stylesheet" href="./js/css/jquery.ui.all.css">
<link rel="stylesheet" href="./css/sort.table.css">

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

$(function(){
    $(\'#menu li\').hover(function(){
        $("ul:not(:animated)", this).slideDown();
    }, function(){
        $("ul.child",this).slideUp();
    });
});

// -->
</script>
<style type="text/css">
<!--
ul{

}
ul#menu li{
    float: left;
    position: relative;
    margin: 0;
    padding: 0;
    display: block;
}

ul#menu li.own{
    float: left;
    position: relative;
    margin: 0;
    padding: 6px 0 0 0;
    display: block;
    width:100px;
    height:32px;
    text-align:center;
}

ul.child{
    display: none;
    position: absolute;
    left:100px;
    top:0px;
    /*margin-left: 2px;*/
    padding: 0;
}

ul.child li{
    /*margin-left: 2px;*/
    padding: 0;
    width:200px;
    height:22px;
    background-color:#bbb;
    border-bottom:1px dotted #ccc;
}

ul.child li a{
    color: #000;
}

ul.child li span.title{
    display:brock;
    width:104px;
    height:100%;
    padding-left:6px;
    margin-right:4px;
    float:right;
    background-color:#999;
    color: #fff;
    /*text-align:right;*/
}

a.linkL{
    padding-left:8px;
}

li a:hover{
    color: #0000ff;
}
-->
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
<div style="width:90%;">
       <div class="patternPan">
       <?php echo @PAGE_TITLE; ?>
を<?php if ($_REQUEST['makerId']): ?>編集<?php else: ?>登録<?php endif; ?>します。<br />
       <span style="color:#ff0000;">＊の項目は必ず入力・選択してください</span>
       </div>

        <?php if ($_GET['r'] || $_GET['d']): ?>
        <div style="margin:12px 0 20px 0;padding:10px;border:1px solid #ff99ff;background-color:#ffffff;color:#ff33ff;">
        <?php if ($_GET['d'] == 1): ?><?php echo $_GET['t']; ?>
を削除しました。<?php endif; ?>
        <?php if ($_GET['d'] == 2): ?><?php echo $this->_tpl_vars['title']; ?>
を<?php if ($_GET['dispFlg']): ?>公開<?php else: ?>非公開に<?php endif; ?>しました。<?php endif; ?>
        <?php if ($_GET['d'] == 3): ?>順番を更新しました。<?php endif; ?>
        <?php if ($_GET['r']): ?><?php echo $this->_tpl_vars['title']; ?>
を<?php if ($_GET['r'] == 1): ?>登録<?php else: ?>修正<?php endif; ?>しました。<?php endif; ?>
        </div>
        <?php endif; ?>



<form<?php echo $this->_tpl_vars['form']['attributes']; ?>
>

        <?php if ($_REQUEST['makerId']): ?>
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
            <th width="16%" style="text-align:right;" class="threg">メーカー名<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['name']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">カテゴリ<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['category']['html']; ?>
</td>
          </tr>
<?php $this->assign('sessionKey', @FILE_SESSION_KEY); ?>
<?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['start'] = (int)1;
$this->_sections['cnt']['loop'] = is_array($_loop=$this->_tpl_vars['maxImageCnt']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cnt']['show'] = true;
$this->_sections['cnt']['max'] = $this->_sections['cnt']['loop'];
$this->_sections['cnt']['step'] = 1;
if ($this->_sections['cnt']['start'] < 0)
    $this->_sections['cnt']['start'] = max($this->_sections['cnt']['step'] > 0 ? 0 : -1, $this->_sections['cnt']['loop'] + $this->_sections['cnt']['start']);
else
    $this->_sections['cnt']['start'] = min($this->_sections['cnt']['start'], $this->_sections['cnt']['step'] > 0 ? $this->_sections['cnt']['loop'] : $this->_sections['cnt']['loop']-1);
if ($this->_sections['cnt']['show']) {
    $this->_sections['cnt']['total'] = min(ceil(($this->_sections['cnt']['step'] > 0 ? $this->_sections['cnt']['loop'] - $this->_sections['cnt']['start'] : $this->_sections['cnt']['start']+1)/abs($this->_sections['cnt']['step'])), $this->_sections['cnt']['max']);
    if ($this->_sections['cnt']['total'] == 0)
        $this->_sections['cnt']['show'] = false;
} else
    $this->_sections['cnt']['total'] = 0;
if ($this->_sections['cnt']['show']):

            for ($this->_sections['cnt']['index'] = $this->_sections['cnt']['start'], $this->_sections['cnt']['iteration'] = 1;
                 $this->_sections['cnt']['iteration'] <= $this->_sections['cnt']['total'];
                 $this->_sections['cnt']['index'] += $this->_sections['cnt']['step'], $this->_sections['cnt']['iteration']++):
$this->_sections['cnt']['rownum'] = $this->_sections['cnt']['iteration'];
$this->_sections['cnt']['index_prev'] = $this->_sections['cnt']['index'] - $this->_sections['cnt']['step'];
$this->_sections['cnt']['index_next'] = $this->_sections['cnt']['index'] + $this->_sections['cnt']['step'];
$this->_sections['cnt']['first']      = ($this->_sections['cnt']['iteration'] == 1);
$this->_sections['cnt']['last']       = ($this->_sections['cnt']['iteration'] == $this->_sections['cnt']['total']);
?>
          <tr>
            <th width="16%" style="text-align:right;" class="threg"><?php echo $this->_tpl_vars['imageTitleArray'][$this->_sections['cnt']['index']]; ?>
</th>
            <td class="tdreg">
               <?php if ($this->_tpl_vars['fileFlg'][$this->_sections['cnt']['index']] == 1): ?>
                   <?php if (! $_POST['imageDel'][$this->_sections['cnt']['index']] && $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="./temp/<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="アップ予定ファイル" width="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['img']['width']; ?>
" height="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['img']['height']; ?>
" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']; ?>
" />

                   <?php elseif (! $_POST['imageDel'][$this->_sections['cnt']['index']] && $this->_tpl_vars['image'][$this->_sections['cnt']['index']]['fileName'] && ! $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="../upImage/<?php echo @FILE_CATEGORY; ?>
/<?php echo $this->_tpl_vars['image'][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="登録画像" width="<?php echo $this->_tpl_vars['image'][$this->_sections['cnt']['index']]['image']['width']; ?>
" height="<?php echo $this->_tpl_vars['image'][$this->_sections['cnt']['index']]['image']['height']; ?>
" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $this->_tpl_vars['image'][$this->_sections['cnt']['index']]['fileName']; ?>
" />

                   <?php endif; ?>
               <?php else: ?>
                   <?php if ($this->_tpl_vars['image'][$this->_sections['cnt']['index']]['fileName'] && ! $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="../upImage/<?php echo @FILE_CATEGORY; ?>
/<?php echo $this->_tpl_vars['image'][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="登録画像" width="<?php echo $this->_tpl_vars['image'][$this->_sections['cnt']['index']]['image']['width']; ?>
" height="<?php echo $this->_tpl_vars['image'][$this->_sections['cnt']['index']]['image']['height']; ?>
" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $this->_tpl_vars['image'][$this->_sections['cnt']['index']]['fileName']; ?>
" />

                   <?php elseif ($_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="./temp/<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="登録画像" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']; ?>
" width="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['img']['width']; ?>
" height="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['img']['height']; ?>
" />

                   <?php endif; ?>
               <?php endif; ?>
                   <?php if (! $this->_tpl_vars['flg']): ?><?php echo $this->_tpl_vars['form'][$this->_sections['cnt']['index']]['html']; ?>
<?php endif; ?>
                   <br /><span style="font-size:10px;color:#ff0000;">登録画像サイズ 横<?php echo $this->_tpl_vars['maxWidth'][$this->_sections['cnt']['index']]; ?>
px×縦<?php echo $this->_tpl_vars['maxHeight'][$this->_sections['cnt']['index']]; ?>
px</span>
                   <br /><?php echo $this->_tpl_vars['form']['imageDel'][$this->_sections['cnt']['index']]['html']; ?>

            </td>
          </tr>
<?php endfor; endif; ?>
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
<th style="text-align:center;" class="threg" colspan="2">名前</th>
<th style="text-align:center;width:110px;padding:0;" class="threg">メーカーカスタム</th>
<th style="text-align:center; width:70px;" class="threg">公開設定</th>
<th style="text-align:center; width:50px;" class="threg">削除</th>
</tr>
<tbody>
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
<tr>
<td class="tdreg sortThis" data-idnum="<?php echo $this->_tpl_vars['value']['makerId']; ?>
"> </td>
<td class="tdreg"><a href="./<?php echo @THE_FILE_NAME; ?>
.php?makerId=<?php echo $this->_tpl_vars['value']['makerId']; ?>
" title="<?php echo $this->_tpl_vars['value']['name']; ?>
を編集する"><?php echo $this->_tpl_vars['value']['name']; ?>
</a></td>
<td class="tdreg" style="text-align:center;padding:0;">
<ul id="menu">
    <li class="own">メニュー
        <ul class="child">
            <li><span class="title">張地ランク</span><a href="./maker_upholsteryList.php?makerId=<?php echo $this->_tpl_vars['value']['makerId']; ?>
" class="linkL">一覧</a> | <a href="./maker_upholsteryAddChange.php?makerId=<?php echo $this->_tpl_vars['value']['makerId']; ?>
" class="linkR">登録</a></li>
            <li><span class="title">木目</span><a href="./maker_grainList.php?makerId=<?php echo $this->_tpl_vars['value']['makerId']; ?>
" class="linkL">一覧</a> | <a href="./maker_grainAddChange.php?makerId=<?php echo $this->_tpl_vars['value']['makerId']; ?>
" class="linkR">登録</a></a></li>
            <li><span class="title">天板カラー</span><a href="./maker_tableColorList.php?makerId=<?php echo $this->_tpl_vars['value']['makerId']; ?>
" class="linkL">一覧</a> | <a href="./maker_tableColorAddChange.php?makerId=<?php echo $this->_tpl_vars['value']['makerId']; ?>
" class="linkR">登録</a></a></li>
            <li><span class="title">台輪カラー</span><a href="./maker_architraveColorList.php?makerId=<?php echo $this->_tpl_vars['value']['makerId']; ?>
" class="linkL">一覧</a> | <a href="./maker_architraveColorAddChange.php?makerId=<?php echo $this->_tpl_vars['value']['makerId']; ?>
" class="linkR">登録</a></a></li>
            <li><span class="title">台輪タイプ</span><a href="./maker_architraveTypeList.php?makerId=<?php echo $this->_tpl_vars['value']['makerId']; ?>
" class="linkL">一覧</a> | <a href="./maker_architraveTypeAddChange.php?makerId=<?php echo $this->_tpl_vars['value']['makerId']; ?>
" class="linkR">登録</a></a></li>
        </ul>
    </li>
    
    
</ul>

</td>
<td style="text-align:center;" class="tdreg"><form action="./<?php echo @THE_FILE_NAME; ?>
.php<?php echo $this->_tpl_vars['sortLink']['all']; ?>
" method="post" style="display:inline;">
    <input type="image" src="./cmn_img/<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>eye_close.png<?php else: ?>eye_open.png<?php endif; ?>" name="dispButton" 
           alt="<?php if ($this->_tpl_vars['value']['dispFlg']): ?>公開中<?php else: ?>非公開<?php endif; ?>" title="<?php if ($this->_tpl_vars['value']['dispFlg']): ?>公開中<?php else: ?>非公開<?php endif; ?>" style="text-align:center;" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['value']['makerId']; ?>
" name="makerId" />
    <input type="hidden" name="mode" value="<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>open<?php else: ?>close<?php endif; ?>" />
    <input type="hidden" name="dispFlg" value="<?php if (! $this->_tpl_vars['value']['dispFlg']): ?>1<?php else: ?>0<?php endif; ?>" />
</form></td>
<td class="tdreg center"><form action="./<?php echo @THE_FILE_NAME; ?>
.php<?php echo $this->_tpl_vars['getLink']['all']; ?>
" method="post" style="display:inline;">
    <input type="image" src="./cmn_img/dustbox.png" alt="削除する" title="削除する" name="del" onclick="return chk( '<?php echo $this->_tpl_vars['value']['name']; ?>
' )" style="text-align:center;" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['value']['makerId']; ?>
" name="makerId" />
</form></td>
</tr>
<?php endforeach; else: ?>
<tr>
<td colspan="13" style="text-align:center;" class="tdreg">
<font>現在登録はございません。。。</font>
</td>
</tr>
<?php endif; unset($_from); ?>
</tbody>
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
