<?php /* Smarty version 2.6.19, created on 2015-11-04 19:19:40
         compiled from productAllSort.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<link rel="stylesheet" type="text/css" href="css/sort.li.css"/>
<script type="text/javascript" src="./js/setForm.js"></script>

<script type="text/javascript" src="./js/ui/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="./js/ui/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="./js/ui/jquery.ui.mouse.min.js"></script>
<script type="text/javascript" src="./js/ui/jquery.ui.sortable.min.js"></script>
<script type="text/javascript" src="./js/ui/jquery.ui.droppable.min.js"></script>
<script type="text/javascript" src="./js/queserser.sort.li.js"></script>


<script type="text/javascript" charset="utf-8">
<!--
var prtJson = <?php echo $this->_tpl_vars['prtJson']; ?>
;
<?php echo '

'; ?>

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
    <div id="logo"></div>
   </div><!-- /#header -->

   <div id="container">
    <div id="contents">
     <div id="pan"><a href="login.php"><?php echo @TITLE; ?>
</a> / <?php echo $this->_tpl_vars['itemCategoryArray'][$_GET['categoryId']]; ?>
<?php echo @PAGE_TITLE; ?>
管理</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/contentsMenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

       <div style="margin:12px 0 20px 0;padding:10px;border:1px solid <?php if ($_GET['r']): ?>#ff99ff<?php else: ?>#cccccc<?php endif; ?>;background-color:#ffffff;<?php if ($_GET['r']): ?>color:#ff33ff<?php endif; ?>">
         <?php if ($_GET['r'] == 1): ?>
             全体の表示順位を変更しました。
         <?php else: ?>
             <?php echo @PAGE_TITLE; ?>
の表示順位を変更します。
         <?php endif; ?>
       </div>

     <div id="data">
<div class="clear"></div>


<table border="0" cellpadding="0" cellspacing="0" class="sortList" style="margin-left:0;background-color:#fff">
  <tr>
    <td style="border:none;">
            <ul id="boxes">

<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['name']['iteration']++;
?>
            <li class="box<?php if (! $this->_tpl_vars['value']['dispFlg']): ?> gray<?php endif; ?>" data-idnum="<?php echo $this->_tpl_vars['value']['id']; ?>
">
              <?php if ($this->_tpl_vars['value']['image']['fileName']): ?>
                  <p class="imgBox" style="overflow:hidden;"><img src="/upImage/<?php echo @FILE_CATEGORY; ?>
/<?php echo $this->_tpl_vars['value']['image']['fileName']; ?>
" alt="<?php echo $this->_tpl_vars['value']['title']; ?>
" border="0" height="80" /></p>
              <?php else: ?>
                  <span class="noImgBox">no-image</span>
              <?php endif; ?>
              <p class="name" style="height:14px;"><?php echo $this->_tpl_vars['value']['name']; ?>
</p>
              <p class="name"><?php echo $this->_tpl_vars['value']['subName']; ?>
</p>
              <p class="rank">順位(<?php echo $this->_foreach['name']['iteration']; ?>
)</p>
            </li>
<?php endforeach; else: ?>
<p class="name">現在製品の登録はございません。</p>
<?php endif; unset($_from); ?>
            </ul>
    </td>
  </tr>
</table>

<?php if ($this->_tpl_vars['data']): ?>
<div class="sortSubmit">
  <form action="./<?php echo @THE_FILE_NAME; ?>
.php<?php echo $this->_tpl_vars['getLink']['all']; ?>
<?php echo $this->_tpl_vars['getLink']['all']; ?>
<?php if ($this->_tpl_vars['getLink']['all']): ?>&<?php else: ?>?<?php endif; ?>s=1" method="post" enctype="multipart/form-data" id="sortSubmit" name="sort" style="margin-bottom:40px;text-align:center;">
    <input id="sortBtn" type="button" value="並び替え" onclick="sortSave( '.box' )">
  </form>
</div>
<?php endif; ?>
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
 ?>
   <div class="clear"></div>
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>

 </body>
</html>
