<?php /* Smarty version 2.6.19, created on 2018-09-28 16:19:23
         compiled from ./common/contentsMenu.html */ ?>
     <div id="navi" style="margin-bottom:10px;">
      <div id="naviBt">
       <ul>
        <li<?php if (@PAGE_NUM == 1): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == 1): ?><font><?php else: ?><a href="./<?php echo @FILE_CATEGORY; ?>
List.php"><?php endif; ?><?php echo @PAGE_TITLE; ?>
一覧<?php if (@PAGE_NUM == 1): ?></font><?php else: ?></a><?php endif; ?></li>
        <?php if (@CHENGE_FLG): ?><li<?php if (@PAGE_NUM == 2): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == 2): ?><font><?php else: ?><a href="./<?php echo @FILE_CATEGORY; ?>
AddChange.php"><?php endif; ?><?php echo @PAGE_TITLE; ?>
<?php if ($_GET['id']): ?>詳細<?php else: ?>登録<?php endif; ?><?php if (@PAGE_NUM == 2): ?></font><?php else: ?></a><?php endif; ?></li><?php endif; ?>
        <?php if (@SORT_FLG): ?><li<?php if (@PAGE_NUM == 3): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == 3): ?><font><?php else: ?><a href="./<?php echo @FILE_CATEGORY; ?>
Sort.php"><?php endif; ?><?php echo @PAGE_TITLE; ?>
カテゴリ並び替え<?php if (@PAGE_NUM == 3): ?></font><?php else: ?></a><?php endif; ?></li><?php endif; ?>
        <?php if (@SORT_FLG): ?><li<?php if (@PAGE_NUM == 4): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == 4): ?><font><?php else: ?><a href="./<?php echo @FILE_CATEGORY; ?>
AllSort.php"><?php endif; ?><?php echo @PAGE_TITLE; ?>
並び替え<?php if (@PAGE_NUM == 4): ?></font><?php else: ?></a><?php endif; ?></li><?php endif; ?>

       </ul>
      </div>
      <div class="clear"></div>
     </div>