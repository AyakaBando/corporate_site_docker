<?php /* Smarty version 2.6.19, created on 2015-07-28 12:25:33
         compiled from load.html */ ?>
	<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
	<li>
	<a href="./product/detail.php?id=<?php echo $this->_tpl_vars['value']['id']; ?>
">
		<?php if ($this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']): ?>
		<p class="pl_ph"><img src="/upImage/product/<?php echo $this->_tpl_vars['imgArray'][$this->_tpl_vars['value']['id']]['fileName']; ?>
" alt="<?php echo $this->_tpl_vars['value']['name']; ?>
Image"/></p>
		<?php endif; ?>
		<h5><?php echo $this->_tpl_vars['value']['subName']; ?>
</h5>
		<p class="s_title"><?php echo $this->_tpl_vars['value']['name']; ?>
</p>
	</a>
	</li>
	<?php endforeach; endif; unset($_from); ?>