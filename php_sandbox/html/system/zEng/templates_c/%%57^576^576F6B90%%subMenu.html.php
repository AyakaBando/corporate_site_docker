<?php /* Smarty version 2.6.19, created on 2024-04-17 17:16:02
         compiled from ./common/subMenu.html */ ?>
     <div id="navi">
	  <div id="naviBt">
       <ul>
        <?php if (@SUB_LIST_FLG): ?><li<?php if (@SUB_PAGE_NUM == 1): ?> class="active"<?php endif; ?>><?php if (@SUB_PAGE_NUM == 1): ?><font><?php else: ?><a href="./<?php echo @FILE_CATEGORY; ?>
List.php?id=<?php echo $_REQUEST['id']; ?>
"><?php endif; ?>一覧<?php if (@SUB_PAGE_NUM == 1): ?></font><?php else: ?></a><?php endif; ?></li><?php endif; ?>
        <?php if (@SUB_CHENGE_FLG): ?><li<?php if (@SUB_PAGE_NUM == 2): ?> class="active"<?php endif; ?>><?php if (@SUB_PAGE_NUM == 2): ?><font><?php else: ?><a href="./<?php echo @FILE_CATEGORY; ?>
AddChange.php?id=<?php echo $_REQUEST['id']; ?>
"><?php endif; ?>登録<?php if (@SUB_PAGE_NUM == 2): ?></font><?php else: ?></a><?php endif; ?></li><?php endif; ?>
        <?php if (@SUB_CATEGORY_FLG): ?><li<?php if (@SUB_PAGE_NUM == 3): ?> class="active"<?php endif; ?>><?php if (@SUB_PAGE_NUM == 3): ?><font><?php else: ?><a href="./<?php echo @FILE_CATEGORY; ?>
CategoryAddChange.php?id=<?php echo $_REQUEST['id']; ?>
"><?php endif; ?>カテゴリ<?php if (@SUB_PAGE_NUM == 3): ?></font><?php else: ?></a><?php endif; ?></li><?php endif; ?>
       </ul>
	  </div>
      <div class="clear"></div>
     </div>