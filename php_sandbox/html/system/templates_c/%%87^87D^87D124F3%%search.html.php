<?php /* Smarty version 2.6.19, created on 2015-06-23 11:14:51
         compiled from search.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'search.html', 8, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./common/meta.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="./js/setForm.js" type="text/javascript"></script>

<script type="text/javascript">
<!--

//var mode = '<?php echo $_GET['mode']; ?>
';
//var member = <?php echo ((is_array($_tmp=@$_GET['member'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
;
<?php echo '
function setRelatedProduct( id, number, name, price )
{
    opener.window.$( \'.relatedProductForm\' ).each( function()
    {
        if( $( this ).data( \'id\' ) == id )
        {
            alert( \'すでに登録されてます。\' );
            exit;
        }
    });
    var innerStr = \'\';
    innerStr += \'<tr>\';
    innerStr += \'<td class="tdreg">\' + number + \'</td>\';
    innerStr += \'<td class="tdreg">\' + name + \'</td>\';
    innerStr += \'<td class="tdreg">\' + price + \'<input type="hidden" class="relatedProductForm" data-id="\' + id + \'" name="relatedProduct[\' + id + \']" value="1" /></td>\';
    innerStr += \'<td class="tdreg"><span id="close{$key}" class="closeBtnMini" onclick="delBox( this.parentNode )">×</span></td>\';
    innerStr += \'</tr>\';
    opener.window.$( "#relatedBox" ).append( innerStr );
    //window.close();
}


function setOptionProduct( id, number, name, price )
{
    opener.window.$( \'.relatedOptionForm\' ).each( function()
    {
        if( $( this ).data( \'id\' ) == id )
        {
            alert( \'すでに登録されてます。\' );
            exit;
        }
    });
    var innerStr = \'\';
    innerStr += \'<tr>\';
    innerStr += \'<td class="tdreg">\' + number + \'</td>\';
    innerStr += \'<td class="tdreg">\' + name + \'</td>\';
    innerStr += \'<td class="tdreg">\' + price + \'<input type="hidden" class="optionProductForm" data-id="\' + id + \'" name="optionProduct[\' + id + \']" value="1" /></td>\';
    innerStr += \'<td class="tdreg"><span id="close{$key}" class="closeBtnMini" onclick="delBox( this.parentNode )">×</span></td>\';
    innerStr += \'</tr>\';
    opener.window.$( "#optionBox" ).append( innerStr );
    //window.close();
}
'; ?>

-->
</script>

</head>
<body style="background-image:none;">

<div id="popup_area" onblur="focus()">


<div id="main_area">

	<h1 style="background-color:#666;padding:8px;color:#fff;font-size:18px;text-align:center;margin-bottom:10px;"><?php if ($_GET['t'] == 'option'): ?>オプション品<?php else: ?>関連製品<?php endif; ?><?php echo @PAGE_TITLE; ?>
</h1>

	<div class="section01">
<form<?php echo $this->_tpl_vars['form']['attributes']; ?>
>
<table cellpadding="0" cellspacing="0" style="margin-bottom:20px;width:90%;">
		<tr>
			<td class="tdreg center" style="border-top:1px solid #ded;border-left:1px solid #ded;letter-spacing:0.6em;">
                <input type="text" name="word" value="<?php echo $_GET['word']; ?>
" style="width:60%;" />
				<input type="submit" name="freeWordSearch" value="型番・製品名 検索" />
			</td>
		</tr>
</table>
<?php echo $this->_tpl_vars['form']['hidden']; ?>

</form>


		<table class="datasheet" cellpadding="0" cellspacing="0" id="serchList" style="width:90%;">
			<col width="100" />
			<col width="100" />
			<tr class="caption">
				<th class="threg" colspan="3" style="text-align:center;">一覧</th>
			</tr>
			<tr>
				<th class="threg" style="text-align:center;">型番</th>
				<th class="threg" style="text-align:center;">メーカー</th>
				<th class="threg" style="text-align:center;">商品名</th>
			</tr>
			<tbody id="employee">
			<?php $_from = $this->_tpl_vars['listData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
			<tr>
				<td class="tdreg"><?php echo $this->_tpl_vars['value']['modelNumber']; ?>
</td>
				<td class="tdreg"><?php echo $this->_tpl_vars['makerArray']['maker'][$this->_tpl_vars['value']['makerId']]; ?>
</td>
				<td class="tdreg">
				<?php if ($_GET['t'] == 'option'): ?>
				<a href="javascript:void(0)" onclick="setOptionProduct('<?php echo $this->_tpl_vars['value']['id']; ?>
', '<?php echo $this->_tpl_vars['value']['modelNumber']; ?>
', '<?php echo $this->_tpl_vars['value']['name']; ?>
', '<?php echo $this->_tpl_vars['value']['priceMinimum']; ?>
')"><?php echo $this->_tpl_vars['value']['name']; ?>
</a>
				<?php else: ?>
				<a href="javascript:void(0)" onclick="setRelatedProduct('<?php echo $this->_tpl_vars['value']['id']; ?>
', '<?php echo $this->_tpl_vars['value']['modelNumber']; ?>
', '<?php echo $this->_tpl_vars['value']['name']; ?>
', '<?php echo $this->_tpl_vars['value']['priceMinimum']; ?>
')"><?php echo $this->_tpl_vars['value']['name']; ?>
</a>
				<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; else: ?>
			<tr>
				<td class="tdreg" colspan="3"><?php if ($_GET['freeWordSearch']): ?>該当する商品は登録されていません。<?php else: ?>型番・商品名を入力してください。<?php endif; ?></td>
			</tr>
			<?php endif; unset($_from); ?>
		</table>

	</div>



</div><!--/main_area-->
<p style="text-align:center;margin-top:16px;">
<input type="button" onclick="window.close()" value="閉じる" />
</p>
<!--/sub_area-->

</div><!--/container-->


<!--/footer_area-->

</body>
</html>