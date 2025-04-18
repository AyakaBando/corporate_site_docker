<?php /* Smarty version 2.6.19, created on 2014-01-20 13:16:08
         compiled from planEventAddChange.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<link rel="stylesheet" type="text/css" href="./css/ui.all.css"/>
<link rel="stylesheet" type="text/css" href="./css/ui.datepicker.css"/>
<link rel="stylesheet" type="text/css" href="./css/mdp.css">
<script type="text/javascript" src="./js/jquery.ui.core.js" ></script>
<script type="text/javascript" src="./js/jquery.ui.datepicker.js" ></script>
<script type="text/javascript" src="./js/ui.datepicker-ja.js" ></script>
<script type="text/javascript" src="./js/jquery-ui.multidatespicker.js" ></script>
<script type="text/javascript" src="./js/ckeditor/ckeditor.js"></script>
<?php echo '
<script type="text/javascript">
<!--
//var latestMDPver = $.ui.multiDatesPicker.version;
//var lastMDPupdate = \'2012-03-28\';

$(function() {
	$(\'#dateTime\').multiDatesPicker({duration: "",dateFormat: \'yy-mm-dd\'});
	});
'; ?>

<?php if ($_POST['dateTime'] || $this->_tpl_vars['data']['dateTime']): ?>
$(function()
<?php echo '
{
'; ?>

    $('input#dateTime').val('<?php if ($_POST['dateTime']): ?><?php echo $_POST['dateTime']; ?>
<?php elseif ($this->_tpl_vars['data']['dateTime']): ?><?php echo $this->_tpl_vars['data']['dateTime']; ?>
<?php endif; ?>');
    //$('input#money').val('<?php if ($_POST['dateTime']): ?><?php echo $_POST['dateTime']; ?>
<?php elseif ($this->_tpl_vars['data']['dateTime']): ?><?php echo $this->_tpl_vars['data']['dateTime']; ?>
<?php endif; ?>');
<?php echo '
});
'; ?>

<?php endif; ?>

// -->
</script>


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
<?php echo '
<style scoped="scoped">
#p2146-table{
width:100%;
font-size:14px;
border-collapse:collapse;
}
#p2146-table th,#p2146-table td{
border:1px solid #aaa;
padding:5px 8px;
text-align:center;
}
#p2146-table th{
background-color:#999;
color:#fff;
}

#p2146-table img{
cursor:pointer;
vertical-align:text-bottom;
}
#p2146-table input[type="button"]{
background-color:#f0f0f0;
border:1px solid #aaa;
border-radius:3px;
box-shadow:0 1px 2px #999;
width:30px;
}
</style>
<script>
//▼リストの追加▼
function addList(obj){
   //var element=document.createElement(\'tr\');
   //var list=\'<td><select onchange="changeType(this);"><option>A</option><option>B</option><option>C</option></select></td><td>A</td><td><img src="/wp-content/uploads/2011/11/up.png" alt="↑" height="18" onclick="listUp(this);" />上へ　<img src="/wp-content/uploads/2011/11/down.png" alt="↓" height="18" onclick="listDown(this);" />下へ</td><td><input type="button" value="+" onclick="addList(this);" />　<input type="button" value="-" onclick="removeList(this);" /></td>\';
   //element.innerHTML=list;

   var tbody=document.getElementById(\'p2146-tbody\');
   var tr=obj.parentNode.parentNode;
   var list=tbody.childNodes[0].cloneNode(true);
   var td=list.childNodes[1];

   tbody.insertBefore(list,tr.nextSibling);

}
//▲リストの追加▲

//▼リストの削除▼
function removeList(obj){
var tbody=document.getElementById(\'p2146-tbody\');
var tr=obj.parentNode.parentNode;
var tags=tbody.getElementsByTagName("tr").length;

//var response=confirm("「リスト」を削除してもよろしいでしょうか？");

//if(response==true){
if( tags >= 2 )
    tbody.removeChild(tr); 
//}
}
//▲リストの削除▲

//▼リストの順番上げる▼
function upList(obj){
var tbody=document.getElementById(\'p2146-tbody\');
var tr=obj.parentNode.parentNode;

if(tr.previousSibling.nodeName=="TR"){
tbody.insertBefore(tr, tr.previousSibling);
}
}
//▲リストの順番上げる▲

//▼リストの順番下げる▼
function downList(obj){
var tbody=document.getElementById(\'p2146-tbody\');
var tr=obj.parentNode.parentNode;
//alert(tr.nextSibling.nodeName);

if(tr.nextSibling.nodeName=="TR"){
tbody.insertBefore(tr.nextSibling, tr);
}
}
//▲リストの順番下げる▲

//▼切り替え▼
function changeList(obj){
var type=obj.value;
//alert(type);
var tr=obj.parentNode.parentNode;
var td=tr.childNodes[1];

var cell=document.createElement(\'td\');
cell.innerHTML=type;
tr.replaceChild(cell,td);
}
//▲切り替え▲
</script>


'; ?>




     <div id="pan">
      <a href="./login.php"><?php echo @TITLE; ?>
</a> / <a href="./planEventList.php"><?php echo @PAGE_TITLE; ?>
一覧</a> / <?php echo @PAGE_TITLE; ?>
<?php if ($_GET['id']): ?>更新<?php else: ?>編集<?php endif; ?>     </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/contentsMenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

     <div id="data">

       <div class="patternPan">
       <?php echo @PAGE_TITLE; ?>
を<?php if ($_REQUEST['id']): ?>更新<?php else: ?>登録<?php endif; ?>します。<br />
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
          <tr>
              <th width="16%" style="text-align:right;" class="threg">開催日<?php if (! $_REQUEST['id']): ?><span style="color:#ff0000;">＊</span><?php endif; ?></th>
              <td class="tdreg">
              <?php if ($_REQUEST['id']): ?>
              <?php echo $this->_tpl_vars['data']['dateTime']; ?>

              <?php else: ?>
              <?php echo $this->_tpl_vars['form']['dateTime']['html']; ?>

              <?php endif; ?>
              </td>
          </tr>
          <tr>
              <th width="16%" style="text-align:right;" class="threg">おすすめアイコン<span style="color:#ff0000;">＊</span></th>
              <td class="tdreg"><?php echo $this->_tpl_vars['form']['osusumeIcon']['html']; ?>
</td>
          </tr>
          <tr>
              <th width="16%" style="text-align:right;" class="threg">内容アイコン</th>
              <td class="tdreg"><?php echo $this->_tpl_vars['form']['icon']['html']; ?>
</td>
          </tr>
          <tr>
              <th width="16%" style="text-align:right;" class="threg">タイトル<span style="color:#ff0000;">＊</span></th> 
              <td class="tdreg"><?php echo $this->_tpl_vars['form']['title']['html']; ?>
<br /><span style="font-size:10px;">50文字以内でご入力ください。</span></td>
          </tr>
          <tr>
              <th width="16%" style="text-align:right;" class="threg">キャプション<span style="color:#ff0000;">＊</span></th> 
              <td class="tdreg"><?php echo $this->_tpl_vars['form']['caption']['html']; ?>
</td>
          </tr>
<?php if (! $_REQUEST['id']): ?>
          <tr><th width="16%" style="text-align:right;" class="threg">開催時間<span style="color:#ff0000;">＊</span></th> 
          <td class="tdreg">
<table id="p2146-table">
<thead><tr><th>開始時間</th><th>終了時間</th><th>状態</th><th>リスト順</th><th>追加/削除</th></tr></thead>
<!--▼改行しない▼-->
<?php if (! $this->_tpl_vars['flg']): ?>
<tbody id="p2146-tbody"><?php $_from = $_POST['startTime']['H']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?><tr><td><select name="startTime[H][]"><?php $_from = $this->_tpl_vars['selectTimeArray']['H']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hkey'] => $this->_tpl_vars['hvalue']):
?><option value="<?php echo $this->_tpl_vars['hkey']; ?>
"<?php if ($_POST['startTime']['H'][$this->_tpl_vars['key']] == $this->_tpl_vars['hkey']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['hvalue']; ?>
</option><?php endforeach; endif; unset($_from); ?></select>:<select name="startTime[i][]"><?php $_from = $this->_tpl_vars['selectTimeArray']['i']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ikey'] => $this->_tpl_vars['ivalue']):
?><option value="<?php echo $this->_tpl_vars['ikey']; ?>
"<?php if ($_POST['startTime']['i'][$this->_tpl_vars['key']] == $this->_tpl_vars['ikey']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['ivalue']; ?>
</option><?php endforeach; endif; unset($_from); ?></select></td><td><select name="endTime[H][]"><?php $_from = $this->_tpl_vars['selectTimeArray']['H']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hkey'] => $this->_tpl_vars['hvalue']):
?><option value="<?php echo $this->_tpl_vars['hkey']; ?>
"<?php if ($_POST['endTime']['H'][$this->_tpl_vars['key']] == $this->_tpl_vars['hkey']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['hvalue']; ?>
</option><?php endforeach; endif; unset($_from); ?></select>:<select name="endTime[i][]"><?php $_from = $this->_tpl_vars['selectTimeArray']['i']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ikey'] => $this->_tpl_vars['ivalue']):
?><option value="<?php echo $this->_tpl_vars['ikey']; ?>
"<?php if ($_POST['endTime']['i'][$this->_tpl_vars['key']] == $this->_tpl_vars['ikey']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['ivalue']; ?>
</option><?php endforeach; endif; unset($_from); ?></select></td><td><select name="status[]"><?php $_from = $this->_tpl_vars['emptyStatusArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['skey'] => $this->_tpl_vars['svalue']):
?><option value="<?php echo $this->_tpl_vars['skey']; ?>
"<?php if ($_POST['status'][$this->_tpl_vars['key']] == $this->_tpl_vars['skey']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['svalue']; ?>
</option><?php endforeach; endif; unset($_from); ?></select></td><td><img src="./cmn_img/up.png" alt="↑" height="18" onclick="upList(this);" />　　<img src="./cmn_img/down.png" alt="↓" height="18" onclick="downList(this);" /></td><td><input type="button" value="+" onclick="addList(this);" />　<input type="button" value="-" onclick="removeList(this);" /></td></tr><?php endforeach; else: ?><tr><td><select name="startTime[H][]"><?php $_from = $this->_tpl_vars['selectTimeArray']['H']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hkey'] => $this->_tpl_vars['hvalue']):
?><option value="<?php echo $this->_tpl_vars['hkey']; ?>
"><?php echo $this->_tpl_vars['hvalue']; ?>
</option><?php endforeach; endif; unset($_from); ?></select>:<select name="startTime[i][]"><?php $_from = $this->_tpl_vars['selectTimeArray']['i']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?><option value="<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</option><?php endforeach; endif; unset($_from); ?></select></td><td><select name="endTime[H][]"><?php $_from = $this->_tpl_vars['selectTimeArray']['H']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?><option value="<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</option><?php endforeach; endif; unset($_from); ?></select>:<select name="endTime[i][]"><?php $_from = $this->_tpl_vars['selectTimeArray']['i']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?><option value="<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</option><?php endforeach; endif; unset($_from); ?></select></td><td><select name="status[]"><?php $_from = $this->_tpl_vars['emptyStatusArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['skey'] => $this->_tpl_vars['svalue']):
?><option value="<?php echo $this->_tpl_vars['skey']; ?>
"><?php echo $this->_tpl_vars['svalue']; ?>
</option><?php endforeach; endif; unset($_from); ?></select></td><td><img src="./cmn_img/up.png" alt="↑" height="18" onclick="upList(this);" />　　<img src="./cmn_img/down.png" alt="↓" height="18" onclick="downList(this);" /></td><td><input type="button" value="+" onclick="addList(this);" />　<input type="button" value="-" onclick="removeList(this);" /></td></tr>
<?php endif; unset($_from); ?></tbody>
<?php else: ?><tbody id="p2146-tbody">
<?php $_from = $_POST['startTime']['H']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
<tr>
  <td>
      <input type="hidden" name="startTime[H][]" value="<?php echo $this->_tpl_vars['value']; ?>
">
      <?php $_from = $this->_tpl_vars['selectTimeArray']['H']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hkey'] => $this->_tpl_vars['hvalue']):
?>
          <?php if ($_POST['startTime']['H'][$this->_tpl_vars['key']] == $this->_tpl_vars['hkey']): ?><?php echo $this->_tpl_vars['hvalue']; ?>
<?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>:
      <?php $_from = $this->_tpl_vars['selectTimeArray']['i']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ikey'] => $this->_tpl_vars['ivalue']):
?>
          <?php if ($_POST['startTime']['i'][$this->_tpl_vars['key']] == $this->_tpl_vars['ikey']): ?><?php echo $this->_tpl_vars['ivalue']; ?>
<input type="hidden" name="startTime[i][]" value="<?php echo $this->_tpl_vars['ivalue']; ?>
"><?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
  </td>
  <td>
      <?php $_from = $this->_tpl_vars['selectTimeArray']['H']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hkey'] => $this->_tpl_vars['hvalue']):
?>
          <?php if ($_POST['endTime']['H'][$this->_tpl_vars['key']] == $this->_tpl_vars['hkey']): ?><?php echo $this->_tpl_vars['hvalue']; ?>
<input type="hidden" name="endTime[H][]" value="<?php echo $this->_tpl_vars['hvalue']; ?>
"><?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>:
      <?php $_from = $this->_tpl_vars['selectTimeArray']['i']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ikey'] => $this->_tpl_vars['ivalue']):
?>
          <?php if ($_POST['endTime']['i'][$this->_tpl_vars['key']] == $this->_tpl_vars['ikey']): ?><?php echo $this->_tpl_vars['ivalue']; ?>
<input type="hidden" name="endTime[i][]" value="<?php echo $this->_tpl_vars['ivalue']; ?>
"><?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
  </td>
  <td>
      <?php $_from = $this->_tpl_vars['emptyStatusArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['skey'] => $this->_tpl_vars['svalue']):
?>
          <?php if ($_POST['status'][$this->_tpl_vars['key']] == $this->_tpl_vars['skey']): ?><?php echo $this->_tpl_vars['svalue']; ?>
<input type="hidden" name="status[]" value="<?php echo $this->_tpl_vars['skey']; ?>
"><?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
  </td>
  <td>　</td>
  <td>　</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</tbody>
<?php endif; ?>
<!--▲改行しない▲-->
</table>
          </td></tr>
<?php endif; ?>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">メインビュジュアル<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg">
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
?><?php if ($this->_sections['cnt']['index'] == 1): ?>
               <div style="float:left;display:inline;width:320px;margin-right:20px;">
               <?php if ($this->_tpl_vars['fileFlg'][$this->_sections['cnt']['index']] == 1): ?>                   <?php if (! $_POST['imageDel'][$this->_sections['cnt']['index']] && $_SESSION['planEventImage'][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="./temp/<?php echo $_SESSION['planEventImage'][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="アップ予定ファイル" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $_SESSION['planEventImage'][$this->_sections['cnt']['index']]['fileName']; ?>
" />
                   <?php endif; ?>
               <?php elseif ($_POST['imageDel'][$this->_sections['cnt']['index']]): ?>
                       <br /><span class="red">画像を削除します。</span>
               <?php else: ?>
                   <?php if (! $_SESSION['planEventImage'][$this->_sections['cnt']['index']]['fileName'] && $this->_tpl_vars['data'][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="../upImage/fair/<?php echo $this->_tpl_vars['data'][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="登録画像" /><br />

                   <?php elseif ($_SESSION['planEventImage'][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="./temp/<?php echo $_SESSION['planEventImage'][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="登録画像" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $_SESSION['planEventImage'][$this->_sections['cnt']['index']]['fileName']; ?>
" />
                   <?php endif; ?>
               <?php endif; ?>
                   <?php echo $this->_tpl_vars['form'][$this->_sections['cnt']['index']]['html']; ?>

                   <br /><span style="font-size:10px;color:#ff0000;">登録画像サイズ 横<?php echo $this->_tpl_vars['maxWidth']; ?>
px</span>
                   <br /><?php echo $this->_tpl_vars['form']['imageDel'][$this->_sections['cnt']['index']]['html']; ?>

               </div>
            <?php endif; ?><?php endfor; endif; ?>
            </td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">内容<span style="color:#ff0000;">＊</span></th> 
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
                </script>
            <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">特典画像</th>
            <td class="tdreg">
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
?><?php if ($this->_sections['cnt']['index'] == 2): ?>
               <div style="float:left;display:inline;width:320px;margin-right:20px;">
               <?php if ($this->_tpl_vars['fileFlg'][$this->_sections['cnt']['index']] == 1): ?>                   <?php if (! $_POST['imageDel'][$this->_sections['cnt']['index']] && $_SESSION['planEventImage'][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="./temp/<?php echo $_SESSION['planEventImage'][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="アップ予定ファイル" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $_SESSION['planEventImage'][$this->_sections['cnt']['index']]['fileName']; ?>
" />
                   <?php endif; ?>
               <?php elseif ($_POST['imageDel'][$this->_sections['cnt']['index']]): ?>
                       <br /><span class="red">画像を削除します。</span>
               <?php else: ?>
                   <?php if (! $_SESSION['planEventImage'][$this->_sections['cnt']['index']]['fileName'] && $this->_tpl_vars['data'][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="../upImage/fair/<?php echo $this->_tpl_vars['data'][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="登録画像" /><br />
                   <?php elseif ($_SESSION['planEventImage'][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="./temp/<?php echo $_SESSION['planEventImage'][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="登録画像" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $_SESSION['planEventImage'][$this->_sections['cnt']['index']]['fileName']; ?>
" />
                   <?php endif; ?>
               <?php endif; ?>
                   <?php echo $this->_tpl_vars['form'][$this->_sections['cnt']['index']]['html']; ?>

                   <br /><span style="font-size:10px;color:#ff0000;">登録画像サイズ 横<?php echo $this->_tpl_vars['maxWidth']; ?>
px</span>
                   <br /><?php echo $this->_tpl_vars['form']['imageDel'][$this->_sections['cnt']['index']]['html']; ?>

               </div>
            <?php endif; ?><?php endfor; endif; ?>
            </td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">特典内容</th> 
            <td class="tdreg">
            <?php if ($this->_tpl_vars['flg'] == 1): ?>
                                        <div class="confFCK">
                    <?php echo $this->_tpl_vars['confComment2']; ?>

                </div>
                <input type="hidden" name="comment2" value="<?php echo $this->_tpl_vars['hiddenValue2']; ?>
" />
            <?php else: ?>
                <?php echo $this->_tpl_vars['form']['comment2']['html']; ?>

                <script type="text/javascript">
                  var news_text = CKEDITOR.replace( 'comment2' );
                </script>
            <?php endif; ?>
            </td>
          </tr>
          <tr><th width="16%" style="text-align:right;" class="threg">表示順</th>
          <td class="tdreg"><?php echo $this->_tpl_vars['form']['sortFlg']['html']; ?>
</td></tr>
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
