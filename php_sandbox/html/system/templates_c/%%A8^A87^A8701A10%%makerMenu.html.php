<?php /* Smarty version 2.6.19, created on 2015-06-03 11:52:16
         compiled from ./common/makerMenu.html */ ?>
     <div id="navi" style="margin-bottom:10px;">
      <div id="naviBt">
       <ul>
        <li style="margin-bottom:2px;"><a href="./makerAddChange.php">メーカー一覧</a></li>
<?php $_from = $this->_tpl_vars['makerMenuArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
<?php if ($this->_tpl_vars['value']['category'] == @CATEGORY_NUM): ?>
        <li<?php if (@PAGE_NUM == $this->_tpl_vars['key']): ?> class="active"<?php endif; ?> style="margin-bottom:2px;"><?php if (@PAGE_NUM == $this->_tpl_vars['key']): ?><font><?php else: ?><a href="./<?php echo $this->_tpl_vars['value']['file']; ?>
.php?makerId=<?php echo $_REQUEST['makerId']; ?>
"><?php endif; ?><?php echo $this->_tpl_vars['value']['title']; ?>
<?php if (@PAGE_NUM == $this->_tpl_vars['key']): ?></font><?php else: ?></a><?php endif; ?></li>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
        <li class="own">
        <a href="javascript:void(0)">その他の項目</a>
        <ul class="child">
<?php $_from = $this->_tpl_vars['makerMenuArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['result'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['result']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['result']['iteration']++;
?>
<?php if ($this->_tpl_vars['value']['category'] != @CATEGORY_NUM): ?>
        <li<?php if (@PAGE_NUM == $this->_tpl_vars['key']): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == $this->_tpl_vars['key']): ?><font><?php else: ?><a href="./<?php echo $this->_tpl_vars['value']['file']; ?>
.php?makerId=<?php echo $_REQUEST['makerId']; ?>
"><?php endif; ?><?php echo $this->_tpl_vars['value']['title']; ?>
<?php if (@PAGE_NUM == $this->_tpl_vars['key']): ?></font><?php else: ?></a><?php endif; ?></li>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
        </ul>
        </li>

      </div>
      <div class="clear"></div>
     </div>