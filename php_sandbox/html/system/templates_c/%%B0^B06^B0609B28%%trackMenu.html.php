<?php /* Smarty version 2.6.19, created on 2014-12-18 20:49:51
         compiled from ./common/trackMenu.html */ ?>
     <div id="navi">
	  <div id="naviBt">
       <ul>
        <?php if (@LIST_FLG): ?><li<?php if (@PAGE_NUM == 1): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == 1): ?><font><?php else: ?><a href="./<?php echo @FILE_CATEGORY; ?>
List.php"><?php endif; ?><?php echo @PAGE_TITLE; ?>
一覧<?php if (@PAGE_NUM == 1): ?></font><?php else: ?></a><?php endif; ?></li><?php endif; ?>
        <?php if (@CHENGE_FLG): ?><li<?php if (@PAGE_NUM == 2): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == 2): ?><font><?php else: ?><a href="./<?php echo @FILE_CATEGORY; ?>
AddChange.php"><?php endif; ?><?php echo @PAGE_TITLE; ?>
登録<?php if (@PAGE_NUM == 2): ?></font><?php else: ?></a><?php endif; ?></li><?php endif; ?>
        <?php if (@SORT_FLG): ?><li<?php if (@PAGE_NUM == 3): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == 3): ?><font><?php else: ?><a href="./<?php echo @FILE_CATEGORY; ?>
Sort.php"><?php endif; ?><?php echo @PAGE_TITLE; ?>
並び替え<?php if (@PAGE_NUM == 3): ?></font><?php else: ?></a><?php endif; ?></li><?php endif; ?>
       </ul>
	  </div>
      <div class="clear"></div>
     </div>