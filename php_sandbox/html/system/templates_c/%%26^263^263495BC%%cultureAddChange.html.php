<?php /* Smarty version 2.6.19, created on 2014-05-29 11:59:33
         compiled from cultureAddChange.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<link rel="stylesheet" type="text/css" href="./css/ui.all.css"/>
<link rel="stylesheet" type="text/css" href="./css/ui.datepicker.css"/>
<link rel="stylesheet" type="text/css" href="./css/mdp.css" />
<script type="text/javascript" src="./js/ui.core.js"></script>
<script type="text/javascript" src="./js/ui.datepicker.js"></script>
<script type="text/javascript" src="./js/ui.datepicker-ja.js"></script>
<script type="text/javascript" src="./js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="./js/ckfinder/ckfinder.js"></script>

<?php echo '
<script type="text/javascript">
/*function changeEnable( flg )
{
    var bol = ( flg ) ? false: true;
    document.item.sponsorship2.disabled = bol;

}

function clearForm()
{
    document.news.startDate.value = \'\';
    document.news.endDate.value = \'\';
}

$(document).ready(function(){
	// 時間ピッカー
	$("input#startDate").datepicker(
		{duration: "",dateFormat: \'yy-mm-dd\'}
	);
	$("input#endDate").datepicker(
		{duration: "",dateFormat: \'yy-mm-dd\'}
	);
	changeEnable( document.item.sponsorshipFlg.checked );
});

jQuery(function($) {
  $("#startDate").mask("9999-99-99");
  $("#endDate").mask("9999-99-99");
});*/



</script>

<style type="text/css"> 
span.ui-datepicker-year {
	margin-right:1em;
}

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
</a> / <a href="./<?php echo @FILE_CATEGORY; ?>
List.php"><?php echo @PAGE_TITLE; ?>
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
を<?php if ($_REQUEST['id']): ?>編集<?php else: ?>登録<?php endif; ?>します。<br />
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
            <th width="18%" style="text-align:right;" class="threg">コース</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['cource']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">開催曜日<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['week']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">開催時間帯</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['timeZone']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">種類</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['kind']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">教室・講座名<span style="color:#ff0000;">＊</span></th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['title']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">講師</th>
            <td class="tdreg">            <?php if ($this->_tpl_vars['flg'] == 1): ?>
                <div class="confFCK">
                    <?php echo $this->_tpl_vars['confLecturer']; ?>

                </div>
                <input type="hidden" name="lecturer" value="<?php echo $this->_tpl_vars['hiddenLecturer']; ?>
" />
            <?php else: ?>
                <?php echo $this->_tpl_vars['form']['lecturer']['html']; ?>

                <script type="text/javascript">
                  var news_text = CKEDITOR.replace( 'lecturer' );
                  CKFinder.setupCKEditor( news_text, './js/ckfinder/' );
                </script>
            <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">時間・日程<span style="color:#ff0000;">＊</span></th>
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
                  CKFinder.setupCKEditor( news_text, './js/ckfinder/' );
                </script>
            <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">受講料</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['attendMoney']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">準備用品</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['preparationItem']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">募集人数</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['collectionLimit']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">体験教室</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['experience']['html']; ?>
</td>
          </tr>
<?php $this->assign('sessionKey', @FILE_SESSION_KEY); ?>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">画像</th>
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
?>
               <div style="float:left;display:inline;width:220px;margin-right:20px;">
               <?php if ($this->_tpl_vars['fileFlg'][$this->_sections['cnt']['index']] == 1): ?>
                   <?php if (! $_POST['imageDel'][$this->_sections['cnt']['index']] && $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="./temp/<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="アップ予定ファイル" width="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['img']['width']; ?>
" height="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['img']['height']; ?>
" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']; ?>
" />

                   <?php elseif (! $_POST['imageDel'][$this->_sections['cnt']['index']] && $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['fileName'] && ! $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="../upImage/<?php echo @FILE_CATEGORY; ?>
/<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="登録画像" width="<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['image']['width']; ?>
" height="<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['image']['height']; ?>
" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['fileName']; ?>
" />

                   <?php endif; ?>
               <?php else: ?>
                   <?php if ($this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['fileName'] && ! $_SESSION[$this->_tpl_vars['sessionKey']][$this->_sections['cnt']['index']]['fileName']): ?>
                       <img src="../upImage/<?php echo @FILE_CATEGORY; ?>
/<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['fileName']; ?>
" alt="登録画像" width="<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['image']['width']; ?>
" height="<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['image']['height']; ?>
" /><br />
                       <input type="hidden" name="fileName[<?php echo $this->_sections['cnt']['index']; ?>
]" value="<?php echo $this->_tpl_vars['data']['image'][$this->_sections['cnt']['index']]['fileName']; ?>
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
                   <br /><span style="font-size:10px;color:#ff0000;">登録画像サイズ 横<?php echo $this->_tpl_vars['maxWidth']; ?>
px×縦<?php echo $this->_tpl_vars['maxHeight']; ?>
</span>
                   <br /><?php echo $this->_tpl_vars['form']['imageDel'][$this->_sections['cnt']['index']]['html']; ?>

               </div>
<?php endfor; endif; ?>
            </td>
          </tr>
          <tr><th width="16%" style="text-align:right;" class="threg">追加項目</th> 
          <td class="tdreg">
<table id="p2146-table">
<thead><tr><th>タイトル/内容</th><th>リスト順</th><th>追加/削除</th></tr></thead>
<!--▼改行しない▼-->
<?php if (! $this->_tpl_vars['flg']): ?>
<tbody id="p2146-tbody"><?php $_from = $_POST['addItem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?><tr><td style="text-align:left;">タイトル<br /><input type="text" name="addItem[]" value="<?php echo $_POST['addItem'][$this->_tpl_vars['key']]; ?>
" style="width:400px;" /><br />内容<br /><textarea name="addContents[]" style="width:400px;height:160px;"><?php echo $_POST['addContents'][$this->_tpl_vars['key']]; ?>
</textarea></td><td><img src="./cmn_img/up.png" alt="↑" height="18" onclick="upList(this);" />　　<img src="./cmn_img/down.png" alt="↓" height="18" onclick="downList(this);" /></td><td><input type="button" value="+" onclick="addList(this);" />　<input type="button" value="-" onclick="removeList(this);" /></td></tr><?php endforeach; else: ?><tr><td style="text-align:left;">タイトル<br /><input type="text" name="addItem[]" value="" style="width:400px;" /><br />内容<br /><textarea name="addContents[]" style="width:400px;height:160px;"><?php echo $_POST['addContents'][$this->_tpl_vars['key']]; ?>
</textarea></td><td><img src="./cmn_img/up.png" alt="↑" height="18" onclick="upList(this);" />　　<img src="./cmn_img/down.png" alt="↓" height="18" onclick="downList(this);" /></td><td><input type="button" value="+" onclick="addList(this);" />　<input type="button" value="-" onclick="removeList(this);" /></td></tr>
<?php endif; unset($_from); ?></tbody>
<?php else: ?><tbody id="p2146-tbody">
<?php $_from = $_POST['addItem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
<tr>
  <td>
    <input type="hidden" name="addItem[]" value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['value']; ?>

    <input type="hidden" name="addContents[]" value="<?php echo $_POST['addContents'][$this->_tpl_vars['key']]; ?>
"><?php echo $_POST['addContents'][$this->_tpl_vars['key']]; ?>

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

          <tr>
            <th width="16%" style="text-align:right;" class="threg">紹介文</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['introduction']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">ピックアップ</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['pickUpFlg']['html']; ?>
</td>
          </tr>
          <tr>
            <th width="16%" style="text-align:right;" class="threg">公開設定</th>
            <td class="tdreg"><?php echo $this->_tpl_vars['form']['dispFlg']['html']; ?>
</td>
          </tr>


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
